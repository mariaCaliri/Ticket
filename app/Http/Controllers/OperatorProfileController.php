<?php

namespace App\Http\Controllers;

use App\Models\LogActivity;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\StoreUserLoginHistory;
use Illuminate\Support\Facades\Hash;

class OperatorProfileController extends Controller
{
    public function ShowProfile(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view( 'operator-profile.index');
    }

    public function LoginHistory(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $logs = LogActivity::latest()->get();
        //$logs = LogActivity::where('user_id', Auth::id())->limit(5)->get();
        return view('operator-profile.operator-login-history');
    }

    public function ChangePassword(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('operator-profile.operator-change-password');
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



}
