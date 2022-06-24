<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminSiteInfoController;
use App\Http\Controllers\Admin\UserSiteInfoController;
use App\Http\Controllers\Admin\UserHerosectionController;
use App\Http\Controllers\Admin\UserServicesController;
use App\Http\Controllers\Admin\UserFacilitiesController;
use App\Http\Controllers\Admin\UserTrainersController;
use App\Http\Controllers\Admin\UserAboutController;

// ========= Landing Page Routes =========
Route::get('/', function () {
    $allData = DB::table('user_site_infos')->first();
    return view('welcome', compact('allData'));
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
        Route::post('admin/update_password', [ProfileController::class, 'PasswordUpdate'])->name('admin.password.update');
        Route::get('admin/remove_avatar', [ProfileController::class, 'RemoveAvatar'])->name('remove.avatar');
    });

    // Account Management
    Route::prefix('accounts')->group(function () {
        Route::get('admin/view', [UserController::class, 'UserView'])->name('user.view');
        Route::get('admin/add', [UserController::class, 'UserAdd'])->name('user.add');
        Route::post('admin/store', [UserController::class, 'UserStore'])->name('user.store');
        Route::get('admin/edit/{id}', [UserController::class, 'UserEdit'])->name('user.edit');
        Route::post('admin/update/{id}', [UserController::class, 'UserUpdate'])->name('user.update');
        Route::get('admin/delete/{id}', [UserController::class, 'UserDelete'])->name('user.delete');
    });

    // Site Info Management
    Route::prefix('siteinfo')->group(function () {
        Route::get('admin/edit', [AdminSiteInfoController::class, 'AdminSiteInfoEdit'])->name('admin.siteinfo.edit');
        Route::post('admin/update/{id}', [AdminSiteInfoController::class, 'AdminSiteInfoUpdate'])->name('admin.siteinfo.update');
        Route::get('admin/remove_admin_brand', [AdminSiteInfoController::class, 'RemoveAdminBrand'])->name('remove.admin_brand');
        Route::get('admin/remove_admin_brand_mini', [AdminSiteInfoController::class, 'RemoveAdminBrandMini'])->name('remove.admin_brand_mini');
    });

    // User Site Info Management
    Route::prefix('siteinfo')->group(function () {
        Route::get('user/edit', [UserSiteInfoController::class, 'UserSiteInfoEdit'])->name('user.siteinfo.edit');
        Route::post('user/update/{id}', [UserSiteInfoController::class, 'UserSiteInfoUpdate'])->name('user.siteinfo.update');
    });

    // Herosection Management
    Route::prefix('herosection')->group(function () {
        Route::get('user/view', [UserHerosectionController::class, 'UserHerosectionView'])->name('user.herosection.view');
        Route::get('user/add', [UserHerosectionController::class, 'UserHerosectionAdd'])->name('user.herosection.add');
        Route::post('user/store', [UserHerosectionController::class, 'UserHerosectionStore'])->name('user.herosection.store');
        Route::get('user/edit/{id}', [UserHerosectionController::class, 'UserHerosectionEdit'])->name('user.herosection.edit');
        Route::post('user/update/{id}', [UserHerosectionController::class, 'UserHerosectionUpdate'])->name('user.herosection.update');
        Route::get('user/delete/{id}', [UserHerosectionController::class, 'UserHerosectionDelete'])->name('user.herosection.delete');
        Route::get('user/remove_image/{id}', [UserHerosectionController::class, 'UserHerosectionRemoveImage'])->name('user.herosection.remove_image');
    });

    // Services Management
    Route::prefix('services')->group(function () {
        Route::get('user/view', [UserServicesController::class, 'UserServicesView'])->name('user.services.view');
        Route::get('user/add', [UserServicesController::class, 'UserServicesAdd'])->name('user.services.add');
        Route::post('user/store', [UserServicesController::class, 'UserServicesStore'])->name('user.services.store');
        Route::get('user/edit/{id}', [UserServicesController::class, 'UserServicesEdit'])->name('user.services.edit');
        Route::post('user/update/{id}', [UserServicesController::class, 'UserServicesUpdate'])->name('user.services.update');
        Route::get('user/delete/{id}', [UserServicesController::class, 'UserServicesDelete'])->name('user.services.delete');
        Route::get('user/remove_image/{id}', [UserServicesController::class, 'UserServicesRemoveImage'])->name('user.services.remove_image');
        Route::get('user/remove_background/{id}', [UserServicesController::class, 'UserServicesRemoveBackground'])->name('user.services.remove_background');
    });

    // Facilities Management
    Route::prefix('facilities')->group(function () {
        Route::get('user/view', [UserFacilitiesController::class, 'UserFacilitiesView'])->name('user.facilities.view');
        Route::get('user/add', [UserFacilitiesController::class, 'UserFacilitiesAdd'])->name('user.facilities.add');
        Route::post('user/store', [UserFacilitiesController::class, 'UserFacilitiesStore'])->name('user.facilities.store');
        Route::get('user/edit/{id}', [UserFacilitiesController::class, 'UserFacilitiesEdit'])->name('user.facilities.edit');
        Route::post('user/update/{id}', [UserFacilitiesController::class, 'UserFacilitiesUpdate'])->name('user.facilities.update');
        Route::get('user/delete/{id}', [UserFacilitiesController::class, 'UserFacilitiesDelete'])->name('user.facilities.delete');
        Route::get('user/remove_image/{id}', [UserFacilitiesController::class, 'UserFacilitiesRemoveImage'])->name('user.facilities.remove_image');
    });

    // Trainers Management
    Route::prefix('trainers')->group(function () {
        Route::get('user/view', [UserTrainersController::class, 'UserTrainersView'])->name('user.trainers.view');
        Route::get('user/add', [UserTrainersController::class, 'UserTrainersAdd'])->name('user.trainers.add');
        Route::post('user/store', [UserTrainersController::class, 'UserTrainersStore'])->name('user.trainers.store');
        Route::get('user/edit/{id}', [UserTrainersController::class, 'UserTrainersEdit'])->name('user.trainers.edit');
        Route::post('user/update/{id}', [UserTrainersController::class, 'UserTrainersUpdate'])->name('user.trainers.update');
        Route::get('user/delete/{id}', [UserTrainersController::class, 'UserTrainersDelete'])->name('user.trainers.delete');
        Route::get('user/remove_image/{id}', [UserTrainersController::class, 'UserTrainersRemoveImage'])->name('user.trainers.remove_image');
    });

    // About Management
    Route::prefix('about')->group(function () {
        Route::get('user/edit', [UserAboutController::class, 'UserAboutEdit'])->name('user.about.edit');
        Route::post('user/update/{id}', [UserAboutController::class, 'UserAboutUpdate'])->name('user.about.update');
        Route::get('user/remove_image', [UserAboutController::class, 'UserAboutRemoveImage'])->name('user.about.remove_image');
        Route::get('user/remove_background', [UserAboutController::class, 'UserAboutRemoveBackground'])->name('user.about.remove_background');
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
