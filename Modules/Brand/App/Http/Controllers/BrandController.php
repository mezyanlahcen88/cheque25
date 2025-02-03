<?php

namespace Modules\Brand\App\Http\Controllers;

use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Modules\Brand\App\Http\Requests\StoreBrandRequest;
use Modules\Brand\App\Http\Requests\UpdateBrandRequest;
use Modules\Brand\App\Http\Datatable\BrandDatatable;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;
use Modules\Brand\App\Models\Brand;
use App\Http\Controllers\Controller;



class BrandController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:brand-list|brand-create|brand-edit|brand-show|brand-delete', ['only' => ['index']]);
        $this->middleware('permission:brand-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:brand-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:brand-show', ['only' => ['show']]);
        $this->middleware('permission:brand-delete', ['only' => ['destroy']]);
        $this->middleware('permission:brand-restore', ['only' => ['restore']]);
        $this->middleware('permission:brand-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:brand-force-delete', ['only' => ['forceDelete']]);
        $this->middleware('permission:brand-export', ['only' => ['trashed']]);
        $this->middleware('permission:brand-multiple-delete', ['only' => ['deleteMultiple']]);
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

        $tableRows =(new Brand())->getRowsTable();
        $objects = Brand::get();
          $columns = json_encode(Brand::getColumns());
        return view('brand::index',compact('tableRows','objects','columns'));
    }

     public function getBrandsJson()
    {
        $objects = Brand::orderBy('created_at', 'desc');
        return BrandDatatable::dataTable($objects);
    }


    public function getDeletedBrandsJson()
    {
        $objects = Brand::onlyTrashed()->orderBy('deleted_at', 'desc');
        return BrandDatatable::deletedDataTable($objects);
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Brand::onlyTrashed()->get();
        $tableRows =(new Brand())->getRowsTableTrashed();
         $columns = json_encode(Brand::getTrashedColumns());
        return view('brand::trashedIndex', compact('tableRows','objects','columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('brand::create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBrandRequest $request, Brand $model)
    {
        try {
            $validated = $request->validated();
            $this->crudService->storeRecord($model, $request, $model->getFillable(), $model->getFiles(), 'brand', 'brands');

            return redirect()->route('brand.index');

             } catch (ValidationException $e) {
            // Handle validation errors
            return redirect()
                ->route('brand.create')
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle database-related errors
            return redirect()
                ->route('brand.create')
                ->with('error', 'Database error: ' . $e->getMessage())
                ->withInput();
        } catch (\Illuminate\Http\Exceptions\PostTooLargeException $e) {
            // Handle file size-related errors
            return redirect()->route('brand.create')->with('error', 'Uploaded file is too large.')->withInput();
        } catch (\Exception $e) {
            // Handle all other exceptions
            return redirect()
                ->route('brand.create')
                ->with('error', 'An unexpected error occurred: ' . $e->getMessage())
                ->withInput();

        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = brand::findOrfail($id);
        return view('brand::edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBrandRequest $request,$id)
    {
        try {
            $validated = $request->validated();
             $object = Brand::findOrFail($id);
            $this->crudService->updateRecord($object, $request, $object->getFillable(), $object->getFiles(), 'brand', 'brands');

            return redirect()->route('brand.index');
            } catch (ValidationException $e) {
            // Handle validation errors
            return redirect()
                ->route('brand.edit')
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle database-related errors
            return redirect()
                ->route('brand.edit')
                ->with('error', 'Database error: ' . $e->getMessage())
                ->withInput();
        } catch (\Illuminate\Http\Exceptions\PostTooLargeException $e) {
            // Handle file size-related errors
            return redirect()->route('brand.edit')->with('error', 'Uploaded file is too large.')->withInput();
        } catch (\Exception $e) {
            // Handle all other exceptions
            return redirect()
                ->route('brand.edit')
                ->with('error', 'An unexpected error occurred: ' . $e->getMessage())
                ->withInput();

        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Brand::findOrFail($request->id)->delete();

    }



    /**
     * Restore a soft-deleted brand.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the user to restore.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function restore(Request $request, $id)
    {

        $object = Brand::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('brand.index');
    }

    public function deleteMultiple(Request $request)
    {
       $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:brands,id',
        ]);

        $objectIds = $request->input('objectIds');
        $deletedObjects = Brand::whereIn('id', $objectIds)->delete();

        if ($deletedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.brand_message_delete_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.brand_message_fail_delete_multiple')]);
        }
    }

        public function restoreMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:brands,id',
        ]);

        $objectIds = $request->input('objectIds');
        $restoredObjects = Brand::whereIn('id', $objectIds)->restore();

        if ($restoredObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.brand_message_restore_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.brand_message_fail_restore_multiple')]);
        }
    }

    public function activateMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:brands,id',
        ]);

        $objectIds = $request->input('objectIds');
        foreach ($objectIds as $id) {
            $brand = Brand::find($id);
            $brand->isactive = !$brand->isactive;
            $brand->save();
        }
        $activatedObjects = Brand::whereIn('id', $objectIds);

        if ($activatedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.brand_message_activate_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.brand_message_fail_activate_multiple')]);
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

        $object = Brand::withTrashed()->findOrFail($id);
        // deletePicture($object,'brands','picture');
        $object->forceDelete();

    }

    /**
     * Change the status (active/inactive) of a brand.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $object = Brand::findOrFail($id);
        $object->isactive = !$object->isactive;
        $object->save();
        $message = $object->isactive ? trans('translation.brand_message_activated') : trans('translation.brand_message_inactivated');
        return response()->json(['code' => 200, 'isactive' => $object->isactive, 'message' => $message]);
    }
}
