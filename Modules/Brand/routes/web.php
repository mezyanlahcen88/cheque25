<?php

use Illuminate\Support\Facades\Route;

use Modules\Brand\App\Http\Controllers\BrandController;

Route::group(['middleware' => 'auth'], function () {
    //chaneg the status
    Route::post('/brand/changestatus', [BrandController::class, 'changeStatus'])->name('brand.changestatus');
    //to permanently delete
    Route::delete('/brand/{id}/force_delete', [BrandController::class, 'forceDelete'])->name('brand.forceDelete');
    // to restore
    Route::put('/brand/{id}/restore', [BrandController::class, 'restore'])->name('brand.restore');
    //liste all deleted
    Route::get('/brand/trashed', [BrandController::class, 'trashed'])->name('brand.trashed');
    // Get brands JSON
        Route::get('/brand/get-brands-json', [BrandController::class ,'getBrandsJson'])->name('brands.getBrandsJson');
    // Get brands JSON
    Route::get('/brand/get-deleted-brands-json', [BrandController::class ,'getDeletedBrandsJson'])->name('brands.getDeletedBrandsJson');
   // delete multiple
    Route::post('/brand/delete-multiple', [BrandController::class, 'deleteMultiple'])->name('brand.deleteMultiple');
    Route::post('/brand/activate-multiple', [BrandController::class, 'activateMultiple'])->name('brand.activateMultiple');
    Route::post('/brand/restore-multiple', [BrandController::class, 'restoreMultiple'])->name('brand.restoreMultiple');
    Route::resource('brand', BrandController::class)->names('brand');
});
