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
}
