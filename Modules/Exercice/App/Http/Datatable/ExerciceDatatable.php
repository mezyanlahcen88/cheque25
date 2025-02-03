<?php

namespace Modules\Exercice\App\Http\DataTable;

use Modules\Exercice\App\Models\Exercice;

class ExerciceDataTable {
    public static function dataTable($objects) {
        return Datatables($objects)

           
            ->addColumn('actions', function (Exercice $object) {
                return view('exercice::actions', compact('object'));
            })
            ->addColumn('checkbox', function (Exercice $object) {
                return view('components.checkbox', compact('object'));
            })
        

            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }

    public static function deletedDataTable($objects) {
        return Datatables($objects)
        
            ->addColumn('actions', function (Exercice $object) {
                return view('exercice::trashedActions', compact('object'));
            })
            ->addColumn('checkbox', function (Exercice $object) {
                return view('components.checkbox', compact('object'));
            })
        


            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }




}
