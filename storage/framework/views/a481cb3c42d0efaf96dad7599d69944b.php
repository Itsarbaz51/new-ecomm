<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Orders']); ?>
    <main class="pt-16 pb-10 bg-gray-50">
        <section class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">My Orders</h2>
            <div class="flex flex-col lg:flex-row gap-6">
                <aside class="w-full lg:w-1/4">
                    <?php echo $__env->make('user.account-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
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
                                <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-4 py-3 border text-left font-medium"><?php echo e($order->id); ?></td>
                                        <td class="px-4 py-3 border text-left"><?php echo e($order->name); ?></td>
                                        <td class="px-4 py-3 border text-center"><?php echo e($order->phone); ?></td>
                                        <td class="px-4 py-3 border text-center">₹<?php echo e($order->subtotal); ?></td>
                                        <td class="px-4 py-3 border text-center">₹<?php echo e($order->tax); ?></td>
                                        <td class="px-4 py-3 border text-center font-semibold text-green-600">₹<?php echo e($order->total); ?></td>
                                        <td class="px-4 py-3 border text-center">
                                            <?php if($order->status == 'cancelled'): ?>
                                                <span class="inline-block px-2 py-1 text-xs font-semibold text-white bg-red-500 rounded">Cancelled</span>
                                            <?php elseif($order->status == 'delivered'): ?>
                                                <span class="inline-block px-2 py-1 text-xs font-semibold text-white bg-green-500 rounded">Delivered</span>
                                            <?php else: ?>
                                                <span class="inline-block px-2 py-1 text-xs font-semibold text-black bg-yellow-400 rounded">Ordered</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-4 py-3 border text-center"><?php echo e($order->created_at->format('d M Y')); ?></td>
                                        <td class="px-4 py-3 border text-center"><?php echo e($order->orderItems->count()); ?></td>
                                        <td class="px-4 py-3 border text-center"><?php echo e($order->delivery_date ?? '-'); ?></td>
                                        <td class="px-4 py-3 border text-center">
                                            <a href="<?php echo e(route('user.order.details', ['order_id' => $order->id])); ?>"
                                               class="inline-flex items-center justify-center p-2 text-blue-500 hover:text-blue-700 hover:bg-gray-100 rounded-full transition">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="11" class="text-center text-gray-500 py-6">No orders found.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        <?php echo e($orders->links('pagination::bootstrap-5')); ?>

                    </div>
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
<?php /**PATH C:\Users\hp\Desktop\ECOMSELLER\resources\views/user/orders.blade.php ENDPATH**/ ?>