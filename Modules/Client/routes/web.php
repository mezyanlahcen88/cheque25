<?php

use Illuminate\Support\Facades\Route;

use Modules\Client\App\Http\Controllers\ClientController;

Route::group(['middleware' => 'auth'], function () {
    //chaneg the status
    Route::post('/client/changestatus', [ClientController::class, 'changeStatus'])->name('client.changestatus');
    //to permanently delete
    Route::delete('/client/{id}/force_delete', [ClientController::class, 'forceDelete'])->name('client.forceDelete');
    // to restore
    Route::put('/client/{id}/restore', [ClientController::class, 'restore'])->name('client.restore');
    //liste all deleted
    Route::get('/client/trashed', [ClientController::class, 'trashed'])->name('client.trashed');
    // Get clients JSON
        Route::get('/client/get-clients-json', [ClientController::class ,'getClientsJson'])->name('clients.getClientsJson');
    // Get clients JSON
    Route::get('/client/get-deleted-clients-json', [ClientController::class ,'getDeletedClientsJson'])->name('clients.getDeletedClientsJson');
   // delete multiple
    Route::post('/client/delete-multiple', [ClientController::class, 'deleteMultiple'])->name('client.deleteMultiple');
    Route::post('/client/activate-multiple', [ClientController::class, 'activateMultiple'])->name('client.activateMultiple');
    Route::post('/client/restore-multiple', [ClientController::class, 'restoreMultiple'])->name('client.restoreMultiple');
    Route::resource('client', ClientController::class)->names('client');
});
