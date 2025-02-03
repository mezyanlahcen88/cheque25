<?php

namespace Modules\Carnet\App\Http\DataTable;

use Modules\Carnet\App\Models\Carnet;

class CarnetDataTable {
    public static function dataTable($objects) {
        return Datatables($objects)

           
->filterColumn('bank_id', function($query, $keyword) {
    $query->where('bank_id', $keyword);
})
->filterColumn('compte_id', function($query, $keyword) {
    $query->where('compte_id', $keyword);
})->filterColumn('isactive', function($query, $keyword) {
    if ($keyword === '0' || $keyword === '1') {
        $query->where('isactive', $keyword);
    }
})
            ->addColumn('actions', function (Carnet $object) {
                return view('carnet::actions', compact('object'));
            })
            ->addColumn('checkbox', function (Carnet $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'carnet']);
})

            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }

    public static function deletedDataTable($objects) {
        return Datatables($objects)
        
->filterColumn('bank_id', function($query, $keyword) {
    $query->where('bank_id', $keyword);
})
->filterColumn('compte_id', function($query, $keyword) {
    $query->where('compte_id', $keyword);
})->filterColumn('isactive', function($query, $keyword) {
    if ($keyword === '0' || $keyword === '1') {
        $query->where('isactive', $keyword);
    }
})
            ->addColumn('actions', function (Carnet $object) {
                return view('carnet::trashedActions', compact('object'));
            })
            ->addColumn('checkbox', function (Carnet $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'carnet']);
})


            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }




}
