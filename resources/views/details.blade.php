<x-app-layout title="Product-details">
    <style>
        .filled-heart {
            color: red
        }
    </style>
    <main class="pt-90">
        <div class="mb-md-1 pb-md-3"></div>
        <section class=" container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="product-single__media" data-media-type="vertical-thumbnail">
                        <div class="product-single__image">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    {{-- // thumbnails image --}}
                                    {{-- @dd($product->image) --}}
                                    <div class="swiper-slide product-single__image-item">
                                        {{-- @dd($product->image) --}}
                                        <img loading="lazy" class="h-auto"
                                            src="{{ asset('storage/uploads/products/thumbnails/' . $productSingle->image) }}"
                                            width="674" height="374" alt="" />
                                        <a data-fancybox="gallery"
                                            href="{{ asset('storage/uploads/products/thumbnails/' . $productSingle->image) }}"
                                            data-bs-toggle="tooltip" data-bs-placement="left" title="Zoom">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_zoom" />
                                            </svg>
                                        </a>
                                    </div>
                                    {{-- // gallery images --}}
                                    {{-- @dd($product->images) --}}
                                    @foreach (explode(',', $productSingle->images) as $image)
                                    <div class="swiper-slide product-single__image-item">
                                        <img loading="lazy" class="h-auto"
                                            src="{{ asset('storage/uploads/products/gallery/' . trim($image)) }}"
                                            width="674" height="674" alt="{{ $productSingle->name }}" />
                                        <a data-fancybox="gallery" href="../images/products/product_0-1.html"
                                            data-bs-toggle="tooltip" data-bs-placement="left" title="Zoom">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <use href="#icon_zoom" />
                                            </svg>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-prev"><svg width="7" height="11" viewBox="0 0 7 11"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <use href="#icon_prev_sm" />
                                    </svg></div>
                                <div class="swiper-button-next"><svg width="7" height="11" viewBox="0 0 7 11"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <use href="#icon_next_sm" />
                                    </svg></div>
                            </div>
                        </div>
                        <div class="product-single__thumbnail">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide product-single__image-item"><img loading="lazy"
                                            class="h-auto"
                                            src="{{ asset('storage/uploads/products/thumbnails/' . $productSingle->image) }}"
                                            width="104" height="104" alt="{{ $productSingle->name }}" /></div>
                                    @foreach (explode(',', $productSingle->images) as $image)
                                    <div class="swiper-slide product-single__image-item"><img loading="lazy"
                                            class="h-auto"
                                            src="{{ asset('storage/uploads/products/gallery/' . trim($image)) }}"
                                            width="104" height="104" alt="{{ $productSingle->name }}" /></div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="d-flex justify-content-between mb-4 pb-md-2">
                        <div class="breadcrumb mb-0 d-none d-md-block flex-grow-1">
                            <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">Home</a>
                            <span class="breadcrumb-separator menu-link fw-medium ps-1 pe-1">/</span>
                            <a href="#" class="menu-link menu-link_us-s text-uppercase fw-medium">The Shop</a>
                        </div>
                    </div>
                    <h1 class="product-single__name">{{ $productSingle->name }}</h1>
                    <div class="product-single__rating">
                        <div class="reviews-group d-flex">
                            @php
                            // Filter reviews that belong to this product
                            $productReviews = $reviews->where('product_id', $productSingle->id);
                            $maxRating = $productReviews->max('rating');
                            @endphp

                            {{-- Filled stars --}}
                            @for ($i = 1; $i <= $maxRating; $i++) <svg class="review-star" viewBox="0 0 9 9"
                                xmlns="http://www.w3.org/2000/svg" fill="#FFD700">
                                <use href="#icon_star" />
                                </svg>
                                @endfor

                                {{-- Empty stars (if maxRating < 5) --}} @for ($i=$maxRating + 1; $i <=5; $i++) <svg
                                    class="star-rating__star-icon" width="12" height="12" fill="#ccc"
                                    viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z" />
                                    </svg>
                                    @endfor
                        </div>

                        <span class="reviews-note text-lowercase text-secondary ms-1">{{
                            $productReviews->count() }}
                            reviews</span>
                    </div>
                    <div class="product-single__price">
                        <span class="current-price">
                            @if ($productSingle->sale_price)
                            <s>₹{{ $productSingle->regular_price }}</s> ₹{{ $productSingle->sale_price }}
                            @else
                            ₹{{ $productSingle->regular_price }}
                            @endif
                        </span>
                    </div>
                    <div class="product-single__short-desc">
                        <p>{{ $productSingle->short_description }}</p>
                    </div>
                    @if (Cart::instance('cart')->content()->where('id', $productSingle->id)->count() > 0)
                    <a href="{{ route('cart.index') }}" class="btn btn-warning mb-3">Go to Cart</a>
                    @else
                    <form name="addtocart-form" method="post" action="{{ route('cart.add') }}">
                        @csrf
                        <div class="product-single__addtocart">
                            <div class="flex flex-col">

                                @php
                                $sizes = is_array($productSingle->sizes) ? $productSingle->sizes :
                                json_decode($productSingle->sizes ??
                                '[]');
                                @endphp

                                @if (!empty($sizes))
                                <div class="mb-4 -mt-6">
                                    <label class="block mb-2 font-semibold">Select Size</label>

                                    <div class="flex flex-wrap gap-2">
                                        @foreach ($sizes as $index => $size)
                                        <label class="cursor-pointer">
                                            <input type="radio" name="selected_size" value="{{ $size }}"
                                                class="hidden peer" {{ $index===0 ? 'checked' : '' }} required>
                                            <div
                                                class="px-4 py-2 border rounded-lg peer-checked:bg-black peer-checked:text-white">
                                                {{ $size }}
                                            </div>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                                <div class="qty-control position-relative mb-8">
                                    <input type="number" name="quantity" value="1" min="1"
                                        class="qty-control__number text-center">
                                    <div class="qty-control__reduce">-</div>
                                    <div class="qty-control__increase">+</div>
                                </div>

                                <button type="submit" class="btn-main btn-addtocart" data-aside="cartDrawer">Add
                                    to
                                    Cart</button>
                            </div>

                            <input type="hidden" name="id" value="{{ $productSingle->id }}">
                            <input type="hidden" name="name" value="{{ $productSingle->name }}">
                            <input type="hidden" name="price"
                                value="{{ $productSingle->sale_price == '' ? $productSingle->regular_price : $productSingle->sale_price }}">


                        </div>
                    </form>
                    @endif
                    <div class="product-single__addtolinks">
                        {{-- @if (Cart::instance('wishlist')->content()->where('id', $product->id)->count() > 0)
                        <form
                            action="{{ route('wishlist.item.remove', ['rowId' => Cart::instance('wishlist')->content()->where('id', $product->id)->first()->rowId]) }}"
                            method="POST" id="frm-remove-item">
                            @csrf
                            @method('DELETE')
                            <a href="javascript:void(0)" onclick="document.getElementById('frm-remove-item').submit();"
                                class="menu-link menu-link_us-s add-to-wishlist filled-heart"><svg width="16"
                                    height="16" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <use href="#icon_heart" />
                                </svg><span>Remove from Wishlist</span></a>
                        </form>
                        @else
                        <form action="{{ route('wishlist.add') }}" method="post" id="wishlist-form">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}" />
                            <input type="hidden" name="name" value="{{ $product->name }}" />
                            <input type="hidden" name="quantity" value="1" />
                            <input type="hidden" name="price"
                                value="{{ $product->sale_price == '' ? $product->regular_price : $product->sale_price }}" />
                            <a href="javascript:void(0)" class="menu-link menu-link_us-s add-to-wishlist"
                                onclick="document.getElementById('wishlist-form').submit();"><svg width="16" height="16"
                                    viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <use href="#icon_heart" />
                                </svg><span>Add to Wishlist</span></a>
                        </form>
                        @endif --}}
                        <share-button class="share-button">
                            <button onclick="handleShare()"
                                class="menu-link menu-link_us-s to-share border-0 bg-transparent d-flex align-items-center">
                                <svg width="16" height="19" viewBox="0 0 16 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <use href="#icon_sharing" />
                                </svg>
                                <span>Share</span>
                            </button>
                            <details id="Details-share-template__main" class="m-1 xl:m-1.5" hidden="">
                                <summary class="btn-solid m-1 xl:m-1.5 pt-3.5 pb-3 px-5">+</summary>
                                <div id="Article-share-template__main"
                                    class="share-button__fallback flex items-center absolute top-full left-0 w-full px-2 py-4 bg-container shadow-theme border-t z-10">
                                    <div class="field grow mr-4">
                                        <label class="field__label sr-only" for="url">Link</label>
                                        <input type="text" class="field__input w-full" id="url"
                                            value="https://uomo-crystal.myshopify.com/blogs/news/go-to-wellness-tips-for-mental-health"
                                            placeholder="Link" onclick="this.select();" readonly="">
                                    </div>
                                    <button class="share-button__copy no-js-hidden">
                                        <svg class="icon icon-clipboard inline-block mr-1" width="11" height="13"
                                            fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"
                                            focusable="false" viewBox="0 0 11 13">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M2 1a1 1 0 011-1h7a1 1 0 011 1v9a1 1 0 01-1 1V1H2zM1 2a1 1 0 00-1 1v9a1 1 0 001 1h7a1 1 0 001-1V3a1 1 0 00-1-1H1zm0 10V3h7v9H1z"
                                                fill="currentColor"></path>
                                        </svg>
                                        <span class="sr-only">Copy link</span>
                                    </button>
                                </div>
                            </details>
                        </share-button>
                        <script src="js/details-disclosure.html" defer="defer"></script>
                        <script src="js/share.html" defer="defer"></script>
                    </div>
                    <div class="product-single__meta-info">
                        <div class="meta-item">
                            <label>SKU:</label>
                            <span>{{ $productSingle->SKU }}</span>
                        </div>
                        <div class="meta-item">
                            <label>Categories:</label>
                            <span>{{ $productSingle->category->name }}</span>
                        </div>
                        <div class="py-1">
                            <span class="text-sm font-semibold">Product details</span>
                            <div class="px-2">
                                <div class="">
                                    <label class="">Weight</label>
                                    <span>{{ $productSingle->weight }} gm</span>
                                </div>
                                {{-- <div class="">
                                    <label class="">Dimensions</label>
                                    <span>90 x 60 x 90 cm</span>
                                </div> --}}


                                {{-- <div class="">
                                    <label class="">Color</label>
                                    <span>{{ $product->colors }}</span>
                                </div> --}}
                            </div>

                        </div>
                        <div class="py-2">
                            <span class="text-sm font-semibold">
                                description :
                            </span>
                            {{ $productSingle->description }}
                        </div>

                    </div>
                </div>
            </div>
            <div class="products-carousel container p-4">
                <h2 class="h3 text-uppercase mb-4 pb-xl-2 mb-xl-4">Related <strong>Products</strong></h2>
                @include('layouts.products', $products);
            </div>
            <div class="border-t p-5">
                <h2 class="">Reviews</h2>
                <div class="product-single__reviews-list">
                    @foreach ($reviews as $review)
                    @if ($review->product_id == $productSingle->id)
                    <div class="product-single__reviews-item">
                        <div class="customer-avatar">
                            <img loading="lazy" src="{{ asset('storage/uploads/reviewImage/' . $review->image) }}"
                                alt="" />
                        </div>
                        <div class="customer-review">
                            <div class="customer-name">
                                <h6>{{ $review->name }}</h6>
                                <div class="reviews-group d-flex">
                                    {{-- Filled stars --}}
                                    @for ($i = 1; $i <= $review->rating; $i++)
                                        <svg class="review-star" viewBox="0 0 9 9" xmlns="http://www.w3.org/2000/svg"
                                            fill="#FFD700">
                                            <use href="#icon_star" />
                                        </svg>
                                        @endfor
                                        {{-- Empty stars --}}
                                        @for ($i = $review->rating + 1; $i <= 5; $i++) <svg
                                            class="star-rating__star-icon" width="12" height="12" fill="#ccc"
                                            viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z" />
                                            </svg>
                                            @endfor
                                </div>
                            </div>
                            <div class="review-date">{{ $review->created_at->format('m-d-Y') }}</div>
                            <div class="review-text">
                                <p>{{ $review->comment }}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach


                </div>
                <div class="product-single__review-form">
                    {{-- @dd($productSingle->id); --}}

                    <form name="customer-review-form" method="POST" action="{{ route('user.reviews.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        {{-- @dd($product->id) --}}
                        <input type="hidden" name="product_id" value="{{ $productSingle->id }}">
                        <input type="hidden" name="rating" id="form-input-rating" value="">

                        <h5>Be the first to review “Message {{ $productSingle->name }}”</h5>
                        <p>Your email address will not be published. Required fields are marked *</p>

                        <div class="select-star-rating">
                            <label>Your rating *</label>
                            <span class="star-rating flex" id="star-rating">
                                @for ($i = 1; $i <= 5; $i++) <svg class="star-rating__star-icon cursor-pointer"
                                    data-value="{{ $i }}" width="20" height="20" fill="#ccc" viewBox="0 0 12 12"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7857 4.76562H7.71429L6.42857 1.29688C6.35714 1.13281 6.21429 1 6 1C5.78571 1 5.64286 1.13281 5.57143 1.29688L4.28571 4.76562H1.21429C1.07143 4.76562 0.857143 4.84598 0.785714 5.04687C0.714286 5.24777 0.785714 5.42969 0.928571 5.55469L3.57143 8.00391L2.5 11.2656C2.42857 11.4297 2.5 11.5938 2.64286 11.6836C2.78571 11.7734 2.92857 11.7734 3.07143 11.6836L6 9.80859L8.92857 11.6836C9.07143 11.7734 9.21429 11.7734 9.35714 11.6836C9.5 11.5938 9.57143 11.4297 9.5 11.2656L8.42857 8.00391L11.0714 5.55469C11.2143 5.42969 11.2857 5.24777 11.1429 5.04687Z" />
                                    </svg>
                                    @endfor
                            </span>

                        </div>

                        <div class="mb-4">
                            <textarea name="comment" class="form-control form-control_gray" placeholder="Your Review"
                                cols="30" rows="3">{{ old('comment') }}</textarea>
                        </div>

                        <div class="form-label-fixed mb-4">
                            <label for="form-input-name" class="form-label">Name *</label>
                            <input name="name" value="{{ old('name') }}" id="form-input-name"
                                class="form-control form-control-md form-control_gray">
                        </div>

                        <div class="form-label-fixed mb-4">
                            <label for="form-input-email" class="form-label">Email address *</label>
                            <input name="email" type="email" value="{{ old('email') }}" id="form-input-email"
                                class="form-control form-control-md form-control_gray">
                        </div>

                        <fieldset class="p-4 border border-gray-300 rounded-xl shadow-sm mb-6">
                            <div class="body-title text-lg font-semibold mb-3">
                                Upload image
                            </div>

                            <div class="upload-image flex flex-wrap gap-4 items-center">
                                <div class="item w-1 h-1" id="imgpreview">
                                    @if (old('image'))
                                    <img src="{{ asset('storage/uploads/reviewImage/' . old('image')) }}"
                                        class="object-cover w-full h-full transition duration-300 hover:scale-105"
                                        alt="Uploaded Review Image">
                                    @endif
                                </div>

                                <div id="upload-file"
                                    class="item up-load w-60 h-32 border-2 border-dashed border-gray-300 rounded-lg flex flex-col items-center justify-center cursor-pointer hover:border-blue-400 hover:bg-blue-50 transition duration-200">
                                    <label
                                        class="uploadfile text-center w-full h-full flex flex-col items-center justify-center px-2"
                                        for="myFile">
                                        <span class="icon text-3xl text-blue-500 mb-1">
                                            <i class="icon-upload-cloud"></i>
                                        </span>
                                        <span class="body-text text-sm text-gray-600">
                                            Drop your image or <span class="text-blue-500 font-medium">click to
                                                browse</span>
                                        </span>
                                        <input type="file" id="myFile" name="image" accept="image/*" class="hidden">
                                    </label>
                                </div>
                            </div>
                        </fieldset>

                        <div class="form-action">
                            <button type="submit" class="btn-main">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </section>


    </main>
</x-app-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const stars = document.querySelectorAll('.star-rating__star-icon');
        const ratingInput = document.getElementById('form-input-rating');

        stars.forEach(star => {
            star.addEventListener('click', () => {
                const rating = star.getAttribute('data-value');
                ratingInput.value = rating;

                stars.forEach(s => {
                    const val = s.getAttribute('data-value');
                    s.setAttribute('fill', val <= rating ? '#FFD700' : '#ccc');
                });
            });
        });
    });

    function handleShare() {
        if (navigator.share) {
            navigator.share({
                    title: document.title,
                    text: 'Check this out!',
                    url: window.location.href,
                })
                .then(() => console.log('Shared successfully'))
                .catch((error) => console.error('Error sharing:', error));
        } else {
            alert('Web Share API not supported in this browser.');
        }
    }
</script>
