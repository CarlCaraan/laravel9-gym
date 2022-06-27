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
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Admin\Inventory\EquipmentCategoryController;
use App\Http\Controllers\Admin\Inventory\FacilityCategoryController;
use App\Http\Controllers\Admin\Inventory\EquipmentController;
use App\Http\Controllers\Admin\Inventory\StocksController;


Route::group(['middleware' => 'prevent-back-history'], function () {

    // ========= Landing Page Routes =========
    Route::get('/', [WelcomeController::class, 'WelcomeView']);

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

        // ========= User Profile and Change Password =========
        Route::prefix('profile')->group(function () {
            Route::get('admin/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
            Route::get('admin/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
            Route::post('admin/update', [ProfileController::class, 'ProfileUpdate'])->name('profile.update');
            Route::post('admin/update_password', [ProfileController::class, 'PasswordUpdate'])->name('admin.password.update');
            Route::get('admin/remove_avatar', [ProfileController::class, 'RemoveAvatar'])->name('remove.avatar');
        });

        // ========= Account Management =========
        Route::prefix('accounts')->group(function () {
            Route::get('admin/view', [UserController::class, 'UserView'])->name('user.view');
            Route::get('admin/add', [UserController::class, 'UserAdd'])->name('user.add');
            Route::post('admin/store', [UserController::class, 'UserStore'])->name('user.store');
            Route::get('admin/edit/{id}', [UserController::class, 'UserEdit'])->name('user.edit');
            Route::post('admin/update/{id}', [UserController::class, 'UserUpdate'])->name('user.update');
            Route::get('admin/delete/{id}', [UserController::class, 'UserDelete'])->name('user.delete');
        });

        // ========= SiteInfo Management =========
        Route::prefix('siteinfo')->group(function () {
            // Site Info Management
            Route::get('admin/edit', [AdminSiteInfoController::class, 'AdminSiteInfoEdit'])->name('admin.siteinfo.edit');
            Route::post('admin/update/{id}', [AdminSiteInfoController::class, 'AdminSiteInfoUpdate'])->name('admin.siteinfo.update');
            Route::get('admin/remove_admin_brand', [AdminSiteInfoController::class, 'RemoveAdminBrand'])->name('remove.admin_brand');
            Route::get('admin/remove_admin_brand_mini', [AdminSiteInfoController::class, 'RemoveAdminBrandMini'])->name('remove.admin_brand_mini');

            // User Site Info Management
            Route::get('user/edit', [UserSiteInfoController::class, 'UserSiteInfoEdit'])->name('user.siteinfo.edit');
            Route::post('user/update/{id}', [UserSiteInfoController::class, 'UserSiteInfoUpdate'])->name('user.siteinfo.update');

            // Herosection Management
            Route::get('herosection/view', [UserHerosectionController::class, 'UserHerosectionView'])->name('user.herosection.view');
            Route::get('herosection/add', [UserHerosectionController::class, 'UserHerosectionAdd'])->name('user.herosection.add');
            Route::post('herosection/store', [UserHerosectionController::class, 'UserHerosectionStore'])->name('user.herosection.store');
            Route::get('herosection/edit/{id}', [UserHerosectionController::class, 'UserHerosectionEdit'])->name('user.herosection.edit');
            Route::post('herosection/update/{id}', [UserHerosectionController::class, 'UserHerosectionUpdate'])->name('user.herosection.update');
            Route::get('herosection/delete/{id}', [UserHerosectionController::class, 'UserHerosectionDelete'])->name('user.herosection.delete');
            Route::get('herosection/remove_image/{id}', [UserHerosectionController::class, 'UserHerosectionRemoveImage'])->name('user.herosection.remove_image');

            // Services Management
            Route::get('services/view', [UserServicesController::class, 'UserServicesView'])->name('user.services.view');
            Route::get('services/add', [UserServicesController::class, 'UserServicesAdd'])->name('user.services.add');
            Route::post('services/store', [UserServicesController::class, 'UserServicesStore'])->name('user.services.store');
            Route::get('services/edit/{id}', [UserServicesController::class, 'UserServicesEdit'])->name('user.services.edit');
            Route::post('services/update/{id}', [UserServicesController::class, 'UserServicesUpdate'])->name('user.services.update');
            Route::get('services/delete/{id}', [UserServicesController::class, 'UserServicesDelete'])->name('user.services.delete');
            Route::get('services/remove_image/{id}', [UserServicesController::class, 'UserServicesRemoveImage'])->name('user.services.remove_image');
            Route::get('services/remove_background/{id}', [UserServicesController::class, 'UserServicesRemoveBackground'])->name('user.services.remove_background');

            // Facilities Management
            Route::get('facilities/view', [UserFacilitiesController::class, 'UserFacilitiesView'])->name('user.facilities.view');
            Route::get('facilities/add', [UserFacilitiesController::class, 'UserFacilitiesAdd'])->name('user.facilities.add');
            Route::post('facilities/store', [UserFacilitiesController::class, 'UserFacilitiesStore'])->name('user.facilities.store');
            Route::get('facilities/edit/{id}', [UserFacilitiesController::class, 'UserFacilitiesEdit'])->name('user.facilities.edit');
            Route::post('facilities/update/{id}', [UserFacilitiesController::class, 'UserFacilitiesUpdate'])->name('user.facilities.update');
            Route::get('facilities/delete/{id}', [UserFacilitiesController::class, 'UserFacilitiesDelete'])->name('user.facilities.delete');
            Route::get('ufacilitiesser/remove_image/{id}', [UserFacilitiesController::class, 'UserFacilitiesRemoveImage'])->name('user.facilities.remove_image');

            // Trainers Management
            Route::get('trainers/view', [UserTrainersController::class, 'UserTrainersView'])->name('user.trainers.view');
            Route::get('trainers/add', [UserTrainersController::class, 'UserTrainersAdd'])->name('user.trainers.add');
            Route::post('trainers/store', [UserTrainersController::class, 'UserTrainersStore'])->name('user.trainers.store');
            Route::get('trainers/edit/{id}', [UserTrainersController::class, 'UserTrainersEdit'])->name('user.trainers.edit');
            Route::post('trainers/update/{id}', [UserTrainersController::class, 'UserTrainersUpdate'])->name('user.trainers.update');
            Route::get('trainers/delete/{id}', [UserTrainersController::class, 'UserTrainersDelete'])->name('user.trainers.delete');
            Route::get('trainers/remove_image/{id}', [UserTrainersController::class, 'UserTrainersRemoveImage'])->name('user.trainers.remove_image');

            // About Management
            Route::get('about/edit', [UserAboutController::class, 'UserAboutEdit'])->name('user.about.edit');
            Route::post('about/update/{id}', [UserAboutController::class, 'UserAboutUpdate'])->name('user.about.update');
            Route::get('about/remove_image', [UserAboutController::class, 'UserAboutRemoveImage'])->name('user.about.remove_image');
            Route::get('about/remove_background', [UserAboutController::class, 'UserAboutRemoveBackground'])->name('user.about.remove_background');
        });

        // ========= Inventory Management =========
        Route::prefix('inventory')->group(function () {
            // Equipment Category
            Route::get('equipment/category/view', [EquipmentCategoryController::class, 'EquipmentCategoryView'])->name('equipment.category.view');
            Route::get('equipment/category/add', [EquipmentCategoryController::class, 'EquipmentCategoryAdd'])->name('equipment.category.add');
            Route::post('equipment/category/store', [EquipmentCategoryController::class, 'EquipmentCategoryStore'])->name('equipment.category.store');
            Route::get('equipment/category/edit/{id}', [EquipmentCategoryController::class, 'EquipmentCategoryEdit'])->name('equipment.category.edit');
            Route::post('equipment/category/update/{id}', [EquipmentCategoryController::class, 'EquipmentCategoryUpdate'])->name('equipment.category.update');
            Route::get('equipment/category/delete/{id}', [EquipmentCategoryController::class, 'EquipmentCategoryDelete'])->name('equipment.category.delete');

            // Facility Category
            Route::get('facility/category/view', [FacilityCategoryController::class, 'FacilityCategoryView'])->name('facility.category.view');
            Route::get('facility/category/add', [FacilityCategoryController::class, 'FacilityCategoryAdd'])->name('facility.category.add');
            Route::post('facility/category/store', [FacilityCategoryController::class, 'FacilityCategoryStore'])->name('facility.category.store');
            Route::get('facility/category/edit/{id}', [FacilityCategoryController::class, 'FacilityCategoryEdit'])->name('facility.category.edit');
            Route::post('facility/category/update/{id}', [FacilityCategoryController::class, 'FacilityCategoryUpdate'])->name('facility.category.update');
            Route::get('facility/category/delete/{id}', [FacilityCategoryController::class, 'FacilityCategoryDelete'])->name('facility.category.delete');

            // Equipment Inventory
            Route::get('equipment/inventory/view', [EquipmentController::class, 'EquipmentInventoryView'])->name('equipment.inventory.view');
            Route::get('equipment/inventory/add', [EquipmentController::class, 'EquipmentInventoryAdd'])->name('equipment.inventory.add');
            Route::post('equipment/inventory/store', [EquipmentController::class, 'EquipmentInventoryStore'])->name('equipment.inventory.store');
            Route::get('equipment/inventory/edit/{id}', [EquipmentController::class, 'EquipmentInventoryEdit'])->name('equipment.inventory.edit');
            Route::post('equipment/inventory/update/{id}', [EquipmentController::class, 'EquipmentInventoryUpdate'])->name('equipment.inventory.update');
            Route::get('equipment/inventory/delete/{id}', [EquipmentController::class, 'EquipmentInventoryDelete'])->name('equipment.inventory.delete');
            Route::get('equipment/remove_image/{id}', [EquipmentController::class, 'EquipmentInventoryRemoveImage'])->name('equipment.inventory.remove_image');

            // Stocks Inventory
            Route::get('stock/inventory/edit', [StocksController::class, 'StockInventoryEdit'])->name('stock.inventory.edit');
            Route::get('stock/inventory/getequipment', [StocksController::class, 'GetEquipment'])->name('stock.inventory.getequipment');
            Route::get('stock/inventory/gettable', [StocksController::class, 'GetTable'])->name('stock.inventory.gettable');
            Route::post('stock/inventory/update', [StocksController::class, 'StockInventoryUpdate'])->name('stock.inventory.update');
        });
    });

    // ========= Customer Routes =========
    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])->group(function () {
        Route::prefix('customer')->group(function () {
            Route::get('/home', [CustomerController::class, "WelcomeView"])->name('customer.home');
        });
    });

    // ========= Logout Route =========
    Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');
    Route::get('/password/logout', [AdminController::class, 'ChangePasswordLogout'])->name('password.logout');
}); // End Prevent Back Middleware 