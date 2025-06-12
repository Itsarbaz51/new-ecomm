<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Terms of Service']); ?>
    <section class="w-full bg-gray-50 py-12">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav class="text-sm mb-6 text-gray-600 flex items-center space-x-2">
                <a href="<?php echo e(route('home.index')); ?>" class="text-gray-700 hover:text-blue-600 no-underline">Home</a>
                <span>/</span>
                <span class="text-gray-800 font-medium">Terms of Service</span>
            </nav>

            <!-- Terms Card -->
            <div class="p-8">
                <h1 class="text-3xl font-bold text-gray-900 uppercase mb-6">Terms of Service</h1>

                <p class="text-gray-700 mb-4 leading-relaxed">
                    By using our services, you agree to the following Terms of Service:
                </p>

                <ul class="list-disc list-inside space-y-3 text-gray-700 leading-relaxed">
                    <li>You may use our services only for lawful purposes and in accordance with these Terms of Service.
                    </li>
                    <li>We reserve the right to refuse service to anyone for any reason at any time.</li>
                    <li>We may modify or terminate our services at any time, for any reason, without notice.</li>
                    <li>You are responsible for maintaining the confidentiality of your account information, including
                        your password.</li>
                    <li>We are not liable for any damages or losses resulting from your use of our services.</li>
                    <li>Our services are provided on an "as is" and "as available" basis, without warranties of any
                        kind, either express or implied.</li>
                    <li>We may change these Terms of Service at any time by posting the updated terms on our website.
                    </li>
                </ul>
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
<?php /**PATH C:\Users\hp\Desktop\ECOMSELLER\resources\views/home/termsOfService.blade.php ENDPATH**/ ?>