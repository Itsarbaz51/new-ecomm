<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendOtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class OtpController extends Controller
{
    public function showOtpForm()
    {
        return view('auth.otp_verify');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required|digits:4']);

        $sessionOtp = Session::get('otp');
        $email = Session::get('otp_user_email');
        $createdAt = Session::get('otp_created_at');

        if (!$sessionOtp || !$email || !$createdAt) {
            return redirect()->route('register')->withErrors(['message' => 'Session expired. Please register again.']);
        }

        if (now()->diffInMinutes($createdAt) > 10) {
            return redirect()->route('otp.resend')->withErrors(['message' => 'OTP expired. Please request a new one.']);
        }

        if ($request->otp != $sessionOtp) {
            return back()->withErrors(['otp' => 'Invalid OTP.']);
        }

        // Create user now
        $userData = Session::get('user_register_data');

        if (!$userData) {
            return redirect()->route('register')->withErrors(['message' => 'Registration data missing. Please try again.']);
        }

        // Prevent duplicate user creation
        if (User::where('email', $email)->exists()) {
            return redirect()->route('login')->withErrors(['message' => 'User already exists. Please login.']);
        }

        $user = User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'mobile' => $userData['mobile'],
            'password' => Hash::make($userData['password']),
            'remember_token' => Str::random(60),
            'is_email_verified' => true,
        ]);

        Auth::login($user);

        // Clear session
        Session::forget(['otp', 'otp_user_email', 'otp_created_at', 'user_register_data']);

        return redirect()->route('home.index')->with('success', 'Registration successful!');
    }
    public function resendOtp()
    {
        $email = Session::get('otp_user_email');
        $data = Session::get('user_register_data');

        if ($email && $data) {
            $otp = rand(1000, 9999);
            Session::put('otp', $otp);
            Session::put('otp_created_at', now());

            Mail::to($email)->send(new SendOtpMail($otp));
            Log::info("Resent OTP to $email: $otp");

            return back()->with('message', 'OTP resent to your email.');
        }

        return redirect()->route('register')->withErrors(['message' => 'Session expired. Please register again.']);
    }

}
