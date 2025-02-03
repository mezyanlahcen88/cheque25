<?php

use Illuminate\Support\Facades\Route;

use Modules\Site\App\Http\Controllers\SiteController;

Route::group(['middleware' => 'auth'], function () {
    //chaneg the status
    Route::post('/site/changestatus', [SiteController::class, 'changeStatus'])->name('site.changestatus');
    //to permanently delete
    Route::delete('/site/{id}/force_delete', [SiteController::class, 'forceDelete'])->name('site.forceDelete');
    // to restore
    Route::put('/site/{id}/restore', [SiteController::class, 'restore'])->name('site.restore');
    //liste all deleted
    Route::get('/site/trashed', [SiteController::class, 'trashed'])->name('site.trashed');
    // Get sites JSON
        Route::get('/site/get-sites-json', [SiteController::class ,'getSitesJson'])->name('sites.getSitesJson');
    // Get sites JSON
    Route::get('/site/get-deleted-sites-json', [SiteController::class ,'getDeletedSitesJson'])->name('sites.getDeletedSitesJson');
   // delete multiple
    Route::post('/site/delete-multiple', [SiteController::class, 'deleteMultiple'])->name('site.deleteMultiple');
    Route::post('/site/activate-multiple', [SiteController::class, 'activateMultiple'])->name('site.activateMultiple');
    Route::post('/site/restore-multiple', [SiteController::class, 'restoreMultiple'])->name('site.restoreMultiple');
    Route::resource('site', SiteController::class)->names('site');
});
