<?php

namespace Modules\Sidebar\App\Http\DataTable;

use Modules\Sidebar\App\Models\Sidebar;

class SidebarDataTable {
    public static function dataTable($objects) {
        return Datatables($objects)

           
->filterColumn('sidebar_id', function($query, $keyword) {
    $query->where('sidebar_id', $keyword);
})
            ->addColumn('actions', function (Sidebar $object) {
                return view('sidebar::actions', compact('object'));
            })
            ->addColumn('checkbox', function (Sidebar $object) {
                return view('components.checkbox', compact('object'));
            })
        

            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }

    public static function deletedDataTable($objects) {
        return Datatables($objects)
        
->filterColumn('sidebar_id', function($query, $keyword) {
    $query->where('sidebar_id', $keyword);
})
            ->addColumn('actions', function (Sidebar $object) {
                return view('sidebar::trashedActions', compact('object'));
            })
            ->addColumn('checkbox', function (Sidebar $object) {
                return view('components.checkbox', compact('object'));
            })
        


            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }




}
