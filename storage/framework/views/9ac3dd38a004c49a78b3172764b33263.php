<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'order-confirmation']); ?>
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="shop-checkout container">
            <h2 class="page-title">Order Received</h2>
            <div class="flex justify-between items-start mb-10">
                <div class="w-full flex gap-4 text-sm text-gray-600">
                    <div class="flex-1 text-center border-b-2 border-gray-300 pb-2">
                        <p class="font-semibold text-black">01. Shopping Bag</p>
                        <p class="text-xs">Manage Your Items List</p>
                    </div>
                    <div class="flex-1 text-center border-b-2 border-gray-300 pb-2">
                        <p>02. Shipping and Checkout</p>
                        <p class="text-xs">Checkout Your Items</p>
                    </div>
                    <div class="flex-1 text-center border-b-4 border-red-600 pb-2">
                        <p>03. Confirmation</p>
                        <p class="text-xs">Review and Submit</p>
                    </div>
                </div>
            </div>
            <div class="order-complete">
                <div class="order-complete__message">
                    <svg width="80" height="80" viewBox="0 0 80 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="40" cy="40" r="40" fill="#B9A16B" />
                        <path
                            d="M52.9743 35.7612C52.9743 35.3426 52.8069 34.9241 52.5056 34.6228L50.2288 32.346C49.9275 32.0446 49.5089 31.8772 49.0904 31.8772C48.6719 31.8772 48.2533 32.0446 47.952 32.346L36.9699 43.3449L32.048 38.4062C31.7467 38.1049 31.3281 37.9375 30.9096 37.9375C30.4911 37.9375 30.0725 38.1049 29.7712 38.4062L27.4944 40.683C27.1931 40.9844 27.0257 41.4029 27.0257 41.8214C27.0257 42.24 27.1931 42.6585 27.4944 42.9598L33.5547 49.0201L35.8315 51.2969C36.1328 51.5982 36.5513 51.7656 36.9699 51.7656C37.3884 51.7656 37.8069 51.5982 38.1083 51.2969L40.385 49.0201L52.5056 36.8996C52.8069 36.5982 52.9743 36.1797 52.9743 35.7612Z"
                            fill="white" />
                    </svg>
                    <h3>Your order is completed!</h3>
                    <p>Thank you. Your order has been received.</p>
                </div>
                <div class="order-info">
                    <div class="order-info__item">
                        <label>Order Number</label>
                        <span><?php echo e($order->id); ?></span>
                    </div>
                    <div class="order-info__item">
                        <label>Date</label>
                        <span><?php echo e($order->created_at); ?></span>
                    </div>
                    <div class="order-info__item">
                        <label>Total</label>
                        <span>₹<?php echo e($order->total); ?></span>
                    </div>
                    <div class="order-info__item">
                        <label>Payment Method</label>
                        
                        <span><?php echo e($order->transactions->mode); ?></span>
                    </div>
                    <?php if($order->transactions->razorpay_payment_id): ?>
                    <div class="order-info__item">
                        <label>Razorpay Payment ID</label>
                        <span><?php echo e($order->transactions->razorpay_payment_id); ?></span>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="checkout__totals-wrapper">
                    <div class="checkout__totals">
                        <h3>Order Details</h3>
                        <table class="checkout-cart-items">
                            <thead>
                                <tr>
                                    <th>PRODUCT</th>
                                    <th>SUBTOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <?php echo e($item->product->name); ?> x <?php echo e($item->quantity); ?>

                                    </td>
                                    <td class="text-right">
                                        ₹<?php echo e($item->price); ?>

                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <table class="checkout-totals">
                            <tbody>
                                <tr>
                                    <th>SUBTOTAL</th>
                                    <td class="text-right">₹<?php echo e($order->subtotal); ?></td>
                                </tr>
                                <tr>
                                    <th>DISCOUNT</th>
                                    <td class="text-right">₹<?php echo e($order->discount); ?></td>
                                </tr>
                                <tr>
                                    <th>SHIPPING</th>
                                    <td class="text-right">Free shipping</td>
                                </tr>
                                <tr>
                                    <th>VAT</th>
                                    <td class="text-right">₹<?php echo e($order->tax); ?></td>
                                </tr>
                                <tr>
                                    <th>TOTAL</th>
                                    <td class="text-right">₹<?php echo e($order->total); ?></td>
                                </tr>
                            </tbody>
                        </table>
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
<?php /**PATH C:\Users\hp\Desktop\ECOMSELLER\resources\views/order-confirmation.blade.php ENDPATH**/ ?>