<?php

namespace Modules\Product\App\Http\Datatable;

use Modules\Product\App\Models\Product;

class ProductDatatable {
    public static function dataTable($objects) {
        return Datatables($objects)

           
->filterColumn('category_id', function($query, $keyword) {
    $query->where('category_id', $keyword);
})
->filterColumn('brand_id', function($query, $keyword) {
    $query->where('brand_id', $keyword);
})
->filterColumn('warehouse_id', function($query, $keyword) {
    $query->where('warehouse_id', $keyword);
})->filterColumn('isactive', function($query, $keyword) {
    if ($keyword === '0' || $keyword === '1') {
        $query->where('isactive', $keyword);
    }
})
            ->addColumn('actions', function (Product $object) {
                return view('product::actions', compact('object'));
            })
            ->addColumn('checkbox', function (Product $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'product']);
})

->editColumn('picture', function (Product $object) {
    return view('product::image', compact('object'));
})
            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }

    public static function deletedDataTable($objects) {
        return Datatables($objects)
        
->filterColumn('category_id', function($query, $keyword) {
    $query->where('category_id', $keyword);
})
->filterColumn('brand_id', function($query, $keyword) {
    $query->where('brand_id', $keyword);
})
->filterColumn('warehouse_id', function($query, $keyword) {
    $query->where('warehouse_id', $keyword);
})->filterColumn('isactive', function($query, $keyword) {
    if ($keyword === '0' || $keyword === '1') {
        $query->where('isactive', $keyword);
    }
})
            ->addColumn('actions', function (Product $object) {
                return view('product::trashedActions', compact('object'));
            })
            ->addColumn('checkbox', function (Product $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'product']);
})


->editColumn('picture', function (Product $object) {
    return view('product::image', compact('object'));
})
            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }




}
