<div class="tab-content tab-active" id="productGrid">
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
    <div class="container my-5">
        <div class="flex gap-4 overflow-x-auto">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col">
                <div class="card h-100 w-72 lg:w-fit shadow-sm product-card product-hover">
                    <div class="position-relative overflow-hidden">
                        
                        <div class="swiper-container" data-settings='{"resizeObserver": true}'>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide flex justify-center items-center">
                                    <a href="<?php echo e(route('shop.product.details', ['product_slug' => $product->slug])); ?>">
                                        <img src="<?php echo e(asset('storage/uploads/products/thumbnails/' . $product->image)); ?>"
                                            class="object-contain" alt="<?php echo e($product->name); ?>">
                                    </a>
                                </div>
                                <?php $__currentLoopData = explode(',', $product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide">
                                    <a href="<?php echo e(route('shop.product.details', ['product_slug' => $product->slug])); ?>">
                                        <img src="<?php echo e(asset('storage/uploads/products/gallery/' . trim($image))); ?>"
                                            class="card-img-top object-contain product-image"
                                            alt="<?php echo e($product->name); ?>">
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

                        
                        <?php
                        // Filter reviews for this product
                        $productReviews = $reviews->where('product_id', $product->id);
                        $averageRating = round($productReviews->avg('rating'), 1);
                        $roundedRating = floor($averageRating);
                        ?>

                        <div class="d-flex justify-content-center align-items-center mb-3">
                            <div class="product-single__rating">
                                <div class="reviews-group d-flex">

                                    
                                    <?php for($i = 1; $i <= $roundedRating; $i++): ?> <svg class="review-star" viewBox="0 0 9 9"
                                        xmlns="http://www.w3.org/2000/svg" fill="#FFD700">
                                        <use href="#icon_star" />
                                        </svg>
                                        <?php endfor; ?>

                                        
                                        <?php for($i = $roundedRating + 1; $i <= 5; $i++): ?> <svg
                                            class="star-rating__star-icon" width="12" height="12" fill="#ccc"
                                            viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z" />
                                            </svg>
                                            <?php endfor; ?>
                                </div>

                                <span class="reviews-note text-lowercase text-secondary ms-1">
                                    <?php echo e($productReviews->count()); ?> reviews
                                </span>
                            </div>
                        </div>


                        
                        <div class="product-action transition">
                            <?php if(Cart::instance('cart')->content()->where('id', $product->id)->count() > 0): ?>
                            <a href="<?php echo e(route('cart.index')); ?>" class="btn-go-to-cart">Go to
                                Cart</a>
                            <?php else: ?>
                            <form method="POST" action="<?php echo e(route('cart.add')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($product->id); ?>">
                                <input type="hidden" name="name" value="<?php echo e($product->name); ?>">
                                <?php
                                $sizes = is_array($product->sizes) ? $product->sizes :
                                json_decode($product->sizes, true);
                                ?>

                                <input type="hidden" name="selected_size" value="<?php echo e($sizes[0]); ?>">

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
</div>
<?php /**PATH C:\Users\hp\Desktop\e_commerce\resources\views/layouts/products.blade.php ENDPATH**/ ?>