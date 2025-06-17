<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Order Details']); ?>
    <main class="py-10">
        <section class="container mx-auto px-4">
            <h2 class="text-2xl font-bold uppercase border-b pb-2 mb-6">Order Details</h2>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                <aside class="lg:col-span-3">
                    <?php echo $__env->make('user.account-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </aside>

                <div class="lg:col-span-9 space-y-6">
                    
                    <div class="bg-white p-6 shadow rounded-lg space-y-4">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold">Order Information</h3>
                            <a href="<?php echo e(route('user.orders')); ?>" class="btn-main">Back</a>
                        </div>

                        <div class="overflow-auto">
                            <table class="w-full text-sm text-left border">
                                <tbody>
                                    <tr class="border-b">
                                        <th class="p-3 bg-gray-100">Order No</th>
                                        <td class="p-3"><?php echo e($order->id); ?></td>
                                        <th class="p-3 bg-gray-100">Mobile</th>
                                        <td class="p-3"><?php echo e($order->phone); ?></td>
                                        <th class="p-3 bg-gray-100">Zip Code</th>
                                        <td class="p-3"><?php echo e($order->zip); ?></td>
                                    </tr>
                                    <tr class="border-b">
                                        <th class="p-3 bg-gray-100">Order Date</th>
                                        <td class="p-3"><?php echo e($order->created_at); ?></td>
                                        <th class="p-3 bg-gray-100">Delivered</th>
                                        <td class="p-3"><?php echo e($order->delivery_date); ?></td>
                                        <th class="p-3 bg-gray-100">Cancelled</th>
                                        <td class="p-3"><?php echo e($order->cancelled_date); ?></td>
                                    </tr>
                                    <tr>
                                        <th class="p-3 bg-gray-100">Status</th>
                                        <td colspan="5" class="p-3">
                                            <?php
                                            $statusClass = match($order->status) {
                                            'cancelled' => 'bg-red-500',
                                            'delivered' => 'bg-green-500',
                                            default => 'bg-yellow-400 text-black',
                                            };
                                            ?>
                                            <span class="px-3 py-1 text-sm text-white rounded <?php echo e($statusClass); ?>">
                                                <?php echo e(ucfirst($order->status)); ?>

                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    
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
                                    <?php $__currentLoopData = $orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="border-t">
                                        <td class="flex items-center gap-3 p-3">
                                            <img src="<?php echo e(asset('storage/uploads/products/thumbnails/' . $item->product->image)); ?>"
                                                class="w-12 h-12 object-cover rounded" />
                                            <a href="<?php echo e(route('shop.product.details', ['product_slug' => $item->product->slug])); ?>"
                                                target="_blank" class="font-medium text-blue-600">
                                                <?php echo e($item->product->name); ?>

                                            </a>
                                        </td>
                                        <td class="text-center p-3">₹<?php echo e($item->price); ?></td>
                                        <td class="text-center p-3"><?php echo e($item->quantity); ?></td>
                                        <td class="text-center p-3"><?php echo e($item->product->SKU); ?></td>
                                        <td class="text-center p-3"><?php echo e($item->product->category->name); ?></td>
                                        <td class="text-center p-3"><?php echo e($item->product->brand->name); ?></td>
                                        <td class="text-center p-3"><?php echo e($item->options); ?></td>
                                        
                                        <td class="text-center p-3"><?php echo e($item->rstatus ? 'Yes' : 'No'); ?></td>
                                        <td class="text-center p-3"><i class="icon-eye text-gray-600"></i></td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            <?php echo e($orderItems->links('pagination::bootstrap-5')); ?>

                        </div>
                    </div>

                    
                    <div class="bg-white p-6 shadow rounded-lg">
                        <h3 class="text-lg font-semibold mb-2">Shipping Address</h3>
                        <div class="text-sm leading-relaxed">
                            <p><?php echo e($order->name); ?></p>
                            <p><?php echo e($order->address); ?></p>
                            <p><?php echo e($order->locality); ?>, <?php echo e($order->city); ?></p>
                            <p><?php echo e($order->country); ?> - <?php echo e($order->zip); ?></p>
                            <p><?php echo e($order->landmark); ?></p>
                            <p class="mt-2 font-semibold">Mobile: <?php echo e($order->phone); ?></p>
                        </div>
                    </div>

                    
                    <div class="bg-white p-6 shadow rounded-lg">
                        <h3 class="text-lg font-semibold mb-4">Transactions</h3>
                        <table class="w-full text-sm table-auto border">
                            <tbody>
                                <tr class="border-b">
                                    <th class="p-3 bg-gray-100">Subtotal</th>
                                    <td class="p-3">₹<?php echo e($order->subtotal); ?></td>
                                    <th class="p-3 bg-gray-100">Tax</th>
                                    <td class="p-3"><?php echo e($order->tax); ?></td>
                                    <th class="p-3 bg-gray-100">Discount</th>
                                    <td class="p-3"><?php echo e($order->discount); ?></td>
                                    <?php if($order->transactions->razorpay_payment_id): ?>
                                    <th class="p-3 bg-gray-100">
                                        Razorpay Payment ID
                                    </th>
                                    <td><?php echo e($order->transactions->razorpay_payment_id); ?></td>
                                    <?php endif; ?>
                                </tr>
                                <tr>
                                    <th class="p-3 bg-gray-100">Total</th>
                                    <td class="p-3 font-bold">₹<?php echo e($order->total); ?></td>
                                    <th class="p-3 bg-gray-100">Payment Mode</th>
                                    <td class="p-3"><?php echo e($transaction->mode); ?></td>
                                    <th class="p-3 bg-gray-100">Status</th>
                                    <td class="p-3">
                                        <?php
                                        $statusColor = match($transaction->status) {
                                        'pending' => 'bg-yellow-400 text-black',
                                        'success' => 'bg-green-500 text-white',
                                        'failed' => 'bg-gray-500 text-white',
                                        default => 'bg-red-500 text-white',
                                        };
                                        ?>
                                        <span class="px-3 py-1 text-sm rounded <?php echo e($statusColor); ?>">
                                            <?php echo e(ucfirst($transaction->status)); ?>

                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    
                    <?php if($order->status == 'ordered'): ?>
                    <div class="text-right mt-4">
                        <form action="<?php echo e(route('user.order.cancel')); ?>"
                            onsubmit="return confirm('Are you sure you want to cancel this order?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>
                            <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">
                            <button type="submit"
                                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Cancel Order</button>
                        </form>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\hp\Desktop\ECOMSELLER\resources\views/user/order-details.blade.php ENDPATH**/ ?>