<x-app-layout title="login">
    <section class="pt-90 flex items-center justify-center">
        <div class="w-xl p-4 mx-auto">
            <div class="flex flex-col justify-center items-center mb-4">
                <h3 class="font-bold">Logn</h3>
                <p>Please fill in the fields below</p>
            </div>

            <div class="tab-pane fade show active" id="tab-item-login" role="tabpanel" aria-labelledby="login-tab">
                <div class="login-form">
                    <form method="POST" action="{{ route('login') }}" name="login-form" class="needs-validation"
                        novalidate="">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input name="email" placeholder="Email" type="email" class="form-control" required
                                value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="pb-3"></div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input name="password" placeholder="password" type="password" class="form-control" required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="text-end -mt-2.5">
                            <a href="{{ route('password.request') }}">Forgot your password?</a>
                        </div>

                        <button class="btn-main w-full" type="submit">Log In</button>

                        <div class="customer-option mt-4 text-center">
                            <span class="text-secondary">No account yet?</span>
                            <a href="{{ route('register') }}" class="btn-text js-show-register">Create
                                Account</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
