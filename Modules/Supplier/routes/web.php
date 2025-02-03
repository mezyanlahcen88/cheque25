<?php

use Illuminate\Support\Facades\Route;

use Modules\Supplier\App\Http\Controllers\SupplierController;

Route::group(['middleware' => 'auth'], function () {
    //chaneg the status
    Route::post('/supplier/changestatus', [SupplierController::class, 'changeStatus'])->name('supplier.changestatus');
    //to permanently delete
    Route::delete('/supplier/{id}/force_delete', [SupplierController::class, 'forceDelete'])->name('supplier.forceDelete');
    // to restore
    Route::put('/supplier/{id}/restore', [SupplierController::class, 'restore'])->name('supplier.restore');
    //liste all deleted
    Route::get('/supplier/trashed', [SupplierController::class, 'trashed'])->name('supplier.trashed');
    // Get suppliers JSON
        Route::get('/supplier/get-suppliers-json', [SupplierController::class ,'getSuppliersJson'])->name('suppliers.getSuppliersJson');
    // Get suppliers JSON
    Route::get('/supplier/get-deleted-suppliers-json', [SupplierController::class ,'getDeletedSuppliersJson'])->name('suppliers.getDeletedSuppliersJson');
   // delete multiple
    Route::post('/supplier/delete-multiple', [SupplierController::class, 'deleteMultiple'])->name('supplier.deleteMultiple');
    Route::post('/supplier/activate-multiple', [SupplierController::class, 'activateMultiple'])->name('supplier.activateMultiple');
    Route::post('/supplier/restore-multiple', [SupplierController::class, 'restoreMultiple'])->name('supplier.restoreMultiple');
    Route::resource('supplier', SupplierController::class)->names('supplier');
});
