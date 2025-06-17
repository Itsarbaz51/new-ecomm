<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Account Address']); ?>
    <main class="pt-16 pb-10 bg-gray-50">
        <section class="container mx-auto px-4">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">My Addresses</h2>
            <div class="flex flex-col lg:flex-row gap-6">
                
                <div class="w-full lg:w-1/4">
                    <?php echo $__env->make('user.account-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>

                
                <div class="w-full lg:w-3/4">
                    <div class="bg-white p-6 rounded-lg shadow-md space-y-4">
                        <?php if(Session::has('success')): ?>
                        <p class="text-green-600 font-medium bg-green-100 px-4 py-2 rounded">
                            <?php echo e(Session::get('success')); ?>

                        </p>
                        <?php endif; ?>

                        <p class="text-sm text-gray-600">The following addresses will be used on the checkout page by
                            default.</p>
                        <?php if($address->isEmpty()): ?> <a href="<?php echo e(route('user.address.add')); ?>"
                            class="btn btn-danger text-decoration-none">
                            Add New
                        </a>
                        <?php endif; ?>



                        <?php $__empty_1 = true; $__currentLoopData = $address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="border border-gray-200 rounded-md p-4 mb-4 bg-gray-50">
                            <div class="flex justify-between items-center mb-2">
                                <h3 class="text-lg font-semibold text-gray-800"><?php echo e($address->name); ?></h3>
                                <div class="flex gap-3">
                                    <a href="<?php echo e(route('user.address.edit', ['id' => $address->id])); ?>"
                                        class="text-blue-600 hover:underline">Edit</a>

                                    <form action="<?php echo e(route('user.address.delete', ['id' => $address->id])); ?>"
                                        method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="text-red-600 hover:underline delete">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="text-sm text-gray-700 space-y-1">
                                <p><?php echo e($address->address); ?></p>
                                <p><?php echo e($address->landmark); ?></p>
                                <p><?php echo e($address->city); ?>, <?php echo e($address->state); ?>, <?php echo e($address->country); ?></p>
                                <p><?php echo e($address->zip); ?></p>
                                <p class="mt-2 font-medium">Mobile: <?php echo e($address->phone); ?></p>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-gray-500">No address added yet.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>

    
    <script>
        $(function () {
            $('.delete').on('click', function (e) {
                e.preventDefault();
                let form = $(this).closest('form');
                swal({
                    title: "Are you sure?",
                    text: "This address will be permanently deleted.",
                    icon: "warning",
                    buttons: ["Cancel", "Yes, delete it!"],
                    dangerMode: true,
                }).then((confirmed) => {
                    if (confirmed) {
                        form.submit();
                    }
                });
            });
        });
    </script>
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
<?php /**PATH C:\Users\hp\Desktop\ECOMSELLER\resources\views/user/account-address.blade.php ENDPATH**/ ?>