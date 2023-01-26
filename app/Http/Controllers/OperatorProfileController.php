<?php

namespace App\Http\Controllers;

use App\Mail\TicketSuccesCreated;
use App\Models\LogActivity;
use App\Models\Operator;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\StoreUserLoginHistory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class OperatorProfileController extends Controller
{
    public function ShowProfile(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view( 'operator-profile.index');
    }
    public function update(Operator $operator, Request $request)
    {
        $operator->update([
            'name' => $request->name,
            'email' => $request->email,

        ]);

        return redirect()->route('operator.home');
    }

    public function LoginHistory(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        $logs = LogActivity::whereUserId(auth()->user()->id)->latest()->paginate(10);
        return view('operator-profile.operator-login-history')->with(compact('logs'));
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
