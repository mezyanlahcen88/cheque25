<?php

namespace Modules\Permission\App\Http\DataTable;


use Modules\Permission\App\Models\Permission;

class PermissionDataTable
{
    public static function dataTable($objects)
    {
        return Datatables($objects)
            ->filterColumn('groupe_id', function ($query, $keyword) {
                $query->where('groupe_id', $keyword);
            })
            ->addColumn('actions', function (Permission $object) {
                return view('permission::actions', compact('object'));
            })
            ->addColumn('checkbox', function (Permission $object) {
                return view('components.checkbox', compact('object'));
            })
            ->rawColumns(['actions', 'checkbox'])
            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }

    public static function deletedDataTable($objects)
    {
        return Datatables($objects)

            ->filterColumn('groupe_id', function ($query, $keyword) {
                $query->where('groupe_id', $keyword);
            })
            ->addColumn('actions', function (Permission $object) {
                return view('permission::trashedActions', compact('object'));
            })
            ->addColumn('checkbox', function (Permission $object) {
                return view('components.checkbox', compact('object'));
            })
            ->rawColumns(['actions', 'checkbox'])
            ->editColumn('picture', function (Permission $object) {
                return view('components.image', compact('object'));
            })
            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }
}
