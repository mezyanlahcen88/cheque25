<?php

namespace Modules\Numerotation\App\Http\DataTable;

use Modules\Numerotation\App\Models\Numerotation;

class NumerotationDataTable {
    public static function dataTable($objects) {
        return Datatables($objects)

           ->filterColumn('isactive', function($query, $keyword) {
    if ($keyword === '0' || $keyword === '1') {
        $query->where('isactive', $keyword);
    }
})
            ->addColumn('actions', function (Numerotation $object) {
                return view('numerotation::actions', compact('object'));
            })
            ->addColumn('checkbox', function (Numerotation $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'numerotation']);
})

            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }

    public static function deletedDataTable($objects) {
        return Datatables($objects)
        ->filterColumn('isactive', function($query, $keyword) {
    if ($keyword === '0' || $keyword === '1') {
        $query->where('isactive', $keyword);
    }
})
            ->addColumn('actions', function (Numerotation $object) {
                return view('numerotation::trashedActions', compact('object'));
            })
            ->addColumn('checkbox', function (Numerotation $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'numerotation']);
})


            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }




}
