<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Mail\SendLoginOtpMail;
use App\Models\LoginOtp;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Validate credentials without logging in
        $request->ensureIsNotRateLimited();

        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            RateLimiter::hit($request->throttleKey());

            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        // Clear rate limiter on successful validation
        RateLimiter::clear($request->throttleKey());

        // Make sure user is NOT logged in at this point (in case they were logged in)
        // Only logout if they're actually authenticated, but don't invalidate session
        // as we need it to store the OTP verification data
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        // Generate OTP
        $otpCode = LoginOtp::generateCode();

        // Create and save OTP
        LoginOtp::create([
            'user_id' => $user->id,
            'otp_code' => $otpCode,
            'expires_at' => now()->addMinutes(10),
            'ip_address' => $request->ip(),
        ]);

        // Send OTP email
        Mail::to($user->email)->send(new SendLoginOtpMail($user, $otpCode));

        // Store user ID and remember flag in session for OTP verification
        $request->session()->put('login.user_id', $user->id);
        $request->session()->put('login.remember', $request->boolean('remember'));

        return redirect()->route('verify-otp')->with('success', 'A verification code has been sent to your email.');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
