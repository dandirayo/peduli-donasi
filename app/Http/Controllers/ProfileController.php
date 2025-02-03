<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Utils\PeduliDonasiConstants;
use App\Utils\ResiIntegration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProfileDonatur(Request $request)
    {
        $userId = $request->user()->id;

        $user = User::with(['donation.yayasan'])->find($userId);
        $donationPoints = 0;
        if($user->donation !== null) {
            foreach ($user->donation as $donation) {
                $newStatus = ResiIntegration::getResiStatus($donation->resi_kurir);

                if($newStatus != PeduliDonasiConstants::STATUS_PENGIRIMAN_SELESAI) $donation->status = ResiIntegration::getResiStatus($donation->resi_kurir);
                else $donation->status = PeduliDonasiConstants::DONASI_STATUS_SELESAI;

                $donation->save();

                if($donation->status == PeduliDonasiConstants::DONASI_STATUS_SELESAI) $donationPoints = $donationPoints + 1;
            }
        }

        return view('userProfile', [
            'user' => $user,
            'donationPoints' => $donationPoints
        ]);
    }

    public function updateProfileDonatur(Request $request)
    {
//        dd($request);

        $retSuccess = false;
        $retMessage = PeduliDonasiConstants::PROFILE_DONATUR_UPDATE_GAGAL;

        if($request->user() === null) $retMessage = PeduliDonasiConstants::LOGIN_DAHULU;
        else {
            $validatedData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'phone' => ['required', 'string'],
                'image' => ['mimetypes:image/jpeg,image/png', 'max:4096']
            ]);
            $validatedData['id'] = $request->user()->id;

            $user = User::find($validatedData['id']);
            if($user === null) $retMessage = PeduliDonasiConstants::USER_TIDAK_DITEMUKAN;
            else {
                $otherUserWithSameEmail = User::where([
                    ['email', '=', $validatedData['email']],
                    ['id', '!=', $validatedData['id']]
                ])->first();

                if($otherUserWithSameEmail) $retMessage = PeduliDonasiConstants::PROFILE_DONATUR_UPDATE_GAGAL_EMAIL_USED;
                else {
                    if($request->image === null) $validatedData['image'] = $user->image;
                    else $validatedData['image'] = $request->file('image')->store('profile-images');

                    $user->name = $validatedData['name'];
                    $user->email = $validatedData['email'];
                    $user->phone = $validatedData['phone'];
                    $user->image = $validatedData['image'];
                    $user->save();

                    $retSuccess = true;
                    $retMessage = PeduliDonasiConstants::PROFILE_DONATUR_UPDATE_BERHASIL;
                }
            }
        }

        return [
            'success' => $retSuccess,
            'message' => $retMessage
        ];
    }

    public function changePassword(Request $request)
    {
        $retSuccess = false;
        $retMessage = 'Old Password Wrong!';

        $validatedData = $request->validate([
            'password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::find($request->user()->id);
        if(Hash::check($validatedData['password'], $user->password)) {
            $user->password = Hash::make($validatedData['new_password']);
            $user->save();

            $retSuccess = true;
            $retMessage = 'Successfully Change Your Password!';
        }

        return [
            'success' => $retSuccess,
            'message' => $retMessage
        ];
    }
}
