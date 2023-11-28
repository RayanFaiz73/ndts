<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function fetchCountries(Request $request)
    {
        $countries = Country::where('name' ,'like', '%'.$request->name.'%')->get();
        return response()->json(['data' => $countries]);
    }

    public function fetchStatesByCountry(Request $request)
    {
        $states = State::where(['country_id' => $request->id])->get();
        return response()->json(['data' => $states]);
    }

    public function fetchCitiesByState(Request $request)
    {
        $cities = City::where(['state_id' => $request->id])->get();
        return response()->json(['data' => $cities]);
    }

    public function fetchStaffsByHospital(Request $request)
    {
        $staffs = User::where(['parent_id' => $request->id])->get();
        return response()->json(['data' => $staffs]);
    }
}
