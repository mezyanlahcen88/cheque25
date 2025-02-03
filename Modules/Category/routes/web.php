<?php

use Illuminate\Support\Facades\Route;

use Modules\Category\App\Http\Controllers\CategoryController;

Route::group(['middleware' => 'auth'], function () {
    //chaneg the status
    Route::post('/category/changestatus', [CategoryController::class, 'changeStatus'])->name('category.changestatus');
    //to permanently delete
    Route::delete('/category/{id}/force_delete', [CategoryController::class, 'forceDelete'])->name('category.forceDelete');
    // to restore
    Route::put('/category/{id}/restore', [CategoryController::class, 'restore'])->name('category.restore');
    //liste all deleted
    Route::get('/category/trashed', [CategoryController::class, 'trashed'])->name('category.trashed');
    // Get categories JSON
        Route::get('/category/get-categories-json', [CategoryController::class ,'getCategoriesJson'])->name('categories.getCategoriesJson');
    // Get categories JSON
    Route::get('/category/get-deleted-categories-json', [CategoryController::class ,'getDeletedCategoriesJson'])->name('categories.getDeletedCategoriesJson');
   // delete multiple
    Route::post('/category/delete-multiple', [CategoryController::class, 'deleteMultiple'])->name('category.deleteMultiple');
    Route::post('/category/activate-multiple', [CategoryController::class, 'activateMultiple'])->name('category.activateMultiple');
    Route::post('/category/restore-multiple', [CategoryController::class, 'restoreMultiple'])->name('category.restoreMultiple');
    Route::resource('category', CategoryController::class)->names('category');
});
