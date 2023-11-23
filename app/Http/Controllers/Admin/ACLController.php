<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Role,Menu,PermissionNew, RoleNew, User};
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ACLController extends Controller
{
    public $permission;

    public function __construct()
    {
        $this->permission = "role";
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permission = $this->permission;
        $heading = 'Role';
        $roles = RoleNew::all();
        $permissions = PermissionNew::all();
        return view('admin.acl.list', compact('roles','heading','permission','permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission = $this->permission;
        $heading = 'Role';
        $permissions = PermissionNew::all();
        return view('admin.acl.create', compact('heading','permission','permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'array','min:1'],
            "name.*"  => ['required', 'string', 'max:255', 'unique:permission_news,name'],
        ],[
            'name.*.unique' => __('The :input field already exists.'),
        ]);
        $names = [];
        $slugs = [];
        foreach($request->name as $name){
            $slugs[] = Str::slug($name);
            $names[] = [
                'name' => $name,
                'slug' => Str::slug($name),
                'created_at' => now(),
                'updated_at' => now(),
            ];

        }
        PermissionNew::insert($names);
        $permissions = PermissionNew::whereIn('slug',$slugs)->get();
        return response()->json(['success' => true,'msg' =>__('New permission has been created!'), 'data' => $permissions],201);
    }

    /**
     * Display the specified resource.
     */
    public function view(Role $role)
    {
        // $role = Role::where('id', $id)->first();
        $html = view('components.permission-card', ['role' => $role, 'all' => true]);
        return $html;
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function editRole(RoleNew $role)
    {
        $permission = $this->permission;
        $heading = 'Role';
        $permissions = PermissionNew::all();
        return view('admin.acl.edit', compact('role', 'heading','permission','permissions'));
    }

    public function storeRole(Request $request){
        $request->validate([
            'role' => ['required', 'string',  'max:255', 'unique:role_news,name'],
            'permission' => ['required', 'array','min:1'],
            'permission.*' => ['required', 'integer', 'exists:App\Models\PermissionNew,id'],
        ]);
        $role = RoleNew::create([
            'name' => $request->role,
            'slug' => Str::slug($request->role)
        ]);

        $role->permissions()->attach($request->permission);
        return redirect()->back()->with('msg', __('New role has been created!'));

    }

    /**
     * Display the specified resource.
     */
    public function viewRole(RoleNew $role)
    {
        $permission = $this->permission;
        $heading = 'Role';
        $users = User::whereDoesntHave('roles', function($query) use ($role) {
            $query->where('role_new_id', $role->id);
          })->get();
        $permissions = PermissionNew::whereDoesntHave('roles', function($query) use ($role) {
            $query->where('role_new_id', $role->id);
        })->get();
        return view('admin.acl.view', compact('role', 'heading','permission','users','permissions'));
    }
    public function updateRole(Request $request){
        $request->validate([
            'id' => ['required', 'integer', 'exists:App\Models\RoleNew,id'],
            'role' => ['required', 'string',  'max:255', Rule::unique(RoleNew::class,'name')->ignore($request->id)],
            'permission' => ['required', 'array','min:1'],
            'permission.*' => ['required', 'integer', 'exists:App\Models\PermissionNew,id'],
        ]);
        $role = RoleNew::find($request->id);
        $role->name = $request->role;
        $role->permissions()->sync($request->permission);
        $role->update();
        return redirect()->back()->with('msg', __('Role has been updated!'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyRole(Request $request)
    {
        # code...

        $request->validate([
            'id' => ['required', 'integer', 'exists:App\Models\RoleNew,id'],
            'name' => ['required'],
        ]);
        $check = RoleNew::find($request->id);
        if($check && $check->users->count()){
            return redirect()->back()->withInput()->withErrors(['warning!' => 'This role is already associated with '.$check->users->count().' user(s).<br>Kindly change their role first before deleting this role']);

        }
        RoleNew::where('id', $request->id)->delete();
        return redirect()->back()->with('msg', $request->name .' '. __('role has been deleted!'));
    }


    /**
     * Add the specified user to role.
     */
    public function attachRoleUser(Request $request)
    {
        # code...

        $request->validate([
            'id' => ['required', 'integer', 'exists:App\Models\RoleNew,id'],
            'user' => ['required', 'array','min:1'],
            'user.*' => ['required', 'integer', 'exists:App\Models\User,id'],
        ]);
        $role = RoleNew::find($request->id);
        $role->users()->attach($request->user);
        return redirect()->back()->with('msg', __('user(s) has been added in role!'));
    }

    /**
     * Remove the specified user to role.
     */
    public function detachRoleUser(Request $request)
    {
        # code...

        $request->validate([
            'id' => ['required', 'integer', 'exists:App\Models\RoleNew,id'],
            'user' => ['required', 'integer', 'exists:App\Models\User,id'],
            'rolename' => ['required'],
            'username' => ['required'],
        ]);
        $role = RoleNew::find($request->id);
        $role->users()->detach($request->user);
        return redirect()->back()->with('msg', $request->username .' '.__('user has been removed from role!'));
    }

    /**
     * Remove the specified user to role.
     */
    public function detachRolePermission(Request $request)
    {
        # code...

        $request->validate([
            'id' => ['required', 'integer', 'exists:App\Models\RoleNew,id'],
            'permission' => ['required', 'integer', 'exists:App\Models\PermissionNew,id'],
            'rolename' => ['required'],
            'permissionname' => ['required'],
        ]);
        $role = RoleNew::find($request->id);
        $role->permissions()->detach($request->permission);
        return redirect()->back()->with('msg', $request->permissionname .' '.__('permission has been removed from role!'));
    }
    /**
     * Add the specified user to role.
     */
    public function attachRolePermission(Request $request)
    {
        # code...

        $request->validate([
            'id' => ['required', 'integer', 'exists:App\Models\RoleNew,id'],
            'permission' => ['required', 'array','min:1'],
            'permission.*' => ['required', 'integer', 'exists:App\Models\PermissionNew,id'],
        ]);
        $role = RoleNew::find($request->id);
        $role->permissions()->attach($request->permission);
        return redirect()->back()->with('msg', __('permission(s) has been added in role!'));
    }
}
