<?php

namespace Modules\Society\App\Http\DataTable;

use Modules\Society\App\Models\Society;

class SocietyDataTable {
    public static function dataTable($objects) {
        return Datatables($objects)

           
->filterColumn('site_id', function($query, $keyword) {
    $query->where('site_id', $keyword);
})
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
            ->addColumn('actions', function (Society $object) {
                return view('society::actions', compact('object'));
            })
            ->addColumn('checkbox', function (Society $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'society']);
})

            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }

    public static function deletedDataTable($objects) {
        return Datatables($objects)
        
->filterColumn('site_id', function($query, $keyword) {
    $query->where('site_id', $keyword);
})
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
            ->addColumn('actions', function (Society $object) {
                return view('society::trashedActions', compact('object'));
            })
            ->addColumn('checkbox', function (Society $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'society']);
})


            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }




}
