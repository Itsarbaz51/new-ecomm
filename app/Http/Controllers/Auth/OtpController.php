<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendOtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class OtpController extends Controller
{
    public function showOtpForm()
    {
        return view('auth.otp_verify');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate(['otp' => 'required|digits:4']);

        $otp = Session::get('otp');
        $userId = Session::get('otp_user_id');
        $createdAt = Session::get('otp_created_at');

        if (!$otp || !$userId || !$createdAt) {
            return redirect()->route('register')->withErrors('Session expired. Please register again.');
        }

        if (Carbon::parse($createdAt)->addMinutes(10)->isPast()) {
            return redirect()->route('otp.resend')->withErrors('OTP expired. Please request a new one.');
        }

        if ($request->otp != $otp) {
            return back()->withErrors('Invalid OTP.');
        }

        $user = User::find($userId);
        if ($user) {
            $user->is_email_verified = true;
            $user->save();

            Session::forget(['otp', 'otp_user_id', 'otp_created_at']);

            Auth::login($user);

            return redirect()->route('home.index');
        }

        return redirect()->route('register')->withErrors('User not found.');
    }

    public function resendOtp()
    {
        $userId = Session::get('otp_user_id');
        $user = User::find($userId);

        if ($user) {
            $otp = rand(1000, 9999);
            Session::put('otp', $otp);
            Session::put('otp_created_at', now());

            Mail::to($user->email)->send(new SendOtpMail($otp));


            Log::info("Resent OTP to {$user->email}: $otp");

            return back()->with('message', 'OTP resent successfully to your email.');
        }

        return redirect()->route('register')->withErrors('User not found.');
    }
}
