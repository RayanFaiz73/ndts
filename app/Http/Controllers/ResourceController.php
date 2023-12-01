<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use App\Models\Patient;
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
    public function graph(Request $request)
    {
        $provinceId = $request->input('provinceId');
        $diseaseIds = $request->input('diseaseId') ?? [];
        $province = User::where('state_id', $provinceId)->first();

        $data = [];
        $provinces = [];
        $names = [];
        $males = [];
        $females = [];
        $others = [];
        $result = [];
        $total_patients = 0;
        $total_males = 0;
        $total_females = 0;
        $total_others = 0;
        $temp = [];

        if (!empty($diseaseIds)) {
            foreach ($diseaseIds as $diseaseId) {
                if($diseaseId){
                    $count = 0;
                    $count_male = 0;
                    $count_female = 0;
                    $count_other = 0;

                    foreach ($province->hospitals as $hospital) {
                        $count += $hospital->patients->where('diagnoses_id', $diseaseId)->count();
                        $count_male += $hospital->patients->where('diagnoses_id', $diseaseId)->where('sex', 'male')->count();
                        $count_female += $hospital->patients->where('diagnoses_id', $diseaseId)->where('sex', 'female')->count();
                        $count_other += $hospital->patients->where('diagnoses_id', $diseaseId)->where('sex', 'other')->count();
                        $provinceName = $province->state->name;
                    }

                    $diseaseName = Diagnoses::find($diseaseId)->diagnose;

                    $data['province' . $diseaseId] = [
                        "name" => $diseaseName,
                        "all" => $count,
                        "male" => $count_male,
                        "female" => $count_female,
                        "other" => $count_other
                    ];
                    $names[] = $diseaseName;
                    $males[] = $count_male;
                    $females[] = $count_female;
                    $others[] = $count_other;
                    $total_patients += $count;
                    $total_males += $count_male;
                    $total_females += $count_female;
                    $total_others += $count_other;
                }
            }
                $result['diseases']= $names;
                $result['males']= $males;
                $result['females']= $females;
                $result['others']= $others;
                $result['total_males']= $total_males;
                $result['total_females']= $total_females;
                $result['total_others']= $total_others;
            // $result = $temp;
        }
        // dd($data);

        return response()->json([
            'success' => true,
            'data' => $result,
            'result' => $result
        ]);
    }

    //     dd($data);

    //     return response()->json([
    //         'data' => $data
    //     ]);
    // }

}
