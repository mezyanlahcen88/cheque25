<?php

namespace Modules\Language\App\Http\Controllers;

use Illuminate\Support\Str;
use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use App\Models\LanguageTranslate;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use Modules\Language\App\Models\Language;
use Modules\Language\App\Models\Translation;
use Illuminate\Validation\ValidationException;
use Modules\Language\App\Http\Requests\StoreLanguageRequest;
use Modules\Language\App\Http\Datatable\TranslationDatatable;
use Modules\Language\App\Http\Requests\UpdateLanguageRequest;



class LanguageController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        // $this->middleware('permission:language-list|language-create|language-edit|language-show|language-delete', ['only' => ['index']]);
        // $this->middleware('permission:language-create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:language-edit', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:language-show', ['only' => ['show']]);
        // $this->middleware('permission:language-delete', ['only' => ['destroy']]);
        // $this->middleware('permission:language-restore', ['only' => ['restore']]);
        // $this->middleware('permission:language-trashed', ['only' => ['trashed']]);
        // $this->middleware('permission:language-force-delete', ['only' => ['forceDelete']]);
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

        $tableRows =(new Language())->getRowsTable();
        $objects = Language::whereVisible(1)->get();
        return view('language::index',compact('tableRows','objects'));
    }

     public function getLanguagesJson()
    {
        $Languages = Language::where('visible',1)->orderBy('created_at','desc');
        return Datatables($Languages)
       ->addColumn('default' , function(Language $object){
            return view('components.default', compact('object'));
        })
        ->addColumn('active' , function(Language $object){
            return view('components.status', compact('object'));
        })
        ->addColumn('actions', function (Language $object) {
            return view('language::actions', compact('object'));
        })
        ->addColumn('checkbox', function (Language $object) {
            return view('components.checkbox', compact('object'));
        })
        ->rawColumns(['default','active','actions','checkbox'])
        ->editColumn('created_at','{{\Carbon\Carbon::parse($created_at)->format("d/m/Y")}}')
        ->setRowAttr(['align'=>'center'])
        ->make(true);
    }

    /**
     * Display a list of soft-deleted records.
     *
     * @return \Illuminate\View\View The view with the list of soft-deleted records.
     */
    public function trashed(Request $request)
    {
        $objects = Language::where('visible',1)->onlyTrashed()->get();
        $tableRows =(new Language())->getRowsTableTrashed();
        return view('language::trashedIndex', compact('tableRows','objects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('language::create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLanguageRequest $request, Language $model)
    {
        try {
            $validated = $request->validated();
            $this->crudService->storeRecord($model, $request, $model->getFillable(), $model->getFiles(), 'language', 'languages');

            return redirect()->route('languages.index');
             } catch (ValidationException $e) {
            return redirect()->route('language::create')->withErrors($e->validator)->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = language::findOrFail($id);
        return view('language::edit',compact('object'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLanguageRequest $request,$id)
    {
        try {
            $validated = $request->validated();
             $object = Language::findOrFail($id);
            $this->crudService->updateRecord($object, $request, $object->getFillable(), $object->getFiles(), 'language', 'languages');

            return redirect()->route('language.index');
            } catch (ValidationException $e) {
            return redirect()->route('language::edit')->withErrors($e->validator)->withInput();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
      $object = Language::findOrFail($request->id)->delete();
    }

            /**
     * Restore a soft-deleted user.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @param int $id The ID of the user to restore.
     * @return \Illuminate\Http\RedirectResponse The redirect response.
     */
    public function restore(Request $request, $id)
    {

        $object = Language::withTrashed()->findOrFail($id)->restore();

        return redirect()->route('language::index');
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

        $object = Language::withTrashed()->findOrFail($id);
        deletePicture($object,'languages','flag_path');
        $object->forceDelete();

    }

    /**
     * Change the status (active/inactive) of a user.
     *
     * @param \Illuminate\Http\Request $request The HTTP request object.
     * @return \Illuminate\Http\JsonResponse The JSON response.
     */
    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $object = Language::findOrFail($id);
        $object->status = !$object->status;
        $object->save();
        $message = $object->active ? trans('translation.language_message_activated') : trans('translation.language_message_inactivated');
        return response()->json(['code' => 200, 'status' => $object->status, 'lang' => $object->name,'message'=>$message]);
    }
    public function translations($id){

        $objects = LanguageTranslate::where('language_id',$id)->get();
        // return $objects;
        $columns = json_encode(LanguageTranslate::getColumns());
        // dd($columns);
        return view('language::translation.index',compact('objects','columns'));
    }

    public function getTranslationsJson()
    {
        $objects = LanguageTranslate::orderBy('created_at', 'desc');
        // return $objects;

        return TranslationDatatable::dataTable($objects);
    }


    // public function filterByKeyWord(Request $request,$id){
    //     $keyword = $request->keyword;
    //     $objects =  LanguageTranslate::where('language_id',$id)
    //     ->where(function ($query) use($keyword) {
    //         $query->where('label','like',"%".$keyword."%")
    //               ->orWhere('translation','like',"%".$keyword."%");
    //     })->paginate(30)->withQueryString();
    //     return view('languagetransations.index',compact('objects','id'));
    //  }
    public function changeDefault(Request $request)
    {
        $oldDefault = Language::where('isDefault', 1)->first();
        $oldDefault->isDefault = 0;
        $oldDefault->save();
        $id = $request->id;
        $object = Language::findOrFail($id);
        $object->isDefault = 1;
        $object->save();
        //  add code to check if this language is active first
        return response()->json(['code' => 200, 'lang' => $object->name]);
    }
    public function translate(Request $request){
        $id = $request->id;
        $toTranslate = LanguageTranslate::findOrFail($id);
        $toTranslate->translation = $request->value;
        $toTranslate->save();
        storeTranslaionToLang();
        return response()->json([
            'code'=>200,
            'label'=>$toTranslate->label,
        ]);
    }

    public function setLang($locale){
        App::setLocale($locale);
        Session::put('locale', $locale);
        return redirect()->back();
    }
public function storeTranslation(Request $request){
    $activeLanguages = Language::active()->pluck('id');
    $groupe = Str::lower($request->groupe);
    $label = $groupe.'_'.$request->type.'_'.$request->label;
    dd($label);
    foreach($activeLanguages as $lang){
        $trans = new Translation();
        $trans->label = $request->label;
        $trans->translation = $request->translation;
        $trans->language_id = $lang;
        $trans->save();
    }
    // "groupe" => "User"
    // "type" => "message"
    // "label" => "ddf"
    // "translation" => "ddddddd"


}

public function syncTranslation(){

    Artisan::call('db:seed', [
        '--class' => 'LanguageTranslateSeeder'
    ]);
    storeTranslaionToLang();
    $message = trans('translation.languagetranslate_form_sync');
    return response()->json(['success' => true, 'message' => $message]);
}

}
