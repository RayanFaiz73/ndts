<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\NotifyRequirementToUploadJob;
use App\Jobs\RequirementSubmittedJob;
use App\Mail\RequirementUserMail;
use App\Models\Attachment;
use App\Models\User;
use App\Models\State;
use App\Models\Diagnoses;
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
        $states = State::where('country_id', 166)->get();
        $diseases = Diagnoses::all();
        return view('admin.dashboard.index',compact('permission','states','diseases'));
    }


}






