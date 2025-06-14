<x-app-layout title="Coupon Offers">
    <!-- Hero Section -->
    <section class="bg-black text-white py-20 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Grab the Best Coupon Offers</h1>
            <p class="text-lg md:text-xl mb-8">Save more with exclusive discount codes on your favorite products.</p>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 px-6 bg-white">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl font-bold mb-10">Why Shop with Our Coupons?</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-6 rounded-lg shadow">
                    <h3 class="text-xl font-semibold mb-2">100% Verified Offers</h3>
                    <p>We hand-check every coupon to ensure it works — no expired or fake codes here.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow">
                    <h3 class="text-xl font-semibold mb-2">Updated Daily</h3>
                    <p>Our team updates the coupon list every day, so you never miss a hot deal.</p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow">
                    <h3 class="text-xl font-semibold mb-2">Quick & Easy Access</h3>
                    <p>Log in to explore exclusive deals and personalized offers in seconds.</p>
                </div>

            </div>
        </div>
    </section>


    <!-- Coupon List Section -->
    <section class="py-16 px-6 bg-gray-50">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-3xl font-bold text-center mb-10">Available Coupons</h2>

            @if ($coupons->count())
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden border border-gray-300">
                    <thead class="bg-gray-100 " >
                        <tr>
                            <th class="border border-gray-300 px-6 py-3 text-left text-sm font-semibold text-gray-700">
                                Code</th>
                            <th class="border border-gray-300 px-6 py-3 text-left text-sm font-semibold text-gray-700">
                                Type</th>
                            <th class="border border-gray-300 px-6 py-3 text-left text-sm font-semibold text-gray-700">
                                Value</th>
                            <th class="border border-gray-300 px-6 py-3 text-left text-sm font-semibold text-gray-700">
                                Cart Value</th>
                            <th class="border border-gray-300 px-6 py-3 text-left text-sm font-semibold text-gray-700">
                                Expiry Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $coupon)
                        @php
                        $isExpired = \Carbon\Carbon::parse($coupon->expiry_date)->isPast();
                        @endphp
                        <tr class="{{ $isExpired ? 'bg-red-50 text-gray-400 line-through cursor-not-allowed' : '' }}">
                            <td
                                class="border border-gray-300 px-6 py-4 text-sm {{ $isExpired ? 'text-gray-400' : 'text-green-700' }}">
                                {{ $coupon->code }}
                            </td>
                            <td class="border border-gray-300 px-6 py-4 text-sm capitalize">
                                {{ $coupon->type }}
                            </td>
                            <td class="border border-gray-300 px-6 py-4 text-sm">
                                @if ($coupon->type === 'percentage')
                                {{ $coupon->value }}%
                                @else
                                ₹{{ number_format($coupon->value, 2) }}
                                @endif
                            </td>
                            <td class="border border-gray-300 px-6 py-4 text-sm">
                                ₹{{ number_format($coupon->cart_value, 2) }}
                            </td>
                            <td
                                class="border border-gray-300 px-6 py-4 text-sm {{ $isExpired ? 'text-gray-400' : 'text-red-500' }}">
                                {{ \Carbon\Carbon::parse($coupon->expiry_date)->format('d M Y') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
            @else
            <p class="text-center text-gray-600">No coupons available right now.</p>
            @endif
        </div>
    </section>
</x-app-layout>
