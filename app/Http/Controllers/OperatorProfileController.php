<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OperatorProfileController extends Controller
{
    public function ShowProfile(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view( 'operator-profile.index');
    }

}
