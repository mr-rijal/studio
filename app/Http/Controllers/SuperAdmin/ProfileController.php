<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('superadmin.profile.edit', [
            'user' => $request->user('superadmin'),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user('superadmin')->fill($request->validated());

        if ($request->user('superadmin')->isDirty('email')) {
            $request->user('superadmin')->email_verified_at = null;
        }

        $request->user('superadmin')->save();

        return Redirect::route('s.profile.edit', absolute: false)->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password:superadmin'],
        ]);

        $user = $request->user('superadmin');

        Auth::guard('superadmin')->logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to(route('s.login', absolute: false));
    }
}
