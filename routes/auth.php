<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Route::group(['middleware' => ['localize', 'localeSessionRedirect', 'localizationRedirect'], 'prefix' => LaravelLocalization::setLocale()], function(){
Route::group(
    ['prefix' => "/"],
    function () {
        Route::middleware('guest')->group(function () {

            Auth::routes(['verify' => true, 'login' => false, 'register' => false, 'logout' => false]);

            Route::get('/user/signin', [LoginController::class, 'showLoginForm'])->name('login');
            Route::post('/user/signin', [LoginController::class, 'login']);

            Route::get('/user/signup', [RegisterController::class, 'showRegistrationForm'])->name('register');
            Route::post('/user/signup', [RegisterController::class, 'register']);
        });

        Route::middleware('auth')->group(function () {

            Route::get('verify', function () {
                return view('auth.verify');
            })->name('verify_email');

            Route::post('/logout', [HomeController::class, 'logout'])->name('logout');
        });
    }
);
