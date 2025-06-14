<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'register']); ?>
    <div class="flex justify-center items-center flex-col">
        <div class="w-xl p-4 mx-auto">
            <div class="flex flex-col justify-center items-center mb-4">
                <h3 class="font-bold">Register Now</h3>
                <p>Please fill in the fields below</p>
            </div>

            <?php if($errors->any()): ?>
                <div class="alert alert-danger"><?php echo e(implode(', ', $errors->all())); ?></div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('register')); ?>">
                <?php echo csrf_field(); ?>
                <div class="flex gap-y-2 flex-col">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input name="name" placeholder="Name" type="text" class="form-control" required
                            value="<?php echo e(old('name')); ?>" pattern="[A-Za-z]+" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input name="email" placeholder="Email" type="email" class="form-control" required
                            value="<?php echo e(old('email')); ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Mobile</label>
                        <input name="mobile" placeholder="Mobile" type="text" class="form-control" required
                            maxlength="10" value="<?php echo e(old('mobile')); ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input name="password" placeholder="password" type="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input name="password_confirmation" placeholder="Confirm Password" type="password"
                            class="form-control" required>
                    </div>
                </div>
                <button type="submit" class="btn-main w-full">Register</button>
            </form>
            <div class="customer-option mt-4 text-center">
                <span class="text-secondary">No account yet?</span>
                <a href="<?php echo e(route('login')); ?>" class="btn-text js-show-register">Login</a>
            </div>
        </div>
    </div>
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
<?php /**PATH C:\Users\hp\Desktop\ECOMSELLER\resources\views/auth/register.blade.php ENDPATH**/ ?>