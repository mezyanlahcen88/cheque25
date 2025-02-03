<?php

use Illuminate\Support\Facades\Route;

use Modules\Secteur\App\Http\Controllers\SecteurController;

Route::group(['middleware' => 'auth'], function () {
    //chaneg the status
    Route::post('/secteur/changestatus', [SecteurController::class, 'changeStatus'])->name('secteur.changestatus');
    //to permanently delete
    Route::delete('/secteur/{id}/force_delete', [SecteurController::class, 'forceDelete'])->name('secteur.forceDelete');
    // to restore
    Route::put('/secteur/{id}/restore', [SecteurController::class, 'restore'])->name('secteur.restore');
    //liste all deleted
    Route::get('/secteur/trashed', [SecteurController::class, 'trashed'])->name('secteur.trashed');
    // Get secteurs JSON
        Route::get('/secteur/get-secteurs-json', [SecteurController::class ,'getSecteursJson'])->name('secteurs.getSecteursJson');
    // Get secteurs JSON
    Route::get('/secteur/get-deleted-secteurs-json', [SecteurController::class ,'getDeletedSecteursJson'])->name('secteurs.getDeletedSecteursJson');
   // delete multiple
    Route::post('/secteur/delete-multiple', [SecteurController::class, 'deleteMultiple'])->name('secteur.deleteMultiple');
    Route::post('/secteur/activate-multiple', [SecteurController::class, 'activateMultiple'])->name('secteur.activateMultiple');
    Route::post('/secteur/restore-multiple', [SecteurController::class, 'restoreMultiple'])->name('secteur.restoreMultiple');
    Route::resource('secteur', SecteurController::class)->names('secteur');
});
