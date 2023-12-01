<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()?->fill($request->validated());

        if ($request->user()?->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        if($request->image){
            $path = 'profile/';
            Storage::makeDirectory('public/'.$path);
            $storagePath = Storage::path('public/'.$path);
            chmod($storagePath, 0755);
            $fileName = $path.Str::random(20).time().'.'.$request->image->extension();
            Storage::disk('public')->delete($fileName);
            $img = Image::make($request->image)->crop(intval($request->widthImage), intval($request->heightImage), intval($request->xImage), intval($request->yImage))
            ->save(Storage::path('public/').$fileName);
            $request->user()->avatar = $fileName;
            // chmod(Storage::disk('public')->path('/').$path, 644);
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
