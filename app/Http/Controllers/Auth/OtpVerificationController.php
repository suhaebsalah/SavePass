<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\EmailOtp;
use App\Mail\SendOtpMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class OtpVerificationController extends Controller
{
    public function create(Request $request)
    {
        if (!session()->has('otp_user_id')) {
            return redirect()->route('login');
        }

        return view('auth.verify-otp');
    }

    public function store(Request $request)
    {
        $request->validate([
            'otp_code' => 'required|string|size:6',
        ]);

        $userId = session('otp_user_id');
        if (!$userId) return redirect()->route('login')->withErrors(['email' => 'Session expired. Please log in again.']);

        $user = User::find($userId);
        if (!$user) return redirect()->route('login');

        $otpRecord = EmailOtp::where('user_id', $userId)->latest()->first();

        if (!$otpRecord || $otpRecord->code !== $request->otp_code) {
            return back()->withErrors(['otp_code' => 'Invalid code.']);
        }

        if (Carbon::now()->greaterThan($otpRecord->expires_at)) {
            // Generate and send a new one
            $newCode = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
            EmailOtp::where('user_id', $userId)->delete();
            EmailOtp::create([
                'user_id' => $userId,
                'code' => $newCode,
                'expires_at' => Carbon::now()->addMinutes(3),
            ]);
            try { Mail::to($user->email)->send(new SendOtpMail($newCode)); } catch (\Exception $e) {}
            
            return back()->withErrors(['otp_code' => 'Code expired. A new code has been sent.']);
        }

        // Verify user and login
        $user->email_verified_at = Carbon::now();
        $user->save();

        EmailOtp::where('user_id', $userId)->delete();
        session()->forget('otp_user_id');
        
        // Ensure the user is "remembered" so they stay logged in after closing the browser
        Auth::login($user, true);
        return redirect()->intended(route('dashboard', absolute: false));
    }

    public function resend(Request $request)
    {
        $userId = session('otp_user_id');
        if (!$userId) return redirect()->route('login')->withErrors(['email' => 'Session expired. Please log in again.']);

        $user = User::find($userId);
        if (!$user) return redirect()->route('login');

        $otpCode = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
        
        EmailOtp::where('user_id', $userId)->delete();
        EmailOtp::create([
            'user_id' => $userId,
            'code' => $otpCode,
            'expires_at' => Carbon::now()->addMinutes(3),
        ]);

        try {
            Mail::to($user->email)->send(new SendOtpMail($otpCode));
        } catch (\Exception $e) {
            return back()->withErrors(['otp_code' => 'Failed to send OTP. Please try again.']);
        }

        return back()->with('status', 'A new OTP has been sent to your email address.');
    }
}
