<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Providers\LoginHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {


        if (Auth::user()->type == '0') {
            $tickets = Ticket::where('user_id', Auth::id())->get();

            return view('home')->with(compact('tickets'));
        }
        elseif (Auth::user()->type == '1') {
            return view('adminHome');
        }
        elseif (Auth::user()->type == '2') {
            return view('operatorHome');

        }
        else {
            return view('welcome');
        }
    }}
