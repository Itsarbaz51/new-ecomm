<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'My-account']); ?>
    <main class="pt-16 pb-10 bg-gray-50 ">
        <section class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">My Account</h2>
            <div class="flex flex-col lg:flex-row gap-6">
                
                <div class="w-full lg:w-1/4">
                    <?php echo $__env->make('user.account-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>

                
                <div class="w-full lg:w-3/4 bg-white p-6 rounded-lg shadow-md">
                    <div class="space-y-4 text-sm text-gray-700 leading-6">
                        <p>Name: <strong class="text-gray-900"><?php echo e($user->name); ?></strong></p>
                        <p>Email: <strong class="text-gray-900"><?php echo e($user->email); ?></strong></p>
                        <p>Phone: <strong class="text-gray-900"><?php echo e($user->mobile); ?></strong></p>
                        <p>Account Created: <strong class="text-gray-900"><?php echo e($user->created_at->format('d M, Y')); ?></strong></p>
                        <p>Last Updated: <strong class="text-gray-900"><?php echo e($user->updated_at->format('d M, Y')); ?></strong></p>

                        <hr class="my-4 border-gray-200">

                        <p class="text-sm text-gray-600">
                            From your account dashboard you can view your
                            <a href="<?php echo e(route('user.orders')); ?>" class="underline text-blue-600 hover:text-red-500 transition">
                                recent orders</a>,
                            manage your
                            <a href="<?php echo e(optional($address)->id ? route('user.address.edit', ['id' => $address->id]) : ''); ?>"
                                class="underline text-blue-600 hover:text-red-500 transition">
                                shipping addresses</a>,
                            and
                            <a href="<?php echo e(route('user.account.details.edit', ['id' => Auth::user()->id])); ?>"
                                class="underline text-blue-600 hover:text-red-500 transition">
                                edit your password and account details</a>.
                        </p>
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
<?php /**PATH C:\Users\hp\Desktop\ECOMSELLER\resources\views/user/index.blade.php ENDPATH**/ ?>