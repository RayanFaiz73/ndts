<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Diagnoses;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index() : View
    {

        $countries = Country::where('id', 166)->get();
        $states = State::where('country_id', 166)->get();
        $diseases = Diagnoses::all();
        return view('welcome',compact('countries','states','diseases'));
    }

    public function provinceChart(Request $request)
    {
        $provinces = User::where('role_id', 2)
            ->with('hospitals.patients')
            ->get();

        $data = [];
        $total_patients = 0;

        foreach($provinces->groupBy('state_id') as $provinceUsers){
            $province = $provinceUsers->first();
            $count = 0;
                foreach($province->hospitals as $hospital){

                    $count += $hospital->patients->where('diagnoses_id', $request->id)->count();
                }
                $data[$province->state->name] = $count;
                $total_patients += $count;
        }
            // dd($count);

        $data_in_percentage = [];
        $show_chart = true;

            foreach($data as $state => $d){
                if ($total_patients > 0) {
                    $data_in_percentage[$state] = round(($d * 100 / $total_patients), 2);
                }
                else {
                    $show_chart = false;
                }
            }
        return response()->json(['success' => $show_chart,'id' => $request->id,'data' => $data_in_percentage]);
    }


    public function provinceAndDiseaseChart(Request $request)
    {
        $provinceId = $request->input('provinceId');
        $diseaseIds = $request->input('diseaseId') ?? [];
        $province = User::where('state_id', $provinceId)->first();

        $names = [];
        $males = [];
        $females = [];
        $others = [];
        $result = [];
        $total_patients = 0;
        $total_males = 0;
        $total_females = 0;
        $total_others = 0;

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
                    }

                    $diseaseName = Diagnoses::find($diseaseId)->diagnose;

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
        }

        return response()->json([
            'success' => true,
            'data' => $result,
            'result' => $result
        ]);
    }
}
