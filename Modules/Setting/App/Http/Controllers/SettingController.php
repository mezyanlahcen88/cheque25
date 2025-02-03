<?php

namespace Modules\Setting\App\Http\Controllers;

use App\Enums\StaticOptions;
use Illuminate\Http\Request;
use App\Services\CrudService;
use Modules\Setting\App\Http\Requests\StoreSettingRequest;
use Modules\Setting\App\Http\Requests\UpdateSettingRequest;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\ValidationException;
use Modules\Setting\App\Models\Setting;
use App\Http\Controllers\Controller;



class SettingController extends Controller
{

    public $staticOptions;
    public $crudService;
    public function __construct(CrudService $crudService, StaticOptions $staticOptions)
    {
        $this->middleware('auth');
        // $this->middleware('permission:setting-list|setting-create|setting-edit|setting-show|setting-delete', ['only' => ['index']]);
        // $this->middleware('permission:setting-create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:setting-edit', ['only' => ['edit', 'update']]);
        // $this->middleware('permission:setting-show', ['only' => ['show']]);
        // $this->middleware('permission:setting-delete', ['only' => ['destroy']]);
        // $this->middleware('permission:setting-restore', ['only' => ['restore']]);
        // $this->middleware('permission:setting-trashed', ['only' => ['trashed']]);
        // $this->middleware('permission:setting-force-delete', ['only' => ['forceDelete']]);
        $this->staticOptions = $staticOptions;
        $this->crudService = $crudService;
    }





    public function edit(Request $request){
    	$settings = Setting::all();
    	return view('setting::edit', compact('settings'));
    }

    public function update(Request $request){
        // dd($request->all());

    	//  $validatedData = $request->validate([
        // 	'system_name' => 'required',
        // 	'title' => 'required',
        // 	'address' => 'required',
        // 	'phone' => 'required',
        // 	'email' => 'required|email',
        // 	'copyrigth' => 'nullable',
        //     'logo' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:5048',

    	// ]);

           $allValues = $request->except('_token','_method');
           foreach($allValues as $key => $value){
	    	Setting::update_option($key, $value);
           }

        if($request->hasFile('logo')){
            $file= $request->file('logo');
            $extension=$file->getClientOriginalExtension();
            $newImageName= time()."-logo".".".$extension;
            $file->storeAs('public/images/settings',$newImageName );
            Setting::update_option('logo', $newImageName);
        }
        if($request->hasFile('auth_picture')){
            $file= $request->file('auth_picture');
            $extension=$file->getClientOriginalExtension();
            $newImageName= time()."-auth_picture".".".$extension;
            $file->storeAs('public/images/settings',$newImageName );
            Setting::update_option('auth_picture', $newImageName);
        }
        storeSetting();
    	return to_route('setting.edit','update-system-settings');
    }




}

