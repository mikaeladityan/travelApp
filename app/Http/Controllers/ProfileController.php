<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\LogActivity;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

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
        $request->user()->fill($request->validated());


        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }
        // Save or update data
        $request->user()->save();

        $user = User::findOrFail(Auth::user()->id);

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'required|image|max:1024|mimes:jpg,jpeg,png',
            ]);
            // delete image
            if ($request->input('oldPhoto') != null) {
                Storage::disk('public')->delete($user->photo);
            }

            $filePath = Storage::disk('public')->put('user', request()->file('photo'), 'public');
            $validated['photo'] = $filePath;
            $user->update($validated);
        }




        // Create log activity
        LogActivity::create([
            "users" => Auth::user()->username,
            "ip_address" => $request->ip(),
            "url" => $request->url(),
            "status" => "success",
            "message" => "Update Profile"
        ]);

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
