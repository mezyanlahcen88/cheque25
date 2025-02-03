<?php

namespace Modules\Compte\App\Http\DataTable;

use Modules\Compte\App\Models\Compte;

class CompteDataTable {
    public static function dataTable($objects) {
        return Datatables($objects)

           
->filterColumn('bank_id', function($query, $keyword) {
    $query->where('bank_id', $keyword);
})
->filterColumn('society_id', function($query, $keyword) {
    $query->where('society_id', $keyword);
})->filterColumn('isactive', function($query, $keyword) {
    if ($keyword === '0' || $keyword === '1') {
        $query->where('isactive', $keyword);
    }
})
            ->addColumn('actions', function (Compte $object) {
                return view('compte::actions', compact('object'));
            })
            ->addColumn('checkbox', function (Compte $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'compte']);
})

            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }

    public static function deletedDataTable($objects) {
        return Datatables($objects)
        
->filterColumn('bank_id', function($query, $keyword) {
    $query->where('bank_id', $keyword);
})
->filterColumn('society_id', function($query, $keyword) {
    $query->where('society_id', $keyword);
})->filterColumn('isactive', function($query, $keyword) {
    if ($keyword === '0' || $keyword === '1') {
        $query->where('isactive', $keyword);
    }
})
            ->addColumn('actions', function (Compte $object) {
                return view('compte::trashedActions', compact('object'));
            })
            ->addColumn('checkbox', function (Compte $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'compte']);
})


            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }




}
