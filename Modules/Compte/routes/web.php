<?php

use Illuminate\Support\Facades\Route;

use Modules\Compte\App\Http\Controllers\CompteController;

Route::group(['middleware' => 'auth'], function () {
    //chaneg the status
    Route::post('/compte/changestatus', [CompteController::class, 'changeStatus'])->name('compte.changestatus');
    //to permanently delete
    Route::delete('/compte/{id}/force_delete', [CompteController::class, 'forceDelete'])->name('compte.forceDelete');
    // to restore
    Route::put('/compte/{id}/restore', [CompteController::class, 'restore'])->name('compte.restore');
    //liste all deleted
    Route::get('/compte/trashed', [CompteController::class, 'trashed'])->name('compte.trashed');
    // Get comptes JSON
        Route::get('/compte/get-comptes-json', [CompteController::class ,'getComptesJson'])->name('comptes.getComptesJson');
    // Get comptes JSON
    Route::get('/compte/get-deleted-comptes-json', [CompteController::class ,'getDeletedComptesJson'])->name('comptes.getDeletedComptesJson');
   // delete multiple
    Route::post('/compte/delete-multiple', [CompteController::class, 'deleteMultiple'])->name('compte.deleteMultiple');
    Route::post('/compte/activate-multiple', [CompteController::class, 'activateMultiple'])->name('compte.activateMultiple');
    Route::post('/compte/restore-multiple', [CompteController::class, 'restoreMultiple'])->name('compte.restoreMultiple');
    Route::resource('compte', CompteController::class)->names('compte');
});
