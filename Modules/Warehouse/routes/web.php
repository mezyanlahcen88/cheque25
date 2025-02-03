<?php

use Illuminate\Support\Facades\Route;

use Modules\Warehouse\App\Http\Controllers\WarehouseController;

Route::group(['middleware' => 'auth'], function () {
    //chaneg the status
    Route::post('/warehouse/changestatus', [WarehouseController::class, 'changeStatus'])->name('warehouse.changestatus');
    //to permanently delete
    Route::delete('/warehouse/{id}/force_delete', [WarehouseController::class, 'forceDelete'])->name('warehouse.forceDelete');
    // to restore
    Route::put('/warehouse/{id}/restore', [WarehouseController::class, 'restore'])->name('warehouse.restore');
    //liste all deleted
    Route::get('/warehouse/trashed', [WarehouseController::class, 'trashed'])->name('warehouse.trashed');
    // Get warehouses JSON
        Route::get('/warehouse/get-warehouses-json', [WarehouseController::class ,'getWarehousesJson'])->name('warehouses.getWarehousesJson');
    // Get warehouses JSON
    Route::get('/warehouse/get-deleted-warehouses-json', [WarehouseController::class ,'getDeletedWarehousesJson'])->name('warehouses.getDeletedWarehousesJson');
   // delete multiple
    Route::post('/warehouse/delete-multiple', [WarehouseController::class, 'deleteMultiple'])->name('warehouse.deleteMultiple');
    Route::post('/warehouse/activate-multiple', [WarehouseController::class, 'activateMultiple'])->name('warehouse.activateMultiple');
    Route::post('/warehouse/restore-multiple', [WarehouseController::class, 'restoreMultiple'])->name('warehouse.restoreMultiple');
    Route::resource('warehouse', WarehouseController::class)->names('warehouse');
});
