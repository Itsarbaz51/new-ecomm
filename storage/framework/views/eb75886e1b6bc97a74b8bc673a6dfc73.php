<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Contact Us']); ?>
    <style>
        .contact-us__form {
            background-color: #f9f9f9;
            padding: 2rem;
            border-radius: 0.75rem;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.05);
        }

        .contact-us__form label {
            font-weight: 500;
        }

        .contact-us__form .form-control {
            border-radius: 6px;
        }

        .btn-submit {
            padding: 0.6rem 2rem;
            border-radius: 6px;
            font-weight: 600;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .breadcrumb-nav {
            font-size: 0.9rem;
        }
    </style>

    <main class="pt-5">
        <div class="container mb-4">
            <div class="breadcrumb-nav">
                <a href="<?php echo e(route('home.index')); ?>"
                    class="text-uppercase fw-medium text-decoration-none text-danger">Home</a>
                <span class="px-2">/</span>
                <span class="text-uppercase fw-medium">Get In Touch</span>
            </div>
            <hr />
        </div>

        <section class="contact-us container">
            <div class="mw-930 mx-auto">
                <h2 class="page-title">Contact Us</h2>

                <?php if(Session::has('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo e(Session::get('success')); ?>

                    </div>
                <?php endif; ?>

                <div class="contact-us__form">
                    <form name="contact-us-form" class="needs-validation" novalidate method="POST"
                        action="<?php echo e(route('home.contact.store')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="mb-3">
                            <label for="contact_us_name" class="form-label">Name *</label>
                            <input type="text" class="form-control" name="name" id="contact_us_name"
                                placeholder="Your Name" required value="<?php echo e(old('name')); ?>" />
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3">
                            <label for="contact_us_phone" class="form-label">Phone *</label>
                            <input type="text" class="form-control" name="phone" id="contact_us_phone"
                                placeholder="Your Phone Number" required value="<?php echo e(old('phone')); ?>">
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3">
                            <label for="contact_us_email" class="form-label">Email *</label>
                            <input type="email" class="form-control" name="email" id="contact_us_email"
                                placeholder="Your Email Address" required value="<?php echo e(old('email')); ?>">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-4">
                            <label for="contact_us_message" class="form-label">Message *</label>
                            <textarea class="form-control" name="comment" id="contact_us_message" placeholder="Your Message" rows="6"
                                required><?php echo e(old('comment')); ?></textarea>
                            <?php $__errorArgs = ['comment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger mt-1"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-submit bg-black text-white w-100">Submit</button>
                        </div>
                    </form>
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
<?php /**PATH C:\Users\hp\Desktop\ECOMSELLER\resources\views/home/contact.blade.php ENDPATH**/ ?>