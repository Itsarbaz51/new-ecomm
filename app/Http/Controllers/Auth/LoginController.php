<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendOtpMail;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    protected function throttleKey(Request $request)
    {
        return $request->ip();
    }

    protected function hasTooManyLoginAttempts(Request $request)
    {
        return RateLimiter::tooManyAttempts($this->throttleKey($request), 5);
    }

    protected function incrementLoginAttempts(Request $request)
    {
        RateLimiter::hit($this->throttleKey($request), 60 * 60 * 48); // 48 hours
    }

    protected function sendLockoutResponse(Request $request)
    {
        $seconds = RateLimiter::availableIn($this->throttleKey($request));
        $hours = floor($seconds / 3600);
        $minutes = floor(($seconds % 3600) / 60);

        throw \Illuminate\Validation\ValidationException::withMessages([
            'email' => ["Too many login attempts. Please try again after {$hours} hours and {$minutes} minutes."],
        ]);
    }

    /**
     * Override the login method to handle OTP for unverified users.
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        $user = User::where('email', $request->input('email'))->first();

        // If user exists and mobile not verified
        if ($user && is_null($user->is_email_verified)) {
            $otp = rand(1000, 9999);
            Session::put('otp', $otp);
            Session::put('otp_user_id', $user->id);
            Session::put('otp_created_at', now());

            Mail::to($user->email)->send(new SendOtpMail($otp));

            return redirect()->route('otp.verify')->with('message', 'OTP sent to your email. Please verify.');
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected function attemptLogin(Request $request)
    {
        return Auth::attempt(
            $request->only('email', 'password'),
            $request->filled('remember')
        );
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();

        if ($user && is_null($user->is_email_verified)) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => ['Email is not verified.'],
            ]);
        }

        throw \Illuminate\Validation\ValidationException::withMessages([
            'email' => ['These credentials do not match our records.'],
        ]);
    }
}
