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
                    <h1 class="text-3xl md:text-5xl font-bold mb-4 drop-shadow uppercase"><?php echo e($slide->title); ?></h1>
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
            <?php
            $activeCategory = request('categories');
            ?>


            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('home.index', ['categories' => $category->id])); ?>"
                class="tab <?php echo e($activeCategory == $category->id ? 'active' : ''); ?>">
                <span class="text-[15px] sm:text-xs md:text-sm lg:text-base"><?php echo e(strtoupper($category->name)); ?></span>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('home.index')); ?>" class="tab <?php echo e(is_null($activeCategory) ? 'active' : ''); ?>">
                <span class="text-[15px] sm:text-xs md:text-sm lg:text-base">ALL</span>
            </a>
        </div>


        
        <?php echo $__env->make('layouts.products', $products, array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>;
    </section>

    <section class="container mw-1620 bg-white border-radius-10">
        <div class="mb-3 mb-xl-5 pt-1 pb-4"></div>
        <div class="py-4 px-4 md:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 xxl:grid-cols-4 gap-6">
                <?php $__currentLoopData = $categories->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
            <form action="<?php echo e(route('newsletter.subscribe')); ?>" method="POST" class="newsletter-form">
                <?php echo csrf_field(); ?>
                <input type="email" name="email" placeholder="Your email" required>
                <button type="submit" class="btn-main">Subscribe</button>
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
        <?php if($reviews->isEmpty()): ?>
        <div class="flex flex-col items-center justify-center py-16 text-center text-gray-500">
            <svg style="width: 50px" class="mb-4 text-red-400" fill="none" stroke="currentColor" stroke-width="1.5"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v2m0 4h.01M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z" />
            </svg>
            <p class="text-lg font-medium text-red-500">No reviews found.</p>
            
        </div>
        <?php else: ?>
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
        <?php endif; ?>

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