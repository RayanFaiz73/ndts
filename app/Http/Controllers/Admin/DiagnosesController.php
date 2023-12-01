<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diagnoses;
use App\Models\User;

class DiagnosesController extends Controller
{
    public function __construct()
    {
        $this->permission = "Disease";
    }

     public function list(Request $request)
    {
        $response = array();
        ## Read value
        $draw = $request->draw;
        $start = (int)$request->start;
        $rowperpage = (int)$request->length; // Rows display per page
        $columnIndex = $request->order[0]['column']; // Column index
        $columnName = $request->columns[$columnIndex]['data']; // Column name
        $columnSortOrder = $request->order[0]['dir']; // asc or desc
        $searchValue = $request->search['value']; // Search value
        ## Search

        ## Total number of records without filtering
        $totalRecords = Diagnoses::all()->count();

        ## Total number of record with filtering
        $totalRecordwithFilter = Diagnoses::where('diagnose', 'like', '%' . $searchValue . '%')->get()->count();

        ## Fetch records
        // $records = Diagnoses::withCount('patients')->where('diagnose', 'like', '%' . $searchValue . '%')->skip($start)->take($rowperpage)->orderBy($columnName, $columnSortOrder)->get();
        $records = Diagnoses::withCount('patients')
        ->where('diagnose', 'like', '%' . $searchValue . '%')
        ->orderBy($columnName, $columnSortOrder)
        ->skip($start)
        ->take($rowperpage)
        ->get();
        $data = array();
        $sl = 1;
        foreach ($records as $record) {
            $diagnose =  $record->diagnose ? $record->diagnose : '--' ;
            $created_at = date('d-m-Y',strtotime($record->created_at ? $record->created_at : '--')) ;
            // $patient = $record->patients->count();
            $patients_count = $record->patients_count;

            // dd($record->patients);

            $button = '';
            // $provinces_count = User::where('role_id', 2)->with('hospitals.patients')->count();
            // dd($provinces_count);
            if ($patients_count > 0) {
            $button .= '<a href="javascript:void(0);" onclick="detailsDisease(this)" data-id="' . $record->id . '"
                data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button"
                class="font-medium text-theme-success-200 dark:text-blue-500 hover:underline">
                <svg class="w-6 h-6 text-theme-primary-50 " style="margin-right:5px;" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">
                    <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                        <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                        <path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z" />
                    </g>
                </svg>
            </a>';
            } else{
            $button .= '<a href="javascript:void(0);"  data-id="' . $record->id . '"
                data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button"
                class="font-medium text-theme-success-200 dark:text-blue-500 hover:underline">
                <svg class="w-6 h-6 text-theme-warning-500" style="margin-right:5px;" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 20 18">
                    <path stroke="currentColor" stroke-linecap="round"  stroke-linejoin="round" stroke-width="2"
                        d="M1.933 10.909A4.357 4.357 0 0 1 1 9c0-1 4-6 9-6m7.6 3.8A5.068 5.068 0 0 1 19 9c0 1-3 6-9 6-.314 0-.62-.014-.918-.04M2 17 18 1m-5 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            </a>';
            }

            $button .= '<a href="javascript:void(0);" onclick="detailsInfo(this)" data-id="' . $record->id . '"
                data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button"
                class="font-medium text-theme-success-200 dark:text-blue-500 hover:underline">
                <svg class="w-6 h-6 text-theme-success-200 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 18">
                    <path
                        d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                    <path
                        d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                </svg>
            </a>';
            $button .= '<a href="' . route('admin.diseases.destroy', $record->id) . '"
            class="font-medium text-theme-success-200 dark:text-blue-500 hover:underline">
            <svg class="w-6 h-6 text-theme-danger-500 dark:text-white"
            aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 18 20">
            <path stroke="currentColor" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2"
                d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
        </svg>
        </a>';

            $data[] = array(
                'diagnose'    => $diagnose,
                'created_at'             => $created_at,
                'patients_count'             => $patients_count,
                'options'             => $button,
            );
            $sl++;
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecordwithFilter,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $data,
            "cusData" => $columnName
        );
        return $response;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $diagnoses = Diagnoses::paginate(10);
        $permission = $this->permission;
        return view('admin.diseases.index',compact('permission'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission = $this->permission;
        return view('admin.diseases.create',compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'diagnose' => ['required', 'string', 'max:255'],
        ]);

        $user = Diagnoses::create([
            'diagnose' => $request->diagnose,
        ]);
        return redirect()->back()->with(['msg' => 'Diagnose created successfully!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $diagnose = Diagnoses::findorFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    // dd($request->all());
    $request->validate([
    'diagnose' => ['required', 'string', 'max:255'],
    ]);

    $diagnose = Diagnoses::findOrFail($id);
    $diagnose->diagnose = $request->diagnose;
    $diagnose->save();

    return redirect()->back()->with(['msg' => 'Diagnose updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $diagnose = Diagnoses::findOrFail($id);
        $diagnose->delete();
        return Redirect()->route('admin.diseases.index');
    }

    public function modal(Request $request, string $id){
        $diagnose = Diagnoses::findOrFail($id);
        // dd($diagnose);
        return view('admin.diseases.modal',compact('diagnose'));
    }

public function diseaseModal(Request $request, string $id){
    $disease = Diagnoses::findOrFail($id);

    $provinces = User::where('role_id', 2)
        ->with('hospitals.patients')
        ->get();

    $data = [];
    $data_card = [];
    $total_patients = 0;

    foreach($provinces->groupBy('state_id') as $state_id => $provinceUsers){
        $province = $provinceUsers->first();
        $count = 0;
        $count_male = 0;
        $count_female = 0;
        $count_other = 0;
        foreach($province->hospitals as $hospital){

            $count += $hospital->patients->where('diagnoses_id', $id)->count();
            $count_male += $hospital->patients->where('diagnoses_id', $id)->where('sex','male')->count();
            $count_female += $hospital->patients->where('diagnoses_id', $id)->where('sex','female')->count();
            $count_other += $hospital->patients->where('diagnoses_id', $id)->where('sex','other')->count();
        }
        $data[$province->state->name] = $count;
        $data_card[$province->state->name] = [
            "all" => $count,
            "male" => $count_male,
            "female" => $count_female,
            "other" => $count_other
        ];
        $total_patients += $count;
    }
        // dd($count);

    $data_id_percentage = [];
    $show_graph = true;

        foreach($data as $state => $d){
            if ($total_patients > 0) {
                $data_id_percentage[$state] = round(($d * 100 / $total_patients), 2);
            }
            else {
        $show_graph = false;
            }
        }
        // dd($data_id_percentage);
    return view('admin.diseases.disease_modal', compact('disease', 'provinces', 'data_id_percentage', 'show_graph','data_card'));
}


}
