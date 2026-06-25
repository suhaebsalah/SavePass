<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Mail\SendOtpMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

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
        $request->authenticate();

        $user = Auth::user();

        if (!$user->hasVerifiedEmail()) {
            Auth::logout();

            $otpCode = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
            
            // Delete old OTPs and create new one
            \App\Models\EmailOtp::where('user_id', $user->id)->delete();
            \App\Models\EmailOtp::create([
                'user_id' => $user->id,
                'code' => $otpCode,
                'expires_at' => Carbon::now()->addMinutes(3),
            ]);

            try {
                Mail::to($user->email)->send(new SendOtpMail($otpCode));
            } catch (\Exception $e) {
                return back()->withInput()->withErrors(['email' => 'Please try again later. We could not send an OTP to your email.']);
            }

            session(['otp_user_id' => $user->id]);

            return redirect()->route('otp.verification.notice');
        }

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
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
