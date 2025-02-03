<?php

use Illuminate\Support\Facades\Route;
use Modules\Language\App\Http\Controllers\LanguageController;

Route::group(['middleware' => ['auth']], function () {
    //chaneg the status
    Route::post('/language/changestatus', [LanguageController::class, 'changeStatus'])->name('language.changestatus');
    //to permanently delete
    Route::delete('/language/{id}/force_delete', [LanguageController::class, 'forceDelete'])->name('language.forceDelete');
    // to restore
    Route::put('/language/{id}/restore', [LanguageController::class, 'restore'])->name('language.restore');
    //liste all deleted
    Route::get('/language/trashed', [LanguageController::class, 'trashed'])->name('language.trashed');
    Route::get('/language/{id}/translations', [LanguageController::class, 'translations'])->name('language.translations');
    Route::post('/language/change-default', [LanguageController::class, 'changeDefault'])->name('language.changedefault');

    Route::get('/languages/get-languages-json', [LanguageController::class ,'getLanguagesJson'])->name('language.getUsersJson');
    Route::get('/language/{id}/translations', [LanguageController::class, 'translations'])->name('language.translations');
    Route::get('/language/get-translations-json', [LanguageController::class ,'getTranslationsJson'])->name('language.getTranslationsJson');
    Route::post('languagetranslations/translate', [LanguageController::class, 'translate'])->name('languagetranslations.translate');
    Route::post('/languagetranslations/store', [LanguageController::class, 'storeTranslation'])->name('languagetranslations.store');
    Route::get("locale/{locale}", [LanguageController::class, 'setLang'])->name('language.setLocale');



    Route::resource('language', LanguageController::class)->names('language');
    Route::get("/languagetranslations/syncronize", [LanguageController::class, 'syncTranslation'])->name('language.syncTranslation');
});
