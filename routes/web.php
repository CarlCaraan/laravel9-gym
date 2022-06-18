<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ProfileController;

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
        Route::get('admin/edit_password', [ProfileController::class, 'PasswordEdit'])->name('password.edit');
        Route::post('admin/update_password', [ProfileController::class, 'PasswordUpdate'])->name('password.update');
        Route::get('admin/remove_avatar', [ProfileController::class, 'RemoveAvatar'])->name('remove.avatar');
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
