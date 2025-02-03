<?php

namespace Modules\State\App\Http\Datatable;

use Modules\State\App\Models\State;

class StateDatatable
{
    public static function dataTable($objects)
    {
        return Datatables($objects)
            ->addColumn('actions', function (State $object) {
                return view('state::actions', compact('object'));
            })
            ->addColumn('checkbox', function (State $object) {
                return view('components.checkbox', compact('object'));
            })

            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }

    public static function deletedDataTable($objects)
    {
        return Datatables($objects)
            ->addColumn('actions', function (State $object) {
                return view('state::trashedActions', compact('object'));
            })
            ->addColumn('checkbox', function (State $object) {
                return view('components.checkbox', compact('object'));
            })

            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }
}
