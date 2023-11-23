<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NotifyRequirementToUploadJob;
use App\Jobs\RequirementSubmittedJob;
use App\Mail\RequirementUserMail;
use App\Models\Attachment;
use App\Models\Certificate;
use App\Models\CertificateRequirement;
use App\Models\CertificateUser;
use App\Models\CertificateUserRequest;
use App\Models\CertificateUserRequirement;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public $permission;

    public function __construct()
    {
        $this->permission = "dashboard";
    }
    public function index() : View
    {
        $permission = $this->permission;
        return view('admin.dashboard.index',compact('permission'));
        $certificates = Certificate::all();
        $userRequests = [];
        // $userRequirements = [];
        // $certificateUsers = [];
        $insert = [];
        $notify = [];
        $certificatesRequirements = [];
        // if(Auth::user()?->role_id == 1){
            $userRequirements = CertificateUserRequirement::with(['certificateRequirement.certificate'])->latest()->get();
            $certificateUsers = CertificateUser::latest()->get();


            $certificatesRequirements = Certificate::with('requirements.userRequirements')->where('status','active')->whereHas('certificateUsers', function($query){
                $query->where('status','accepted');
            })->get();
        // }
        return view('admin.dashboard.index',compact('certificates', 'userRequirements','certificatesRequirements' ,'certificateUsers', 'permission'));
    }

    public function compliance() : View
    {
        $permission = 'compliance';
        $certificatesRequirements = Certificate::with('requirements.userRequirements')->where('status','active')->whereHas('certificateUsers', function($query){
            $query->where('status','accepted');
        })->get();

        $permission = $this->permission;
        $certificateUsers = CertificateUser::where('status','accepted')->get();
        $results = [];
        foreach ($certificatesRequirements as $key => $orignalCertificate) {
            $dateCheck = Carbon::now()->firstOfMonth()->subMonths($orignalCertificate->reverify)->toDateString();
            $requirementIds = [];
            foreach ($orignalCertificate->requirements as $key => $requirement){
                $requirementIds[] = $requirement->id;
            }
            $periodResult = [];
            foreach ($orignalCertificate->certificateUsers as $key => $certificateUser){
                $getFirstEntry = CertificateUserRequirement::whereIn('certificate_requirement_id',$requirementIds)
                ->where('client_id',$certificateUser->user_id)->first();
                $dateFirst = Carbon::now()->toDateString();
                $dateLast = Carbon::now()->toDateString();
                if($getFirstEntry){
                    $dateFirst = Carbon::parse($getFirstEntry->created_at)->firstOfMonth()->toDateString();
                }
                $period = CarbonPeriod::create($dateFirst, "$orignalCertificate->reverify month", $dateLast);
                $datePeriod = [];
                foreach ($period as $dt) {
                    $dateStart = $dt->firstOfMonth()->toDateString();
                    $dateEnd = $dt->addMonths($orignalCertificate->reverify - 1)->lastOfMonth()->toDateString();
                    $datePeriod[] = [$dateStart,$dateEnd];
                }
                rsort($datePeriod);
                $period = $datePeriod[0];
                $total = count($requirementIds) == 0 ? 1 : count($requirementIds);
                $pending = 0;
                $accepted = 0;
                $percentage = 0;
                foreach($requirementIds as $id){
                    $subResult = [];
                    $data = CertificateUserRequirement::where('certificate_requirement_id',$id)
                    ->where('client_id',$certificateUser->user_id)
                    ->whereBetween('created_at', $period)->get();
                    if($data->isNotEmpty()){
                        foreach($data->where('status','!=','rejected') as $d){
                            $subResult[] = $d;
                            if($d->status == 'accepted'){
                                $accepted++;
                            }
                            else if($d->status == 'pending'){
                                $pending++;
                            }
                        }
                    } else {
                        $createModel = CertificateUserRequirement::create([
                            'certificate_requirement_id' => $id,
                            'client_id' => $certificateUser->user_id,
                            'status' => 'pending',
                        ]);
                        $createModel->created_at= $period[0];
                        $createModel->updated_at= $period[0];
                        $createModel->save();
                        $subResult[] = $createModel;
                        $pending++;

                    }
                    // $periodResult[] = $subResult;
                }
                $percentage = round(($accepted * 100) / $total, 2);
                $periodResult[$certificateUser->user->name] = [
                    'total' => $total,
                    'pending' => $pending,
                    'accepted' => $accepted,
                    'percentage' => $percentage,
                ];
            }
            $name = $orignalCertificate->name;
            $certificateType = $orignalCertificate->certificateType->name;
            $reverify = __(CertificateUser::REVERIFY_SELECT[$orignalCertificate->reverify]);

            $html = "
            <span class='text-2xl'>
                $name
            </span>
            <span class=''>
            (
                <span class='text-base font-semibold'>
                $certificateType
                </span>
                /
                <span class='text-xs font-semibold'>
                $reverify
                </span>
            )
            </span>";
            // $name = $orignalCertificate->name . ' ('.$orignalCertificate->certificateType->name.'/'.__(CertificateUser::REVERIFY_SELECT[$orignalCertificate->reverify]).')';
            $results[ $html ] = $periodResult;
        }
        // dd($results);
        return view('admin.compliance.list',compact('certificatesRequirements','permission','results'));



        foreach($certificateUsers as $certificate){
            $orignalCertificate = $certificate->certificate;
            $dateCheck = Carbon::now()->firstOfMonth()->subMonths($orignalCertificate->reverify)->toDateString();
            $requirementIds = [];
            foreach ($certificate->certificate->requirements as $key => $requirement){
                $requirementIds[] = $requirement->id;
            }
            $getFirstEntry = CertificateUserRequirement::whereIn('certificate_requirement_id',$requirementIds)
            ->where('client_id',$certificate->user_id)->first();
            $dateFirst = Carbon::now()->toDateString();
            $dateLast = Carbon::now()->toDateString();
            if($getFirstEntry){
                $dateFirst = Carbon::parse($getFirstEntry->created_at)->firstOfMonth()->toDateString();
            }
            $period = CarbonPeriod::create($dateFirst, "$orignalCertificate->reverify month", $dateLast);
            $datePeriod = [];
            foreach ($period as $dt) {
                $dateStart = $dt->firstOfMonth()->toDateString();
                $dateEnd = $dt->addMonths($orignalCertificate->reverify - 1)->lastOfMonth()->toDateString();
                $datePeriod[] = [$dateStart,$dateEnd];
            }
            rsort($datePeriod);

            foreach($datePeriod as $period){
                $periodResult = [];
                foreach($requirementIds as $id){
                    $subResult = [];
                    $data = CertificateUserRequirement::where('certificate_requirement_id',$id)
                    ->where('client_id',$certificate->user_id)
                    ->whereBetween('created_at', $period)->get();
                    if($data->isNotEmpty()){
                        foreach($data as $d){
                            $subResult[] = $d;
                        }
                    } else {
                        $createModel = CertificateUserRequirement::create([
                            'certificate_requirement_id' => $id,
                            'client_id' => $certificate->user_id,
                            'status' => 'pending',
                        ]);
                        $createModel->created_at= $period[0];
                        $createModel->updated_at= $period[0];
                        $createModel->save();
                        $subResult[] = $createModel;

                    }
                    $periodResult[] = $subResult;
                }
                // $results[Carbon::parse($period[0])->toFormattedDateString(). ' - ' .Carbon::parse($period[1])->toFormattedDateString() ] = $periodResult;
                $results[ $orignalCertificate->name ] = $periodResult;
            }
        }
        $users = User::where('parent_id',Auth::id())->where('status','approved')->get();
        return view('admin.dashboard.certificate-client',compact('certificate','users','results'));

        return view('admin.compliance.list',compact('certificatesRequirements','permission'));
    }

    /**
     * Display the specified resource.
     */
    // public function view(CertificateUser $certificate)
    public function view(Certificate $certificate)
    {
        $html = view('admin.certificate.card', compact('certificate'));
        return $html;
    }

    /**
     * Display the specified resource.
     */
    // public function view(CertificateUser $certificate)
    public function requirementView(CertificateUserRequirement $certificate)
    {
        $html = view('admin.dashboard.requirement', compact('certificate'));
        return $html;
    }

    /**
     * Display the specified resource.
     */
    public function certificateClient(CertificateUser $certificate) : View
    {
            $permission = $this->permission;
            if($certificate->status == 'requested'){
                abort(403,__('Wait for Approval'));
            }
            if($certificate->status == 'rejected'){
                abort(403,__('Request Rejected. Contact with your manager about this!'));
            }
            $history = null;
            $orignalCertificate = $certificate->certificate;
            $dateCheck = Carbon::now()->firstOfMonth()->subMonths($orignalCertificate->reverify)->toDateString();
            $requirementIds = [];
            foreach ($certificate->certificate->requirements as $key => $requirement){
                $requirementIds[] = $requirement->id;
            }
            $getFirstEntry = CertificateUserRequirement::whereIn('certificate_requirement_id',$requirementIds)
            ->where('client_id',$certificate->user_id)->first();
            $dateFirst = Carbon::now()->toDateString();
            $dateLast = Carbon::now()->toDateString();
            if($getFirstEntry){
                $dateFirst = Carbon::parse($getFirstEntry->created_at)->firstOfMonth()->toDateString();
            }
            $period = CarbonPeriod::create($dateFirst, "$orignalCertificate->reverify month", $dateLast);
            $datePeriod = [];
            foreach ($period as $dt) {
                $dateStart = $dt->firstOfMonth()->toDateString();
                $dateEnd = $dt->addMonths($orignalCertificate->reverify - 1)->lastOfMonth()->toDateString();
                $datePeriod[] = [$dateStart,$dateEnd];
            }
            rsort($datePeriod);

            $results = [];
            foreach($datePeriod as $period){
                $periodResult = [];
                foreach($requirementIds as $id){
                    $subResult = [];
                    $data = CertificateUserRequirement::where('certificate_requirement_id',$id)
                    ->where('client_id',$certificate->user_id)
                    ->whereBetween('created_at', $period)->get();
                    if($data->isNotEmpty()){
                        foreach($data as $d){
                            $subResult[] = $d;
                        }
                    } else {
                        $createModel = CertificateUserRequirement::create([
                            'certificate_requirement_id' => $id,
                            'client_id' => $certificate->user_id,
                            'status' => 'pending',
                        ]);
                        $createModel->created_at= $period[0];
                        $createModel->updated_at= $period[0];
                        $createModel->save();
                        $subResult[] = $createModel;

                    }
                    $periodResult[] = $subResult;
                }
                    $results[Carbon::parse($period[0])->toFormattedDateString(). ' - ' .Carbon::parse($period[1])->toFormattedDateString() ] = $periodResult;
            }
            $users = User::where('parent_id',Auth::id())->where('status','approved')->get();
            return view('admin.dashboard.certificate-client',compact('certificate','users','results'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function assignUserToRequirement(Request $request){
        // dd($request->all());
        $request->validate([
            'certificate' => ['required', 'integer', 'exists:App\Models\CertificateRequirement,id'],
            'user' => ['required', 'integer', 'exists:App\Models\User,id'],
        ]);

        $user = User::findOrFail($request->user);
        $certificateRequirement = CertificateRequirement::findOrFail($request->certificate);
        $CertificateUserRequirement = CertificateUserRequirement::where('certificate_requirement_id',$request->certificate)->where('client_id',Auth::id())->latest()->first();
        if($request->notify){
            // $CertificateUserRequirement = CertificateUserRequirement::where('certificate_requirement_id',$request->certificate)->latest()->first();
            if($CertificateUserRequirement->file){
                $CertificateUserRequirement->status = 'rejected';
                $CertificateUserRequirement->update();
                $CertificateUserRequirement = CertificateUserRequirement::create([
                    'certificate_requirement_id' => $request->certificate,
                    'user_id' => $request->user,
                    'client_id' => Auth::id(),
                    'status' => 'pending'
                ]);
            }
            $clientName = $user?->parent?->name;
            $certificateRequirementName = $certificateRequirement->name;
            $emailData = [
                "subject" => "$clientName requested you to upload $certificateRequirementName",
                "userEmail" => $user?->email,
                "userName" => $user?->name,
                "parentName" => $user?->parent?->name,
                "certificateRequirementName" => $certificateRequirementName
            ];
            NotifyRequirementToUploadJob::dispatch($emailData);
            return redirect()->back()->with(['msg'=>__('Notification sent. User will be notify via email shortly')]);
        }
        $check = CertificateUserRequirement::where([
            // 'user_id' => $request->user,
            'certificate_requirement_id' => $request->certificate,
            'client_id' => Auth::id(),
        ])->latest()->first();

        if($check && $check->user_id == $request->user){
            return redirect()->back()->withInput()->withErrors(['user'=>__('Cannot reassign the same user again!')]);
        }
        if($CertificateUserRequirement){
            $CertificateUserRequirement->user_id = $request->user;
            $CertificateUserRequirement->status = 'pending';
            $CertificateUserRequirement->update();
        }
        else {
            $CertificateUserRequirement = CertificateUserRequirement::create([
                'certificate_requirement_id' => $request->certificate,
                'user_id' => $request->user,
                'client_id' => Auth::id(),
                'status' => 'pending'
            ]);
        }
        // $CertificateUserRequirement = CertificateUserRequirement::updateOrCreate([
        //     'certificate_requirement_id' => $request->certificate,],
        //     [
        //     'user_id' => $request->user,
        //     'status' => 'pending'
        // ]);
        $clientName = $user?->parent?->name;
        $certificateRequirementName = $certificateRequirement->name;
        $emailData = [
            "subject" => "$clientName requested you to upload $certificateRequirementName",
            "userEmail" => $user?->email,
            "userName" => $user?->name,
            "parentName" => $user?->parent?->name,
            "certificateRequirementName" => $certificateRequirementName
        ];
        NotifyRequirementToUploadJob::dispatch($emailData);
        return redirect()->back()->with(['msg'=>__('New user assign successfully. User will be notify via email shortly')]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function uploadUserRequirement(Request $request){

        $request->validate([
            'certificate' => ['required', 'integer', 'exists:App\Models\CertificateUserRequirement,id'],
        ]);
        $check = CertificateUserRequirement::where('id',$request->certificate)->first();
        $path = null;
        $checkbox = null;
        if($check->certificateRequirement->type == 'file'){
            $request->validate([
                'requirement' => ['required', 'file','max:5120','mimes:doc,docx,pdf,ppt,pptx,rtf,txt,xls,xlsx,jpg,jpeg,png,mp4',]
                ],[
                    'requirement.mimes' => __('you have uploaded an invalid file'),
                ]
            );
            $requirement = $request['requirement'];

            $path ='/certificate-requirements/';
            // $path ='/certificate-requirements/'.$requirement;
            $fileName = $request->requirement->getClientOriginalName();
            Storage::disk('public')->delete($path.$fileName);
            $path = Storage::disk('public')->putFileAs($path, $request->requirement, $fileName);
        }
        elseif($check->certificateRequirement->type == 'checkbox'){
            $request->validate([
                'checkbox' => ['required']
            ]);
            $checkbox = $request->checkbox ? 'true' : 'false';
        }
        else {
            $request->validate([
                'checkbox' => ['required'],
                'requirement' => ['required', 'file','max:5120','mimes:doc,docx,pdf,ppt,pptx,rtf,txt,xls,xlsx,jpg,jpeg,png,mp4',]
                ],[
                    'requirement.mimes' => __('you have uploaded an invalid file'),
                ]
            );
            $requirement = $request['requirement'];

            $path ='/certificate-requirements/';
            // $path ='/certificate-requirements/'.$requirement;
            $fileName = $request->requirement->getClientOriginalName();
            Storage::disk('public')->delete($path.$fileName);
            $path = Storage::disk('public')->putFileAs($path, $request->requirement, $fileName);
            $checkbox = $request->checkbox ? 'true' : 'false';
        }


        CertificateUserRequirement::where('id',$request->certificate)->update([
            'file' => $path,
            'checkbox' => $checkbox,
            'status' => 'uploaded'
        ]);
        $userName = auth()->user()?->name;
        $clientName = $check->client?->name;
        $certificateRequirementName = $check->certificateRequirement->name;
        $emailData = [
            "subject" => "$userName submit the $certificateRequirementName requirement.",
            "clientEmail" => $check->client?->email,
            "userName" => $userName,
            "clientName" => $clientName,
            "certificateRequirementName" => $certificateRequirementName
        ];
        RequirementSubmittedJob::dispatch($emailData);
        return redirect()->back()->with(['msg'=>__('Requirements uploaded successfully!')]);
    }

    /**
     * Update the status requirement file/image uploaded by user .
     */
    public function uploadUserRequirementStatusChange(Request $request){
        $request->validate([
            'certificate' => ['required', 'integer', 'exists:App\Models\CertificateUserRequirement,id'],
            'status' => ['required', 'in:accepted,rejected'],
            'note' => ['string']
        ]);
        CertificateUserRequirement::where('id',$request->certificate)->update([
            'status' => $request->status,
            'note' => $request->note
        ]);
        return redirect()->back()->with(['msg'=>__('Requirements uploaded successfully!')]);

    }



    /**
     * Store a newly created resource in storage.
     */
    public function certificateClientRequestStore(Request $request){

        $request->validate([
            'certificate' => ['required', 'integer', 'exists:App\Models\Certificate,id'],
        ]);

        $check = CertificateUser::where([
            'user_id' => Auth::id(),
            'certificate_id' => $request->certificate,
        ])->latest()->first();
        // ])->whereIn('status',['requested'])->latest()->first();

        if($check){
            if($check->status == 'requested'){
                return redirect()->back()->withInput()->withErrors(['certificate'=>__('You have already requested this certificate, kindly wait for approval.')]);
            }
            else if($check->status == 'accepted'){
                return redirect()->back()->withInput()->withErrors(['certificate'=>__("Your request is already accepted. Kindly check 'All Approved Certificates' below.")]);
            }
            else if($check->status == 'rejected'){
                return redirect()->back()->withInput()->withErrors(['certificate'=>__('Your request is rejected. Kindly contact your manager for further details.')]);
            }
        }
        CertificateUser::create([
            'user_id' => Auth::id(),
            'certificate_id' => $request->certificate,
            'status' => 'requested'
        ]);
        return redirect()->back()->with(['msg'=>__('Certificate updated successfully!')]);
    }

    /**
     * Display the specified resource.
     */
    public function certificateRequest(CertificateUser $certificate) : View
    {
        $permission = $this->permission;
        if($certificate->status == 'requested'){
            abort(403,__('Wait for Approval'));
        }
        if($certificate->status == 'rejected'){
            abort(403,__('Request Rejected. Contact with your client about this!'));
        }
        if($certificate->user_id != Auth::id()){
            abort(403,__('Unauthorize page'));
        }

        $check = CertificateUserRequest::where([
            'user_id' => Auth::id(),
            'certificate_user_id' => $certificate->id,
        ])->whereIn('status',['requested','accepted','deleted'])->latest()->first();
        if($check){
            if($check->status == 'requested'){
                abort(403,__("Already submitted. If you wan't to resubmit kindly check history and then do retry from there"));
            }
            if($check->status == 'rejected'){
                abort(403,__("Your submission is rejected. Kindly ask your client for help"));
            }
            // if($check->status == 'deleted'){
            //     $time = Carbon::parse($check->updated_at)->toDayDateTimeString();
            //     abort(403,__('Request Deleted. This action was performed by you at '.$time));
            // }
        }
        $heading = 'Certificate Request';
        return view('admin.dashboard.certificate-request',compact('certificate','heading','permission'));
    }

    /**
     * Display the specified resource.
     */
    public function certificateRequestSubmitted(CertificateUserRequest $certificate) : View
    {
        // if($certificate->status == 'requested'){
        //     abort(401,__('Wait for Approval'));
        // }
        // if($certificate->status == 'rejected'){
        //     abort(401,__('Request Rejected. Contact with your client about this!'));

        // }
        if(Auth::user()?->roles->first()->id != 1){
            if($certificate->user_id != Auth::id()){
                abort(401,__('Unauthorize page'));
            }
        }

        $heading = 'Certificate Request submitted';
        return view('admin.dashboard.certificate-request-view',compact('certificate','heading'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function certificateRequestStore(Request $request)
    {

        $request->validate([
            'id' => "required","exists:App\Models\CertificateUser,id",
            "requirements" => "required","array",
        ]);
        $certificateUser = CertificateUser::findOrFail($request->id);
        $cur = CertificateUserRequest::create([
            'requirements' => $certificateUser->certificate->requirements,
            'user_id' => Auth::id(),
            'certificate_user_id' => $certificateUser->id,
        ]);
        $attachments = [];
        foreach($request->requirements as $attachment){
            $remove = "certificate-requests/$certificateUser->id/";
            $name = str_replace($remove,'',$attachment);
            $attachments[] = [
                'name' => $name,
                'file' => $attachment,
                'certificate_user_request_id' => $cur->id,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        Attachment::insert($attachments);

        return redirect()->route('dashboard')->with(['msg'=>__('Certificate created successfully!')]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function certificateRequestRetry(Request $request)
    // public function certificateRequestRetry(CertificateUserRequest $certificate)
    {

        $request->validate([
            'certificate' => "required","exists:App\Models\CertificateUserRequest,id",
            'status' => ['required', 'in:requested,accepted,rejected,deleted'],
        ]);

        $certificate = CertificateUserRequest::findOrFail($request->certificate);

        if(Auth::user()?->roles->first()->id != 1){
            if($certificate->user_id != Auth::id()){
                abort(401,"Unauthorize page");
            }
        }
        $certificate->status = $request->status;
        $certificate->update();

        return redirect()->route('dashboard');
        // return redirect()->route('admin.dashboard.certificate-request',['certificate' => $certificate->certificateUser->id]);
    }

    /**
     * Store file in storage
     */
    public function fileUpload(Request $request)
    {
        $validated = $request->validate([
            'certificate-request' => 'required',
            'file' => 'file|max:5120|mimes:doc,docx,pdf,ppt,pptx,rtf,txt,xls,xlsx,jpg,jpeg,png,mp4',
            ],[
                'file.mimes' => 'you have uploaded an invalid file',
            ]);
        if($request->file)
        {
            $certificateRequest = $request['certificate-request'];

            $path ='/certificate-requests/'.$certificateRequest;
            $fileName = $request->file->getClientOriginalName();
            Storage::disk('public')->delete($path.$fileName);
            $path = Storage::disk('public')->putFileAs($path, $request->file, $fileName);

            // $file = Storage::putFile('public/certificate-requests/'.$certificateRequest, $request->file);
            // $path = str_replace("public/", "", $file);
        }
        return response()->json([ 'success' => true, 'url' => asset(Storage::url($path)), 'path' => $path]);
    }

    /**
     * Remove file from storage
     */
    public function fileRemove(Request $request)
    {
        $name = $request->name;
        if(!$name){
            return response()->json([ 'success' => true ]);

        }
        if(Storage::disk('public')->exists($name)){
            Storage::disk('public')->delete($name);

            return response()->json([ 'success' => true, 'name' => $name ]);
        }else{
            return response()->json([ 'success' => false, 'name' => $name ],422);
        }
    }

}
