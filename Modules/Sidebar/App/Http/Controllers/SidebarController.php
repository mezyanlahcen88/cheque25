<?php

namespace Modules\Sidebar\App\Http\Controllers;

use Illuminate\Support\Str;
use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use App\Http\Controllers\Controller;
use Modules\Sidebar\App\Models\Sidebar;
use Modules\Language\App\Models\Translation;
use Illuminate\Validation\ValidationException;
use Modules\Sidebar\App\Http\DataTable\SidebarDataTable;
use Modules\Sidebar\App\Http\Requests\StoreSidebarRequest;
use Modules\Sidebar\App\Http\Requests\UpdateSidebarRequest;

class SidebarController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:sidebar-list|sidebar-create|sidebar-edit|sidebar-show|sidebar-delete', ['only' => ['index']]);
        $this->middleware('permission:sidebar-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:sidebar-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:sidebar-show', ['only' => ['show']]);
        $this->middleware('permission:sidebar-delete', ['only' => ['destroy']]);
        $this->middleware('permission:sidebar-restore', ['only' => ['restore']]);
        $this->middleware('permission:sidebar-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:sidebar-force-delete', ['only' => ['forceDelete']]);
        $this->middleware('permission:sidebar-export', ['only' => ['trashed']]);
        $this->middleware('permission:sidebar-multiple-delete', ['only' => ['deleteMultiple']]);
        $this->staticOptions = $staticOptions;
        $this->crudService = $crudService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tableRows =(new Sidebar())->getRowsTable();
        $objects = Sidebar::with('parent')->get();
          $columns = json_encode(Sidebar::getColumns());
        return view('sidebar::index',compact('tableRows','objects','columns'));
    }

     public function getSidebarsJson()
    {
        $objects = Sidebar::with('parent')->orderBy('created_at', 'desc');
        return SidebarDataTable::dataTable($objects);
    }


    public function getDeletedSidebarsJson()
    {
        $objects = Sidebar::onlyTrashed()->orderBy('deleted_at', 'desc');
        return SidebarDataTable::deletedDataTable($objects);
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Sidebar::onlyTrashed()->get();
        $tableRows =(new Sidebar())->getRowsTableTrashed();
         $columns = json_encode(Sidebar::getTrashedColumns());
        return view('sidebar::trashedIndex', compact('tableRows','objects','columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('sidebar::create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSidebarRequest $request, Sidebar $model)
    {
        // return $sidebar = Sidebar::find($request->sidebar_id);
        try {
            $validated = $request->validated();
            if($request->has('sidebar_id') && !empty($request->sidebar_id)){
                // set parent of sidebar
                $sidebar = Sidebar::find($request->sidebar_id);
                $sidebar->type = 'hasChilds';
                $sidebar->save();
                // set child of sidebar
                $request['type'] = 'child';

            }
            $this->crudService->storeRecord($model, $request, $model->getFillable(), $model->getFiles(), 'sidebar', 'sidebars');
            // create translations for this new sidebar
            $translation = 'navigation_navigation_'.Str::lower($request->name) ;
            $trans = Translation::where('label',$translation)->first();
            if(!$trans){
                $trans = new Translation();
                $trans->model = 'Navigation';
                $trans->label = $translation;
                $trans->translation = Str::plural($request->name);
                $trans->language_id = 1;
                $trans->save();
            }
            storeSidebar();

            return redirect()->route('sidebar.index');
             } catch (ValidationException $e) {
            return redirect()->route('sidebar::create')->withErrors($e->validator)->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sidebar  $sidebar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = sidebar::findOrfail($id);
        return view('sidebar::edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sidebar  $sidebar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSidebarRequest $request,$id)
    {


        try {
            $validated = $request->validated();
            if($request->has('sidebar_id') && !empty($request->sidebar_id)){
                // set parent of sidebar
                $sidebar = Sidebar::find($request->sidebar_id);
                $sidebar->type = 'hasChilds';
                $sidebar->save();
                // set child of sidebar
                $request['type'] = 'child';

            }
             $object = Sidebar::findOrFail($id);
            $this->crudService->updateRecord($object, $request, $object->getFillable(), $object->getFiles(), 'sidebar', 'sidebars');
            storeSidebar();

            return redirect()->route('sidebar.index');
            } catch (ValidationException $e) {
            return redirect()->route('sidebar.edit')->withErrors($e->validator)->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sidebar  $sidebar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Sidebar::findOrFail($request->id)->delete();
      storeSidebar();


    }



    /**
     * Restore a soft-deleted sidebar.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the user to restore.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function restore(Request $request, $id)
    {

        $object = Sidebar::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('sidebar::index');
    }

    public function deleteMultiple(Request $request)
    {
       $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:sidebars,id',
        ]);

        $objectIds = $request->input('objectIds');
        $deletedObjects = Sidebar::whereIn('id', $objectIds)->delete();

        if ($deletedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.sidebar_message_delete_multiple')]);
            storeSidebar();

        } else {
            return response()->json(['success' => false, 'message' => trans('translation.sidebar_message_fail_delete_multiple')]);
        }
    }

        public function restoreMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:sidebars,id',
        ]);

        $objectIds = $request->input('objectIds');
        $restoredObjects = Sidebar::whereIn('id', $objectIds)->restore();

        if ($restoredObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.sidebar_message_restore_multiple')]);
            storeSidebar();

        } else {
            return response()->json(['success' => false, 'message' => trans('translation.sidebar_message_fail_restore_multiple')]);
        }
    }

    public function activateMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:sidebars,id',
        ]);

        $objectIds = $request->input('objectIds');
        foreach ($objectIds as $id) {
            $sidebar = Sidebar::find($id);
            $sidebar->isactive = !$sidebar->isactive;
            $sidebar->save();
        }
        $activatedObjects = Sidebar::whereIn('id', $objectIds);

        if ($activatedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.sidebar_message_activate_multiple')]);
            storeSidebar();

        } else {
            return response()->json(['success' => false, 'message' => trans('translation.sidebar_message_fail_activate_multiple')]);
        }
    }
    /**
     * Force delete a record permanently.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the record to force delete.
     * @return void
     */
    public function forceDelete(Request $request, $id)
    {

        $object = Sidebar::withTrashed()->findOrFail($id)->forceDelete();
        // deletePicture($object,'sidebars','picture');
        storeSidebar();


    }

    /**
     * Change the status (active/inactive) of a sidebar.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $object = Sidebar::findOrFail($id);
        $object->isactive = !$object->isactive;
        $object->save();
        $message = $object->isactive ? trans('translation.sidebar_message_activated') : trans('translation.sidebar_message_inactivated');
        storeSidebar();

        return response()->json(['code' => 200, 'isactive' => $object->isactive, 'message' => $message]);
    }
}
