<?php

namespace Modules\Category\App\Http\Controllers;

use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Modules\Category\App\Http\Requests\StoreCategoryRequest;
use Modules\Category\App\Http\Requests\UpdateCategoryRequest;
use Modules\Category\App\Http\Datatable\CategoryDatatable;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;
use Modules\Category\App\Models\Category;
use App\Http\Controllers\Controller;



class CategoryController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:category-list|category-create|category-edit|category-show|category-delete', ['only' => ['index']]);
        $this->middleware('permission:category-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:category-show', ['only' => ['show']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
        $this->middleware('permission:category-restore', ['only' => ['restore']]);
        $this->middleware('permission:category-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:category-force-delete', ['only' => ['forceDelete']]);
        $this->middleware('permission:category-export', ['only' => ['trashed']]);
        $this->middleware('permission:category-multiple-delete', ['only' => ['deleteMultiple']]);
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

        $tableRows =(new Category())->getRowsTable();
        $objects = Category::get();
          $columns = json_encode(Category::getColumns());
        return view('category::index',compact('tableRows','objects','columns'));
    }

     public function getCategoriesJson()
    {
        $objects = Category::orderBy('created_at', 'desc');
        return CategoryDatatable::dataTable($objects);
    }


    public function getDeletedCategoriesJson()
    {
        $objects = Category::onlyTrashed()->orderBy('deleted_at', 'desc');
        return CategoryDatatable::deletedDataTable($objects);
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Category::onlyTrashed()->get();
        $tableRows =(new Category())->getRowsTableTrashed();
         $columns = json_encode(Category::getTrashedColumns());
        return view('category::trashedIndex', compact('tableRows','objects','columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('category::create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request, Category $model)
    {
        try {
            $validated = $request->validated();
            $this->crudService->storeRecord($model, $request, $model->getFillable(), $model->getFiles(), 'category', 'categories');

            return redirect()->route('category.index');

             } catch (ValidationException $e) {
            // Handle validation errors
            return redirect()
                ->route('category.create')
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle database-related errors
            return redirect()
                ->route('category.create')
                ->with('error', 'Database error: ' . $e->getMessage())
                ->withInput();
        } catch (\Illuminate\Http\Exceptions\PostTooLargeException $e) {
            // Handle file size-related errors
            return redirect()->route('category.create')->with('error', 'Uploaded file is too large.')->withInput();
        } catch (\Exception $e) {
            // Handle all other exceptions
            return redirect()
                ->route('category.create')
                ->with('error', 'An unexpected error occurred: ' . $e->getMessage())
                ->withInput();

        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = category::findOrfail($id);
        return view('category::edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request,$id)
    {
        try {
            $validated = $request->validated();
             $object = Category::findOrFail($id);
            $this->crudService->updateRecord($object, $request, $object->getFillable(), $object->getFiles(), 'category', 'categories');

            return redirect()->route('category.index');
            } catch (ValidationException $e) {
            // Handle validation errors
            return redirect()
                ->route('category.edit')
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle database-related errors
            return redirect()
                ->route('category.edit')
                ->with('error', 'Database error: ' . $e->getMessage())
                ->withInput();
        } catch (\Illuminate\Http\Exceptions\PostTooLargeException $e) {
            // Handle file size-related errors
            return redirect()->route('category.edit')->with('error', 'Uploaded file is too large.')->withInput();
        } catch (\Exception $e) {
            // Handle all other exceptions
            return redirect()
                ->route('category.edit')
                ->with('error', 'An unexpected error occurred: ' . $e->getMessage())
                ->withInput();

        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Category::findOrFail($request->id)->delete();

    }



    /**
     * Restore a soft-deleted category.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the user to restore.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function restore(Request $request, $id)
    {

        $object = Category::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('category.index');
    }

    public function deleteMultiple(Request $request)
    {
       $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:categories,id',
        ]);

        $objectIds = $request->input('objectIds');
        $deletedObjects = Category::whereIn('id', $objectIds)->delete();

        if ($deletedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.category_message_delete_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.category_message_fail_delete_multiple')]);
        }
    }

        public function restoreMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:categories,id',
        ]);

        $objectIds = $request->input('objectIds');
        $restoredObjects = Category::whereIn('id', $objectIds)->restore();

        if ($restoredObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.category_message_restore_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.category_message_fail_restore_multiple')]);
        }
    }

    public function activateMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:categories,id',
        ]);

        $objectIds = $request->input('objectIds');
        foreach ($objectIds as $id) {
            $category = Category::find($id);
            $category->isactive = !$category->isactive;
            $category->save();
        }
        $activatedObjects = Category::whereIn('id', $objectIds);

        if ($activatedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.category_message_activate_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.category_message_fail_activate_multiple')]);
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

        $object = Category::withTrashed()->findOrFail($id);
        // deletePicture($object,'categories','picture');
        $object->forceDelete();

    }

    /**
     * Change the status (active/inactive) of a category.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $object = Category::findOrFail($id);
        $object->isactive = !$object->isactive;
        $object->save();
        $message = $object->isactive ? trans('translation.category_message_activated') : trans('translation.category_message_inactivated');
        return response()->json(['code' => 200, 'isactive' => $object->isactive, 'message' => $message]);
    }
}
