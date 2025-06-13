<?php if (isset($component)) { $__componentOriginal91fdd17964e43374ae18c674f95cdaa3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3 = $attributes; } ?>
<?php $component = App\View\Components\AdminLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AdminLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'users-reviews']); ?>
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>item</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="<?php echo e(route('admin.index')); ?>">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <a href="">
                            <div class="text-tiny">Reviews</div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="wg-box">
                <div class="flex items-center justify-between gap10 flex-wrap">
                    <div class="wg-filter flex-grow">
                        <form class="form-search">
                            <fieldset class="name">
                                <input type="text" placeholder="Search here..." class="" name="name"
                                    tabindex="2" value="" aria-required="true" required="">
                            </fieldset>
                            <div class="button-submit">
                                <button class="" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <a class="tf-button style-1 w208" href=""><i class="icon-plus"></i>Add
                        new</a>
                </div>
                <div class="wg-table table-all-user">
                    <?php if(Session::has('status')): ?>
                        <p class="alert alert-success"><?php echo e(Session::get('status')); ?></p>
                    <?php endif; ?>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Rating</th>
                                <th>Comment</th>
                                <th>Product Name</th>
                                <th>Creacted</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $userReviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($item->id); ?></td>
                                    <td class="pname" style="height: 110px;">
                                        <div class="image" >
                                            
                                            <img src="<?php echo e(asset('storage/uploads/reviewImage/' . $item->image)); ?>"
                                                alt="<?php echo e($item->title); ?>" class="image" >

                                        </div>
                                    </td>
                                    <td><?php echo e($item->name); ?></td>
                                    <td><?php echo e($item->email); ?></td>
                                    <td><?php echo e($item->rating); ?></td>
                                    <td><?php echo e($item->comment); ?></td>
                                    <td><?php echo e($item->product->name); ?></td>
                                    <td><?php echo e($item->creacted_at); ?></td>
                                    <td>
                                        <form action="<?php echo e(route('admin.uses-reviews.delete', ['id' => $item->id])); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <div class="item text-danger delete">
                                                <i class="icon-trash-2"></i>
                                            </div>
                                        </form>

                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                    <?php echo e($userReviews->links('pagination::bootstrap-5')); ?>

                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $attributes = $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__attributesOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3)): ?>
<?php $component = $__componentOriginal91fdd17964e43374ae18c674f95cdaa3; ?>
<?php unset($__componentOriginal91fdd17964e43374ae18c674f95cdaa3); ?>
<?php endif; ?>

<script>
    $(function() {
        $('.delete').on('click', function(e) {
            e.preventDefault();
            let form = $(this).closest('form');
            swal({
                title: "Are you sure?",
                text: "Sure!",
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
</script><?php /**PATH C:\Users\hp\Desktop\ECOMSELLER\resources\views/admin/user-review.blade.php ENDPATH**/ ?>