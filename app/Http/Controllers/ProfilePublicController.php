<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilePublicController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile.public.edit', compact('user'));
    }

    public function update(UpdateProfileRequest $request)
    {

        $validated = $request->validated();

        if ($request->hasFile('profile_photo')) {
            try {
                $path = $request->file('profile_photo')->store('profile_photos', 'public');
                $validated['profile_photo'] = $path;
            } catch (\Exception $e) {
                report($e);
                return back()->with('error', 'Unable to store image');
            }
        }
        // dd('UpdateProfileRequest', $validated);

        try {
            $user = Auth::user();
            $user->profile()->update($validated);
        } catch (\Exception $e) {
            report($e);
            return back()->with('error', 'Unable to update profile');
        }

        return redirect()->route('profile.public.edit')->with('status', 'profile-updated');
    }
}
