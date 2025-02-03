<?php

namespace Modules\Site\App\Http\Controllers;

use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Modules\Site\App\Http\Requests\StoreSiteRequest;
use Modules\Site\App\Http\Requests\UpdateSiteRequest;
use Modules\Site\App\Http\DataTable\SiteDataTable;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;
use Modules\Site\App\Models\Site;
use App\Http\Controllers\Controller;



class SiteController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:site-list|site-create|site-edit|site-show|site-delete', ['only' => ['index']]);
        $this->middleware('permission:site-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:site-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:site-show', ['only' => ['show']]);
        $this->middleware('permission:site-delete', ['only' => ['destroy']]);
        $this->middleware('permission:site-restore', ['only' => ['restore']]);
        $this->middleware('permission:site-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:site-force-delete', ['only' => ['forceDelete']]);
        $this->middleware('permission:site-export', ['only' => ['trashed']]);
        $this->middleware('permission:site-multiple-delete', ['only' => ['deleteMultiple']]);
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

        $tableRows =(new Site())->getRowsTable();
        $objects = Site::get();
          $columns = json_encode(Site::getColumns());
        return view('site::index',compact('tableRows','objects','columns'));
    }

     public function getSitesJson()
    {
        $objects = Site::orderBy('created_at', 'desc');
        return SiteDataTable::dataTable($objects);
    }


    public function getDeletedSitesJson()
    {
        $objects = Site::onlyTrashed()->orderBy('deleted_at', 'desc');
        return SiteDataTable::deletedDataTable($objects);
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Site::onlyTrashed()->get();
        $tableRows =(new Site())->getRowsTableTrashed();
         $columns = json_encode(Site::getTrashedColumns());
        return view('site::trashedIndex', compact('tableRows','objects','columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('site::create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSiteRequest $request, Site $model)
    {
        try {
            $validated = $request->validated();
            $this->crudService->storeRecord($model, $request, $model->getFillable(), $model->getFiles(), 'site', 'sites');

            return redirect()->route('site.index');
             } catch (ValidationException $e) {
            return redirect()->route('site::create')->withErrors($e->validator)->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = site::findOrfail($id);
        return view('site::edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSiteRequest $request,$id)
    {
        try {
            $validated = $request->validated();
             $object = Site::findOrFail($id);
            $this->crudService->updateRecord($object, $request, $object->getFillable(), $object->getFiles(), 'site', 'sites');

            return redirect()->route('site.index');
            } catch (ValidationException $e) {
            return redirect()->route('site.edit')->withErrors($e->validator)->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Site  $site
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Site::findOrFail($request->id)->delete();

    }



    /**
     * Restore a soft-deleted site.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the user to restore.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function restore(Request $request, $id)
    {

        $object = Site::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('site::index');
    }

    public function deleteMultiple(Request $request)
    {
       $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:sites,id',
        ]);

        $objectIds = $request->input('objectIds');
        $deletedObjects = Site::whereIn('id', $objectIds)->delete();

        if ($deletedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.site_message_delete_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.site_message_fail_delete_multiple')]);
        }
    }

        public function restoreMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:sites,id',
        ]);

        $objectIds = $request->input('objectIds');
        $restoredObjects = Site::whereIn('id', $objectIds)->restore();

        if ($restoredObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.site_message_restore_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.site_message_fail_restore_multiple')]);
        }
    }

    public function activateMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:sites,id',
        ]);

        $objectIds = $request->input('objectIds');
        foreach ($objectIds as $id) {
            $site = Site::find($id);
            $site->isactive = !$site->isactive;
            $site->save();
        }
        $activatedObjects = Site::whereIn('id', $objectIds);

        if ($activatedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.site_message_activate_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.site_message_fail_activate_multiple')]);
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

        $object = Site::withTrashed()->findOrFail($id);
        // deletePicture($object,'sites','picture');
        $object->forceDelete();

    }

    /**
     * Change the status (active/inactive) of a site.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $object = Site::findOrFail($id);
        $object->isactive = !$object->isactive;
        $object->save();
        $message = $object->isactive ? trans('translation.site_message_activated') : trans('translation.site_message_inactivated');
        return response()->json(['code' => 200, 'isactive' => $object->isactive, 'message' => $message]);
    }
}
