<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'account-address']); ?>
    <style>
        .text-success {
            color: rgb(66, 249, 0) !important;
        }
    </style>
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="my-account container">
            <h2 class="page-title">Addresses</h2>
            <div class="row">
                <div class="col-lg-2">
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
                                <a href="<?php echo e(route('user.address.add')); ?>" class="btn btn-sm btn-info">Add New</a>
                            </div>
                        </div>
                        <?php if(Session::has('success')): ?>
                            <p class="alert alert-success"><?php echo e(Session::get('success')); ?></p>
                        <?php endif; ?>
                        <div class="my-account__address-list row">
                            <h5>Shipping Address</h5>
                            
                            <?php $__currentLoopData = $address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="my-account__address-item col-md-6">
                                    <div class="my-account__address-item__title">
                                        <h5>
                                            <?php echo e($address->name); ?>

                                            <?php if($address->isdefault == 1): ?>
                                                <i class="fa fa-check-circle text-success">default address</i>
                                            <?php endif; ?>
                                        </h5>
                                        <div class="d-flex align-items-center gap-3">
                                            <a href="<?php echo e(route('user.address.edit', ['id' => $address->id])); ?>" class="text-primary text-decoration-none">
                                                Edit
                                            </a>
                                        
                                            <form action="<?php echo e(route('user.address.delete', ['id' => $address->id])); ?>" method="POST" >
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="delete btn btn-link p-0 m-0" style="color: red;">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                        
                                    </div>
                                    <div class="my-account__address-item__detail">
                                        <p><?php echo e($address->address); ?></p>
                                        <p><?php echo e($address->landmark); ?></p>
                                        <p><?php echo e($address->city); ?>, <?php echo e($address->state); ?>, <?php echo e($address->country); ?>

                                        </p>
                                        <p><?php echo e($address->zip); ?></p>
                                        <br />
                                        <p>Mobile : <?php echo e($address->phone); ?></p>
                                    </div>
                                </div>
                                <hr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
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
<script>
    $(function() {
        $('.delete').on('click', function(e) {
            e.preventDefault();
            let form = $(this).closest('form');
            swal({
                title: "Are you sure?",
                text: "Delete record!",
                icon: "warning",
                buttons: ["Cancel", "Yes, delete it!"],
                confirmButtonColor: '#dc3545',

            }).then((result) => {
                if (result) {
                    form.submit();
                }
            })
        })
    })
</script>
<?php /**PATH C:\Users\hp\Desktop\ECOMSELLER\resources\views/user/account-address.blade.php ENDPATH**/ ?>