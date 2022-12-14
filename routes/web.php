<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//rotte per l' autenticazione
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

//rotte per il crud del ticket
Route::resource('tickets', TicketController::class);
//rotte per operatore
Route::resource('operators', \App\Models\Operator::class)->only('index','show','store', 'update');
Route::resource('operators', \App\Models\Operator::class)->except('create','destroy');
//rotte per User

Route::resource('users', \App\Models\User::class)->only('create','index');
Route::resource('users', \App\Models\User::class)->except('edit', 'store', 'destroy');

