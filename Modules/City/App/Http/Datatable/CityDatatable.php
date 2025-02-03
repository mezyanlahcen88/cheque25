<?php

namespace Modules\City\App\Http\Datatable;

use Modules\City\App\Models\City;

class CityDatatable {
    public static function dataTable($objects) {
        return Datatables($objects)

           
->filterColumn('state_id', function($query, $keyword) {
    $query->where('state_id', $keyword);
})
            ->addColumn('actions', function (City $object) {
                return view('city::actions', compact('object'));
            })
            ->addColumn('checkbox', function (City $object) {
                return view('components.checkbox', compact('object'));
            })
        

            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }

    public static function deletedDataTable($objects) {
        return Datatables($objects)
        
->filterColumn('state_id', function($query, $keyword) {
    $query->where('state_id', $keyword);
})
            ->addColumn('actions', function (City $object) {
                return view('city::trashedActions', compact('object'));
            })
            ->addColumn('checkbox', function (City $object) {
                return view('components.checkbox', compact('object'));
            })
        


            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }




}
