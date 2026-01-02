<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\LoginOtp;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class VerifyLoginOtpController extends Controller
{
    /**
     * Display the OTP verification form.
     */
    public function create(Request $request): View|RedirectResponse
    {
        $userId = $request->session()->get('login.user_id');

        if (! $userId) {
            return redirect()->route('login')->with('error', __('Please log in first.'));
        }

        $user = User::find($userId);

        if (! $user) {
            $request->session()->forget('login.user_id');
            return redirect()->route('login')->with('error', __('User not found.'));
        }

        return view('auth.verify-otp', [
            'email' => $user->email,
        ]);
    }

    /**
     * Handle OTP verification.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'otp_code' => ['required', 'string', 'size:6'],
        ]);

        $userId = $request->session()->get('login.user_id');

        if (! $userId) {
            return redirect()->route('login')->with('error', __('Session expired. Please log in again.'));
        }

        $user = User::find($userId);

        if (! $user) {
            $request->session()->forget('login.user_id');
            return redirect()->route('login')->with('error', __('User not found.'));
        }

        // Find a valid OTP for this user
        $loginOtp = LoginOtp::where('user_id', $user->id)
            ->where('otp_code', $request->otp_code)
            ->whereNull('used_at')
            ->where('expires_at', '>', now())
            ->latest()
            ->first();

        if (! $loginOtp || ! $loginOtp->isValid()) {
            throw ValidationException::withMessages([
                'otp_code' => __('The verification code is invalid or has expired.'),
            ]);
        }

        // Mark OTP as used
        $loginOtp->markAsUsed();

        // Clear the session
        $request->session()->forget('login.user_id');

        // Log the user in
        Auth::guard('web')->login($user, $request->session()->get('login.remember', false));
        $request->session()->forget('login.remember');
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Resend OTP code.
     */
    public function resend(Request $request): RedirectResponse
    {
        $userId = $request->session()->get('login.user_id');

        if (! $userId) {
            return redirect()->route('login')->with('error', __('Session expired. Please log in again.'));
        }

        $user = User::find($userId);

        if (! $user) {
            $request->session()->forget('login.user_id');
            return redirect()->route('login')->with('error', __('User not found.'));
        }

        // Generate new OTP
        $otpCode = LoginOtp::generateCode();

        LoginOtp::create([
            'user_id' => $user->id,
            'otp_code' => $otpCode,
            'expires_at' => now()->addMinutes(10),
            'ip_address' => $request->ip(),
        ]);

        // Send OTP email
        \Illuminate\Support\Facades\Mail::to($user->email)->send(
            new \App\Mail\SendLoginOtpMail($user, $otpCode)
        );

        return redirect()->route('verify-otp')->with('success', __('A new verification code has been sent to your email.'));
    }
}
