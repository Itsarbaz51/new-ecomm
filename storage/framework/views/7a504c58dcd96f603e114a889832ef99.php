<?php if (isset($component)) { $__componentOriginal91fdd17964e43374ae18c674f95cdaa3 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal91fdd17964e43374ae18c674f95cdaa3 = $attributes; } ?>
<?php $component = App\View\Components\AdminLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AdminLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'setting']); ?>
    <style>
        .text-danger {
            font-size: initial;
            line-height: 36px;
        }

        .alert {
            font-size: initial;
        }
    </style>

    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Account Edit</h3>
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
                        <div class="text-tiny">Account</div>
                    </li>
                </ul>
            </div>

            <div class="wg-box">
                <div class="col-lg-12">
                    <div class="page-content my-account__edit">
                        <?php if(Session::has('success')): ?>
                            <div class="alert alert-success"><?php echo e(Session::get('success')); ?></div>
                        <?php endif; ?>
                        <div class="my-account__edit-form">
                            <form name="account_edit_form" action="<?php echo e(route('admin.account.update')); ?>" method="POST"
                                class="form-new-product form-style-1 needs-validation" novalidate="" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($user->id); ?>" />
                                <?php echo method_field('PUT'); ?>
                                <fieldset class="name">
                                    <div class="body-title">Name <span class="tf-color-1">*</span>
                                    </div>
                                    <input class="flex-grow" type="text" placeholder="Full Name" name="name"
                                        tabindex="0" value="<?php echo e($user->name); ?>" aria-required="true" required="">
                                </fieldset>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                <fieldset class="name">
                                    <div class="body-title">Mobile Number <span class="tf-color-1">*</span></div>
                                    <input class="flex-grow" type="text" placeholder="Mobile Number" name="mobile"
                                        tabindex="0" value="<?php echo e($user->mobile); ?>" aria-required="true" required="">
                                </fieldset>
                                <?php $__errorArgs = ['mobile'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <fieldset class="name">
                                    <div class="body-title">Email Address <span class="tf-color-1">*</span></div>
                                    <input class="flex-grow" type="text" placeholder="Email Address" name="email"
                                        tabindex="0" value="<?php echo e($user->email); ?>" aria-required="true" required="">
                                </fieldset>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <div class="text-danger"><?php echo e($message); ?></div>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                <fieldset>
                                    <div class="body-title">
                                        Upload images <span class="tf-color-1">*</span>
                                    </div>

                                    <div class="upload-image flex-grow">

                                        <div class="item" id="imgpreview">
                                            <?php if($user->image): ?>
                                                <img src="<?php echo e(asset('storage/uploads/adminImage/' . $user->image)); ?>"
                                                    class="effect8" alt="User Image">
                                            <?php else: ?>
                                                <img src="<?php echo e(asset('images/default-admin-image.png')); ?>" class="effect8"
                                                    alt="Default Avatar">
                                            <?php endif; ?>
                                        </div>

                                        
                                        <div id="upload-file" class="item up-load">
                                            <label class="uploadfile" for="myFile">
                                                <span class="icon">
                                                    <i class="icon-upload-cloud"></i>
                                                </span>
                                                <span class="body-text">
                                                    Drop your images here or select <span class="tf-color">click to
                                                        browse</span>
                                                </span>
                                                <input type="file" id="myFile" name="image" accept="image/*">
                                            </label>
                                        </div>

                                    </div>
                                </fieldset>

                                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="alert alert-danger text-center"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="my-3">
                                            <h5 class="text-uppercase mb-0">Password Change</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <fieldset class="name">
                                            <div class="body-title pb-3">Old password <span class="tf-color-1">*</span>
                                            </div>
                                            <input class="flex-grow" type="password" placeholder="Old password"
                                                id="old_password" name="old_password" aria-required="true"
                                                required="">
                                        </fieldset>
                                        <?php $__errorArgs = ['old_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>
                                    <div class="col-md-12">
                                        <fieldset class="name">
                                            <div class="body-title pb-3">New password <span
                                                    class="tf-color-1">*</span>
                                            </div>
                                            <input class="flex-grow" type="password" placeholder="New password"
                                                id="new_password" name="new_password" aria-required="true"
                                                required="">
                                        </fieldset>
                                        <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                    </div>
                                    <div class="col-md-12">
                                        <fieldset class="name">
                                            <div class="body-title pb-3">Confirm new password <span
                                                    class="tf-color-1">*</span></div>
                                            <input class="flex-grow" type="password"
                                                placeholder="Confirm new password" cfpwd=""
                                                data-cf-pwd="#new_password" id="new_password_confirmation"
                                                name="new_password_confirmation" aria-required="true" required="">
                                            <div class="invalid-feedback">Passwords did not match!
                                            </div>
                                        </fieldset>
                                        <?php $__errorArgs = ['new_password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="text-danger"><?php echo e($message); ?></div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="my-3">
                                            <button type="submit" class="btn btn-primary tf-button w208">Save
                                                Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
    $(document).ready(function() {
        $('#myFile').on('change', function() {
            const file = this.files[0];

            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();

                reader.onload = function(event) {
                    $('#imgpreview').html(
                        `<img src="${event.target.result}" class="effect8" alt="preview">`
                    );
                };

                reader.readAsDataURL(file);
            } else {
                alert("Please upload a valid image file.");
            }
        });
    });
</script>
<?php /**PATH C:\Users\hp\Desktop\ECOMSELLER\resources\views/admin/setting.blade.php ENDPATH**/ ?>