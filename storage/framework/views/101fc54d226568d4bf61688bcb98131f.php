<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'favrate-products']); ?>
    
    <style>
        .filled-heart {
            color: red
        }
    </style>
    <main class="pt-90">
        <div class="mb-4 pb-4"></div>
        <section class="my-account container">
            <h2 class="page-title">Wishlist</h2>
            <div class="row">
                <div class="col-lg-3">
                    <?php echo $__env->make('user.account-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
                <div class="col-lg-9">
                    <div class="page-content my-account__wishlist">
                        <?php if(Cart::instance('wishlist')->content()->count() > 0): ?>
                            <div class="products-grid row row-cols-2 row-cols-lg-3" id="products-grid">
                                <?php $__currentLoopData = $wishlistItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wishlistItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="product-card-wrapper">
                                        <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                                            <div class="pc__img-wrapper">
                                                <div class="swiper-container background-img js-swiper-slider"
                                                    data-settings='{"resizeObserver": true}'>
                                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <div class="swiper-wrapper">
                                                            <div class="swiper-slide">
                                                                <img loading="lazy"
                                                                    src="<?php echo e('storage/uploads/products/thumbnails/' . $product->image); ?>"
                                                                    width="330" height="400"
                                                                    alt="Cropped Faux leather Jacket" class="pc__img" />
                                                            </div>
                                                            <div class="swiper-slide">
                                                                <?php $__currentLoopData = explode(',', $product->images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    
                                                                    <img loading="lazy"
                                                                        src="<?php echo e(asset('storage/uploads/products/gallery/' . trim($path))); ?>"
                                                                        width="330" height="400"
                                                                        alt="Product Image" class="pc__img">
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                                            </div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <span class="pc__img-prev"><svg width="7" height="11"
                                                            viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
                                                            <use href="#icon_prev_sm" />
                                                        </svg></span>
                                                    <span class="pc__img-next"><svg width="7" height="11"
                                                            viewBox="0 0 7 11" xmlns="http://www.w3.org/2000/svg">
                                                            <use href="#icon_next_sm" />
                                                        </svg></span>
                                                </div>
                                                <form
                                                    action="<?php echo e(route('wishlist.item.remove', ['rowId' => $wishlistItem->rowId])); ?>"
                                                    method="POST" id="remove-item-<?php echo e($wishlistItem->id); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <a href="javascript:void(0)" class="btn-remove-from-wishlist"
                                                        onclick="document.getElementById('remove-item-<?php echo e($wishlistItem->id); ?>').submit();">
                                                        <svg width="12" height="12" viewBox="0 0 12 12"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <use href="#icon_close" />
                                                        </svg>
                                                    </a>
                                                </form>
                                            </div>

                                            <div class="pc__info position-relative">
                                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <p class="pc__category"><?php echo e($product->category->name); ?></p>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <h6 class="pc__title"><?php echo e($wishlistItem->name); ?></h6>
                                                <div class="product-card__price d-flex">
                                                    <span class="money price">₹<?php echo e($wishlistItem->price); ?></span>
                                                </div>

                                                <?php if(Cart::instance('wishlist')->content()->where('id', $product->id)->count() > 0): ?>
                                                    <form
                                                        action="<?php echo e(route('wishlist.item.remove', ['rowId' => Cart::instance('wishlist')->content()->where('id', $product->id)->first()->rowId])); ?>"
                                                        method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button
                                                            class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist filled-heart"
                                                            title="Remove from Wishlist">
                                                            <svg width="16" height="16" viewBox="0 0 20 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <use href="#icon_heart" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                <?php else: ?>
                                                    <form action="<?php echo e(route('wishlist.add')); ?>" method="post">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="id"
                                                            value="<?php echo e($product->id); ?>" />
                                                        <input type="hidden" name="name"
                                                            value="<?php echo e($product->name); ?>" />
                                                        <input type="hidden" name="quantity" value="1" />
                                                        <input type="hidden" name="price"
                                                            value="<?php echo e($product->sale_price == '' ? $product->regular_price : $product->sale_price); ?>" />
                                                        <button
                                                            class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist"
                                                            title="Add To Wishlist">
                                                            <svg width="16" height="16" viewBox="0 0 20 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <use href="#icon_heart" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php else: ?>
                        <div class="row justify-content-center align-items-center" style="min-height: 300px;">
                            <div class="col-md-6 text-center">
                                <p class="mb-3">No item found in your wishlist</p>
                                <a href="<?php echo e(route('shop.index')); ?>" class="btn btn-info">Wishlist Now</a>
                            </div>
                        </div>                        
                        <?php endif; ?>
                    </div>
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
<?php /**PATH C:\Users\hp\Desktop\ECOMSELLER\resources\views/user/account-wishlist.blade.php ENDPATH**/ ?>