<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

Route::group(['controller' => AuthController::class], function () {
    Route::get('/', 'indexLogin')->name('login');
    Route::get('/register', 'indexRegister')->name('register');
    Route::post('logout', 'logout')->name('logout');
    Route::post('login', 'login')->name('login.post');
    Route::post('register', 'register')->name('register.post');
});

Route::get('/dashboard', function() {
    return view('dashboard');
})->name('dashboard');

Route::get('tasks/member/{task}', [TaskController::class, 'editMember'])->name('tasks.member.edit');
Route::get('tasks/member', [TaskController::class, 'indexMember'])->name('tasks.member');
Route::get('tasks/projects', [TaskController::class, 'projectTasks'])->name('tasks.project');
Route::resource('projects', ProjectController::class);
Route::resource('tasks', TaskController::class);
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
