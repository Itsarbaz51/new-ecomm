<x-app-layout title="Orders">
    <main class="pt-16 pb-10 bg-gray-50">
        <section class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">My Orders</h2>
            <div class="flex flex-col lg:flex-row gap-6">
                <aside class="w-full lg:w-1/4">
                    @include('user.account-nav')
                </aside>

                <div class="w-full lg:w-3/4">
                    <div class="overflow-x-auto bg-white rounded-lg shadow-md">
                        <table class="min-w-full text-sm text-gray-700 border border-gray-200">
                            <thead class="bg-gray-200 text-gray-700 text-xs uppercase tracking-wider">
                                <tr>
                                    <th class="px-4 py-3 text-left border">Order No</th>
                                    <th class="px-4 py-3 text-left border">Name</th>
                                    <th class="px-4 py-3 text-center border">Phone</th>
                                    <th class="px-4 py-3 text-center border">Subtotal</th>
                                    <th class="px-4 py-3 text-center border">Tax</th>
                                    <th class="px-4 py-3 text-center border">Total</th>
                                    <th class="px-4 py-3 text-center border">Status</th>
                                    <th class="px-4 py-3 text-center border">Order Date</th>
                                    <th class="px-4 py-3 text-center border">Items</th>
                                    <th class="px-4 py-3 text-center border">Delivered On</th>
                                    <th class="px-4 py-3 text-center border">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-4 py-3 border text-left font-medium">{{ $order->id }}</td>
                                        <td class="px-4 py-3 border text-left">{{ $order->name }}</td>
                                        <td class="px-4 py-3 border text-center">{{ $order->phone }}</td>
                                        <td class="px-4 py-3 border text-center">₹{{ $order->subtotal }}</td>
                                        <td class="px-4 py-3 border text-center">₹{{ $order->tax }}</td>
                                        <td class="px-4 py-3 border text-center font-semibold text-green-600">₹{{ $order->total }}</td>
                                        <td class="px-4 py-3 border text-center">
                                            @if ($order->status == 'cancelled')
                                                <span class="inline-block px-2 py-1 text-xs font-semibold text-white bg-red-500 rounded">Cancelled</span>
                                            @elseif ($order->status == 'delivered')
                                                <span class="inline-block px-2 py-1 text-xs font-semibold text-white bg-green-500 rounded">Delivered</span>
                                            @else
                                                <span class="inline-block px-2 py-1 text-xs font-semibold text-black bg-yellow-400 rounded">Ordered</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 border text-center">{{ $order->created_at->format('d M Y') }}</td>
                                        <td class="px-4 py-3 border text-center">{{ $order->orderItems->count() }}</td>
                                        <td class="px-4 py-3 border text-center">{{ $order->delivery_date ?? '-' }}</td>
                                        <td class="px-4 py-3 border text-center">
                                            <a href="{{ route('user.order.details', ['order_id' => $order->id]) }}"
                                               class="inline-flex items-center justify-center p-2 text-blue-500 hover:text-blue-700 hover:bg-gray-100 rounded-full transition">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" class="text-center text-gray-500 py-6">No orders found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        {{ $orders->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>
