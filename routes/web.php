<?php

use App\Http\Controllers\AuthController;
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

Route::group(['as' => 'auth.'], function () {
    Route::get('register', [AuthController::class, 'show_reg_form'])->name('register');
    Route::post('register', [AuthController::class, 'reg_store'])->name('register.store');

    Route::get('login', [AuthController::class, 'show_login_form'])->name('login.show');
    Route::post('login', [AuthController::class, 'authenticate'])->name('login');
});

Route::group(['as' => 'home.', 'middleware' => 'auth'], function () {
    Route::get('dashboard', function (){
        echo 'Welcome '.auth()->user()->full_name;
    })->name('dashboard');
});
