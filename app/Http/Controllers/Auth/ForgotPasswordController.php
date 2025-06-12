<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendOtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendOtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendOtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ForgotPasswordController extends Controller
{
    public function showForgotForm()
    {
        return view('auth.passwords.email');
    }

    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email not found']);
        }

        $otp = rand(1000, 9999);
        Session::put('otp', $otp);
        Session::put('otp_user_id', $user->email);
        Session::put('otp_created_at', now());

        Mail::to($user->email)->send(new SendOtpMail($otp));

        return redirect()->route('password.otp.verify')->with('status', 'OTP sent to your email.');
    }

    public function showOtpForm()
    {
        return view('auth.passwords.otp');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required|digits:4']);

        if (
            Session::get('otp') == $request->otp &&
            now()->diffInMinutes(Session::get('otp_created_at')) <= 10
        ) {
            Session::put('otp_verified', true);
            return redirect()->route('password.reset.custom');
        }

        return back()->withErrors(['otp' => 'Invalid or expired OTP']);
    }

    public function showResetForm()
    {
        return view('auth.passwords.reset');
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::where('email', Session::get('otp_user_id'))->first();

        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();

            // clear OTP data
            Session::forget(['otp', 'otp_user_id', 'otp_created_at', 'otp_verified']);

            return redirect()->route('login')->with('status', 'Password reset successful.');
        }

        return back()->withErrors(['email' => 'Something went wrong.']);
    }
}

