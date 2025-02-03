<?php

namespace Modules\Secteur\App\Http\Datatable;

use Modules\Secteur\App\Models\Secteur;

class SecteurDatatable {
    public static function dataTable($objects) {
        return Datatables($objects)

           
->filterColumn('city_id', function($query, $keyword) {
    $query->where('city_id', $keyword);
})->filterColumn('isactive', function($query, $keyword) {
    if ($keyword === '0' || $keyword === '1') {
        $query->where('isactive', $keyword);
    }
})
            ->addColumn('actions', function (Secteur $object) {
                return view('secteur::actions', compact('object'));
            })
            ->addColumn('checkbox', function (Secteur $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'secteur']);
})

            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }

    public static function deletedDataTable($objects) {
        return Datatables($objects)
        
->filterColumn('city_id', function($query, $keyword) {
    $query->where('city_id', $keyword);
})->filterColumn('isactive', function($query, $keyword) {
    if ($keyword === '0' || $keyword === '1') {
        $query->where('isactive', $keyword);
    }
})
            ->addColumn('actions', function (Secteur $object) {
                return view('secteur::trashedActions', compact('object'));
            })
            ->addColumn('checkbox', function (Secteur $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'secteur']);
})


            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }




}
