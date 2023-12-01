<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Role;
use App\Models\Permission;
use Auth;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class PermissionController extends Controller
{
    public $permission;

    public function __construct()
    {
        $this->permission = "Permission";
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permission = $this->permission;
        $heading = 'Permission';
        $roles = Role::all();
        return view('admin.permission.list', compact('roles','heading','permission'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission = $this->permission;
        $heading = 'Permission';
        $menus = Menu::where('status', 'active')->get();

        $categories = Menu::whereNull('menu_id')
            ->with('childrenMenus')
            ->get();
        return view('admin.permission.create', compact('menus','heading','categories','permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string',  'max:255', 'unique:roles'],
        ]);
        $menus = $request->menus;
        // $parent_id = $request->parent_id;
        $role = Role::create([
            'name' => $request->name,
            // 'parent_id' => $request->parent_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        if ($role) {
            $permissions=[];
            foreach ($menus as $menu) {
                if (!isset($menu['permissions']['create'])) {
                    $create = 0;
                } else {
                    $create = $menu['permissions']['create'];
                }
                if (!isset($menu['permissions']['read'])) {
                    $read = 0;
                } else {
                    $read = $menu['permissions']['read'];
                }
                if (!isset($menu['permissions']['update'])) {
                    $update = 0;
                } else {
                    $update = $menu['permissions']['update'];
                }
                if (!isset($menu['permissions']['delete'])) {
                    $delete = 0;
                } else {
                    $delete = $menu['permissions']['delete'];
                }
                $permissions[] = [
                    'menu_id' => $menu['menu_id'],
                    'create' =>  $create,
                    'read' =>  $read,
                    'update' =>  $update,
                    'delete' =>  $delete,
                    'role_id' =>  $role->id,
                    'created_at' =>now(),
                    'updated_at' =>now(),
                ];
                // $role_permission_id = Permission::create([
                //     'menu_id' => $menu['menu_id'],
                //     'create' =>  $create,
                //     'read' =>  $read,
                //     'update' =>  $update,
                //     'delete' =>  $delete,
                //     'role_id' =>  $role->id
                // ]);
            }
            // dd($permissions);
            Permission::insert($permissions);
            // dd($request->all());
            return redirect()->back()->with('msg', __('Role has been created!'));
        } else {
            // dd($request->all());
            return redirect()->back()->with('error', __('Role not created!'));
        }
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
    public function edit(Role $role)
    {
        $permission = $this->permission;
        $heading = 'Permission';
        $menus = Menu::where('status', 'active')->get();
        // $role = Role::where('id', $id)->first();
        return view('admin.permission.edit', compact('role', 'menus', 'heading','permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $request->validate([
            'role_id' => 'required',
            'name' => ['required', 'string', 'max:255', Rule::unique('roles')->ignore($request->role_id),],
        ]);
        $role = Role::where('id', $request->role_id)->update([
            'name' => $request->name,
            'updated_at' => now()
        ]);
        $menus = $request->menus;
        Permission::where('role_id', $request->role_id)->delete();
        $permissions=[];
        foreach ($menus as $menu) {
            if (!isset($menu['permissions']['create'])) {
                $create = 0;
            } else {
                $create = $menu['permissions']['create'];
            }
            if (!isset($menu['permissions']['read'])) {
                $read = 0;
            } else {
                $read = $menu['permissions']['read'];
            }
            if (!isset($menu['permissions']['update'])) {
                $update = 0;
            } else {
                $update = $menu['permissions']['update'];
            }
            if (!isset($menu['permissions']['delete'])) {
                $delete = 0;
            } else {
                $delete = $menu['permissions']['delete'];
            }
            $permissions[] = [
                'menu_id' => $menu['menu_id'],
                'create' =>  $create,
                'read' =>  $read,
                'update' =>  $update,
                'delete' =>  $delete,
                'role_id' =>  $request->role_id,
                'created_at' =>now(),
                'updated_at' =>now(),
            ];
            // $role_permission_id = Permission::create([
            //     'role_id' =>  $request->role_id,
            //     'menu_id' =>  $menu['menu_id'],
            //     'create' =>  $create,
            //     'read' =>  $read,
            //     'update' =>  $update,
            //     'delete' =>  $delete
            // ]);
        }
        Permission::insert($permissions);
        return redirect()->back()->with('msg', __('Role has been updated!'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        # code...

        $request->validate([
            'id' => ['required'],
            'name' => ['required'],
        ]);
        $check = Role::where('id', $request->id)->first();
        if($check && $check->users->count()){
            return redirect()->back()->withInput()->withErrors(['warning' => __('This role is already associated with some user(s).'),'msg' => __('Kindly change their role first before deleting this role')]);

        }
        Role::where('id', $request->id)->delete();
        Permission::where('role_id', $request->id)->delete();

        return redirect()->route('admin.permission.index')->with(['success' => __('Permission has been deleted!')]);
    }
}
