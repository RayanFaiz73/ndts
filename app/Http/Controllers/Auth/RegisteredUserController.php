<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\VerifyEmailJob;
use App\Models\Certificate;
use App\Models\CertificateUser;
use App\Models\Role;
use App\Models\RoleNew;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create()
    {
        // $certificates = Certificate::where('status','active')->pluck('name','id');
        // $data = [];
        // foreach($certificates as $key => $certificate){
        //     $data[] = [
        //         'value' => "$key",
        //         // 'title'  => $certificate
        //     ];
        // }
        // $certificates = json_encode($data);
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //         'role' =>['required','in:client,user']
    //     ]);
    //     $tags = [];
    //     // $role_id = 3;
    //     $role_id = 4;
    //     // if($request->role == 'user'){
    //     if($request->role == 'client'){
    //         // $role_id = 4;
    //         $role_id = 3;
    //         $certificates = $request->certificates;
    //         $certificates = json_decode($certificates);
    //         if(empty($certificates)){
    //             return redirect()->back()->withInput()->withErrors(['certificates' => __('At least 1 certificate selection is required!')]);
    //         }
    //         $existingCertificates = Certificate::where('status','active')->pluck('id','name')->toArray();
    //         foreach($certificates as $certificate){
    //             if(isset($existingCertificates[$certificate->value])){
    //                 $tags[] = $existingCertificates[$certificate->value];
    //             }
    //         }
    //         if(empty($tags)){
    //             return redirect()->back()->withInput()->withErrors(['certificates' => __('Invalid certificates!')]);
    //         }
    //     }

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         // 'role_id' => $role_id,
    //         'status' => 'pending',
    //     ]);
    //     $role = RoleNew::find($role_id);
    //     $role->users()->attach($user);
    //     // if($role_id == 4){
    //     if($role_id == 3){
    //         $certificate_user_data = [];
    //         foreach($tags as $tag){
    //             $certificate_user_data[] = [
    //                 'user_id' => $user->id,
    //                 'certificate_id' => $tag,
    //                 'created_at' => now(),
    //                 'updated_at' => now()
    //             ];
    //         }
    //         CertificateUser::insert($certificate_user_data);
    //     }
    //     VerifyEmailJob::dispatch($user);

    //     // Auth::login($user);

    //     // return redirect(RouteServiceProvider::HOME);

    //     return redirect()->back()->with(['msg' => __('Registered successfully. Verification email sent to registered email address.')]);
    // }
     public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
