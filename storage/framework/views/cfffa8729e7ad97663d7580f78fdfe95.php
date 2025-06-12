<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Hoodies']); ?>

    <!-- Hero Section -->
    <section class="hero">
        <img src="https://ext.same-assets.com/1571473267/3181566112.png" alt="Hoodies background" class="hero-bg">
        <div class="hero-overlay">
            <h1>HOODIES COLLECTION</h1>
            <a href="#hoodies" class="btn-main">Shop Hoodies</a>
        </div>
    </section>

    <div class="container my-5" id="hoodies">
        <h2 class="mb-4 text-center fw-bold">All Hoodies</h2>
        <div class="row g-4">
            <div class="col-md-4 col-sm-6">
                <div class="card h-100 shadow-sm product-card">
                    <img src="https://ext.same-assets.com/1571473267/3181566112.png" class="card-img-top"
                        alt="Heavy Black Graphics Hoodie" loading="lazy">
                    <div class="card-body text-center">
                        <span class="badge bg-danger mb-2">SALE</span>
                        <h5 class="card-title">Heavy Black Graphics Hoodie</h5>
                        <div class="mb-1 text-warning">★★★★☆</div>
                        <div class="mb-2"><span class="fw-bold text-danger">£33.00</span>
                            <span class="text-decoration-line-through text-muted ms-1">£47.00</span>
                        </div>
                        <a href="cart.html" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card h-100 shadow-sm product-card">
                    <img src="https://ext.same-assets.com/1571473267/955636875.jpeg" class="card-img-top"
                        alt="Limitless Unisex Hoodie" loading="lazy">
                    <div class="card-body text-center">
                        <span class="badge bg-danger mb-2">SALE</span>
                        <h5 class="card-title">Limitless Unisex Hoodie</h5>
                        <div class="mb-1 text-warning">★★★★☆</div>
                        <div class="mb-2"><span class="fw-bold text-danger">£47.85</span>
                            <span class="text-decoration-line-through text-muted ms-1">£57.00</span>
                        </div>
                        <a href="cart.html" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="card h-100 shadow-sm product-card">
                    <img src="https://ext.same-assets.com/1571473267/3542893602.jpeg" class="card-img-top"
                        alt="Heavyweight Chunky Unisex Hoodie" loading="lazy">
                    <div class="card-body text-center">
                        <span class="badge bg-danger mb-2">SALE</span>
                        <h5 class="card-title">Heavyweight Chunky Unisex Hoodie</h5>
                        <div class="mb-1 text-warning">★★★★☆</div>
                        <div class="mb-2"><span class="fw-bold text-danger">£40.00</span>
                            <span class="text-decoration-line-through text-muted ms-1">£50.00</span>
                        </div>
                        <a href="cart.html" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
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
<?php /**PATH C:\Users\hp\Desktop\ECOMSELLER\resources\views/hoodies.blade.php ENDPATH**/ ?>