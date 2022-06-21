<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;

// ========= Landing Page Routes =========
Route::get('/', function () {
    return view('welcome');
});

// ========= Admin Routes =========
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'admin'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    // User Profile and Change Password
    Route::prefix('profile')->group(function () {
        Route::get('admin/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
        Route::get('admin/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
        Route::post('admin/update', [ProfileController::class, 'ProfileUpdate'])->name('profile.update');
        Route::post('admin/update_password', [ProfileController::class, 'PasswordUpdate'])->name('password.update');
        Route::get('admin/remove_avatar', [ProfileController::class, 'RemoveAvatar'])->name('remove.avatar');
    });

    // Account Management
    Route::prefix('accounts')->group(function () {
        Route::get('view', [UserController::class, 'UserView'])->name('user.view');
        Route::get('add', [UserController::class, 'UserAdd'])->name('user.add');
        Route::post('store', [UserController::class, 'UserStore'])->name('user.store');
        Route::get('edit/{id}', [UserController::class, 'UserEdit'])->name('user.edit');
        Route::post('update/{id}', [UserController::class, 'UserUpdate'])->name('user.update');
        Route::get('delete/{id}', [UserController::class, 'UserDelete'])->name('user.delete');
    });
});

// ========= Customer Routes =========
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/home', function () {
        return view('welcome');
        // return view('customer.index');
    })->name('home');
});

// ========= Logout Route =========
Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');
Route::get('/password/logout', [AdminController::class, 'ChangePasswordLogout'])->name('password.logout');
