<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Diagnoses;
use App\Models\User;
use Carbon\Carbon;

class PatientController extends Controller
{

    public $permission;

    public function __construct()
    {
        $this->permission = "Patient";
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
        $searchAge = 28;
        $dateOfBirth = now()->subYears($searchAge)->format('Y-m-d');

        ## Total number of records without filtering
        if (Auth::user()->role_id == 1) {
            $totalRecords = Patient::all()->count();
            $totalRecordwithFilter = Patient::where('name', 'like', '%' . $searchValue . '%')->get()->count();
            $records = Patient::where('name', 'like', '%' . $searchValue . '%')->skip($start)->take($rowperpage)->get();
        }else{
            $totalRecords = Patient::where('hospital_id', Auth::user()->parent->id)->count();
            $totalRecordwithFilter = Patient::where(function ($query) use ($dateOfBirth, $searchValue) {
            $query->whereHas('diagnose', function ($query) use ($searchValue) {
            $query->where('diagnose', 'like', '%' . $searchValue . '%');
            })
            ->where('name', 'like', '%' . $searchValue . '%')
            ->orWhere('dob', '=', $dateOfBirth)
            ->orWhere('nic', 'like', '%' . $searchValue . '%');
            })->where('hospital_id', Auth::user()->parent->id)->get()->count();

            $records = Patient::where(function ($query) use ($dateOfBirth, $searchValue) {
            $query->whereHas('diagnose', function ($query) use ($searchValue) {
            $query->where('diagnose', 'like', '%' . $searchValue . '%');
            })
            ->where('name', 'like', '%' . $searchValue . '%')
            ->orWhere('dob', '=', $dateOfBirth)
            ->orWhere('nic', 'like', '%' . $searchValue . '%');
            })->where('hospital_id', Auth::user()->parent->id)->skip($start)->take($rowperpage)->get();

        }
        $data = array();
        $sl = 1;
        foreach ($records as $record) {
        if ($record->hospital_id == $record->hospital->id) {
            $parent = $record->hospital->data_name;
        }else{
            $parent = '--';
        }
        if ($record->staff_id == $record->staff->id) {
            $staff_id = $record->staff->name;
        }else{
            $staff_id = '--';
        }
        if ($record->diagnoses_id == $record->diagnose->id) {
            $diagnoses_id = $record->diagnose->diagnose;
        }else{
            $diagnoses_id = '--';
        }
            $name =  $record->name ? $record->name : '--' ;
            $nic = $record->nic ?? '--';
            $dateOfBirth = $record->dob;
            $age = Carbon::parse($dateOfBirth)->age;
            $age = $age ? $age : '--';
            $pdf = '';
            if($record->pdf){
                $pdf .= '<a id="downloadLink" href="' . asset(Storage::url('pdf/'.$record->pdf)) . '" download>
                        <svg style="margin-left: 16;" class="w-6 h-6  text-theme-danger-500 dark:text-white" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 18a.969.969 0 0 0 .933 1h12.134A.97.97 0 0 0 15 18M1 7V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2v5M6 1v4a1 1 0 0 1-1 1H1m0 9v-5h1.5a1.5 1.5 0 1 1 0 3H1m12 2v-5h2m-2 3h2m-8-3v5h1.375A1.626 1.626 0 0 0 10 13.375v-1.75A1.626 1.626 0 0 0 8.375 10H7Z" />
                        </svg>
                    </a>';
            }else{
                $pdf = 'NO PDF';
            }

        $button = '';
        $button .= '<a href="' . route('admin.patients.edit', [$record->id, 'lang' => 'en']) . '"
                    class="font-medium text-theme-success-200 dark:text-blue-500 hover:underline">
                    <svg class="w-6 h-6 text-theme-success-200 dark:text-white"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 18">
                    <path
                        d="M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z" />
                    <path
                        d="M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z" />
                </svg>
                </a>';
        $button .= '<a href="' . route('admin.patients.destroy', $record->id) . '"
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
                'parent'    => $parent,
                'staff_id'    => $staff_id,
                'diagnoses_id'    => $diagnoses_id,
                'name'    => $name,
                'nic' => $nic,
                'age' => $age,
                // 'dob'    => $dob,
                // 'created_at'             => $created_at,
                'pdf'             => $pdf,
                'options'             => $button,
            );
            $sl++;
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecordwithFilter,
            "iTotalDisplayRecords" => $totalRecords,
            "aaData" => $data
        );
        return $response;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $patients = Patient::paginate(10);
        return view('admin.patients.index');
        // $patients = Patient::all();
        // return view('admin.patients.index',compact('patients','paginations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hospitals = User::where('role_id',3)->get();
        $diagnoses = Diagnoses::all();
        $staffs = user::where('role_id', 6)->get();
       return view('admin.patients.create',compact('hospitals','diagnoses','staffs'));
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'nic' => ['required', 'string', 'max:15'],
        'sex' => ['required', 'in:male,female,other'],
        'address' => ['required', 'string', 'max:2000'],
        'pdf' => ['required', 'file', 'mimes:pdf'], // Added validation for PDF file
    ]);

    $patient = Patient::create([
        'hospital_id' => $request->hospital_id,
        'staff_id' => $request->staff_id,
        'diagnoses_id' => $request->diagnoses_id,
        'name' => $request->name,
        'nic' => $request->nic,
        'dob' => $request->dob,
        'sex' => $request->sex,
        'address' => $request->address,
    ]);

    if ($request->file('pdf')) {
        $path = 'pdf/';
        $fileName =  Str::random(20) . time() . '.' . $request->pdf->extension();
        $filePath = Storage::disk('public')->path($fileName);

        // Store the PDF file
        $request->file('pdf')->storeAs('public/' . $path, $fileName);

        $patient->pdf = $fileName;
        $patient->save();
    }

    // return redirect()->route('admin.patients.index');
    return redirect()->back()->with(['msg' => 'Patient created successfully!']);
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
        $patient = Patient::findorFail($id);
        $hospitals = User::where('role_id', 3)->get();
        $diagnoses = Diagnoses::all();
        $staffs = user::where('role_id', 6)->get();
        return view('admin.patients.edit',compact('patient','hospitals','diagnoses','staffs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'nic' => ['required', 'string', 'max:15'],
        'sex' => ['required', 'in:male,female,other'],
        'address' => ['required', 'string', 'max:2000'],
        'pdf' => ['file', 'mimes:pdf'], // Removed 'required' validation for PDF file
    ]);

    $patient = Patient::findOrFail($id);

    $patientData = [
        'hospital_id' => $request->hospital_id,
        'staff_id' => $request->staff_id,
        'diagnoses_id' => $request->diagnoses_id,
        'name' => $request->name,
        'nic' => $request->nic,
        'dob' => $request->dob,
        'sex' => $request->sex,
        'address' => $request->address,
    ];

    if ($request->hasFile('pdf')) {
        $request->validate([
            'pdf' => ['required', 'file', 'mimes:pdf'],
        ]);

        $path = 'pdf/';
        $fileName =  Str::random(20) . time() . '.' . $request->pdf->extension();
        $filePath = Storage::disk('public')->path($fileName);

        // Store the PDF file
        $request->file('pdf')->storeAs('public/' . $path, $fileName);

        $patientData['pdf'] = $fileName;
    }

    $patient->update($patientData);

    // return redirect()->route('admin.patients.index');
    return redirect()->back()->with(['msg' => 'Patient updated successfully!']);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
       return redirect()->back()->with(['msg'=>__('Patient delete successfully!')]);
    }
}
