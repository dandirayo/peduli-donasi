<?php

namespace App\Http\Controllers;

use App\Models\ActivityYayasan;
use App\Models\Donation;
use App\Models\ProgramYayasan;
use App\Models\Yayasan;
use App\Utils\PeduliDonasiConstants;
use App\Utils\ResiIntegration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class YayasanController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $yayasan = Yayasan::with([
            'kategoriDonasiYayasan' => function($q) {
                $q->orderBy('yayasan_id', 'ASC')
                    ->orderBy('kategori_donasi_id', 'ASC');
            },
            'kategoriDonasiYayasan.kategoriDonasi'
        ])->filter($request->only(['search']));

//        $yayasan = $yayasan->whereHas('kategoriDonasiYayasan');

        return view('yayasanList', [
            'yayasan' => $yayasan->paginate(6)->withQueryString()
        ]);
    }

    public function show(Request $request)
    {
        $id = $request->get('id');
        $yayasan = Yayasan::with([
            'kategoriDonasiYayasan' => function($q) {
                $q->orderBy('yayasan_id', 'ASC')
                    ->orderBy('kategori_donasi_id', 'ASC');
            },
            'kategoriDonasiYayasan.kategoriDonasi',
            'programYayasan',
            'activityYayasan'
        ])->find($id);
        if($yayasan === null) abort(404);

//        dd($yayasan->programYayasan->count());

        return view('yayasanDetail', [
            'yayasan' => $yayasan
        ]);
    }

    public function donateYayasan(Request $request)
    {
//        dd($request);
        $retSuccess = false;
        $retMessage = PeduliDonasiConstants::DONASI_GAGAL;

        if($request->user() === null) $retMessage = PeduliDonasiConstants::LOGIN_DAHULU;
        else {
            $validatedData = $request->validate([
                'yayasan_id' => ['required'],
                'nama_pengirim' => ['required', 'string', 'max:255'],
                'alamat_pengirim' => ['required', 'string', 'max:255'],
                'no_tlp_pengirim' => ['required', 'string', 'max:14', 'min:8'],
                'tujuan_donasi' => ['required', 'string', 'max:255'],
                'kondisi_barang' => ['required', 'string', 'max:255'],
                'jumlah_barang' => ['required', 'numeric', 'min:1'],
                'deskripsi_barang' => ['required', 'string', 'max:255'],
                'image1' => ['required', 'mimetypes:image/jpeg,image/png', 'max:4096'],
                'image2' => ['mimetypes:image/jpeg,image/png', 'max:4096'],
                'image3' => ['mimetypes:image/jpeg,image/png', 'max:4096'],
            ]);

            $validatedData['user_id'] = $request->user()->id;
            $validatedData['nama_kurir'] = null;
            $validatedData['resi_kurir'] = null;
            $validatedData['status'] = PeduliDonasiConstants::DONASI_STATUS_MENUNGGU_RESSI;

//            dd($validatedData);

            $yayasan = Yayasan::find($validatedData['yayasan_id']);
            if($yayasan === null) $retMessage = PeduliDonasiConstants::YAYASAN_TIDAK_DITEMUKAN;
            else {
                $validatedData['image1'] = $request->file('image1')->store('images/donations');
                if($request->image2 === null) $validatedData['image2'] = null;
                else $validatedData['image2'] = $request->file('image2')->store('images/donations');
                if($request->image3 === null) $validatedData['image3'] = null;
                else $validatedData['image3'] = $request->file('image3')->store('images/donations');

                try {
                    $newDonation = Donation::create($validatedData);
                    if($newDonation) {

                        try {
                            $kurirUrl = config('app.kurir_sim_url');
                            $apiSuffix = '/api/resi';

                            $fullUrl = $kurirUrl . $apiSuffix;

                            $response = Http::post($fullUrl, [
                                'nama_pengirim' => $newDonation->nama_pengirim,
                                'alamat_pengirim' => $newDonation->alamat_pengirim,
                                'nama_penerima' => $yayasan->name,
                                'alamat_penerima' => $yayasan->address
                            ]);

                            $responseObj = $response->object();

                            $newDonation->resi_kurir = $responseObj->data->resi;
                            $newDonation->status = $responseObj->data->status;
                            $newDonation->nama_kurir = 'Kurir Simulator';
                            $newDonation->save();

                            $retSuccess = true;
                            $retMessage = PeduliDonasiConstants::DONASI_BERHASIL;
                        } catch (\Exception $e) {
                            $retMessage = $e->getMessage();
                        }

                        // TODO notifikasi
                    }
                } catch (\Exception $e) {
                    $retMessage = PeduliDonasiConstants::DONASI_GAGAL_INSERT_DATA_DONASI;
                }
            }
        }

        return [
            'success' => $retSuccess,
            'message' => $retMessage
        ];
    }

    public function donateYayasanUpdateStatus(Request $request)
    {
        $retSuccess = false;
        $retMessage = PeduliDonasiConstants::DONASI_TIDAK_DITEMUKAN;

        if($request->user() === null) $retMessage = PeduliDonasiConstants::LOGIN_DAHULU;

        $validatedData = $request->validate([
            'donation_id' => ['required']
        ]);

        $donation = Donation::with(['user'])->find($validatedData['donation_id']);
        if($donation) {
            if($donation->user->id !== $request->user()->id) $retMessage = PeduliDonasiConstants::DONASI_BUKAN_MILIKMU;
            else if($donation->status === PeduliDonasiConstants::DONASI_STATUS_MENUNGGU_RESSI) return $this->donateYayasanResiSubmission($request);
            else if($donation->status === PeduliDonasiConstants::DONASI_STATUS_MENUNGGU_PICKUP) {
                $donation->status = PeduliDonasiConstants::DONASI_STATUS_SEDANG_DALAM_PENGIRIMAN;
                $retSuccess = true;
                $retMessage = PeduliDonasiConstants::DONASI_STATUS_UPDATE_BERHASIL;
            }
        }

        return [
            'success' => $retSuccess,
            'message' => $retMessage
        ];
    }

    private function donateYayasanResiSubmission(Request $request)
    {
        $retSuccess = false;
        $retMessage = PeduliDonasiConstants::DONASI_INPUT_RESI_GAGAL;

        $validatedData = $request->validate([
            'donation_id' => ['required'],
            'nama_kurir' => ['required', 'string', 'max:255'],
            'resi_kurir' => ['required', 'string', 'max:255'],
        ]);

        $donation = Donation::with(['user'])->find($validatedData['donation_id']);

        try {
            $donation->nama_kurir = $validatedData['nama_kurir'];
            $donation->resi_kurir = $validatedData['resi_kurir'];
            $donation->status = PeduliDonasiConstants::DONASI_STATUS_MENUNGGU_PICKUP;
            $donation->save();

            $retSuccess = true;
            $retMessage = PeduliDonasiConstants::DONASI_INPUT_RESI_BERHASIL;
        } catch (\Exception $e) {

        }


        return [
            'success' => $retSuccess,
            'message' => $retMessage
        ];
    }

    public function showProfileYayasan(Request $request)
    {
        $user = $request->user();
        $yayasan = Yayasan::with([
            'programYayasan',
            'activityYayasan'
        ])->where('user_id', $user->id)->first();

        if($yayasan === null) return redirect()->route('daftarYayasan')->withErrors('Anda belum memiliki yayasan, silahkan daftarkan terlebih dahulu!');



        return view('yayasanProfile', [
            'yayasan' => $yayasan
        ]);
    }

    public function updateProfileYayasan(Request $request)
    {
        $retSuccess = false;
        $retMessage = PeduliDonasiConstants::PROFILE_YAYASAN_UPDATE_GAGAL;

        if($request->user() === null) $retMessage = PeduliDonasiConstants::LOGIN_DAHULU;
        else {
            $validatedData = $request->validate([
                'logo' => ['mimetypes:image/jpeg,image/png', 'max:4096'],
                'name' => ['required', 'string', 'max:255'],
            ]);

            $validatedData['yayasan_id'] = $request->yayasan_id;

            $yayasan = Yayasan::find($validatedData['yayasan_id']);
            if($yayasan === null) $retMessage = PeduliDonasiConstants::YAYASAN_TIDAK_DITEMUKAN;
            else {
                try {
                    if($request->logo === null) $validatedData['logo'] = $yayasan->logo;
                    else $validatedData['logo'] = $request->file('logo')->store('logo');

                    $yayasan->logo = $validatedData['logo'];
                    $yayasan->name = $validatedData['name'];
                    $yayasan->save();

                    $retSuccess = true;
                    $retMessage = PeduliDonasiConstants::PROFILE_YAYASAN_UPDATE_BERHASIL;
                } catch (\Exception $e) {
                    $retMessage = $e->getMessage();
                }
            }
        }

        return [
            'success' => $retSuccess,
            'message' => $retMessage
        ];
    }

    public function updateProfileYayasanAbout(Request $request)
    {
        $retSuccess = false;
        $retMessage = PeduliDonasiConstants::PROFILE_YAYASAN_UPDATE_GAGAL;

        if($request->user() === null) $retMessage = PeduliDonasiConstants::LOGIN_DAHULU;
        else {
            $validatedData = $request->validate([
                'description' => ['required', 'string', 'max:255'],
            ]);

            $validatedData['yayasan_id'] = $request->yayasan_id;

            $yayasan = Yayasan::find($validatedData['yayasan_id']);
            if($yayasan === null) $retMessage = PeduliDonasiConstants::YAYASAN_TIDAK_DITEMUKAN;
            else {
                try {
                    $yayasan->description = $validatedData['description'];
                    $yayasan->save();

                    $retSuccess = true;
                    $retMessage = PeduliDonasiConstants::PROFILE_YAYASAN_UPDATE_BERHASIL;
                } catch (\Exception $e) {
                    $retMessage = PeduliDonasiConstants::PROFILE_YAYASAN_UPDATE_GAGAL_INSERT;
                }
            }
        }

        return [
            'success' => $retSuccess,
            'message' => $retMessage
        ];
    }

    public function updateProfileYayasanContact(Request $request)
    {
        $retSuccess = false;
        $retMessage = PeduliDonasiConstants::PROFILE_YAYASAN_UPDATE_GAGAL;

        if($request->user() === null) $retMessage = PeduliDonasiConstants::LOGIN_DAHULU;
        else {
            $validatedData = $request->validate([
                'address' => ['required', 'string', 'max:255'],
                'contact' => ['required', 'string', 'max:255'],
                'bank_name' => ['required', 'string', 'max:255'],
                'bank_number' => ['required', 'string', 'max:255'],
                'bank_owner' => ['required', 'string', 'max:255'],
            ]);

            $validatedData['yayasan_id'] = $request->yayasan_id;

            $yayasan = Yayasan::find($validatedData['yayasan_id']);
            if($yayasan === null) $retMessage = PeduliDonasiConstants::YAYASAN_TIDAK_DITEMUKAN;
            else {
                try {
                    $yayasan->address = $validatedData['address'];
                    $yayasan->contact = $validatedData['contact'];
                    $yayasan->bank_name = $validatedData['bank_name'];
                    $yayasan->bank_number = $validatedData['bank_number'];
                    $yayasan->bank_owner = $validatedData['bank_owner'];
                    $yayasan->save();

                    $retSuccess = true;
                    $retMessage = PeduliDonasiConstants::PROFILE_YAYASAN_UPDATE_BERHASIL;
                } catch (\Exception $e) {
                    $retMessage = PeduliDonasiConstants::PROFILE_YAYASAN_UPDATE_GAGAL_INSERT;
                }
            }
        }

        return [
            'success' => $retSuccess,
            'message' => $retMessage
        ];
    }

    public function storeProgramYayasan(Request $request)
    {
        $retSuccess = false;
        $retMessage = PeduliDonasiConstants::PROFILE_YAYASAN_PROGRAM_STORE_GAGAL;

        if($request->user() === null) $retMessage = PeduliDonasiConstants::LOGIN_DAHULU;
        else {
            $validatedData = $request->validate([
                'image' => ['required', 'mimetypes:image/jpeg,image/png', 'max:4096'],
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:255'],
                'yayasan_id' => ['required', 'string', 'max:255'],
            ]);

            $yayasan = Yayasan::find($validatedData['yayasan_id']);
            if($yayasan === null) $retMessage = PeduliDonasiConstants::YAYASAN_TIDAK_DITEMUKAN;
            else {
                try {
                    $validatedData['image'] = $request->file('image')->store('images/program');

                    ProgramYayasan::create($validatedData);

                    $retSuccess = true;
                    $retMessage = PeduliDonasiConstants::PROFILE_YAYASAN_PROGRAM_STORE_BERHASIL;
                } catch (\Exception $e) {
                    $retMessage = PeduliDonasiConstants::PROFILE_YAYASAN_PROGRAM_STORE_GAGAL_INSERT;
                }
            }
        }

        return [
            'success' => $retSuccess,
            'message' => $retMessage
        ];
    }

    public function updateProgramYayasan(Request $request)
    {
        $retSuccess = false;
        $retMessage = PeduliDonasiConstants::PROFILE_YAYASAN_PROGRAM_UPDATE_GAGAL;

        if($request->user() === null) $retMessage = PeduliDonasiConstants::LOGIN_DAHULU;
        else {
            $validatedData = $request->validate([
                'image' => ['mimetypes:image/jpeg,image/png', 'max:4096'],
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:255'],
                'id' => ['required', 'string', 'max:255'],
                'yayasan_id' => ['required', 'string', 'max:255'],
            ]);

            $yayasan = Yayasan::find($validatedData['yayasan_id']);
            if($yayasan === null) $retMessage = PeduliDonasiConstants::YAYASAN_TIDAK_DITEMUKAN;
            else {
                $programYayasan = ProgramYayasan::find($validatedData['id']);

                if($programYayasan === null) $retMessage = PeduliDonasiConstants::YAYASAN_TIDAK_DITEMUKAN;
                else {
                    try {
                        if($request->image === null) $validatedData['image'] = $programYayasan->image;
                        else $validatedData['image'] = $request->file('image')->store('images/program');

                        $programYayasan->image = $validatedData['image'];
                        $programYayasan->title = $validatedData['title'];
                        $programYayasan->description = $validatedData['description'];

                        $programYayasan->save();

                        $retSuccess = true;
                        $retMessage = PeduliDonasiConstants::PROFILE_YAYASAN_PROGRAM_UPDATE_BERHASIL;
                    } catch (\Exception $e) {
                        $retMessage = PeduliDonasiConstants::PROFILE_YAYASAN_PROGRAM_UPDATE_GAGAL_INSERT;
                    }
                }
            }
        }

        return [
            'success' => $retSuccess,
            'message' => $retMessage
        ];
    }

    public function deleteProgramYayasan(Request $request)
    {
        $retSuccess = false;
        $retMessage = PeduliDonasiConstants::PROFILE_YAYASAN_PROGRAM_DELETE_GAGAL;

        if($request->user() === null) $retMessage = PeduliDonasiConstants::LOGIN_DAHULU;
        else {
            $validatedData = $request->validate([
                'id' => ['required', 'string', 'max:255'],
                'yayasan_id' => ['required', 'string', 'max:255'],
            ]);

            $yayasan = Yayasan::find($validatedData['yayasan_id']);
            if($yayasan === null) $retMessage = PeduliDonasiConstants::YAYASAN_TIDAK_DITEMUKAN;
            else {
                $programYayasan = ProgramYayasan::find($validatedData['id']);

                if($programYayasan === null) $retMessage = PeduliDonasiConstants::PROGRAM_YAYASAN_TIDAK_DITEMUKAN;
                else {
                    try {
                        $programYayasan->delete();

                        $retSuccess = true;
                        $retMessage = PeduliDonasiConstants::PROFILE_YAYASAN_PROGRAM_DELETE_BERHASIL;
                    } catch (\Exception $e) {
                        $retMessage = PeduliDonasiConstants::PROFILE_YAYASAN_PROGRAM_DELETE_GAGAL_DELETE;
                    }
                }
            }
        }

        return [
            'success' => $retSuccess,
            'message' => $retMessage
        ];
    }

    public function storeActivityYayasan(Request $request)
    {
        $retSuccess = false;
        $retMessage = PeduliDonasiConstants::PROFILE_YAYASAN_ACTIVITY_STORE_GAGAL;

        if($request->user() === null) $retMessage = PeduliDonasiConstants::LOGIN_DAHULU;
        else {
            $validatedData = $request->validate([
                'image' => ['required', 'mimetypes:image/jpeg,image/png', 'max:4096'],
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:255'],
                'yayasan_id' => ['required', 'string', 'max:255'],
            ]);

            $yayasan = Yayasan::find($validatedData['yayasan_id']);
            if($yayasan === null) $retMessage = PeduliDonasiConstants::YAYASAN_TIDAK_DITEMUKAN;
            else {
                try {
                    $validatedData['image'] = $request->file('image')->store('images/activity');

                    ActivityYayasan::create($validatedData);

                    $retSuccess = true;
                    $retMessage = PeduliDonasiConstants::PROFILE_YAYASAN_ACTIVITY_STORE_BERHASIL;
                } catch (\Exception $e) {
                    $retMessage = PeduliDonasiConstants::PROFILE_YAYASAN_ACTIVITY_STORE_GAGAL_INSERT;
                }
            }
        }

        return [
            'success' => $retSuccess,
            'message' => $retMessage
        ];
    }

    public function updateActivityYayasan(Request $request)
    {
        $retSuccess = false;
        $retMessage = PeduliDonasiConstants::PROFILE_YAYASAN_ACTIVITY_UPDATE_GAGAL;

        if($request->user() === null) $retMessage = PeduliDonasiConstants::LOGIN_DAHULU;
        else {
            $validatedData = $request->validate([
                'image' => ['mimetypes:image/jpeg,image/png', 'max:4096'],
                'title' => ['required', 'string', 'max:255'],
                'description' => ['required', 'string', 'max:255'],
                'id' => ['required', 'string', 'max:255'],
                'yayasan_id' => ['required', 'string', 'max:255'],
            ]);

            $yayasan = Yayasan::find($validatedData['yayasan_id']);
            if($yayasan === null) $retMessage = PeduliDonasiConstants::YAYASAN_TIDAK_DITEMUKAN;
            else {
                $activityYayasan = ActivityYayasan::find($validatedData['id']);

                if($activityYayasan === null) $retMessage = PeduliDonasiConstants::YAYASAN_TIDAK_DITEMUKAN;
                else {
                    try {
                        if($request->image === null) $validatedData['image'] = $activityYayasan->image;
                        else $validatedData['image'] = $request->file('image')->store('images/activity');

                        $activityYayasan->image = $validatedData['image'];
                        $activityYayasan->title = $validatedData['title'];
                        $activityYayasan->description = $validatedData['description'];

                        $activityYayasan->save();

                        $retSuccess = true;
                        $retMessage = PeduliDonasiConstants::PROFILE_YAYASAN_ACTIVITY_UPDATE_BERHASIL;
                    } catch (\Exception $e) {
                        $retMessage = PeduliDonasiConstants::PROFILE_YAYASAN_ACTIVITY_UPDATE_GAGAL_INSERT;
                    }
                }
            }
        }

        return [
            'success' => $retSuccess,
            'message' => $retMessage
        ];
    }

    public function deleteActivityYayasan(Request $request)
    {
        $retSuccess = false;
        $retMessage = PeduliDonasiConstants::PROFILE_YAYASAN_ACTIVITY_DELETE_GAGAL;

        if($request->user() === null) $retMessage = PeduliDonasiConstants::LOGIN_DAHULU;
        else {
            $validatedData = $request->validate([
                'id' => ['required', 'string', 'max:255'],
                'yayasan_id' => ['required', 'string', 'max:255'],
            ]);

            $yayasan = Yayasan::find($validatedData['yayasan_id']);
            if($yayasan === null) $retMessage = PeduliDonasiConstants::YAYASAN_TIDAK_DITEMUKAN;
            else {
                $activityYayasan = ActivityYayasan::find($validatedData['id']);

                if($activityYayasan === null) $retMessage = PeduliDonasiConstants::ACTIVITY_YAYASAN_TIDAK_DITEMUKAN;
                else {
                    try {
                        $activityYayasan->delete();

                        $retSuccess = true;
                        $retMessage = PeduliDonasiConstants::PROFILE_YAYASAN_ACTIVITY_DELETE_BERHASIL;
                    } catch (\Exception $e) {
                        $retMessage = PeduliDonasiConstants::PROFILE_YAYASAN_ACTIVITY_DELETE_GAGAL_DELETE;
                    }
                }
            }
        }

        return [
            'success' => $retSuccess,
            'message' => $retMessage
        ];
    }

    public function indexDonatur(Request $request)
    {
        if($request->ajax()) {
            $donationList = Donation::with(['user'])->filter($request->only(['yayasanId']))->get();
            $data = [];
            foreach($donationList as $donation) {
                $newStatus = ResiIntegration::getResiStatus($donation->resi_kurir);
                if($newStatus != PeduliDonasiConstants::STATUS_PENGIRIMAN_SELESAI) $donation->status = ResiIntegration::getResiStatus($donation->resi_kurir);
                else $donation->status = PeduliDonasiConstants::DONASI_STATUS_SELESAI;
                $donation->save();

                array_push($data, array(
                    'id' => $donation->id,
                    'gambar' => $donation->image1,
                    'deskripsi_barang' => $donation->deskripsi_barang,
                    'kondisi' => $donation->kondisi_barang,
                    'jumlah' => $donation->jumlah_barang,
                    'nama_pengirim' => $donation->nama_pengirim,
                    'kurir' => $donation->nama_kurir,
                    'resi' => $donation->resi_kurir,
                    'status' => $donation->status,
                ));
            }

            return response()->json([
                'data' => $data
            ]);
        }

        return abort(404);
    }
}
