<x-app-layout title="forgot-password">
    <div class="max-w-md mx-auto mt-10">
        <h2 class="text-xl font-bold mb-4">Forgot Password</h2>
        @if (session('success'))
            <div class="text-green-600 mb-4">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <label class="form-label">Email Address</label>
            <input name="email" type="email" required class="form-control" />
            @error('email')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror

            <button class="btn-main">Send OTP</button>
        </form>
    </div>
</x-app-layout>
