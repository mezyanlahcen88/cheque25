<?php

namespace Modules\Agency\App\Http\Datatable;

use Modules\Agency\App\Models\Agency;

class AgencyDatatable {
    public static function dataTable($objects) {
        return Datatables($objects)

           ->filterColumn('isactive', function($query, $keyword) {
    if ($keyword === '0' || $keyword === '1') {
        $query->where('isactive', $keyword);
    }
})
->filterColumn('bank_id', function($query, $keyword) {
    $query->where('bank_id', $keyword);
})
            ->addColumn('actions', function (Agency $object) {
                return view('agency::actions', compact('object'));
            })
            ->addColumn('checkbox', function (Agency $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'agency']);
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
->filterColumn('bank_id', function($query, $keyword) {
    $query->where('bank_id', $keyword);
})
            ->addColumn('actions', function (Agency $object) {
                return view('agency::trashedActions', compact('object'));
            })
            ->addColumn('checkbox', function (Agency $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'agency']);
})


            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }




}
