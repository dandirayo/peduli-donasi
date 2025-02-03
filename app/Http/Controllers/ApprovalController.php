<?php

namespace App\Http\Controllers;

use App\Models\ApprovalYayasan;
use App\Models\KategoriDonasiYayasan;
use App\Models\Notification;
use App\Models\Yayasan;
use App\Utils\PeduliDonasiConstants;
use Illuminate\Http\Request;

class ApprovalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showYayasan(Request $request)
    {
        $id = $request->get('id');
        $approvalYayasan = ApprovalYayasan::find($id);

        if($approvalYayasan === null) abort(404);

        return view('adminYayasanDetail', [
            'approvalYayasan' => $approvalYayasan
        ]);
    }

    public function daftarYayasan(Request $request)
    {
        $user = $request->user();
        $yayasan = Yayasan::where('user_id', $user->id)->first();

        if($yayasan) return redirect()->route('profileYayasan');

        $pendingApprovalYayasan = ApprovalYayasan::where('user_id', $user->id)
            ->where('status', '!=', 'disapproved')->first();

        return view('daftarYayasan', [
            'pendingApprovalYayasan' => $pendingApprovalYayasan
        ]);
    }

    public function storeDaftarYayasan(Request $request)
    {
//        dd($request->all());

        $retSuccess = false;
        $retMessage = PeduliDonasiConstants::YAYASAN_DAFTAR_GAGAL;

        $user = $request->user();

        if($user === null) $retMessage = PeduliDonasiConstants::LOGIN_DAHULU;
        else {
            $yayasan = Yayasan::where('user_id', $user->id)->first();
            if($yayasan) $retMessage = PeduliDonasiConstants::YAYASAN_DAFTAR_GAGAL_EXIST;
            else {
                $approvalYayasan = ApprovalYayasan::where([
                    ['user_id', '=', $user->id],
                    ['status', '=', 'new']
                ])->first();

                if($approvalYayasan) $retMessage = PeduliDonasiConstants::YAYASAN_DAFTAR_GAGAL_EXIST_APPROVAL;
                else {
                    $validatedData = $request->validate([
                        'name' => ['required', 'string', 'max:255'],
                        'city' => ['required', 'string', 'max:255'],
                        'address' => ['required', 'string', 'max:255'],
                        'contact' => ['required', 'string', 'max:255'],
                        'bank_name' => ['required', 'string', 'max:255'],
                        'bank_number' => ['required', 'string', 'max:255'],
                        'bank_owner' => ['required', 'string', 'max:255'],
                        'description' => ['required', 'string', 'max:255'],
                        'donation_purposes' => ['required', 'string', 'max:255'],
                        'logo' => ['required', 'mimetypes:image/jpeg,image/png', 'max:4096'],
                        'category_food' => ['numeric'],
                        'category_stationary' => ['numeric'],
                        'category_clothes' => ['numeric'],
                        'yayasan_documents' => ['required', 'mimetypes:application/pdf', 'file', 'max:8192']
                    ]);
                    $validatedData['user_id'] = $user->id;
                    $validatedData['status'] = 'new';
                    $validatedData['logo'] = $request->file('logo')->store('logo');
                    $validatedData['yayasan_documents'] = $request->file('yayasan_documents')->store('documents');

                    try {
                        $newApprovalYayasan = ApprovalYayasan::create($validatedData);
                        if($newApprovalYayasan) {
                            $retSuccess = true;
                            $retMessage = PeduliDonasiConstants::YAYASAN_DAFTAR_BERHASIL;
                        }
                    } catch (\Exception $e) {
                        $retMessage = PeduliDonasiConstants::YAYASAN_DAFTAR_GAGAL_INSERT;
                    }
                }
            }
        }

//        return [
//            'success' => $retSuccess,
//            'message' => $retMessage
//        ];

        if($retSuccess) return redirect()->route('daftarYayasan')->withSuccess($retMessage);
        else return redirect()->route('daftarYayasan')->withError($retMessage);
    }

    public function approveYayasan(Request $request)
    {
        $retSuccess = false;
        $retMessage = PeduliDonasiConstants::APPROVAL_YAYASAN_GAGAL;

        $approvalYayasan = ApprovalYayasan::find($request->id);
        if($approvalYayasan === null) $retMessage = PeduliDonasiConstants::APPROVAL_YAYASAN_TIDAK_DITEMUKAN;
        else if($approvalYayasan->status != 'new') $retMessage = PeduliDonasiConstants::APPROVAL_YAYASAN_GAGAL_NOT_NEW;
        else {
            try {
                $yayasan = Yayasan::create([
                    'user_id' => $approvalYayasan->user_id,
                    'name' => $approvalYayasan->name,
                    'city' => $approvalYayasan->city,
                    'address' => $approvalYayasan->address,
                    'contact' => $approvalYayasan->contact,
                    'bank_name' => $approvalYayasan->bank_name,
                    'bank_number' => $approvalYayasan->bank_number,
                    'bank_owner' => $approvalYayasan->bank_owner,
                    'description' => $approvalYayasan->description,
                    'donation_purposes' => $approvalYayasan->donation_purposes,
                    'logo' => $approvalYayasan->logo
                ]);

                if($yayasan) {
                    if($approvalYayasan->category_food == 1) {
                        KategoriDonasiYayasan::create([
                            'yayasan_id' => $yayasan->id,
                            'kategori_donasi_id' => 1
                        ]);
                    }

                    if($approvalYayasan->category_stationary == 1) {
                        KategoriDonasiYayasan::create([
                            'yayasan_id' => $yayasan->id,
                            'kategori_donasi_id' => 3
                        ]);
                    }

                    if($approvalYayasan->category_clothes == 1) {
                        KategoriDonasiYayasan::create([
                            'yayasan_id' => $yayasan->id,
                            'kategori_donasi_id' => 2
                        ]);
                    }

                    $approvalYayasan->status = 'approved';
                    $approvalYayasan->save();

                    $notification = Notification::create([
                        'user_id' => $approvalYayasan->user_id,
                        'title' => 'Registerasi Yayasan Anda Telah Disetujui',
                        'detail' => 'Yayasan anda dengan nama ' . $yayasan->name . ' telah disetujui!'
                    ]);

                    $retSuccess = true;
                    $retMessage = PeduliDonasiConstants::APPROVAL_YAYASAN_BERHASIL;
                }
            } catch (\Exception $e) {
                $retMessage = $e->getMessage();
            }
        }

        return [
            'success' => $retSuccess,
            'message' => $retMessage
        ];
    }
}
