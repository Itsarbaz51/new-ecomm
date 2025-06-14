<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendOtpMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        Session::put('user_register_data', $request->all());
        $this->generateOtp($request->all());

        return redirect()->route('otp.verify');
    }

    public function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:30'],
            'mobile' => ['required', 'digits:10', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    private function generateOtp($data)
    {
        $otp = rand(1000, 9999);
        Log::info("Generated OTP: $otp for email: " . $data['email']);

        Session::put('otp', $otp);
        Session::put('otp_user_email', $data['email']);
        Session::put('otp_created_at', now());

        Mail::to($data['email'])->send(new SendOtpMail($otp));
    }
}
