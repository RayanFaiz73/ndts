<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Jobs\CertificateUserStatusJob;
use App\Jobs\VerifyEmailJob;
use App\Models\Certificate;
use App\Models\CertificateUser;
use App\Models\CertificateUserRequirement;
use App\Models\Role;
use App\Models\State;
use App\Models\Patient;
use App\Models\RoleNew;
use App\Models\Hospital;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;

class StaffController extends Controller
{
     public $permission;

    public function __construct()
    {
        $this->permission = "Staff";
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

        $allUsers = new User();
        $allUsersCount = $allUsers->where('role_id', 6);
        $totalRecords = 0;
        $records = collect([]);
        $totalRecordwithFilter = 0;

        if (Auth::user()->role_id == 1) {

        $allUsersCount = $allUsersCount;
        $totalRecords = $allUsersCount->get()->count();
        $records = $allUsersCount->where('name', 'like', '%' . $searchValue . '%')->skip($start)->take($rowperpage)->orderBy($columnName, $columnSortOrder)->get();
        $totalRecordwithFilter = count($records);
        }elseif(Auth::user()->role_id == 2){
        $allUsersCount = $allUsersCount->where('state_id', Auth::user()->state_id);
        $totalRecords = $allUsersCount->get()->count();
        $records = $allUsersCount->where('name', 'like', '%' . $searchValue . '%')->skip($start)->take($rowperpage)->orderBy($columnName, $columnSortOrder)->get();
        $totalRecordwithFilter = count($records);
        }else{
        $allUsersCount = $allUsersCount->where('parent_id', Auth::id());
        $totalRecords = $allUsersCount->get()->count();
        $records = $allUsersCount->where('name', 'like', '%' . $searchValue . '%')->skip($start)->take($rowperpage)->orderBy($columnName, $columnSortOrder)->get();
        $totalRecordwithFilter = count($records);
        }
        $data = array();
        $sl = 1;
        foreach ($records as $record) {
            $hospitals = User::where('role_id', 3)->get();
            foreach ($hospitals as $key => $value) {
                $hospital = $value->id;
            }
            $name =  $record->name ? $record->name : '--' ;
            $email = $record->email ? $record->email : '--';

           if ($record->state_id == $record->state->id) {
               $state_id = $record->state->name;
            } else {
               $state_id = 'None';
            }

            // if ($record->parent_id == $record->parent->id) {
            // $parent_id = $record->parent->data_name;
            // } else {
            // $parent_id = 'None';
            // }
            $parent_id = $record->parent->data_name;
            $created_at = date('d-m-Y',strtotime($record->created_at ? $record->created_at : '--')) ;
        $button = '';
        $button .= '<a href="javascript:void(0);" onclick="detailsPatient(this)" data-id="' . $record->id . '" data-modal-target="authentication-modal"
            data-modal-toggle="authentication-modal" type="button"
            class="font-medium text-theme-success-200 dark:text-blue-500 hover:underline">
            <svg class="w-6 h-6 text-theme-primary-50 " style="margin-right:5px;" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 14">
                <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                    <path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z" />
                </g>
            </svg>
        </a>';
        $button .= '<a href="' . route('admin.data-operator.edit', [$record->id, 'lang' => 'en']) . '"
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
        $button .= '<a href="' . route('admin.data-operator.destroy', $record->id) . '"
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
                'name'    => $name,
                'email' => $email,
                'state_id' => $state_id,
                'parent_id'    => $parent_id,
                'created_at'             => $created_at,
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
        return view('admin.data-operators.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $heading = "Data Operator";
        $permission = $this->permission;
        $stateIds = [2723, 2724, 2725, 2726, 2727, 2728, 2729];
        $states = State::where('country_id', 166)->get();
        $hospitals = User::where('role_id', 3)->get();
        // dd($hospitals);
        return view('admin.data-operators.create',compact('heading', 'permission','states','hospitals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
            'status' => ['required', 'in:pending,approved,suspended'],
        ]);
        $created_by = Auth::id();
        $selectedHospital = User::findOrFail($request->parent_id);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'status' => $request->status,
            'parent_id' => $request->parent_id,
            'country_id' => $selectedHospital->country_id,
            'state_id' => $selectedHospital->state_id,
            'city_id' => $selectedHospital->city_id,
            'created_by' => $created_by,
        ]);

        return redirect()->back()->with(['msg' => 'Staff created successfully!']);
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
        $heading = "Data Operator";
        $staff = User::findorFail($id);
        $provinces = User::where('role_id', 2)->get();
        $hospitals = User::where('role_id', 3)->get();
        return view('admin.data-operators.edit',compact('staff','heading','provinces','hospitals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'password' => ['required', Rules\Password::defaults()],
        'status' => ['required', 'in:pending,approved,suspended'],
        ]);
        $user = User::findorFail($id);
        $created_by = Auth::id();
        // $parent_id = $request->parent;
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'status' => $request->status,
            'parent_id' => $request->parent_id,
            'created_by' => $created_by,
        ]);
        return redirect()->back()->with(['msg' => 'Staff updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $province = User::findOrFail($id);
        $province->delete();
        return redirect()->back()->with(['msg' => 'Staff Delete successfully!']);
    }

    public function modal(Request $request, string $id){
    $staff = User::findOrFail($id);
    $patients = Patient::where('staff_id',$staff->id)->get();
    // dd($patients);
    return view('admin.data-operators.modal',compact('staff','patients'));
}
}
