<?php

namespace Modules\Setting\App\Http\DataTable;

use Modules\Setting\App\Models\Setting;

class SettingDataTable {
    public static function dataTable($Settings) {
        return Datatables($Settings)
            ->filterColumn('isactive' , function($query , $keyword){
                if ($keyword === '0' || $keyword === '1') {
                    $query->where('isactive', $keyword);
                }
            })
            ->addColumn('isactive', function (Setting $object) {
                return view('components.isactive', compact('object'));
            })
            ->addColumn('actions', function (Setting $object) {
                return view('Setting::actions', compact('object'));
            })
            ->addColumn('checkbox', function (Setting $object) {
                return view('components.checkbox', compact('object'));
            })
            ->rawColumns(['isactive', 'actions','checkbox'])
            ->editColumn('picture', function (Setting $object) {
                return view('components.image', compact('object'));
            })
            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }


}
