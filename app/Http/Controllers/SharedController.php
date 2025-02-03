<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class SharedController extends Controller
{
    public function getCities($id)
    {
        $cities = City::whereState_id($id)->pluck('name', 'id');
        return response()->json($cities);
    }
}
