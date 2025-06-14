<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'account-address-edit']); ?>
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="my-account container">
            <h2 class="page-title">Address</h2>
            <div class="row">
                <div class="col-lg-3">
                    <?php echo $__env->make('user.account-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
                <div class="col-lg-9">
                    <div class="page-content my-account__address">
                        <div class="row">
                            <div class="col-6">
                                <p class="notice">The following addresses will be used on the checkout page by default.
                                </p>
                            </div>
                            <div class="col-6 text-right">
                                <a href="<?php echo e(route('user.address')); ?>" class="btn btn-sm btn-danger">Back</a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="card mb-5">
                                    <div class="card-header">
                                        <h5>Edit Address</h5>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?php echo e(route('user.address.update')); ?>" method="POST">
                                            <?php echo method_field('PUT'); ?>
                                            <input type="hidden" name="id" value="<?php echo e($address->id); ?>" />
                                            <?php echo csrf_field(); ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="my-3">
                                                        <label class="form-label" for="name">Full Name *</label>
                                                        <input type="text" class="form-control" name="name"
                                                            value="<?php echo e($address->name); ?>" />
                                                    </div>
                                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="my-3">
                                                        <label class="form-label" for="phone">Phone Number *</label>
                                                        <input type="text" class="form-control" name="phone"
                                                            value="<?php echo e($address->phone); ?>" />
                                                    </div>
                                                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="my-3">
                                                        <label class="form-label" for="zip">Pincode *</label>
                                                        <input type="text" class="form-control" name="zip"
                                                            value="<?php echo e($address->zip); ?>" />
                                                    </div>
                                                    <?php $__errorArgs = ['zip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mt-3 mb-3">
                                                        <label class="form-label" for="state">State *</label>
                                                        <input type="text" class="form-control" name="state"
                                                            value="<?php echo e($address->state); ?>" />
                                                    </div>
                                                    <?php $__errorArgs = ['state'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="my-3">
                                                        <label class="form-label" for="city">Town / City *</label>
                                                        <input type="text" class="form-control" name="city"
                                                            value="<?php echo e($address->city); ?>" />
                                                    </div>
                                                    <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="my-3">
                                                        <label class="form-label" for="address">House no, Building Name
                                                            *</label>
                                                        <input type="text" class="form-control" name="address"
                                                            value="<?php echo e($address->address); ?>" />
                                                    </div>
                                                    <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="my-3">
                                                        <label class="form-label" for="locality">Road Name, Area, Colony
                                                            *</label>
                                                        <input type="text" class="form-control" name="locality"
                                                            value="<?php echo e($address->locality); ?>" />
                                                    </div>
                                                    <?php $__errorArgs = ['locality'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="my-3">
                                                        <label class="form-label" for="landmark">Landmark *</label>
                                                        <input type="text" class="form-control" name="landmark"
                                                            value="<?php echo e($address->landmark); ?>" />
                                                    </div>
                                                    <?php $__errorArgs = ['landmark'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                        <span class="text-danger"><?php echo e($message); ?></span>
                                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                </div>
                                                
                                                <div class="col-md-12 text-right">
                                                    <button type="submit" class="btn-main">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
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
<?php /**PATH C:\Users\hp\Desktop\ECOMSELLER\resources\views/user/account-address-edit.blade.php ENDPATH**/ ?>