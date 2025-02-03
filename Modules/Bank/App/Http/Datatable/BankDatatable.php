<?php

namespace Modules\Bank\App\Http\DataTable;

use Modules\Bank\App\Models\Bank;

class BankDataTable {
    public static function dataTable($objects) {
        return Datatables($objects)

           ->filterColumn('isactive', function($query, $keyword) {
    if ($keyword === '0' || $keyword === '1') {
        $query->where('isactive', $keyword);
    }
})
            ->addColumn('actions', function (Bank $object) {
                return view('bank::actions', compact('object'));
            })
            ->addColumn('checkbox', function (Bank $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'bank']);
})

->editColumn('logo', function (Bank $object) {
    return view('bank::image', compact('object'));
})
->editColumn('picture', function (Bank $object) {
    return view('bank::image', compact('object'));
})
->editColumn('effet', function (Bank $object) {
    return view('bank::image', compact('object'));
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
            ->addColumn('actions', function (Bank $object) {
                return view('bank::trashedActions', compact('object'));
            })
            ->addColumn('checkbox', function (Bank $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'bank']);
})


->editColumn('logo', function (Bank $object) {
    return view('bank::image', compact('object'));
})
->editColumn('picture', function (Bank $object) {
    return view('bank::image', compact('object'));
})
->editColumn('effet', function (Bank $object) {
    return view('bank::image', compact('object'));
})
            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }




}
