<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'E.COM.SELLER','bodyClass' => 'gradient-bg']); ?>
    <section class="swiper-container js-swiper-slider w-full h-[70vh] md:h-[80vh] lg:h-[90vh] relative" data-settings='{
            "autoplay": { "delay": 5000 },
            "slidesPerView": 1,
            "effect": "fade",
            "loop": true
        }'>
        <div class="swiper-wrapper w-full h-full">
            <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="swiper-slide w-full h-full relative">
                <img src="<?php echo e(asset('storage/uploads/slides/' . $slide->image)); ?>" alt="<?php echo e($slide->title); ?>"
                    class="w-full h-full object-cover" loading="lazy" />
                <div
                    class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center text-center text-white px-4">
                    <h1 class="text-3xl md:text-5xl font-bold mb-4 drop-shadow"><?php echo e($slide->title); ?></h1>
                    <a href="<?php echo e(route('shop.index')); ?>" class="btn-main">
                        Shop Now
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!-- Pagination -->
        <div class="absolute bottom-5 left-1/2 transform -translate-x-1/2 z-10">
            <div class="swiper-pagination !static"></div>
        </div>
    </section>



    <section class="products-tabs container">
        
        <div class="tabs overflow-auto">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $isActive =
            request('categories') == $category->id || (is_null(request('categories')) && $index === 0);
            ?>

            <a href="<?php echo e(route('home.index', ['categories' => $category->id])); ?>"
                class="tab <?php echo e($isActive ? 'active' : ''); ?>">
                <span class="text-[8px] sm:text-xs md:text-sm lg:text-base"><?php echo e(strtoupper($category->name)); ?></span>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        
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
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm product-card product-hover">
                            <div class="position-relative overflow-hidden">
                                
                                <div class="swiper-container" data-settings='{"resizeObserver": true}'>
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <a
                                                href="<?php echo e(route('shop.product.details', ['product_slug' => $product->slug])); ?>">
                                                <img src="<?php echo e(asset('storage/uploads/products/thumbnails/' . $product->image)); ?>"
                                                    class="card-img-top" alt="<?php echo e($product->name); ?>">
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
                                            $maxRating = $reviews->max('rating'); // Get highest rating from all reviews
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
                                        <span class="reviews-note text-lowercase text-secondary ms-1"><?php echo e($reviews->count()); ?>

                                            reviews</span>
                                    </div>
                                </div>

                                
                                <div class="product-action transition">
                                    <?php if(Cart::instance('cart')->content()->where('id', $product->id)->count() > 0): ?>
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
                                        <button type="submit" class="btn btn-primary">Add to Cart</button>
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
    </section>

    <section class="container mw-1620 bg-white border-radius-10">
        <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
        <div class="py-4 px-4 md:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 xxl:grid-cols-4 gap-6">
                <?php $__currentLoopData = $categories->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div
                    class="bg-white relative rounded-2xl shadow flex flex-col justify-center hover:shadow-md transition-all overflow-hidden">
                    <img loading="lazy" src="<?php echo e(asset('storage/uploads/categories/' . $categorie->image)); ?>"
                        alt="<?php echo e($categorie->name); ?>" class="object-contain w-full max-h-[500px] rounded-lg" />

                    <div class="p-4 absolute bottom-4 w-full text-center bg-white/30 ">
                        <h3 class="text-lg font-semibold text-gray-800 mb-2"><?php echo e($categorie->name); ?></h3>
                        <a href="<?php echo e(route('shop.index', ['categories' => $categorie->id])); ?>" class="btn-main">
                            View Products
                        </a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

        <div class="about container">
            <div class="about-row">
                <div class="about-image">
                    <img src="https://ext.same-assets.com/1571473267/1578924800.jpeg" alt="About TRDNT" loading="lazy">
                </div>
                <div class="about-text">
                    <h2>TRDNT</h2>
                    <p>Welcome to TRDNT, where we have redefined the boundaries of casual wear by seamlessly merging
                        fashion and comfort. Our ethos revolves around empowering you to embrace your unique style while
                        prioritizing comfort every step of the way.</p>
                    <button class="btn-main" onclick="window.location.href='about'">Read More About Us</button>
                </div>
            </div>
        </div>

        <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

        <div class="features container">
            <div class="feature">
                
                <h5>ECO-FRIENDLY</h5>
                <span>Doing our bit by using eco-friendly materials</span>
            </div>
            <div class="feature">
                
                <h5>Customer Service</h5>
                <span>We are just an email away! Reach out to us for any assistance or support monday to friday</span>
            </div>
            <div class="feature">
                
                <h5>Secure Payment</h5>
                <span>Protect Your Payment Information with our Secure Processing System.</span>
            </div>
        </div>

        <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>

        <div class="newsletter container">
            <h3>Newsletter</h3>
            <p>Stay informed with the latest updates and exclusive offers by signing up for our newsletter.</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Your email" required>
                <button type="submit">Subscribe</button>
            </form>
        </div>

        <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
    </section>


    <!-- Mission Statement -->
    <section class="mission w-full bg-red-900">
        <div class="mission-content w-full bg-black text-white">
            <div class="mission-text w-full lg:w-1/2 flex flex-col items-center justify-center  ">
                <h3 class="text-2xl text-start">OUR MISSION</h3>
                <p class="w-1/2 text-center">In essence, our aim is to go beyond merely placing a simple logo on a
                    t-shirt or
                    hoodie. We strive to
                    deliver
                    striking, top-notch designs at a reasonable cost. And perhaps sprinkle in the occasional minimalist
                    design.
                </p>
            </div>
            <div class="w-full lg:w-1/2">
                <img src="https://cdn.shopify.com/s/files/1/0775/7126/0764/files/iStock-520289888-2-e1641284826152-1024x640.jpg?v=1719407083"
                    alt="Mission Sign" class='w-full'>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials container">
        <h3>What you guys think</h3>
        <div class="testimonials-row py-7">
            <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="testimonial-card">
                
                    <img src="<?php echo e(asset('storage/uploads/reviewImage/' . $review->image)); ?>" alt="<?php echo e($review->name); ?>" />
                    
                <div class="testimonial-info">
                    <h4 class="uppercase"><?php echo e($review->name); ?></h4>
                    <div class="testimonial-reviews flex items-center justify-center">
                        <?php for($i = 1; $i <= $review->rating; $i++): ?>
                            <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.962h4.163c.969 0 1.371 1.24.588 1.81l-3.37 2.448 1.287 3.962c.3.921-.755 1.688-1.538 1.118L10 13.347l-3.37 2.448c-.783.57-1.838-.197-1.538-1.118l1.287-3.962-3.37-2.448c-.783-.57-.38-1.81.588-1.81h4.163l1.286-3.962z" />
                            </svg>
                            <?php endfor; ?>
                            <?php for($i = $review->rating + 1; $i <= 5; $i++): ?> <svg class="w-5 h-5 text-gray-600"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.962h4.163c.969 0 1.371 1.24.588 1.81l-3.37 2.448 1.287 3.962c.3.921-.755 1.688-1.538 1.118L10 13.347l-3.37 2.448c-.783.57-1.838-.197-1.538-1.118l1.287-3.962-3.37-2.448c-.783-.57-.38-1.81.588-1.81h4.163l1.286-3.962z" />
                                </svg>
                                <?php endfor; ?>
                    </div>

                    <p><?php echo e($review->comment); ?></p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </section>

    <script>
        // Tabs toggle logic
        document.querySelectorAll('.tab').forEach(tab => {
            tab.addEventListener('click', function() {
                document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('tab-active'));
                tab.classList.add('active');
                document.getElementById(tab.getAttribute('data-tab')).classList.add('tab-active');
            });
        });
        // Show popup on load
        window.onload = function() {
            document.getElementById('promoPopup').style.display = 'block';
        };

    </script>
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
<?php /**PATH C:\Users\hp\Desktop\ECOMSELLER\resources\views/home/index.blade.php ENDPATH**/ ?>