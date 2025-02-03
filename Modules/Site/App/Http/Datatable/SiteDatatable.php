<?php

namespace Modules\Site\App\Http\DataTable;

use Modules\Site\App\Models\Site;

class SiteDataTable {
    public static function dataTable($objects) {
        return Datatables($objects)

           ->filterColumn('isactive', function($query, $keyword) {
    if ($keyword === '0' || $keyword === '1') {
        $query->where('isactive', $keyword);
    }
})
            ->addColumn('actions', function (Site $object) {
                return view('site::actions', compact('object'));
            })
            ->addColumn('checkbox', function (Site $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'site']);
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
            ->addColumn('actions', function (Site $object) {
                return view('site::trashedActions', compact('object'));
            })
            ->addColumn('checkbox', function (Site $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'site']);
})


            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }




}
