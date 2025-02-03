<?php

namespace Modules\Warehouse\App\Http\Datatable;

use Modules\Warehouse\App\Models\Warehouse;

class WarehouseDatatable {
    public static function dataTable($objects) {
        return Datatables($objects)

           
            ->addColumn('actions', function (Warehouse $object) {
                return view('warehouse::actions', compact('object'));
            })
            ->addColumn('checkbox', function (Warehouse $object) {
                return view('components.checkbox', compact('object'));
            })
        

            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }

    public static function deletedDataTable($objects) {
        return Datatables($objects)
        
            ->addColumn('actions', function (Warehouse $object) {
                return view('warehouse::trashedActions', compact('object'));
            })
            ->addColumn('checkbox', function (Warehouse $object) {
                return view('components.checkbox', compact('object'));
            })
        


            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }




}
