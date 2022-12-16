<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): \Illuminate\Contracts\Support\Renderable
    {
        return view('home');
    }


    public function adminHome(): \Illuminate\Contracts\Support\Renderable
    {
        return view('adminHome');
    }
    public function operatorHome(): \Illuminate\Contracts\Support\Renderable
    {
        return view('operatorHome');
    }

}
