<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::group(['controller' => AuthController::class], function () {
    Route::get('/', 'index')->name('login');
    Route::get('logout', 'logout')->name('logout');
    Route::post('login', 'login')->name('login.post');
    Route::post('register', 'register')->name('register');
});

Route::get('/dashboard', function() {
    return view('dashboard');
})->name('dashboard');

Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
