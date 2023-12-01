<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use App\Models\Delivery;
use File;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Facades\LogBatch;

class SettingController extends Controller
{
    public $permission;

    public function __construct()
    {
        $this->permission = "Setting";
    }

    /**
     * Shows the application settings view.
     *
     * @return \Illuminate\View\View
     */
    public function index(){
        $permission = $this->permission;
        $ss = SiteSetting::all();
        $heading = "Setting";

        return view('admin.setting.list', compact('ss','heading','permission'));
    }

    /**
     * Updates existing setting in the database.
     *
     * @param \Illuminate\Http\Request - $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {

        $request->validate([
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $path = null;
        if($request->hasFile('logo')){
            $fileName = $request->logo->getClientOriginalName();
            Storage::disk('site')->delete($fileName);
            $path = Storage::disk('site')->putFileAs('/', $request->logo, $fileName);
        }
        foreach($request->all() as $key => $value){
            if($key != '_token' ){
                if($key == 'logo'){
                    SiteSetting::where('key', $key)->first()?->update(['value' => $path]);
                }
                else{
                    SiteSetting::where('key', $key)->first()?->update(['value' => $value]);
                }
            }
        }

        return redirect()->back()->with(['msg' => __('Settings updated globally!')]);
    }
}
