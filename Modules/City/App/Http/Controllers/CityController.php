<?php

namespace Modules\City\App\Http\Controllers;

use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Modules\City\App\Http\Requests\StoreCityRequest;
use Modules\City\App\Http\Requests\UpdateCityRequest;
use Modules\City\App\Http\Datatable\CityDatatable;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;
use Modules\City\App\Models\City;
use App\Http\Controllers\Controller;



class CityController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('permission:city-list|city-create|city-edit|city-show|city-delete', ['only' => ['index']]);
        $this->middleware('permission:city-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:city-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:city-show', ['only' => ['show']]);
        $this->middleware('permission:city-delete', ['only' => ['destroy']]);
        $this->middleware('permission:city-restore', ['only' => ['restore']]);
        $this->middleware('permission:city-trashed', ['only' => ['trashed']]);
        $this->middleware('permission:city-force-delete', ['only' => ['forceDelete']]);
        $this->middleware('permission:city-export', ['only' => ['trashed']]);
        $this->middleware('permission:city-multiple-delete', ['only' => ['deleteMultiple']]);
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

        $tableRows =(new City())->getRowsTable();
        $objects = City::get();
          $columns = json_encode(City::getColumns());
        return view('city::index',compact('tableRows','objects','columns'));
    }

     public function getCitiesJson()
    {
        $objects = City::orderBy('created_at', 'desc');
        return CityDatatable::dataTable($objects);
    }


    public function getDeletedCitiesJson()
    {
        $objects = City::onlyTrashed()->orderBy('deleted_at', 'desc');
        return CityDatatable::deletedDataTable($objects);
    }
    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = City::onlyTrashed()->get();
        $tableRows =(new City())->getRowsTableTrashed();
         $columns = json_encode(City::getTrashedColumns());
        return view('city::trashedIndex', compact('tableRows','objects','columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('city::create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCityRequest $request, City $model)
    {
        try {
            $validated = $request->validated();
            $this->crudService->storeRecord($model, $request, $model->getFillable(), $model->getFiles(), 'city', 'cities');

            return redirect()->route('city.index');
             } catch (ValidationException $e) {
            return redirect()->route('city::create')->withErrors($e->validator)->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = city::findOrfail($id);
        return view('city::edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCityRequest $request,$id)
    {
        try {
            $validated = $request->validated();
             $object = City::findOrFail($id);
            $this->crudService->updateRecord($object, $request, $object->getFillable(), $object->getFiles(), 'city', 'cities');

            return redirect()->route('city.index');
            } catch (ValidationException $e) {
            return redirect()->route('city.edit')->withErrors($e->validator)->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = City::findOrFail($request->id)->delete();

    }



    /**
     * Restore a soft-deleted city.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the user to restore.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function restore(Request $request, $id)
    {

        $object = City::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('city::index');
    }

    public function deleteMultiple(Request $request)
    {
       $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:cities,id',
        ]);

        $objectIds = $request->input('objectIds');
        $deletedObjects = City::whereIn('id', $objectIds)->delete();

        if ($deletedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.city_message_delete_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.city_message_fail_delete_multiple')]);
        }
    }

        public function restoreMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:cities,id',
        ]);

        $objectIds = $request->input('objectIds');
        $restoredObjects = City::whereIn('id', $objectIds)->restore();

        if ($restoredObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.city_message_restore_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.city_message_fail_restore_multiple')]);
        }
    }

    public function activateMultiple(Request $request)
    {
        $request->validate([
            'objectIds' => 'required|array',
            'objectIds.*' => 'exists:cities,id',
        ]);

        $objectIds = $request->input('objectIds');
        foreach ($objectIds as $id) {
            $city = City::find($id);
            $city->isactive = !$city->isactive;
            $city->save();
        }
        $activatedObjects = City::whereIn('id', $objectIds);

        if ($activatedObjects) {
            return response()->json(['success' => true, 'message' => trans('translation.city_message_activate_multiple')]);
        } else {
            return response()->json(['success' => false, 'message' => trans('translation.city_message_fail_activate_multiple')]);
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

        $object = City::withTrashed()->findOrFail($id);
        // deletePicture($object,'cities','picture');
        $object->forceDelete();

    }

    /**
     * Change the status (active/inactive) of a city.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $object = City::findOrFail($id);
        $object->isactive = !$object->isactive;
        $object->save();
        $message = $object->isactive ? trans('translation.city_message_activated') : trans('translation.city_message_inactivated');
        return response()->json(['code' => 200, 'isactive' => $object->isactive, 'message' => $message]);
    }
}
