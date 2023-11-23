<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CertificateType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CertificateTypeController extends Controller
{
    public $permission;

    public function __construct()
    {
        $this->permission = "certificate-type";
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permission = $this->permission;
        $heading = 'Certificate Type';
        $certificateTypes = CertificateType::all();
        return view('admin.certificate-type.list', compact('certificateTypes','heading','permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string',  'max:255', 'unique:certificate_types'],
            'status' => ['required', 'in:active,inactive'],
        ]);

        CertificateType::create(
            [
                'name' => $request->name,
                'status' => $request->status,
            ]
        );
        return redirect()->back()->with('msg',__('Certificate type created successfully'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => ['required', 'integer'],
            'name' => ['required', 'string', 'max:255', Rule::unique('certificate_types')->ignore($request->id),],
            'status' => ['required', 'in:active,inactive'],
        ]);


        CertificateType::where('id',$request->id)->update(
            [
                'name' => $request->name,
                'status' => $request->status,
            ]
        );
        return redirect()->back()->with(['msg'=>__('Certificate type updated successfully!')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'id' => ['required'],
            'name' => ['required'],
        ]);
        $check = CertificateType::where('id', $request->id)->first();
        if($check && $check->certificates->count()){
            return redirect()->back()->withInput()->withErrors(['warning' => __('This certificate type is already associated with some certificate(s).'), 'msg' => __('Kindly change their type first before deleting this type.')]);

        }
        CertificateType::where('id', $request->id)->delete();

        return redirect()->route('admin.permissions')->with(['success' => __('Certificate Type has been deleted!')]);
    }
}
