<x-app-layout title="Cart">
    <style>
        .success {
            color: #278c04 !important;
        }

        .error {
            color: #ff0000 !important;
        }
    </style>
    <main class="pt-20">
        <section class="container mx-auto px-4 py-10">
            <h2 class="text-3xl font-bold mb-6 text-gray-800">Cart</h2>

            <!-- Steps -->
            <div class="flex justify-between items-start mb-10">
                <div class="w-full flex gap-4 text-sm text-gray-600">
                    <div class="flex-1 text-center border-b-4 border-red-600 pb-2">
                        <p class="font-semibold text-black">01. Shopping Bag</p>
                        <p class="text-xs">Manage Your Items List</p>
                    </div>
                    <div class="flex-1 text-center border-b-2 border-gray-300 pb-2">
                        <p>02. Shipping and Checkout</p>
                        <p class="text-xs">Checkout Your Items</p>
                    </div>
                    <div class="flex-1 text-center border-b-2 border-gray-300 pb-2">
                        <p>03. Confirmation</p>
                        <p class="text-xs">Review and Submit</p>
                    </div>
                </div>
            </div>

            <!-- Cart Content -->
            @if ($items->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white shadow-md rounded-xl">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="p-4 text-left">Product</th>
                                <th class="p-4 text-left"></th>
                                <th class="p-4 text-left">Price</th>
                                <th class="p-4 text-left">Quantity</th>
                                <th class="p-4 text-left">Subtotal</th>
                                <th class="p-4 text-left">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-4">
                                        <img src="{{ asset('storage/uploads/products/thumbnails/' . $item->model->image) }}"
                                            alt="{{ $item->name }}" class="w-20 h-20 object-cover rounded" />
                                    </td>
                                    <td class="p-4">
                                        <div>
                                            <h4 class="font-semibold text-gray-800">{{ $item->name }}</h4>
                                            <ul class="text-sm text-gray-500">
                                                <li>Color: Yellow</li>
                                                <li>Size: L</li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td class="p-4">₹{{ $item->price }}</td>
                                    <td class="p-4">
                                        <div class="flex items-center gap-2">
                                            <form action="{{ route('cart.qty.decrease', ['rowId' => $item->rowId]) }}"
                                                method="POST">
                                                @csrf @method('PUT')
                                                <button type="submit"
                                                    class="px-2 py-1 bg-gray-200 hover:bg-gray-300 rounded">-</button>
                                            </form>
                                            <input type="number" value="{{ $item->qty }}" readonly
                                                class="w-12 text-center border rounded" />
                                            <form action="{{ route('cart.qty.increase', ['rowId' => $item->rowId]) }}"
                                                method="POST">
                                                @csrf @method('PUT')
                                                <button type="submit"
                                                    class="px-2 py-1 bg-gray-200 hover:bg-gray-300 rounded">+</button>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="p-4">₹{{ $item->subTotal() }}</td>
                                    <td class="p-4">
                                        <form action="{{ route('cart.item.remove', ['rowId' => $item->rowId]) }}"
                                            method="POST">
                                            @csrf @method('DELETE')
                                            <button class="text-red-600 hover:text-red-800">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Coupon and Actions -->
                <div class="mt-6 flex flex-col sm:flex-row justify-between gap-4">
                    <div class="flex-1">
                        @if (!Session::has('coupon'))
                            <form action="{{ route('cart.coupon.apply') }}" method="POST" class="flex gap-2">
                                @csrf
                                <input type="text" name="coupon_code" placeholder="Coupon Code"
                                    class="border px-4 py-2 rounded w-full sm:w-2/3" />
                                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Apply</button>
                            </form>
                        @else
                            <form action="{{ route('cart.coupon.remove') }}" method="POST" class="flex gap-2">
                                @csrf @method('DELETE')
                                <input type="text" value="{{ Session::get('coupon')['code'] }} Applied!" readonly
                                    class="border px-4 py-2 rounded w-full sm:w-2/3" />
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Remove</button>
                            </form>
                        @endif
                    </div>
                    <form action="{{ route('cart.empty') }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">Clear
                            Cart</button>
                    </form>
                </div>

                <!-- Flash Message -->
                @if (Session::has('success'))
                    <p class="mt-4 text-green-600">{{ Session::get('success') }}</p>
                @elseif(Session::has('error'))
                    <p class="mt-4 text-red-600">{{ Session::get('error') }}</p>
                @endif

                <!-- Totals -->
                <div class="mt-10 bg-gray-50 p-6 rounded-xl shadow-md">
                    <h3 class="text-xl font-semibold mb-4">Cart Totals</h3>
                    <table class="w-full text-sm">
                        <tbody>
                            @if (Session::has('discount'))
                                <tr>
                                    <th class="text-left py-2">Subtotal</th>
                                    <td>₹{{ Cart::instance('cart')->subtotal() }}</td>
                                </tr>
                                <tr>
                                    <th class="text-left py-2">Discount ({{ Session::get('coupon')['code'] }})</th>
                                    <td>₹{{ Session::get('discount')['discount'] }}</td>
                                </tr>
                                <tr>
                                    <th class="text-left py-2">Subtotal After Discount</th>
                                    <td>₹{{ Session::get('discount')['subtotal'] }}</td>
                                </tr>
                                <tr>
                                    <th class="text-left py-2">Shipping</th>
                                    <td>Free</td>
                                </tr>
                                <tr>
                                    <th class="text-left py-2">VAT</th>
                                    <td>₹{{ Session::get('discount')['tax'] }}</td>
                                </tr>
                                <tr class="font-bold">
                                    <th class="text-left py-2">Total</th>
                                    <td>₹{{ Session::get('discount')['total'] }}</td>
                                </tr>
                            @else
                                <tr>
                                    <th class="text-left py-2">Subtotal</th>
                                    <td>₹{{ Cart::instance('cart')->subtotal() }}</td>
                                </tr>
                                <tr>
                                    <th class="text-left py-2">Shipping</th>
                                    <td>Free</td>
                                </tr>
                                <tr>
                                    <th class="text-left py-2">VAT</th>
                                    <td>₹{{ Cart::instance('cart')->tax() }}</td>
                                </tr>
                                <tr class="font-bold">
                                    <th class="text-left py-2">Total</th>
                                    <td>₹{{ Cart::instance('cart')->total() }}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="mt-6">
                        <a href="{{ route('cart.checkout') }}"
                            class="bg-green-600 text-white px-6 py-3 rounded text-center inline-block hover:bg-green-700">Proceed
                            to Checkout</a>
                    </div>
                </div>
            @else
                <div class="text-center py-20">
                    <p class="text-xl text-gray-600 mb-4">Your cart is currently empty.</p>
                    <a href="{{ route('shop.index') }}"
                        class="bg-black text-white px-6 py-3 rounded hover:bg-gray-800 ">Shop Now</a>
                </div>
            @endif
        </section>
    </main>
</x-app-layout>

<script>
    $(function() {
        $('.qty-control__increase').on('click', function() {
            $(this).closest('form').submit();
        });

        $('.qty-control__reduce').on('click', function() {
            $(this).closest('form').submit();
        });

        $('.remove-cart').on('click', function() {
            $(this).closest('form').submit();
        });
    })
</script>
