<?php

namespace Modules\Language\App\Http\Datatable;

use App\Models\LanguageTranslate;

class TranslationDatatable {
    public static function dataTable($objects) {
        return Datatables($objects)
            ->filterColumn('model' , function($query , $keyword){
                $query->where('model', $keyword);
            })

            ->addColumn('translation', function (LanguageTranslate $object) {
                return view('language::translation.translation', compact('object'));
            })
            ->addColumn('checkbox', function (LanguageTranslate $object) {
                return view('components.checkbox', compact('object'));
            })
            ->rawColumns(['translation','checkbox'])
            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }




}
