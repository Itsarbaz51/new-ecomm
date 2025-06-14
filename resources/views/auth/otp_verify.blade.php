<x-app-layout title="OTP Verification">

    <div class="w-xl p-4 m-auto">
        <div class="border border-gray-300 p-5 rounded shadow-md my-4">
            <h3 class="mb-4">OTP Verification</h3>

            @if(session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            @if($errors->any())
            <div class="alert alert-danger">{{ implode(', ', $errors->all()) }}</div>
            @endif

            <form method="POST" action="{{ route('otp.verify.submit') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Enter the OTP sent to your email.</label>
                    <input type="text" name="otp" class="form-control" placeholder="OTP" required maxlength="4">
                </div>

                <button type="submit" class="btn-main w-full">Verify OTP</button>
            </form>

            <div class="text-center mt-3">
                <a href="{{ route('otp.resend') }}" class="text-black">Did not get OTP? Resend</a>
            </div>
        </div>
    </div>
</x-app-layout>
