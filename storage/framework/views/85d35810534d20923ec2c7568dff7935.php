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
    <style>
        .unerline-link {
            color: #2275FC;
        }

        .unerline-link:hover {
            color: red;
        }
    </style>
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="my-account container">
            <h2 class="page-title">My Account</h2>
            <div class="row">
                <div class="col-lg-3">
                    <?php echo $__env->make('user.account-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
                <div class="col-lg-9">
                    <div class="page-content my-account__dashboard">
                        <p>Hello, <strong><?php echo e($user->name); ?></strong></p>
                        <p>Email : <strong><?php echo e($user->email); ?></strong></p>
                        <p>Phone : <strong><?php echo e($user->mobile); ?></strong></p>
                        <p>Account dated : <strong><?php echo e($user->created_at->format('d M, Y')); ?></strong></p>
                        <p>Updated : <strong><?php echo e($user->updated_at->format('d M, Y')); ?></strong></p>

                        <p>From your account dashboard you can view your <a class="unerline-link"
                                href="<?php echo e(route('user.orders')); ?>">recent
                                orders</a>, manage your <a class="unerline-link"
                                href="<?php echo e(optional($address)->id ? route('user.address.edit', ['id' => $address->id]) : ''); ?>"
>shipping
                                addresses</a>, and
                            <a class="unerline-link"
                                href="<?php echo e(route('user.account.details.edit', ['id' => Auth::user()->id])); ?>">edit your
                                password
                                and account
                                details.</a>
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