<?php

use Carbon\Carbon;


use App\Models\User;
use App\Models\LanguageTranslate;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Modules\Setting\App\Models\Setting;
use Modules\Sidebar\App\Models\Sidebar;
use Modules\Language\App\Models\Language;
use Modules\Numerotation\App\Models\Numerotation;

/**
 * Get the ID of the default language.
 *
 * @return int|null The ID of the default language, or null if not found.
 */
if (!function_exists('getDefaultLangId')) {
    function getDefaultLangId()
    {
        $defaultLanguage = Language::where('isDefault', 1)->first()->id;
        return $defaultLanguage;
    }
}
/**
 * Get the ID of the language based on the locale.
 *
 * @param string $locale The locale of the language.
 * @return int|null The ID of the language, or null if not found.
 */
if (!function_exists('getLangId')) {
    function getLangId($locale)
    {
        $language = Language::where('locale', $locale)->first()->id;
        return $language;
    }
}
/**
 * Get the name of the language based on the locale.
 *
 * @param string $locale The locale of the language.
 * @return string|null The name of the language, or null if not found.
 */
if (!function_exists('getLangName')) {
    function getLangName($locale)
    {
        $language = Language::where('locale', $locale)->first()->name;
        return $language;
    }
}
/**
 * Store translations for the current language to a language-specific JSON file.
 *
 * @return void
 */
if (!function_exists('storeTranslaionToLang')) {
    function storeTranslaionToLang()
    {
        $locale = App::getLocale();
        // $locale = 'en';
        $id = getLangId($locale);
        $objects = LanguageTranslate::where('language_id', $id)->pluck('translation', 'label');
        Storage::disk('lang')->delete($locale . '.json');
        Storage::disk('lang')->put($locale . '.json', $objects);
    }
}
/**
 * Store sidebar information as JSON file.
 *
 * @return void
 */
if (!function_exists('storeSidebar')) {
    function storeSidebar()
    {
        $sidebar = Sidebar::with([
            'parent' => function ($query) {
                $query->orderBy('order', 'asc'); // Order parent relationships by 'order'
            },
            'childs' => function ($query) {
                $query->orderBy('order', 'asc'); // Order child relationships by 'order'
            }
        ])
        ->orderBy('order', 'asc') // Order the root-level items by 'order'
        ->get();
        Storage::put('public/sidebar/sidebar.json', json_encode($sidebar));
    }
}
/**
 * Get sidebar information from the stored JSON file.
 * If the file doesn't exist, it will be created using the storeSidebar() function.
 *
 * @return array The sidebar information as an associative array.
 */
if (!function_exists('getSidebar')) {
    function getSidebar()
    {
        $filePath = 'public/sidebar/sidebar.json';
        if (!Storage::exists($filePath)) {
            storeSidebar();
        }

        $sideBarJson = Storage::get($filePath);
        return json_decode($sideBarJson, true);
    }
}
/**
 * Save settings from a database table to a JSON file.
 *

 * @return void
 */

if (!function_exists('storeSetting')) {
    function storeSetting()
    {
        $settings = Setting::pluck('option_value', 'option_name');
        Storage::disk('public')->put('settings/setting.json', $settings);
    }
}

if (!function_exists('getSettings')) {
    function getSettings()
    {
        $settings = json_decode(Storage::disk('public')->get('settings/setting.json'), true);
        if (!$settings) {
            $settings = Setting::pluck('option_value', 'option_name');
            Storage::disk('public')->put('settings/setting.json', $settings);
        }

        return $settings;
    }
}

/**
 * Get the active languages.
 *
 * @return \Illuminate\Database\Eloquent\Collection The collection of active languages.
 */

if (!function_exists('languages')) {
    function languages()
    {
        $langauge = Language::where('status', 1)->get();
        return $langauge;
    }
}
/**
 * Get the default language.
 *
 * @return \Illuminate\Database\Eloquent\Model|null The default language model, or null if not found.
 * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
 */
