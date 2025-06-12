<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendOtpMail;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'digits:10', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        $this->generateOtp($data);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password']),
            'remember_token' => Str::random(60),
            'is_email_verified' => false,
        ]);

        return $user;
    }

    protected function registered(Request $request, $user)
    {
        return redirect()->route('otp.verify');
    }

    private function generateOtp($user)
    {
        $otp = rand(1000, 9999);
        Log::info("Generated OTP: $otp for user: " . $user['email']);

        Session::put('otp', $otp);
        Session::put('otp_user_id', $user['email']);
        Session::put('otp_created_at', now());

        Mail::to($user['email'])->send(new SendOtpMail($otp));
    }
}
