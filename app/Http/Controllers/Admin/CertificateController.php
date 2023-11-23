<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NotifyRequirementChangeJob;
use App\Models\Certificate;
use App\Models\CertificateType;
use App\Models\CertificateUser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use App\Mail\CertificateCreated;
use App\Mail\CertificateRequirementChangeMail;
use App\Models\CertificateRequirement;
use Illuminate\Support\Facades\Mail;

class CertificateController extends Controller
{
    public $permission;

    public function __construct()
    {
        $this->permission = "certificate";
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permission = $this->permission;
        $heading = "Certificate";
        $certificates = Certificate::all();
        return view('admin.certificate.list',compact('certificates','heading','permission'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permission = $this->permission;
        $heading = "Certificate";
        $certificateTypes = CertificateType::all();
        return view('admin.certificate.create',compact('certificateTypes','heading','permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:'.Certificate::class],
            'certificate_type_id' => ['required', 'integer'],
            'status' => ['required', 'in:active,inactive'],
            // 'reverify' => ['required', 'in:monthly,quarterly,half yearly,yearly'],
            'reverify' => ['required', 'in:1,2,3,6,12'],
            'type' => ['required', 'array', 'in:file,checkbox,both'],
            'requirement' => ['required', 'array'],
        ]);

        $certificate = Certificate::create([
            'name'=>$request->name,
            'certificate_type_id'=>$request->certificate_type_id,
            'status'=>$request->status,
            'reverify'=>$request->reverify,
            // 'requirements'=>$request->requirements,
        ]);
        $requirements =[];
        $types =$request->type;
        foreach($request->requirement as $key => $requirement){
            $requirements[] = [
                'name' => $requirement,
                'certificate_id' => $certificate->id,
                'type' => $types[$key],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        CertificateRequirement::insert($requirements);
        return redirect()->back()->with(['msg'=>__('Certificate created successfully!')]);
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
    public function edit(Request $request, Certificate $certificate): View
    {
        $permission = $this->permission;
        $heading = "Certificate";
        $certificateTypes = CertificateType::all();
        return view('admin.certificate.edit',compact('certificate','certificateTypes','heading','permission'));
    }


    /**
     * Handle an incoming update user request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request): RedirectResponse
    {
        // return redirect()->back()->withInput()->withErrors(['requirement'=>'At least 1 requirement is required']);
        $request->validate([
            'id' => ['required', 'integer', 'exists:App\Models\Certificate,id'],
            'name' => ['required', 'string', 'max:255', Rule::unique(Certificate::class)->ignore($request->id)],
            'certificate_type_id' => ['required', 'integer'],
            'status' => ['required', 'in:active,inactive'],
            // 'reverify' => ['required', 'in:monthly,quarterly,half yearly,yearly'],
            'reverify' => ['required', 'in:1,2,3,6,12'],
            'type_old' => ['nullable', 'array'],
            "type_old.*"  => ['nullable', 'in:file,checkbox,both'],
            'requirement_old' => ['array'],
            'type' => ['nullable', 'array'],
            "type.*"  => ['nullable', 'in:file,checkbox,both'],
            'requirement' => ['array'],
        ]);
        $requirement_available = false;
        if(isset($request->requirement_old)){
            if(!empty(current($request->requirement_old))){
                $requirement_available = true;
            }
        }

        if(isset($request->requirement)){
            if(!empty(current($request->requirement))){
                $requirement_available = true;
            }
        }
        if(!$requirement_available){
            return redirect()->back()->withInput()->withErrors(['requirement'=>__('At least 1 requirement is required')]);
        }
        // dd($request->all());
        $certificate = Certificate::findOrFail($request->id);
        $certificate->update([
            'name'=>$request->name,
            'certificate_type_id'=>$request->certificate_type_id,
            'status'=>$request->status,
            'reverify'=>$request->reverify,
            // 'requirements'=>$request->requirements,
        ]);
        $not_to_remove = [];
        $type_old = $request->type_old;
        if(!empty($request->requirement_old))
        {
            foreach($request->requirement_old as $old_key => $old_requirement){
                if($old_requirement){
                    $not_to_remove[] = $old_key;
                    $certificate_requirement = CertificateRequirement::findOrFail($old_key);
                    // dd($certificate_requirement);
                    // if($certificate_requirement->name != $old_requirement){
                        $certificate_requirement->name = $old_requirement;
                        $certificate_requirement->type = $type_old[$old_key];
                        $certificate_requirement->update();
                    // }
                }
            }
        }
        CertificateRequirement::whereNotIn('id',$not_to_remove)->where('certificate_id',$certificate->id)->delete();
        $requirements =[];
        $type = $request->type;
        if(!empty($request->requirement))
        {
            foreach($request->requirement as $key => $requirement){
                if($requirement){
                    $requirements[] = [
                        'name' => $requirement,
                        'type' => $type[$key],
                        'certificate_id' => $certificate->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
            }
        }
        CertificateRequirement::insert($requirements);

        if($request->notify){
            $certificateUsers = CertificateUser::with('user')->where('status','accepted')->where('certificate_id',$request->id)->get();
            foreach($certificateUsers as $certificateUser){

                NotifyRequirementChangeJob::dispatch($certificateUser);
                // Mail::to($certificateUser->user?->email)->send(new CertificateRequirementChangeMail('Certificate Updated',$certificateUser));
            }
        }
        return redirect()->back()->with(['msg'=>__('Certificate updated successfully!')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
