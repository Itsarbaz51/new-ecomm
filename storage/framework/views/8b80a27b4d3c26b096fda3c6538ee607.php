    <?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'about-us']); ?>
        <main class="container py-5">
            <h2 class="mb-5 text-center fw-bold display-5">About Us</h2>

            <div class="row align-items-center g-5">
                <div class="col-md-6">
                    <img src="https://trdnt.co.uk/cdn/shop/files/White_Minimalist_New_Arrival_Instagram_Post.png?v=1730928170&width=940"
                        class="img-fluid rounded-4 shadow-sm" alt="ABOUT">
                </div>
                <div class="col-md-6">
                    <h3 class="mb-3 fw-semibold">Our Story</h3>
                    <p class="text-muted">Welcome. Born from a passion for bold design and uncompromising comfort, our
                        journey began with a simple mission: to redefine casual wear and empower you to express your
                        unique style. Each piece is crafted with premium fabrics and meticulous attention to detail,
                        ensuring a perfect balance of form and function for every occasion.</p>

                    <h4 class="mt-4 mb-3 fw-semibold">Our Values</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Innovation in
                            design</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Eco-friendly
                            materials</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Ethical
                            manufacturing</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Customer-first
                            approach</li>
                    </ul>
                </div>
            </div>
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
<?php /**PATH C:\Users\hp\Desktop\ECOMSELLER\resources\views/home/about.blade.php ENDPATH**/ ?>