<?php

namespace App\Http\Controllers\SuperAdmin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\SuperAdmin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $canRegisterSuperadmin = SuperAdmin::count() === 0;

        return view('superadmin.auth.login', compact('canRegisterSuperadmin'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        if (SuperAdmin::count() === 0) {
            return redirect()->route('s.register')->with('error', __('Superadmin account not found. Please register first.'));
        }

        $request->authenticate('superadmin');

        $request->session()->regenerate();

        return redirect()->intended(route('s.dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('superadmin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('s.login', absolute: false));
    }
}
