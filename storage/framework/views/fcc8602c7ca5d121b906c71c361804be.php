<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'shop']); ?>
    <section>
        <?php if($current_category): ?>
        <div class="hero-slide-wrapper">
            <img src="<?php echo e(asset('storage/uploads/categories/' . $current_category->image)); ?>" alt=<?php echo e($current_category->name); ?> class="w-full h-full object-cover">
            <div
                class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center text-center text-white px-4">
                <h1 class="text-3xl md:text-5xl font-bold mb-4 drop-shadow"><?php echo e(strtoupper($current_category->name)); ?>

                    </h1>
                <a href="#productGrid" class="btn-main">Browse Now</a>
            </div>
        </div>
        <?php else: ?>
        
        <div class="hero-slide-wrapper w-full h-full relative">
            <img src="https://trdnt.co.uk/cdn/shop/files/Black___Pink_Grunge_Coming_Soon_Instagram_Post__1366_x_1000_px.png?v=1730924497&width=1780"
                alt="Shop background" class="w-full h-full object-cover">
            <div
                class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center text-center text-white px-4">
                <h1 class="text-3xl md:text-5xl font-bold mb-4 drop-shadow">SHOP ALL PRODUCTS</h1>
                <a href="#productGrid" class="btn-main">Browse Now</a>
            </div>
        </div>
        <?php endif; ?>



        <div style="padding: 0px 10px">

            <div class="container-fluid px-3">
                <div class="row align-items-center mb-4 pb-md-2">
                    <!-- Breadcrumb -->
                    <div class="col-12 col-md-6 mb-2 mb-md-0 items-center">
                        <div>
                            <a href="<?php echo e(route('home.index')); ?>" class="menu-link text-uppercase fw-medium">Home</a>
                            <span class="breadcrumb-separator fw-medium px-1">/</span>
                            <a href="#" class="menu-link text-uppercase fw-medium">The Shop</a>
                        </div>
                    </div>

                    <!-- Sort & Filter Controls -->
                    <div
                        class="col-12 col-md-6 d-flex flex-wrap justify-content-between justify-content-md-end align-items-center gap-2">
                        <!-- Page Size Dropdown -->
                        <select class="form-select w-auto border-2 py-0" name="pagesize" id="pagesize">
                            <option value="12" <?php echo e($size==12 ? 'selected' : ''); ?>>Show</option>
                            <option value="24" <?php echo e($size==24 ? 'selected' : ''); ?>>24</option>
                            <option value="48" <?php echo e($size==48 ? 'selected' : ''); ?>>48</option>
                            <option value="102" <?php echo e($size==102 ? 'selected' : ''); ?>>102</option>
                        </select>

                        <!-- Order Dropdown -->
                        <select class="form-select w-auto border-2 py-0" name="orderby" id="orderby">
                            <option value="-1" <?php echo e($order==-1 ? 'selected' : ''); ?>>Default</option>
                            <option value="1" <?php echo e($order==1 ? 'selected' : ''); ?>>Date, New to Old</option>
                            <option value="2" <?php echo e($order==2 ? 'selected' : ''); ?>>Date, Old to New</option>
                            <option value="3" <?php echo e($order==3 ? 'selected' : ''); ?>>Price, Low to High</option>
                            <option value="4" <?php echo e($order==4 ? 'selected' : ''); ?>>Price, High to Low</option>
                        </select>
                    </div>
                </div>
            </div>


            <?php if($products->isEmpty()): ?>
            <div class="flex flex-col items-center justify-center py-16 text-center text-gray-500">
                <svg style="width: 50px" class="mb-4 text-red-400" fill="none" stroke="currentColor" stroke-width="1.5"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v2m0 4h.01M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z" />
                </svg>
                <p class="text-lg font-medium text-red-500">No items found.</p>
                <p class="text-sm text-gray-400 mt-1">Please try adjusting your filters or search terms.</p>
            </div>
            <?php else: ?>
            <div class="container my-5" id="productGrid">
                <h2 class="mb-5 text-center fw-bold">All Products</h2>
                <div class="flex gap-4 overflow-x-auto" id="products-grid">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col">
                        <div class="card h-100 w-72 lg:w-fit shadow-sm product-card product-hover">
                            <div class="position-relative overflow-hidden">
                                
                                <div class="swiper-container" data-settings='{"resizeObserver": true}'>
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide flex justify-center items-center">
                                            <a
                                                href="<?php echo e(route('shop.product.details', ['product_slug' => $product->slug])); ?>">
                                                <img src="<?php echo e(asset('storage/uploads/products/thumbnails/' . $product->image)); ?>"
                                                    class="object-contain" alt="<?php echo e($product->name); ?>">
                                            </a>
                                        </div>
                                        <?php $__currentLoopData = explode(',', $product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="swiper-slide">
                                            <a
                                                href="<?php echo e(route('shop.product.details', ['product_slug' => $product->slug])); ?>">
                                                <img src="<?php echo e(asset('storage/uploads/products/gallery/' . trim($image))); ?>"
                                                    class="card-img-top product-image" alt="<?php echo e($product->name); ?>">
                                            </a>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="card-body text-center">
                                <p class="card-title small text-muted mb-1"><?php echo e($product->category->name); ?></p>
                                <h6 class="card-title mb-2">
                                    <a href="<?php echo e(route('shop.product.details', ['product_slug' => $product->slug])); ?>"
                                        class="text-dark text-decoration-none"><?php echo e($product->name); ?></a>
                                </h6>

                                
                                <div class="mb-2">
                                    <?php if($product->sale_price): ?>
                                    <span class="text-decoration-line-through text-muted me-2">₹<?php echo e($product->regular_price); ?></span>
                                    <span class="fw-bold text-danger">₹<?php echo e($product->sale_price); ?></span>
                                    <?php else: ?>
                                    <span class="fw-bold text-dark">₹<?php echo e($product->regular_price); ?></span>
                                    <?php endif; ?>
                                </div>

                                
                                <div class="d-flex justify-content-center align-items-center mb-3">
                                    <div class="product-single__rating">
                                        <div class="reviews-group d-flex">
                                            <?php
                                            // Filter reviews that belong to this product
                                            $productReviews = $reviews->where('product_id', $product->id);

                                            // Get max rating from these reviews
                                            $maxRating = $productReviews->max('rating');
                                            ?>

                                            
                                            <?php for($i = 1; $i <= $maxRating; $i++): ?> <svg class="review-star"
                                                viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg" fill="#FFD700">
                                                <use href="#icon_star" />
                                                </svg>
                                                <?php endfor; ?>

                                                 <?php for($i=$maxRating + 1; $i
                                                    <=5; $i++): ?> <svg class="star-rating__star-icon" width="12"
                                                    height="12" fill="#ccc" viewBox="0 0 12 12"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z" />
                                                    </svg>
                                                    <?php endfor; ?>
                                        </div>

                                        <span class="reviews-note text-lowercase text-secondary ms-1"><?php echo e($productReviews->count()); ?>

                                            reviews</span>
                                    </div>
                                </div>

                                
                                <div class="product-action transition">
                                    <?php if(Cart::instance('cart')->content()->where('id', $product->id)->count() >
                                    0): ?>
                                    <a href="<?php echo e(route('cart.index')); ?>" class="btn btn-primary">Go to
                                        Cart</a>
                                    <?php else: ?>
                                    <form method="POST" action="<?php echo e(route('cart.add')); ?>">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                                        <input type="hidden" name="name" value="<?php echo e($product->name); ?>">
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="price"
                                            value="<?php echo e($product->sale_price ?: $product->regular_price); ?>">
                                        <button type="submit" class="btn-main">Add to Cart</button>
                                    </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>

            <div class="divdev"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                <?php echo e($products->withQueryString()->links('pagination::bootstrap-5')); ?>

            </div>
        </div>
    </section>

    <form id="frmfilter" method="GET" accept="<?php echo e(route('shop.index')); ?>">

        <input type="hidden" name="page" value="<?php echo e($products->currentPage()); ?>">
        <input type="hidden" name="size" id="size" value="<?php echo e($size); ?>" />
        <input type="hidden" name="order" id="order" value="<?php echo e($order); ?>" />
        <input type="hidden" name="brands" id="hdnBrands" />
        <input type="hidden" name="categories" id="hdnCategories" />
        <input type="hidden" name="min" id="hdnMinPrice" value="<?php echo e($min_price); ?>" />
        <input type="hidden" name="max" id="hdnMaxPrice" value="<?php echo e($max_price); ?>" />
    </form>
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
        $("#pagesize").on("change", function() {
            $("#size").val($("#pagesize option:selected").val());
            $("#frmfilter").submit();
        });

        $("#orderby").on("change", function() {
            $("#order").val($("#orderby option:selected").val());
            $("#frmfilter").submit();
        });

        $("input[name='brands']").on("change", function() {
            let brands = '';
            $("input[name='brands']:checked").each(function() {
                if (brands == '') {
                    brands += $(this).val();
                } else {
                    brands += "," + $(this).val();
                }
            });
            $("#hdnBrands").val(brands);
            $("#frmfilter").submit();

        });

        $("input[name='categories']").on("change", function() {
            let categories = '';
            $("input[name='categories']:checked").each(function() {
                if (categories == '') {
                    categories += $(this).val();
                } else {
                    categories += "," + $(this).val();
                }
            });
            $("#hdnCategories").val(categories);
            $("#frmfilter").submit();

        });

    });
</script>
<?php /**PATH C:\Users\hp\Desktop\ECOMSELLER\resources\views/shop.blade.php ENDPATH**/ ?>