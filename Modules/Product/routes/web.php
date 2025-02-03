<?php

use Illuminate\Support\Facades\Route;

use Modules\Product\App\Http\Controllers\ProductController;

Route::group(['middleware' => 'auth'], function () {
    //chaneg the status
    Route::post('/product/changestatus', [ProductController::class, 'changeStatus'])->name('product.changestatus');
    //to permanently delete
    Route::delete('/product/{id}/force_delete', [ProductController::class, 'forceDelete'])->name('product.forceDelete');
    // to restore
    Route::put('/product/{id}/restore', [ProductController::class, 'restore'])->name('product.restore');
    //liste all deleted
    Route::get('/product/trashed', [ProductController::class, 'trashed'])->name('product.trashed');
    // Get products JSON
        Route::get('/product/get-products-json', [ProductController::class ,'getProductsJson'])->name('products.getProductsJson');
    // Get products JSON
    Route::get('/product/get-deleted-products-json', [ProductController::class ,'getDeletedProductsJson'])->name('products.getDeletedProductsJson');
   // delete multiple
    Route::post('/product/delete-multiple', [ProductController::class, 'deleteMultiple'])->name('product.deleteMultiple');
    Route::post('/product/activate-multiple', [ProductController::class, 'activateMultiple'])->name('product.activateMultiple');
    Route::post('/product/restore-multiple', [ProductController::class, 'restoreMultiple'])->name('product.restoreMultiple');
    Route::resource('product', ProductController::class)->names('product');
});
