<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/account/login', [UserController::class, 'Loginshow'])->name('account.Loginshow')->middleware('guest');
Route::post('/account/save-login', [UserController::class, 'LoginIndex'])->name('account.LoginIndex')->middleware('guest');
Route::get('/account/registration', [UserController::class, 'RegistrationShow'])->name('account.RegistrationShow')->middleware('guest');
Route::post('/account/registration-save', [UserController::class, 'ResgistrationIndex'])->name('account.ResgistrationIndex')->middleware('guest');


Route::get('/account/dashboard', [DashboardController::class, 'Dashboard'])->name('account.Dashboard')->middleware('auth');
Route::get('/account/logout',[UserController::class, 'logout'])->name('account.logout')->middleware('auth');







