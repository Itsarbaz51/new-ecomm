<x-app-layout title="register">
    <div class="flex justify-center items-center flex-col">
        <div class="w-xl p-4 mx-auto">
            <div class="flex flex-col justify-center items-center mb-4">
                <h3 class="font-bold">Register Now</h3>
                <p>Please fill in the fields below</p>
            </div>

            @if ($errors->any())
            <div class="alert alert-danger">{{ implode(', ', $errors->all()) }}</div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="flex gap-y-2 flex-col">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input name="name" placeholder="Name" type="text" class="form-control" required
                            value="{{ old('name') }}" pattern="[A-Za-z]+">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input name="email" placeholder="Email" type="email" class="form-control" required
                            value="{{ old('email') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mobile</label>
                        <input name="mobile" placeholder="Mobile" type="number" class="form-control" required
                            maxlength="10" value="{{ old('mobile') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input name="password" placeholder="password" type="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input name="password_confirmation" placeholder="Confirm Password" type="password"
                            class="form-control" required>
                    </div>
                </div>
                <button type="submit" class="btn-main w-full">Register</button>
            </form>
            <div class="customer-option mt-4 text-center">
                <span class="text-secondary">No account yet?</span>
                <a href="{{ route('login') }}" class="btn-text js-show-register">Login</a>
            </div>
        </div>
    </div>
</x-app-layout>