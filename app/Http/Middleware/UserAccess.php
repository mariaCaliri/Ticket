<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAccess
{
    public function handle(Request $request, Closure $next, $userType)
    {
        if(auth()->user()->type == $userType){
            return redirect()->route('home');
        }
       return response()->json(['You do not have permission to access for this page.']);
        /* return response()->view('errors.check-permission'); */

    }
}
