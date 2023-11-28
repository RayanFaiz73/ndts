<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Hospital;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\User;
use App\Models\Role;

class HospitalController extends Controller
{

    public $permission;

    public function __construct()
    {
        $this->permission = "Hospital";
    }
    /**
     * Display a listing of the resource.
     */
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
        if (Auth::user()->role_id == 1) {
            # code...
            $totalRecords = User::where('role_id', 3)->count();
        }else{
            $totalRecords = User::where('role_id', 3)->where('state_id', Auth::user()->state_id)->count();

        }

        ## Total number of record with filtering
        if (Auth::user()->role_id == 1) {
        $totalRecordwithFilter = User::where('data_name', 'like', '%' . $searchValue . '%')->where('role_id', 3)->get()->count();
        }else{
            $totalRecordwithFilter = User::where('data_name', 'like', '%' . $searchValue . '%')->where('role_id', 3)->where('state_id',Auth::user()->state_id)->get()->count();

        }

        ## Fetch records
        if (Auth::user()->role_id == 1) {
              $records = User::where('data_name', 'like', '%' . $searchValue . '%')->where('role_id',3)->skip($start)->take($rowperpage)->orderBy($columnName, $columnSortOrder)->get();
        }else{
            $records = User::where('data_name', 'like', '%' . $searchValue . '%')->where('role_id',3)->where('state_id',Auth::user()->state_id)->skip($start)->take($rowperpage)->orderBy($columnName, $columnSortOrder)->get();

        }


        $data = array();
        $sl = 1;
        $state_id = null;
        foreach ($records as $record) {
            $data_name =   $record->data_name ? $record->data_name : '--' ;
            if (Auth::user()->role_id == 1) {
               if ($record->state_id == $record->state->id) {
                     $state_id = $record->state->name;
            } else {
                     $parent = 'None';
            }
            }

            $name =  $record->name ? $record->name : '--' ;
            $email = $record->email ? $record->email : '--';
            $type = $record->type ? $record->type : '--';
            $phone = $record->phone ? $record->phone : '--';
            // $created_at = date('d-m-Y',strtotime($record->created_at ? $record->created_at : '--')) ;
        $button = '';
        $button .= '<a href="javascript:void(0);" onclick="detailsInfo(this)" data-id="' . $record->id . '"
                    data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" type="button"
                    class="font-medium text-theme-success-200 dark:text-blue-500 hover:underline">
                    <svg class="w-6 h-6 text-theme-primary-50 " style="margin-right:5px;" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 14">
                        <g stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                            <path d="M10 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            <path d="M10 13c4.97 0 9-2.686 9-6s-4.03-6-9-6-9 2.686-9 6 4.03 6 9 6Z" />
                        </g>
                    </svg>
                </a>';
        $button .= '<a href="' . route('admin.hospitals.edit', [$record->id, 'lang' => 'en']) . '"
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
        $button .= '<a href="' . route('admin.hospitals.destroy', $record->id) . '"
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
                'data_name' => $data_name,
                'state_id' => $state_id,
                'name'    => $name,
                'email' => $email,
                'type'             => $type,
                'phone'             => $phone,
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

    public function index()
    {
        return view('admin.hospitals.index');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $provinces = User::where('role_id',2)->get();
        $roles = Role::all();
       $stateIds = [2723, 2724, 2725, 2726, 2727, 2728, 2729];
       $countries = Country::where('id', 166)->get();
       $states = State::where('country_id', 166)->get();
       $cities = City::whereIn('state_id', $stateIds)->get();
    //    dd($cities);
        return view('admin.hospitals.create',compact('provinces','roles','countries','states','cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);
        $parent = Auth::id();
        $created_by = Auth::id();
        $user = User::create([
            'data_name' => $request->data_name,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_by' => $created_by,
            'parent_id' => $parent,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'type' => $request->type,
            'address_one' => $request->address_one,
            'address_two' => $request->address_two,
            'phone' => $request->phone,
            'zip_code' => $request->zip_code,
            'role_id' => $request->role_id,
            'status' => 'approved'
        ]);
        return redirect()->back()->with(['msg' => 'Hospital created successfully!']);
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
       $hospital = User::findorFail($id);
       $provinces = User::where('role_id', 2)->get();
       $stateIds = [2723, 2724, 2725, 2726, 2727, 2728, 2729];
       $countries = Country::where('id', 166)->get();
       $states = State::where('country_id', 166)->get();
       $cities = City::whereIn('state_id', $stateIds)->get();
       return view('admin.hospitals.edit',compact('hospital','provinces','countries','states','cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class . ',email,' . $id],
            'password' => ['required', Rules\Password::defaults()],
        ]);
        $created_by = Auth::id();
        $hospital = User::findOrFail($id);

        $hospital->update([
            'data_name' => $request->data_name,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_by' => $created_by,
            // 'parent_id' => $request->parent_id,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'type' => $request->type,
            'address_one' => $request->address_one,
            'address_two' => $request->address_two,
            'phone' => $request->phone,
            'zip_code' => $request->zip_code,
            'role_id' => $request->role_id,
            'status' => 'approved'
        ]);

        return redirect()->back()->with(['msg' => 'Hospital updated successfully!']);

    }

    /**
     * Remove the specified resource from storage.
     */
public function destroy(string $id)
    {
    $hospital = User::findOrFail($id);
    $hospital->delete();
    return Redirect()->route('admin.hospitals.index');
    }

public function searchProvinces(Request $request){
    $q = $request->q;
    if($q){
        $provinces = User::where('role_id', 2)
                ->where('name', 'like', '%' . $q . '%')
                ->get(['id', 'name']);
        return [
            'total_count' => $provinces->count(),
            'provinces' => $provinces,
        ];
    }
}

public function modal(Request $request, string $id){
    $hospital = User::findOrFail($id);
    return view('admin.hospitals.modal',compact('hospital'));
}


}
