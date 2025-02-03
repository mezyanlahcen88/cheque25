<?php

namespace Modules\Employe\App\Http\DataTable;

use Modules\Employe\App\Models\Employe;

class EmployeDataTable {
    public static function dataTable($objects) {
        return Datatables($objects)

           ->filterColumn('isactive', function($query, $keyword) {
    if ($keyword === '0' || $keyword === '1') {
        $query->where('isactive', $keyword);
    }
})
            ->addColumn('actions', function (Employe $object) {
                return view('employe::actions', compact('object'));
            })
            ->addColumn('checkbox', function (Employe $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'employe']);
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
            ->addColumn('actions', function (Employe $object) {
                return view('employe::trashedActions', compact('object'));
            })
            ->addColumn('checkbox', function (Employe $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'employe']);
})


            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }




}
