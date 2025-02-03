<?php
namespace Modules\User\App\Http\DataTable;

use Modules\User\App\Models\User;

class UserDataTable
{
    public static function dataTable($users)
    {
        return Datatables($users)
            ->filterColumn('isactive', function ($query, $keyword) {
                if ($keyword === '0' || $keyword === '1') {
                    $query->where('isactive', $keyword);
                }
            })
            ->addColumn('actions', function (User $object) {
                return view('user::user.actions', compact('object'));
            })
            ->addColumn('checkbox', function (User $object) {
                return view('components.checkbox', compact('object'));
            })
            ->addColumn('isactive', function (User $object) {
                return view('components.isactive', ['object' => $object, 'lowerName' => 'user']);
            })
            ->rawColumns(['isactive', 'actions', 'checkbox'])
            ->editColumn('picture', function (User $object) {
                return view('user::user.image', compact('object'));
            })
            // ->editColumn('roles_name', function (User $object) {
            //     return view('user::user.role', compact('object'));
            // })
            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }

    public static function deletedDataTable($users)
    {
        return Datatables($users)
            ->addColumn('actions', function (User $object) {
                return view('user::user.trashedActions', compact('object'));
            })
            ->addColumn('checkbox', function (User $object) {
                return view('user::user.checkbox', compact('object'));
            })
            ->rawColumns(['actions', 'checkbox'])
            ->editColumn('picture', function (User $object) {
                return view('user::user.image', compact('object'));
            })
            // ->editColumn('role', function (User $object) {
            //     return view('user::user.role', compact('object'));
            // })
            ->setRowAttr(['align' => 'center'])
            ->make(true);
    }
}
