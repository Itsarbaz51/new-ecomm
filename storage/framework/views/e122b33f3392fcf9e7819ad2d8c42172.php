<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Coupon Offers']); ?>
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

            <?php if($coupons->count()): ?>
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
                        <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                        $isExpired = \Carbon\Carbon::parse($coupon->expiry_date)->isPast();
                        ?>
                        <tr class="<?php echo e($isExpired ? 'bg-red-50 text-gray-400 line-through cursor-not-allowed' : ''); ?>">
                            <td
                                class="border border-gray-300 px-6 py-4 text-sm <?php echo e($isExpired ? 'text-gray-400' : 'text-green-700'); ?>">
                                <?php echo e($coupon->code); ?>

                            </td>
                            <td class="border border-gray-300 px-6 py-4 text-sm capitalize">
                                <?php echo e($coupon->type); ?>

                            </td>
                            <td class="border border-gray-300 px-6 py-4 text-sm">
                                <?php if($coupon->type === 'percentage'): ?>
                                <?php echo e($coupon->value); ?>%
                                <?php else: ?>
                                ₹<?php echo e(number_format($coupon->value, 2)); ?>

                                <?php endif; ?>
                            </td>
                            <td class="border border-gray-300 px-6 py-4 text-sm">
                                ₹<?php echo e(number_format($coupon->cart_value, 2)); ?>

                            </td>
                            <td
                                class="border border-gray-300 px-6 py-4 text-sm <?php echo e($isExpired ? 'text-gray-400' : 'text-red-500'); ?>">
                                <?php echo e(\Carbon\Carbon::parse($coupon->expiry_date)->format('d M Y')); ?>

                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>


            </div>
            <?php else: ?>
            <p class="text-center text-gray-600">No coupons available right now.</p>
            <?php endif; ?>
        </div>
    </section>
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
<?php /**PATH C:\Users\hp\Desktop\ECOMSELLER\resources\views/home/coupons.blade.php ENDPATH**/ ?>