<?php

namespace Modules\Category\App\Http\Datatable;

use Modules\Category\App\Models\Category;

class CategoryDatatable {
    public static function dataTable($objects) {
        return Datatables($objects)

           
->filterColumn('category_id', function($query, $keyword) {
    $query->where('category_id', $keyword);
})->filterColumn('isactive', function($query, $keyword) {
    if ($keyword === '0' || $keyword === '1') {
        $query->where('isactive', $keyword);
    }
})
            ->addColumn('actions', function (Category $object) {
                return view('category::actions', compact('object'));
            })
            ->addColumn('checkbox', function (Category $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'category']);
})

->editColumn('picture', function (Category $object) {
    return view('category::image', compact('object'));
})
            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }

    public static function deletedDataTable($objects) {
        return Datatables($objects)
        
->filterColumn('category_id', function($query, $keyword) {
    $query->where('category_id', $keyword);
})->filterColumn('isactive', function($query, $keyword) {
    if ($keyword === '0' || $keyword === '1') {
        $query->where('isactive', $keyword);
    }
})
            ->addColumn('actions', function (Category $object) {
                return view('category::trashedActions', compact('object'));
            })
            ->addColumn('checkbox', function (Category $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'category']);
})


->editColumn('picture', function (Category $object) {
    return view('category::image', compact('object'));
})
            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }




}
