<?php

namespace Modules\Supplier\App\Http\DataTable;

use Modules\Supplier\App\Models\Supplier;

class SupplierDataTable {
    public static function dataTable($objects) {
        return Datatables($objects)

           
->filterColumn('state_id', function($query, $keyword) {
    $query->where('state_id', $keyword);
})
->filterColumn('city_id', function($query, $keyword) {
    $query->where('city_id', $keyword);
})
->filterColumn('secteur_id', function($query, $keyword) {
    $query->where('secteur_id', $keyword);
})->filterColumn('isactive', function($query, $keyword) {
    if ($keyword === '0' || $keyword === '1') {
        $query->where('isactive', $keyword);
    }
})
            ->addColumn('actions', function (Supplier $object) {
                return view('supplier::actions', compact('object'));
            })
            ->addColumn('checkbox', function (Supplier $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'supplier']);
})

->editColumn('picture', function (Supplier $object) {
    return view('supplier::image', compact('object'));
})
            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }

    public static function deletedDataTable($objects) {
        return Datatables($objects)
        
->filterColumn('state_id', function($query, $keyword) {
    $query->where('state_id', $keyword);
})
->filterColumn('city_id', function($query, $keyword) {
    $query->where('city_id', $keyword);
})
->filterColumn('secteur_id', function($query, $keyword) {
    $query->where('secteur_id', $keyword);
})->filterColumn('isactive', function($query, $keyword) {
    if ($keyword === '0' || $keyword === '1') {
        $query->where('isactive', $keyword);
    }
})
            ->addColumn('actions', function (Supplier $object) {
                return view('supplier::trashedActions', compact('object'));
            })
            ->addColumn('checkbox', function (Supplier $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'supplier']);
})


->editColumn('picture', function (Supplier $object) {
    return view('supplier::image', compact('object'));
})
            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }




}
