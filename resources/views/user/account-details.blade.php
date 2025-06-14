<x-app-layout title="account-details">
   <main class="pt-16 pb-10 bg-gray-50">
        <section class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Account Details</h2>
            <div class="flex flex-col lg:flex-row gap-8">

                {{-- Sidebar --}}
                <div class="lg:w-1/4 w-full">
                    @include('user.account-nav')
                </div>

                {{-- Account Form --}}
                <div class="lg:w-3/4 w-full bg-white p-6 rounded-lg shadow-md">
                    @if (Session::has('success'))
                        <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-6">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <form action="{{ route('user.account.details.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $user->id }}" />

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Name --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" name="name" value="{{ $user->name }}"
                                    class="form-control"
                                    required>
                                @error('name')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Mobile --}}
                            <div>
                                <label for="mobile" class="form-label">Mobile Number</label>
                                <input type="text" id="mobile" name="phone" value="{{ $user->mobile }}"
                                    class="form-control"
                                    required>
                                @error('phone')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Email (Full Width) --}}
                            <div class="md:col-span-2">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" id="email" name="email" value="{{ $user->email }}"
                                    class="form-control"
                                    required>
                                @error('email')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        {{-- Password Section --}}
                        <div class="mt-8">
                            <h3 class="text-lg font-semibold text-gray-800 mb-4">Password Change (Optional)</h3>

                            <div class="space-y-6">
                                {{-- Old Password --}}
                                <div>
                                    <label for="old_password" class="form-label">Old Password</label>
                                    <input type="password" id="old_password" name="old_password"
                                        class="form-control">
                                    @error('old_password')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- New Password --}}
                                <div>
                                    <label for="new_password" class="form-label">New Password</label>
                                    <input type="password" id="new_password" name="new_password"
                                        class="form-control">
                                    @error('new_password')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Confirm New Password --}}
                                <div>
                                    <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                                    <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                                        class="form-control">
                                    @error('new_password_confirmation')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        {{-- Submit --}}
                        <div class="mt-6">
                            <button type="submit"
                                class="btn-main">
                                Save Changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>
