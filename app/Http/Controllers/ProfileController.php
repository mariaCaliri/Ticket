<?php

namespace App\Http\Controllers;

use App\Models\LogActivity;
use App\Models\User;
use App\Providers\StoreUserLoginHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{

    public function LoginHistory()
    {
        //$logs = LogActivity::latest()->get();
        $logs = LogActivity::where('user_id', Auth::id())->paginate(5);
        return view('user-profile.login-history');
    }

    public function ChangePassword(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('user-profile.change-password');
    }

    public function updatePassword(Request $request): \Illuminate\Http\RedirectResponse
    {
        # Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
    }

    public function ShowProfile(User $user)
    {
        return view( 'user-profile.index', compact('user'));
    }
}
