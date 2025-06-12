<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Privacy Policy']); ?>
    <section class="w-full bg-gray-50 py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav class="text-sm mb-6 text-gray-600 flex items-center space-x-2">
               <a href="<?php echo e(route('home.index')); ?>" class="text-gray-700 no-underline">Home</a>
                <span>/</span>
                <span class="text-gray-800 font-medium">Privacy Policy</span>
            </nav>

            <!-- Card Container -->
            <div class="p-8">
                <h1 class="text-3xl font-bold text-gray-900 uppercase mb-6">Privacy Policy</h1>
                <p class="text-gray-700 leading-relaxed space-y-4">
                    Our company respects your privacy and is committed to protecting your personal information. This
                    Privacy
                    Policy explains how we collect, use, and disclose your personal information when you use our
                    services.
                </p>

                <p class="text-gray-700 leading-relaxed mt-4">
                    We collect personal information that you provide to us when you use our services. This information
                    may
                    include your name, email address, shipping address, payment information, and other details necessary
                    to provide our services to you. We use this information to process your orders, communicate with you
                    about your orders, and provide customer support.
                </p>

                <p class="text-gray-700 leading-relaxed mt-4">
                    We may also collect certain information automatically when you use our services, such as your IP
                    address, device type, and browser type. We use this data to improve our services and to better
                    understand how our users interact with our website.
                </p>

                <p class="text-gray-700 leading-relaxed mt-4">
                    We do not sell or rent your personal information to third parties. We may share your personal
                    information with third-party service providers who assist us in providing our services, such as
                    payment
                    processors and shipping companies. We require these partners to maintain confidentiality and only
                    use
                    your information to fulfill their duties.
                </p>

                <p class="text-gray-700 leading-relaxed mt-4">
                    If you have any questions or concerns about our Privacy Policy, please contact us.
                </p>
            </div>
        </div>
    </section>
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
<?php /**PATH C:\Users\hp\Desktop\ECOMSELLER\resources\views/home/privacyPolicy.blade.php ENDPATH**/ ?>