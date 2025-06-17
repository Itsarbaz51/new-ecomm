<x-app-layout title="Order Details">
    <main class="py-10">
        <section class="container mx-auto px-4">
            <h2 class="text-2xl font-bold uppercase border-b pb-2 mb-6">Order Details</h2>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                <aside class="lg:col-span-3">
                    @include('user.account-nav')
                </aside>

                <div class="lg:col-span-9 space-y-6">
                    {{-- Order Info --}}
                    <div class="bg-white p-6 shadow rounded-lg space-y-4">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold">Order Information</h3>
                            <a href="{{ route('user.orders') }}" class="btn-main">Back</a>
                        </div>

                        <div class="overflow-auto">
                            <table class="w-full text-sm text-left border">
                                <tbody>
                                    <tr class="border-b">
                                        <th class="p-3 bg-gray-100">Order No</th>
                                        <td class="p-3">{{ $order->id }}</td>
                                        <th class="p-3 bg-gray-100">Mobile</th>
                                        <td class="p-3">{{ $order->phone }}</td>
                                        <th class="p-3 bg-gray-100">Zip Code</th>
                                        <td class="p-3">{{ $order->zip }}</td>
                                    </tr>
                                    <tr class="border-b">
                                        <th class="p-3 bg-gray-100">Order Date</th>
                                        <td class="p-3">{{ $order->created_at }}</td>
                                        <th class="p-3 bg-gray-100">Delivered</th>
                                        <td class="p-3">{{ $order->delivery_date }}</td>
                                        <th class="p-3 bg-gray-100">Cancelled</th>
                                        <td class="p-3">{{ $order->cancelled_date }}</td>
                                    </tr>
                                    <tr>
                                        <th class="p-3 bg-gray-100">Status</th>
                                        <td colspan="5" class="p-3">
                                            @php
                                            $statusClass = match($order->status) {
                                            'cancelled' => 'bg-red-500',
                                            'delivered' => 'bg-green-500',
                                            default => 'bg-yellow-400 text-black',
                                            };
                                            @endphp
                                            <span class="px-3 py-1 text-sm text-white rounded {{ $statusClass }}">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Ordered Items --}}
                    <div class="bg-white p-6 shadow rounded-lg">
                        <h3 class="text-lg font-semibold mb-4">Ordered Items</h3>

                        <div class="overflow-auto">
                            <table class="min-w-full table-auto border text-sm text-left">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="p-3">Name</th>
                                        <th class="p-3 text-center">Price</th>
                                        <th class="p-3 text-center">Qty</th>
                                        <th class="p-3 text-center">SKU</th>
                                        <th class="p-3 text-center">Category</th>
                                        <th class="p-3 text-center">Brand</th>
                                        <th class="p-3 text-center">Options</th>
                                        <th class="p-3 text-center">Return</th>
                                        <th class="p-3 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderItems as $item)
                                    <tr class="border-t">
                                        <td class="flex items-center gap-3 p-3">
                                            <img src="{{ asset('storage/uploads/products/thumbnails/' . $item->product->image) }}"
                                                class="w-12 h-12 object-cover rounded" />
                                            <a href="{{ route('shop.product.details', ['product_slug' => $item->product->slug]) }}"
                                                target="_blank" class="font-medium text-blue-600">
                                                {{ $item->product->name }}
                                            </a>
                                        </td>
                                        <td class="text-center p-3">₹{{ $item->price }}</td>
                                        <td class="text-center p-3">{{ $item->quantity }}</td>
                                        <td class="text-center p-3">{{ $item->product->SKU }}</td>
                                        <td class="text-center p-3">{{ $item->product->category->name }}</td>
                                        <td class="text-center p-3">{{ $item->product->brand->name }}</td>
                                        <td class="text-center p-3">{{ $item->options }}</td>
                                        {{-- {{ dd($item) }} --}}
                                        <td class="text-center p-3">{{ $item->rstatus ? 'Yes' : 'No' }}</td>
                                        <td class="text-center p-3"><i class="icon-eye text-gray-600"></i></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            {{ $orderItems->links('pagination::bootstrap-5') }}
                        </div>
                    </div>

                    {{-- Shipping Address --}}
                    <div class="bg-white p-6 shadow rounded-lg">
                        <h3 class="text-lg font-semibold mb-2">Shipping Address</h3>
                        <div class="text-sm leading-relaxed">
                            <p>{{ $order->name }}</p>
                            <p>{{ $order->address }}</p>
                            <p>{{ $order->locality }}, {{ $order->city }}</p>
                            <p>{{ $order->country }} - {{ $order->zip }}</p>
                            <p>{{ $order->landmark }}</p>
                            <p class="mt-2 font-semibold">Mobile: {{ $order->phone }}</p>
                        </div>
                    </div>

                    {{-- Transactions --}}
                    <div class="bg-white p-6 shadow rounded-lg">
                        <h3 class="text-lg font-semibold mb-4">Transactions</h3>
                        <table class="w-full text-sm table-auto border">
                            <tbody>
                                <tr class="border-b">
                                    <th class="p-3 bg-gray-100">Subtotal</th>
                                    <td class="p-3">₹{{ $order->subtotal }}</td>
                                    <th class="p-3 bg-gray-100">Tax</th>
                                    <td class="p-3">{{ $order->tax }}</td>
                                    <th class="p-3 bg-gray-100">Discount</th>
                                    <td class="p-3">{{ $order->discount }}</td>
                                    @if($order->transactions->razorpay_payment_id)
                                    <th class="p-3 bg-gray-100">
                                        Razorpay Payment ID
                                    </th>
                                    <td>{{ $order->transactions->razorpay_payment_id }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <th class="p-3 bg-gray-100">Total</th>
                                    <td class="p-3 font-bold">₹{{ $order->total }}</td>
                                    <th class="p-3 bg-gray-100">Payment Mode</th>
                                    <td class="p-3">{{ $transaction->mode }}</td>
                                    <th class="p-3 bg-gray-100">Status</th>
                                    <td class="p-3">
                                        @php
                                        $statusColor = match($transaction->status) {
                                        'pending' => 'bg-yellow-400 text-black',
                                        'success' => 'bg-green-500 text-white',
                                        'failed' => 'bg-gray-500 text-white',
                                        default => 'bg-red-500 text-white',
                                        };
                                        @endphp
                                        <span class="px-3 py-1 text-sm rounded {{ $statusColor }}">
                                            {{ ucfirst($transaction->status) }}
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    {{-- Cancel Order --}}
                    @if ($order->status == 'ordered')
                    <div class="text-right mt-4">
                        <form action="{{ route('user.order.cancel') }}"
                            onsubmit="return confirm('Are you sure you want to cancel this order?')">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                            <button type="submit"
                                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Cancel Order</button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </section>
    </main>
</x-app-layout>
