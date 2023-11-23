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
use App\Models\Country;
use App\Models\State;
use App\Models\RoleNew;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;

class ProvinceController extends Controller
{

    public $permission;

    public function __construct()
    {
        $this->permission = "Province";
    }
    /**
     * Display a listing of the resource.
     */
    // Inside your controller method where you retrieve provinces

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
        $totalRecords = User::where('role_id', 2)->count();

        ## Total number of record with filtering
        $totalRecordwithFilter = User::where(function ($query) use ($searchValue) {
            $query->whereHas('state', function ($query) use ($searchValue) {
                $query->where('name', 'like', '%' . $searchValue . '%');
            })->orwhere('name', 'like', '%' . $searchValue . '%')->orwhere('email', 'like', '%' . $searchValue . '%');
        })
        ->where('role_id', 2)->get()->count();

        ## Fetch records
        $records = User::where(function ($query) use ($searchValue) {
        $query->whereHas('state', function ($query) use ($searchValue){
             $query->where('name', 'like', '%' . $searchValue . '%');
        })->orwhere('name', 'like', '%' . $searchValue . '%')->orwhere('email', 'like', '%' . $searchValue . '%');
        })->where('role_id', 2)->skip($start)->take($rowperpage)->get();
        $data = array();
        $sl = 1;
        foreach ($records as $record) {
            $hCount = User::where('state_id', $record->state->id)->get();
            // dd($record->state);
            if ($record->state) {
            $data_name = $record->state->name;
            } else {
            $data_name = 'No State';
            }
            $name =  $record->name ;
            $email = $record->email;
            $parent_id = count($hCount);
            $created_at = date('d-m-Y',strtotime($record->created_at)) ;
        $button = '';
        $button .= '<a href="' . route('admin.provinces.edit', [$record->id, 'lang' => 'en']) . '"
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
        $button .= '<a href="' . route('admin.provinces.destroy', $record->id) . '"
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
                'name'    => $name,
                'parent_id'    => $parent_id,
                'email' => $email,
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
            "aaData" => $data
        );
        return $response;
    }
        public function index(Request $request)
        {
            // $searchQuery = $request->input('search');

            // $provinces = User::where('role_id', 2)
            //     ->when($searchQuery, function ($query) use ($searchQuery) {
            //         $query->where('data_name', 'LIKE', '%' . $searchQuery . '%');
            //     })
            //     ->paginate(10);

            return view('admin.provinces.index');
        }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $heading = "Province";
        $permission = $this->permission;
        // $managers = User::where('role_id',2)->get();
        $roles = Role::all();
        $countries = Country::where('id', 166)->get();
        $states = State::where('country_id', 166)->get();
        return view('admin.provinces.create',compact('heading', 'roles', 'permission','countries','states'));
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
        // $parent_id = Auth::id();
        $parent_id = $request->parent;
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'state_id' => $request->state_id,
            'status' => $request->status,
            'created_by' => $created_by,
        ]);

        return redirect()->back()->with(['msg' => 'Province created successfully!']);
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
        $heading = "Province";
        $province = User::findorFail($id);
       $countries = Country::where('id', 166)->get();
       $states = State::where('country_id', 166)->get();
        // $states = State::where('country_id',$province->state->country_id)->get();
        return view('admin.provinces.edit',compact('province','heading','countries','states'));
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
        $parent_id = $request->parent;
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'state_id' => $request->state_id,
            'status' => $request->status,
            'created_by' => $created_by,
        ]);
        return redirect()->back()->with(['msg' => 'Province updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $province = User::findOrFail($id);
        $province->delete();
       return redirect()->back()->with(['msg' => 'Province Delete successfully!']);
    }
}
