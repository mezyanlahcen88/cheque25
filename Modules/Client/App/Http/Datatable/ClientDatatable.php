<?php

namespace Modules\Client\App\Http\DataTable;

use Modules\Client\App\Models\Client;

class ClientDataTable {
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
            ->addColumn('actions', function (Client $object) {
                return view('client::actions', compact('object'));
            })
            ->addColumn('checkbox', function (Client $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'client']);
})

->editColumn('picture', function (Client $object) {
    return view('client::image', compact('object'));
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
            ->addColumn('actions', function (Client $object) {
                return view('client::trashedActions', compact('object'));
            })
            ->addColumn('checkbox', function (Client $object) {
                return view('components.checkbox', compact('object'));
            })
        ->addColumn('isactive', function ($object) {
    return view('components.isactive', ['object' => $object, 'lowerName' => 'client']);
})


->editColumn('picture', function (Client $object) {
    return view('client::image', compact('object'));
})
            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }




}
