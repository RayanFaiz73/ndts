<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\CertificateUserStatusJob;
use App\Jobs\VerifyEmailJob;
use App\Models\Certificate;
use App\Models\CertificateUser;
use App\Models\CertificateUserRequirement;
use App\Models\Role;
use App\Models\RoleNew;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    public $permission;

    public function __construct()
    {
        $this->permission = "user";
    }

    /**
     * Display the Users list.
     */
    public function index(): View
    {
        $permission = $this->permission;
        $heading = "User";
        $users = User::all();
        $showAdmin = false;
        $showManager = false;
        $showClient = false;
        $showUser = false;
        $admins = [];
        $managers = [];
        $clients = [];
        $users = [];
        $firstCol = 'User';
        $lastCol = 'User';
        // if(Auth::user()?->role->name == "Admin" && Auth::user()?->role_id == 1){
            // $admins = User::where('role_id',1)->get();
            // $managers = User::where('role_id',2)->get();
            // $clients = User::where('role_id',3)->get();
            // $users = User::where('role_id',4)->get();

            $admins = User::whereHas('roles',function($query){
                $query->where('id',1);
            })->get();
            $managers = User::whereHas('roles',function($query){
                $query->where('id',2);
            })->get();
            $clients = User::whereHas('roles',function($query){
                $query->where('id',3);
            })->get();
            $users = User::whereHas('roles',function($query){
                $query->where('id',4);
            })->get();
            $showAdmin = true;
            $showManager = true;
            $showClient = true;
            $showUser = true;
            $firstCol = 'Admin';
            $lastCol = 'User';
        // }
        // elseif(Auth::user()?->role->name == "Manager" && Auth::user()?->role_id == 2){
        //     // Manager will get all his/her users from here
        //     $clients = User::where('parent_id',Auth::id())->get();
        //     $clientIds = [];
        //     foreach($clients as $client){
        //         $clientIds[] = $client?->id;
        //     }
        //     $users = User::whereIn('parent_id',$clientIds)->get();

        //     $showClient = true;
        //     $showUser = true;
        //     $firstCol = 'Client';
        //     $lastCol = 'User';
        // }
        // elseif(Auth::user()?->role->name == "Client" && Auth::user()?->role_id == 3){
        //     // Client will get all his/her users from here
        //     $users = User::whereIn('parent_id',Auth::id())->get();

        //     $showUser = true;
        //     $firstCol = 'User';
        //     $lastCol = 'User';
        // }
        return view('admin.users.list',compact('users','heading','admins','managers','clients','users','firstCol','lastCol','permission'));
    }

    /**
     * Display the User create view.
     */
    public function create(): View
    {

        $permission = $this->permission;
        $heading = "User";
        // $managers = User::where('role_id',2)->get();
        // $managers = User::whereHas('roles',function($query){
        //     $query->where('id',2);
        // })->get();
        $roles = Role::all();
        $role_news = RoleNew::all();
        $certificates = Certificate::where('status','active')->pluck('name','id');
        $data = [];
        foreach($certificates as $key => $certificate){
            $data[] = [
                'value' => "$key",
                'title'  => $certificate
            ];
        }
        $certificates = json_encode($data);
        return view('admin.users.create',compact( 'roles', 'heading','certificates','permission', 'role_news'));
    }

    /**
     * Handle an incoming create user request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role_id' => ['required', 'numeric', Auth::user()?->roles->first()->id == 1 ? 'min:1' : 'min:'.Auth::user()?->roles->first()->id +  1],
            'status' => ['required', 'in:pending,approved,suspended'],
        ]);
        $created_by = Auth::id();
        // $parent_id = Auth::id();
        $parent_id = $request->parent;

        // if($request->user_id){
        //     $parent_id = $request->user_id;
        // }
        // elseif($request->client_id){
        //     $parent_id = $request->client_id;
        // }
        // elseif($request->manager_id){
        //     $parent_id = $request->manager_id;
        // }
        $tags = [];
        // if($request->role_id == 4){
        if($request->role_id == 3){
            $certificates = $request->certificates;
            $certificates = json_decode($certificates);
            if(empty($certificates)){
                return redirect()->back()->withInput()->withErrors(['certificates' => 'At least 1 certificate selection is required!']);
            }
            $existingCertificates = Certificate::where('status','active')->pluck('id','name')->toArray();
            foreach($certificates as $certificate){
                if(isset($existingCertificates[$certificate->value])){
                    $tags[] = $existingCertificates[$certificate->value];
                }
            }
            if(empty($tags)){
                return redirect()->back()->withInput()->withErrors(['certificates' => 'Invalid certificates!']);
            }
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status,
            // 'role_id' => $request->role_id,
            'parent_id' => $parent_id,
            'created_by' => $created_by,
        ]);

        $role = RoleNew::find($request->role_id);
        $role->users()->attach($user);
        // if($request->role_id == 4){
        if($request->role_id == 3){
            $certificate_user_data = [];
            foreach($tags as $tag){
                $certificate_user_data[] = [
                    'user_id' => $user->id,
                    'certificate_id' => $tag,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
            CertificateUser::insert($certificate_user_data);
        }
        VerifyEmailJob::dispatch($user);
        return redirect()->back()->with(['msg' => 'User created successfully!']);
    }

    /**
     * Display the User edit view.
     */
    public function edit(Request $request, User $user): View
    {
        $permission = $this->permission;
        $heading = "User";
        // $managers = User::where('role_id',2)->get();
        $managers = User::whereHas('roles',function($query){
            $query->where('id',2);
        })->get();
        $roles = Role::all();
        $role_news = RoleNew::all();
        $certificates = Certificate::where('status','active')->pluck('name','id');
        $data = [];
        foreach($certificates as $key => $certificate){
            $data[] = [
                'value' => "$key",
                'title'  => $certificate
            ];
        }
        $certificates = json_encode($data);
        return view('admin.users.edit',compact('user','roles','managers','heading','certificates','permission','role_news'));
    }

    /**
     * Handle an incoming update user request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request): RedirectResponse
    {

        $request->validate([
            'id' => ['required', 'integer', 'exists:App\Models\User,id'],
            'role_id' => ['required', 'integer', 'exists:App\Models\RoleNew,id', Auth::user()?->roles->first()->id == 1 ? 'min:1' : 'min:'.Auth::user()?->roles->first()->id + 1],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class)->ignore($request->id)],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            // 'role_id' => ['required', 'numeric', Auth::user()?->role_id == 1 ? 'min:1' : 'min:'.Auth::user()?->role_id + 1],
            'status' => ['required', 'in:pending,approved,suspended'],
        ]);
        // dd($request->all());
        $user = User::findOrFail($request->id);
        $created_by = Auth::id();
        // $parent_id = Auth::id();

        $parent_id = $request->parent;
        // if($request->user_id){
        //     $parent_id = $request->user_id;
        // }
        // elseif($request->client_id){
        //     $parent_id = $request->client_id;
        // }
        // elseif($request->manager_id){
        //     $parent_id = $request->manager_id;
        // }
        // if($request->role_id == 4 && (!$request->client_id || !$request->manager_id) && $request->status == 'approved'){
        if($request->role_id == 4 && !$request->parent && $request->status == 'approved'){
            return redirect()->back()->withInput()->withErrors(['Error' => __('Manager Or Client is required before approving this user!')]);
            // if(!$request->manager_id){
            //     return redirect()->back()->withInput()->withErrors(['Manager' => 'Manager field is required before approving this user!']);
            // }
            // return redirect()->back()->withInput()->withErrors(['Client' => 'Client field is required before approving this user!']);
        }
        if($request->role_id == 3 && !$request->parent && $request->status == 'approved'){
            return redirect()->back()->withInput()->withErrors(['Error' => __('Manager field is required before approving this user!')]);
        }
        $tags = [];
        // if($request->role_id == 4){
        if($request->role_id == 3){
            $certificates = $request->certificates;
            $certificates = json_decode($certificates);
            if(empty($certificates)){
                return redirect()->back()->withInput()->withErrors(['certificates' => __('At least 1 certificate selection is required!')]);
            }
            $existingCertificates = Certificate::where('status','active')->pluck('id','name')->toArray();
            foreach($certificates as $certificate){
                if(isset($existingCertificates[$certificate->value])){
                    $tags[] = $existingCertificates[$certificate->value];
                }
            }
            if(empty($tags)){
                return redirect()->back()->withInput()->withErrors(['certificates' => __('Invalid certificates!')]);
            }
        }
        $data = [];
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        if($request->password){
            $data['password'] = Hash::make($request->password);
        }
        $data['status'] = $request->status;
        // $data['role_id'] = $request->role_id;
        $data['parent_id'] = $parent_id;
        $data['created_by'] = $created_by;
        // if($request->role_id == 4){
        if($request->role_id == 3){
            // CertificateUser::where('user_id',$user->id)->delete();
            // CertificateUser::where('user_id',$user->id)->get();
            $existingCertificateUsers = CertificateUser::where('user_id',$user->id)->pluck('id','certificate_id')->toArray();
            // dd($existingCertificateUsers,$tags);
            $certificate_user_data = [];
            foreach($tags as $tag){
                if(!isset($existingCertificateUsers[$tag])){
                    $certificate_user_data[] = [
                        'user_id' => $user->id,
                        'certificate_id' => $tag,
                        'created_at' => now(),
                        'updated_at' => now()
                    ];
                    }
            }
            CertificateUser::where('user_id',$user->id)->whereNotIn('certificate_id',$tags)->delete();
            CertificateUser::insert($certificate_user_data);
        }
        $oldRole = $user->roles->first();
        $role = RoleNew::find($oldRole->id);
        $role->users()->detach($user);
        $user->update($data);
        $role = RoleNew::find($request->role_id);
        $role->users()->attach($user);
        return redirect()->back()->with(['msg' => __('User updated successfully!')]);
    }

    /**
     * Handle an incoming update user request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function status(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => ['required'],
            'status' => ['required', 'in:pending,approved,suspended'],
        ]);
        $user = User::find($request->id);
        if($user->roles->first()->id == 4 && $user->parent && $request->status == 'approved'){
            if($user->parent?->roles->first()->id != 3 ){
                return redirect()->back()->withErrors(['Client' => __('Client field is required before approving this user!')]);
            }
        }
        elseif($user->roles->first()->id == 4 && !$user->parent && $request->status == 'approved') {
            return redirect()->back()->withErrors([
                'warning' => __('Manager and Client both field is required before approving this user!')
            ]);
        }
        $data = [];
        $data['status'] = $request->status;
        $user->update($data);

        return redirect()->back()->with(['msg' => __('User updated successfully!')]);
    }

    /**
     * Handle an incoming update user request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function statusForCertificate(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => ['required'],
            'status' => ['required', 'in:requested,accepted,rejected'],
        ]);
        $certificate = CertificateUser::find($request->id);
        if($certificate->user?->roles->first()->id == 4 && $certificate->user?->parent && $request->status == 'accepted'){
            if($certificate->user?->parent?->roles->first()->id != 3 ){
                return redirect()->back()->withErrors(['Client' => __('Client field is required before approving this user!')]);
            }
        }
        elseif($certificate->user?->roles->first()->id == 4 && !$certificate->user?->parent && $request->status == 'accepted') {
            return redirect()->back()->withErrors([
                'warning' => __('Manager and Client both field is required before approving this user!')
            ]);
        }
        $data = [];
        $data['status'] = $request->status;
        $certificate->update($data);
        if($request->status != 'requested'){
            $emailData['subject'] = 'Certificate request update';
            $emailData['clientName'] = $certificate->user?->name;
            $emailData['clientEmail'] = $certificate->user?->email;
            $emailData['certificateName'] = $certificate->certificate->name;
            $emailData['status'] = $request->status;
            CertificateUserStatusJob::dispatch($emailData);
        }
        return redirect()->back()->with(['msg' => __('Certificate status successfully upated!')]);
    }


    /**
     * Handle an incoming user request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function children(Request $request): JsonResponse
    {
        $request->validate([
            'id' => ['required'],
        ]);
        $children = User::where('parent_id',$request->id)->get();
        $options = '<option value=""> '.__("Please select any option").' </option>';
        foreach($children as $child){
            $options .= '<option value="'.$child->id.'"> '.$child->name.' </option>';

        }
        return response()->json(['options' => $options],200);
    }

    /**
     * Handle an incoming role request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function getManagers(Request $request): JsonResponse
    {
        $role_id = 2;
        $role = RoleNew::findOrFail($role_id);
        $label = __("Select $role->name");
        $users = new User();
        if($request->user){
            $users = $users->whereNot("id", $request->user);
        }
        $allUSers = $users->whereHas('roles',function($query) use ($role_id){

            $query->where('id',$role_id);

        })->get();
        // $allUSers = User::whereHas('roles',function($query) use ($role_id){

        //     $query->where('id',$role_id);

        // })->get();
        $options = '<option value=""> '.__("Please select any option").' </option>';
        foreach($allUSers as $child){
            $options .= '<option value="'.$child->id.'"> '.$child->name.' </option>';

        }
        return response()->json(['label' => $label,'options' => $options],200);
    }
    /**
     * Handle an incoming user request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function getUsers(Request $request): JsonResponse
    {
        $request->validate([
            'id' => ['required', 'integer', 'exists:App\Models\User,id'],
            'role_id' => ['required', 'integer', 'exists:App\Models\RoleNew,id'],
        ]);
        $user = User::findOrFail($request->id);
        $role = $user->roles->first();
        // $allUSers = User::where('parent_id',$request->id)->get();
        $users = new User();
        if($request->user){
            $users = $users->whereNot("id", $request->user);
        }
        $allUSers = $users->where('parent_id',$request->id)->get();
        $role_id = $role->id +1;
        $certificateShow = false;
        if($request->role_id == 3){
            $certificateShow = true;
        }
        if($role_id < $request->role_id){
            $role = RoleNew::findOrFail($role_id);
            $label = __("Select $role->name");
            $options = '<option value=""> '.__("Please select any option").' </option>';
            foreach($allUSers as $child){
                $options .= '<option value="'.$child->id.'"> '.$child->name.' </option>';

            }
            return response()->json(['success' => true,'certificateShow' => $certificateShow,'label' => $label,'options' => $options],200);
        }
        return response()->json(['success' => false,'certificateShow' => $certificateShow]);
    }
}
