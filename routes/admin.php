<?php

use App\Http\Controllers\admin\BaseController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(
    ['prefix' => "/"],
    function () {

        Route::group(
            ['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['web', 'auth', 'admin', 'checkMail']],
            function () {
                Route::get('/', [BaseController::class, 'home'])->name('home');
                Route::get('dashboard', [BaseController::class, 'index'])->name('index');
                // Route::get('users/datatable', [UserController::class, 'datatable'])->name('users.datatable');
                // Route::get('users/connect/{id}', [UserController::class, 'connect'])->name('users.connect');
                // Route::get('users/data', [UserController::class, 'data'])->name('users.data');
                // Route::resource('users', UserController::class);
            }
        );
    }
);
