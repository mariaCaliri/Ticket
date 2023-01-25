<?php

use App\Http\Controllers\ChatsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OperatorProfileController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin/home', [HomeController::class, 'index'])->name('admin.home');
Route::get('/operator/home', [HomeController::class, 'index'])->name('operator.home');


//rotta chat
Route::get('/chat', [ChatsController::class, 'index'])->name('chat');
Route::get('/chat/create{id}', [ChatsController::class, 'create'])->name('chat.create');
Route::post('/chat',[ChatsController::class, 'store'])->name('chat.store');
Route::get('/chat/{id}', [ChatsController::class, 'show'])->name('chat.show');
Route::get('chat/{id}/edit', [ChatsController::class, 'edit'])->name('chat.edit');

 //rotte per categorie
Route::resource('categories', \App\Http\Controllers\CategoryController::class);

//rotte per il crud del ticket
Route::resource('tickets', TicketController::class);

//Rotte per utente
Route::get('admin/utente', [UserController::class, 'index'])->name('admin.utente.index');
Route::get('admin/utente/create', [UserController::class, 'create'])->name('admin.utente.create');
Route::post('admin/utente', [UserController::class, 'store'])->name('admin.utente.store');
Route::get('admin/utente/{id}', [UserController::class, 'show'])->name('admin.utente.show');
Route::get('admin/utente/{id}/edit', [UserController::class, 'edit'])->name('admin.utente.edit');
Route::put('admin/utente/{id}', [UserController::class, 'update'])->name('admin.utente.update');
Route::delete('admin/utente/{id}',[ UserController::class, 'destroy'])->name('admin.utente.destroy');


//rotte per operatori
Route::get('admin/operatore', [OperatorController::class, 'index'])->name('admin.operatore.index');
Route::get('admin/operatore/create', [OperatorController::class, 'create'])->name('admin.operatore.create');
Route::post('admin/operatore', [OperatorController::class, 'store'])->name('admin.operatore.store');
Route::get('admin/operatore/{id}', [OperatorController::class, 'show'])->name('admin.operatore.show');
Route::get('admin/operatore/{id}/edit', [OperatorController::class, 'edit'])->name('admin.operatore.edit');
Route::put('admin/operatore/{id}', [OperatorController::class, 'update'])->name('admin.operatore.update');
Route::delete('admin/operatore/{id}',[ OperatorController::class, 'destroy'])->name('admin.operatore.destroy');


//rotte per profilo utente
Route::get('user/login-history', [\App\Http\Controllers\ProfileController::class, 'LoginHistory'])->name('login-history');
Route::get('user/change-password', [\App\Http\Controllers\ProfileController::class, 'ChangePassword'])->name('change-password');
Route::post('/change-password', [\App\Http\Controllers\ProfileController::class,'updatePassword'])->name('update-password');
Route::get('/user/profile', [\App\Http\Controllers\ProfileController::class, 'ShowProfile'])->name('user.profile');
Route::post('profile/{user}',[\App\Http\Controllers\ProfileController::class,'update'])->name('profile.update');

//rotte per profilo operatore
Route::get('operator/operator-login-history', [\App\Http\Controllers\OperatorProfileController::class, 'LoginHistory'])->name('operator-login-history');
Route::get('operator/operator-change-password', [\App\Http\Controllers\OperatorProfileController::class, 'ChangePassword'])->name('operator-change-password');
Route::post('/change-password', [\App\Http\Controllers\OperatorProfileController::class,'updatePassword'])->name('update-password');
Route::get('/operator/profile', [\App\Http\Controllers\OperatorProfileController::class, 'ShowProfile'])->name('operator.profile');
Route::post('profile/{operator}',[\App\Http\Controllers\OperatorProfileController::class,'update'])->name('operator.profile.update');



//rotte per mandare le email a tutti gli operatori
Route::get('/send/email/view/all', [OperatorController::class, 'emailViewAll'])->name('send.email.all.view');
Route::post('/store/email/all', [OperatorController::class, 'storeAllEmail'])->name('store.allOperator.email');

//rotta per le email ai singoli operatori
Route::get('send/mail/view/{id}', [OperatorController::class, 'send'])->name('send.email.view');
Route::post('/store/email/{id}', [OperatorController::class, 'storeSingleEmail'])->name('store.operator.email');