if (!function_exists('getDefaultLanguage')) {
    function getDefaultLanguage()
    {
        $langauge = Language::where('isDefault', 1)->first();
        return $langauge;
    }
}

/**
 * Accept file types.
 *
 * @return string The string of file types.
 */
if (!function_exists('acceptFileType')) {
    function acceptFileType()
    {
        return '.pdf,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,.txt,.csv,.ppt,.pptx,.xls,.xlsx';
    }
}

/**
 * Accept file image types.
 *
 * @return string The string of file image types.
 */
if (!function_exists('acceptImageType')) {
    function acceptImageType()
    {
        return 'image/jpeg,image/png,image/gif,image/bmp';
    }
}





if (!function_exists('formatDateIndex')) {
    function formatDateIndex($date)
    {
       $dateVal = Carbon::createFromFormat('Y-m-d H:i:s',$date)->format('d/m/Y');
         return $dateVal;
    }
}
if (!function_exists('formatDateEdit')) {
    function formatDateEdit($date)
    {
       $dateVal = Carbon::createFromFormat('Y-m-d H:i:s',$date)->format('Y-m-d');
         return $dateVal;
    }
}


if (!function_exists('getPrefix')) {
    function getPrefix($model)
    {
        $prefix = Numerotation::where('doc_type', $model)
        ->first();
         return $prefix->prefix;
    }
}

/**
 * Get the active languages.
 *
 * @return \Illuminate\Database\Eloquent\Collection The collection of active languages.
 */

if (!function_exists('languages')) {
    function languages()
    {
        $langauge = Language::where('status', 1)->get();
        return $langauge;
    }
}
/**
 * Get the default language.
 *
 * @return \Illuminate\Database\Eloquent\Model|null The default language model, or null if not found.
 * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
 */
if (!function_exists('getDefaultLanguage')) {
    function getDefaultLanguage()
    {
        $langauge = Language::where('isDefault', 1)->first();
        return $langauge;
    }
}

/**
 * Accept file types.
 *
 * @return string The string of file types.
 */
if (!function_exists('acceptFileType')) {
    function acceptFileType()
    {
        return '.pdf,.doc,.docx,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,.txt,.csv,.ppt,.pptx,.xls,.xlsx';
    }
}

/**
 * Accept file image types.
 *
 * @return string The string of file image types.
 */
if (!function_exists('acceptImageType')) {
    function acceptImageType()
    {
        return 'image/jpeg,image/png,image/gif,image/bmp';
    }
}




if (!function_exists('checkStatus')) {
    function checkStatus()
    {
         $status = [
            'issued'  =>  'Émis',
            'on_hold'  =>  'En attente',
            'present'  =>  'Présenté',
            'cashed'  =>  'Encaissé',
            'rejected'  =>  'Rejeté',
            'canceled'  =>  'Annulé',
            'expired'  =>  'Expiré',

        ];
         return $status;
    }
}
if (!function_exists('formatDateIndex')) {
    function formatDateIndex($date)
    {
       $dateVal = Carbon::createFromFormat('Y-m-d H:i:s',$date)->format('d/m/Y');
         return $dateVal;
    }
}
if (!function_exists('formatDateEdit')) {
    function formatDateEdit($date)
    {
       $dateVal = Carbon::createFromFormat('Y-m-d H:i:s',$date)->format('Y-m-d');
         return $dateVal;
    }
}
if (!function_exists('getClientNumerotation')) {
    function getClientNumerotation()
    {
        $num = Numerotation::where('doc_type', 'Client')->first();

        if (!$num) {
            throw new Exception('No Numerotation record found for doc_type "Client"');
        }
        $codeClient = $num->prefix . ($num->increment_num + 1);
        return $codeClient;
    }
}

if (!function_exists('incClientNumerotation')) {
    function incClientNumerotation()
    {
        $num = Numerotation::where('doc_type', 'Client')->first();
        $num->increment_num = $num->increment_num + 1;
        $num->save();
    }
}



