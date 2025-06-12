<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'T-Shirts-TRDNT']); ?>
    <!-- Hero Section -->
    <section class="hero">
        <img src="https://ext.same-assets.com/1571473267/1748522909.jpeg" alt="T-shirts background" class="hero-bg">
        <div class="hero-overlay">
            <h1>T-SHIRTS COLLECTION</h1>
            <a href="#tshirts" class="btn-main">Shop T-Shirts</a>
        </div>
    </section>

    <div class="container my-5" id="tshirts">
        <h2 class="mb-4 text-center fw-bold">All T-Shirts</h2>
        <div class="row g-4">
            <div class="col-md-3 col-sm-6">
                <div class="card h-100 shadow-sm product-card">
                    <img src="https://ext.same-assets.com/1571473267/3950762552.jpeg" class="card-img-top"
                        alt="Stealth Black T Shirt" loading="lazy">
                    <div class="card-body text-center">
                        <span class="badge bg-danger mb-2">SALE</span>
                        <h5 class="card-title">Stealth Black T Shirt</h5>
                        <div class="mb-1 text-warning">★★★★☆</div>
                        <div class="mb-2"><span class="fw-bold text-danger">£27.00</span> <span
                                class="text-decoration-line-through text-muted ms-1">£32.00</span></div>
                        <a href="cart.html" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card h-100 shadow-sm product-card">
                    <img src="https://ext.same-assets.com/1571473267/1644165826.jpeg" class="card-img-top"
                        alt="Deep Shadow Black T Shirt" loading="lazy">
                    <div class="card-body text-center">
                        <span class="badge bg-danger mb-2">SALE</span>
                        <h5 class="card-title">Deep Shadow Black T Shirt</h5>
                        <div class="mb-1 text-warning">★★★★☆</div>
                        <div class="mb-2"><span class="fw-bold text-danger">£27.00</span> <span
                                class="text-decoration-line-through text-muted ms-1">£32.00</span></div>
                        <a href="cart.html" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card h-100 shadow-sm product-card">
                    <img src="https://ext.same-assets.com/1571473267/437587415.png" class="card-img-top"
                        alt="Desert Storm Khaki T Shirt" loading="lazy">
                    <div class="card-body text-center">
                        <span class="badge bg-danger mb-2">SALE</span>
                        <h5 class="card-title">Desert Storm Khaki T Shirt</h5>
                        <div class="mb-1 text-warning">★★★★☆</div>
                        <div class="mb-2"><span class="fw-bold text-danger">£27.00</span> <span
                                class="text-decoration-line-through text-muted ms-1">£32.00</span></div>
                        <a href="cart.html" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="card h-100 shadow-sm product-card">
                    <img src="https://ext.same-assets.com/1571473267/1748522909.jpeg" class="card-img-top"
                        alt="Heather Navy T-shirt" loading="lazy">
                    <div class="card-body text-center">
                        <span class="badge bg-danger mb-2">SALE</span>
                        <h5 class="card-title">Heather Navy T-shirt</h5>
                        <div class="mb-1 text-warning">★★★★☆</div>
                        <div class="mb-2"><span class="fw-bold text-danger">£27.00</span> <span
                                class="text-decoration-line-through text-muted ms-1">£32.00</span></div>
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
<?php /**PATH C:\Users\hp\Desktop\ECOMSELLER\resources\views/t-shirt.blade.php ENDPATH**/ ?>