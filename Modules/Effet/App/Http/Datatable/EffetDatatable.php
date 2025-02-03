<?php

namespace Modules\Effet\App\Http\DataTable;

use Modules\Effet\App\Models\Effet;

class EffetDataTable {
    public static function dataTable($objects) {
        return Datatables($objects)

           
->filterColumn('bank_id', function($query, $keyword) {
    $query->where('bank_id', $keyword);
})
->filterColumn('compte_id', function($query, $keyword) {
    $query->where('compte_id', $keyword);
})
->filterColumn('carnet_id', function($query, $keyword) {
    $query->where('carnet_id', $keyword);
})->filterColumn('isactive', function($query, $keyword) {
    if ($keyword === '0' || $keyword === '1') {
        $query->where('isactive', $keyword);
    }
})
            ->addColumn('actions', function (Effet $object) {
                return view('effet::actions', compact('object'));
            })
            ->addColumn('checkbox', function (Effet $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'effet']);
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
})
->filterColumn('carnet_id', function($query, $keyword) {
    $query->where('carnet_id', $keyword);
})->filterColumn('isactive', function($query, $keyword) {
    if ($keyword === '0' || $keyword === '1') {
        $query->where('isactive', $keyword);
    }
})
            ->addColumn('actions', function (Effet $object) {
                return view('effet::trashedActions', compact('object'));
            })
            ->addColumn('checkbox', function (Effet $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'effet']);
})


            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }




}
