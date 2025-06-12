<x-app-layout title="reset password">
    <div class="max-w-md mx-auto mt-10 border p-4 rounded-2xl border-gray-300">
        <h2 class="text-2xl font-bold mb-6 text-center">Reset Your Password</h2>

        <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
            @csrf

            <!-- New Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                <input type="password" name="password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200 focus:outline-none"
                    required placeholder="new password" />
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                <input type="password" name="password_confirmation"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200 focus:outline-none"
                    required placeholder="confirm password" />
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="btn-main w-full">
                    Reset Password
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
