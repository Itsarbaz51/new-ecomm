<x-app-layout title="My-account">
    <main class="pt-16 pb-10 bg-gray-50 ">
        <section class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">My Account</h2>
            <div class="flex flex-col lg:flex-row gap-6">
                {{-- Sidebar Navigation --}}
                <div class="w-full lg:w-1/4">
                    @include('user.account-nav')
                </div>

                {{-- Account Info Section --}}
                <div class="w-full lg:w-3/4 bg-white p-6 rounded-lg shadow-md">
                    <div class="space-y-4 text-sm text-gray-700 leading-6">
                        <p>Name: <strong class="text-gray-900">{{ $user->name }}</strong></p>
                        <p>Email: <strong class="text-gray-900">{{ $user->email }}</strong></p>
                        <p>Phone: <strong class="text-gray-900">{{ $user->mobile }}</strong></p>
                        <p>Account Created: <strong class="text-gray-900">{{ $user->created_at->format('d M, Y') }}</strong></p>
                        <p>Last Updated: <strong class="text-gray-900">{{ $user->updated_at->format('d M, Y') }}</strong></p>

                        <hr class="my-4 border-gray-200">

                        <p class="text-sm text-gray-600">
                            From your account dashboard you can view your
                            <a href="{{ route('user.orders') }}" class="underline text-blue-600 hover:text-red-500 transition">
                                recent orders</a>,
                            manage your
                            <a href="{{ optional($address)->id ? route('user.address.edit', ['id' => $address->id]) : '' }}"
                                class="underline text-blue-600 hover:text-red-500 transition">
                                shipping addresses</a>,
                            and
                            <a href="{{ route('user.account.details.edit', ['id' => Auth::user()->id]) }}"
                                class="underline text-blue-600 hover:text-red-500 transition">
                                edit your password and account details</a>.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>
