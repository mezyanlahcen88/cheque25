<?php

namespace Modules\Brand\App\Http\Datatable;

use Modules\Brand\App\Models\Brand;

class BrandDatatable {
    public static function dataTable($objects) {
        return Datatables($objects)

           ->filterColumn('isactive', function($query, $keyword) {
    if ($keyword === '0' || $keyword === '1') {
        $query->where('isactive', $keyword);
    }
})
            ->addColumn('actions', function (Brand $object) {
                return view('brand::actions', compact('object'));
            })
            ->addColumn('checkbox', function (Brand $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'brand']);
})

->editColumn('picture', function (Brand $object) {
    return view('brand::image', compact('object'));
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
            ->addColumn('actions', function (Brand $object) {
                return view('brand::trashedActions', compact('object'));
            })
            ->addColumn('checkbox', function (Brand $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'brand']);
})


->editColumn('picture', function (Brand $object) {
    return view('brand::image', compact('object'));
})
            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }




}
