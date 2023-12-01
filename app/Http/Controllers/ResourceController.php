<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use App\Models\Diagnoses;
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
        $staffs = User::where('role_id', 6)->where(['parent_id' => $request->id])->get();
        return response()->json(['data' => $staffs]);
    }
    public function fetchHospitals(Request $request)
    {
    $hospitals = User::where('role_id', 3)->where('data_name','like', '%'.$request->data_name.'%')->get();
    return response()->json(['data' => $hospitals]);
    }
    public function fetchDiseases(Request $request)
    {
    $diseases = Diagnoses::where('diagnose','like', '%'.$request->diagnose.'%')->get();
    $data = [];
    if($diseases->isNotEmpty()){
        foreach ($diseases as $value) {
            $data[] = [
                "id" => $value->id,
                "name" => $value->diagnose,
            ];
        }
    }
    return response()->json(['data' => $data]);
    }
    // public function fetchStaffsByHospital(Request $request)
    // {
    // $staffs = User::where(['parent_id' => $request->id])->get();
    // return response()->json(['data' => $staffs]);
    // }

}
