<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\AdminController;

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


// Logout Route
Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');
