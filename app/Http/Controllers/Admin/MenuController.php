<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Menu;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Route;

class MenuController extends Controller
{
    public $permission;

    public function __construct()
    {
        $this->permission = "Menu";
    }

    public function index()
    {
        $permission = $this->permission;
        $heading = 'Menu';
        $menus = Menu::all();
        $routes = Route::getRoutes()->getRoutesByMethod();
        $routes = $routes['GET'];
        return view('admin.menu.list', compact('menus','heading','routes','permission'));
    }

    public function store(Request $request)
    {
        # code...

        $request->validate([
            'name' => ['required', 'string',  'max:255', 'unique:menus'],
            'status' => ['required', 'in:active,inactive'],
        ]);
        // $menu = Menu::create(
        //     [
        //         'name' => $request->name,
        //         'slug' => Str::slug($request->name).'-read',
        //         'route_name' => $request->route_name,
        //         'icon' => $request->icon,
        //         'menu_id' => $request->menu_id ?? null,
        //         'status' => $request->status,
        //     ]
        // );
        // return redirect()->back()->with(['msg' =>__('Menu added successfully!')]);

        $name = $request->name;
        $route_name = $request->route_name ?? null;

        if(preg_match('/[^a-z A-Z]+/i', $name))
        {
            return redirect()->back()->withInput()->withErrors(['error'=>'Invalid charaters in Menu name']);
        }
        if($request->route_name && !Route::has($request->route_name)) {
            return redirect()->back()->withInput()->withErrors(['error'=>'Invalid route name']);
        }
        $slugName = str_replace(' ', '', $name);
        $policyName = $slugName.'Policy.php';
        $content = PolicyContent($slugName,$name);
        $fp = fopen(app_path()."/Policies/".$policyName,"w");
        fwrite($fp,$content);
        fclose($fp);
        chmod(app_path()."/Policies/".$policyName, 0644);
        $menu = Menu::create(
            [
                'name' => $name,
                // 'slug' => Str::slug($name),
                'slug' =>   $slugName,
                'route_name' => $route_name,
                'icon' => $request->icon,
                'menu_id' => $request->menu_id ?? null,
                'status' => $request->status,
            ]
        );
        $roles = Role::all();
        foreach ($roles as $key => $role) {
            Permission::create([
                'role_id' =>  $role->id,
                'menu_id' =>  $menu->id,
                'create' =>  0,
                'read' =>  0,
                'update' =>  0,
                'delete' =>  0
            ]);
        }
        return redirect()->back()->with(['msg'=>'Menu added successfully and read permission allowed to all roles by default','name'=>$name]);
    }
    public function update(Request $request)
    {
        # code...
        $request->validate([
            'id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255', Rule::unique('menus')->ignore($request->id),],
            'status' => ['required', 'in:active,inactive'],
        ]);
        // Menu::where('id',$request->id)->update([
        //     'name' => $request->name,
        //     'slug' => Str::slug($request->name).'-read',
        //     'route_name' => $request->route_name ?? null,
        //     'icon' => $request->icon,
        //     'menu_id' => $request->menu_id ?? null,
        //     'status' => $request->status,
        // ]);

        $name = $request->name;
        $route_name = $request->route_name ?? null;
        $deleted = false;
        if(preg_match('/[^a-z A-Z]+/i', $name))
        {
            return redirect()->back()->withInput()->withErrors(['error'=>'Invalid charaters in Menu name']);
        }
        $menu = Menu::where('id',$request->id)->first();

        $oldPolicyName = $menu->slug.'Policy.php';
        $fp = app_path()."/Policies/".$oldPolicyName;
        //If the file exists and is writeable
        if(is_writable($fp)){
            //Delete the file
            $deleted = unlink($fp);
        }
        if($deleted)
        {

        $slugName = str_replace(' ', '', $name);
        $policyName = $slugName.'Policy.php';
        $content = PolicyContent($slugName,$name);
        $fp = fopen(app_path()."/Policies/".$policyName,"w");
        fwrite($fp,$content);
        fclose($fp);
        chmod(app_path()."/Policies/".$policyName, 0644);

        $check = Menu::where('id',$request->id)->update([
                    'name' => $request->name,
                    'slug' => $slugName,
                    // 'slug' => Str::slug($name),
                    'route_name' => $route_name,
                    'icon' => $request->icon,
                    'menu_id' => $request->menu_id ?? null,
                    'status' => $request->status,
                ]);
        }
        return redirect()->back()->with(['msg'=>__('Menu updated successfully!')]);
    }
}
