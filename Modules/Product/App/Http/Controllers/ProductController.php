<?php

namespace Modules\Product\App\Http\Controllers;

use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Modules\Product\App\Http\Requests\StoreProductRequest;
use Modules\Product\App\Http\Requests\UpdateProductRequest;
use Modules\Product\App\Http\Datatable\ProductDatatable;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;
use Modules\Product\App\Models\Product;
use App\Http\Controllers\Controller;



class ProductController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-show|product-delete', ['only' => ['index']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-show', ['only' => ['show']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
        $this->middleware('permission:product-restore', ['only' => ['restore']]);
        $this->middleware('permission:product-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:product-force-delete', ['only' => ['forceDelete']]);
        $this->middleware('permission:product-export', ['only' => ['trashed']]);
        $this->middleware('permission:product-multiple-delete', ['only' => ['deleteMultiple']]);
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

        $tableRows =(new Product())->getRowsTable();
        $objects = Product::get();
          $columns = json_encode(Product::getColumns());
        return view('product::index',compact('tableRows','objects','columns'));
    }

     public function getProductsJson()
    {
        $objects = Product::orderBy('created_at', 'desc');
        return ProductDatatable::dataTable($objects);
    }


    public function getDeletedProductsJson()
    {
        $objects = Product::onlyTrashed()->orderBy('deleted_at', 'desc');
        return ProductDatatable::deletedDataTable($objects);
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Product::onlyTrashed()->get();
        $tableRows =(new Product())->getRowsTableTrashed();
         $columns = json_encode(Product::getTrashedColumns());
        return view('product::trashedIndex', compact('tableRows','objects','columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('product::create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request, Product $model)
    {
        try {
            $validated = $request->validated();
            $this->crudService->storeRecord($model, $request, $model->getFillable(), $model->getFiles(), 'product', 'products');

            return redirect()->route('product.index');

             } catch (ValidationException $e) {
            // Handle validation errors
            return redirect()
                ->route('product.create')
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle database-related errors
            return redirect()
                ->route('product.create')
                ->with('error', 'Database error: ' . $e->getMessage())
                ->withInput();
        } catch (\Illuminate\Http\Exceptions\PostTooLargeException $e) {
            // Handle file size-related errors
            return redirect()->route('product.create')->with('error', 'Uploaded file is too large.')->withInput();
        } catch (\Exception $e) {
            // Handle all other exceptions
            return redirect()
                ->route('product.create')
                ->with('error', 'An unexpected error occurred: ' . $e->getMessage())
                ->withInput();

        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = product::findOrfail($id);
        return view('product::edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request,$id)
    {
        try {
            $validated = $request->validated();
             $object = Product::findOrFail($id);
            $this->crudService->updateRecord($object, $request, $object->getFillable(), $object->getFiles(), 'product', 'products');

            return redirect()->route('product.index');
            } catch (ValidationException $e) {
            // Handle validation errors
            return redirect()
                ->route('product.edit')
                ->withErrors($e->validator)
                ->withInput();
        } catch (\Illuminate\Database\QueryException $e) {
            // Handle database-related errors
            return redirect()
                ->route('product.edit')
                ->with('error', 'Database error: ' . $e->getMessage())
                ->withInput();
        } catch (\Illuminate\Http\Exceptions\PostTooLargeException $e) {
            // Handle file size-related errors
            return redirect()->route('product.edit')->with('error', 'Uploaded file is too large.')->withInput();
        } catch (\Exception $e) {
            // Handle all other exceptions
            return redirect()
                ->route('product.edit')
                ->with('error', 'An unexpected error occurred: ' . $e->getMessage())
                ->withInput();

        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Product::findOrFail($request->id)->delete();

    }



    /**
     * Restore a soft-deleted product.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the user to restore.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function restore(Request $request, $id)
    {

        $object = Product::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('product.index');
    }

    public function deleteMultiple(Request $request)
    {
       $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:products,id',
        ]);

        $objectIds = $request->input('objectIds');
        $deletedObjects = Product::whereIn('id', $objectIds)->delete();

        if ($deletedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.product_message_delete_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.product_message_fail_delete_multiple')]);
        }
    }

        public function restoreMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:products,id',
        ]);

        $objectIds = $request->input('objectIds');
        $restoredObjects = Product::whereIn('id', $objectIds)->restore();

        if ($restoredObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.product_message_restore_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.product_message_fail_restore_multiple')]);
        }
    }

    public function activateMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:products,id',
        ]);

        $objectIds = $request->input('objectIds');
        foreach ($objectIds as $id) {
            $product = Product::find($id);
            $product->isactive = !$product->isactive;
            $product->save();
        }
        $activatedObjects = Product::whereIn('id', $objectIds);

        if ($activatedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.product_message_activate_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.product_message_fail_activate_multiple')]);
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

        $object = Product::withTrashed()->findOrFail($id);
        // deletePicture($object,'products','picture');
        $object->forceDelete();

    }

    /**
     * Change the status (active/inactive) of a product.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $object = Product::findOrFail($id);
        $object->isactive = !$object->isactive;
        $object->save();
        $message = $object->isactive ? trans('translation.product_message_activated') : trans('translation.product_message_inactivated');
        return response()->json(['code' => 200, 'isactive' => $object->isactive, 'message' => $message]);
    }
}
