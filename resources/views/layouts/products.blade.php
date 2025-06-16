<div class="tab-content tab-active" id="productGrid">
    @if ($products->isEmpty())
    <div class="flex flex-col items-center justify-center py-16 text-center text-gray-500">
        <svg style="width: 50px" class="mb-4 text-red-400" fill="none" stroke="currentColor" stroke-width="1.5"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 9v2m0 4h.01M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z" />
        </svg>
        <p class="text-lg font-medium text-red-500">No items found.</p>
        <p class="text-sm text-gray-400 mt-1">Please try adjusting your filters or search terms.</p>
    </div>
    @else
    <div class="container my-5">
        <div class="flex gap-4 overflow-x-auto">
            @foreach ($products as $product)
            <div class="col">
                <div class="card h-100 w-72 lg:w-fit shadow-sm product-card product-hover">
                    <div class="position-relative overflow-hidden">
                        {{-- Swiper for product images --}}
                        <div class="swiper-container" data-settings='{"resizeObserver": true}'>
                            <div class="swiper-wrapper">
                                <div class="swiper-slide flex justify-center items-center">
                                    <a href="{{ route('shop.product.details', ['product_slug' => $product->slug]) }}">
                                        <img src="{{ asset('storage/uploads/products/thumbnails/' . $product->image) }}"
                                            class="object-contain" alt="{{ $product->name }}">
                                    </a>
                                </div>
                                @foreach (explode(',', $product->images) as $image)
                                <div class="swiper-slide">
                                    <a href="{{ route('shop.product.details', ['product_slug' => $product->slug]) }}">
                                        <img src="{{ asset('storage/uploads/products/gallery/' . trim($image)) }}"
                                            class="card-img-top object-contain product-image"
                                            alt="{{ $product->name }}">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- Card Body --}}
                    <div class="card-body text-center">
                        <p class="card-title small text-muted mb-1">{{ $product->category->name }}</p>
                        <h6 class="card-title mb-2">
                            <a href="{{ route('shop.product.details', ['product_slug' => $product->slug]) }}"
                                class="text-dark text-decoration-none">{{ $product->name }}</a>
                        </h6>

                        {{-- Price --}}
                        <div class="mb-2">
                            @if ($product->sale_price)
                            <span class="text-decoration-line-through text-muted me-2">₹{{
                                $product->regular_price }}</span>
                            <span class="fw-bold text-danger">₹{{ $product->sale_price }}</span>
                            @else
                            <span class="fw-bold text-dark">₹{{ $product->regular_price }}</span>
                            @endif
                        </div>

                        {{-- Reviews --}}
                        @php
                        // Filter reviews for this product
                        $productReviews = $reviews->where('product_id', $product->id);
                        $averageRating = round($productReviews->avg('rating'), 1);
                        $roundedRating = floor($averageRating);
                        @endphp

                        <div class="d-flex justify-content-center align-items-center mb-3">
                            <div class="product-single__rating">
                                <div class="reviews-group d-flex">

                                    {{-- Filled stars --}}
                                    @for ($i = 1; $i <= $roundedRating; $i++) <svg class="review-star" viewBox="0 0 9 9"
                                        xmlns="http://www.w3.org/2000/svg" fill="#FFD700">
                                        <use href="#icon_star" />
                                        </svg>
                                        @endfor

                                        {{-- Empty stars --}}
                                        @for ($i = $roundedRating + 1; $i <= 5; $i++) <svg
                                            class="star-rating__star-icon" width="12" height="12" fill="#ccc"
                                            viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.1429 5.04687C11.1429 4.84598 10.9286 4.76562 10.7679 4.73884L7.40625 4.25L5.89955 1.20312C5.83929 1.07589 5.72545 0.928571 5.57143 0.928571C5.41741 0.928571 5.30357 1.07589 5.2433 1.20312L3.73661 4.25L0.375 4.73884C0.207589 4.76562 0 4.84598 0 5.04687C0 5.16741 0.0870536 5.28125 0.167411 5.3683L2.60491 7.73884L2.02902 11.0871C2.02232 11.1339 2.01563 11.1741 2.01563 11.221C2.01563 11.3951 2.10268 11.5558 2.29688 11.5558C2.39063 11.5558 2.47768 11.5223 2.56473 11.4754L5.57143 9.89509L8.57813 11.4754C8.65848 11.5223 8.75223 11.5558 8.84598 11.5558C9.04018 11.5558 9.12054 11.3951 9.12054 11.221C9.12054 11.1741 9.12054 11.1339 9.11384 11.0871L8.53795 7.73884L10.9688 5.3683C11.0558 5.28125 11.1429 5.16741 11.1429 5.04687Z" />
                                            </svg>
                                            @endfor
                                </div>

                                <span class="reviews-note text-lowercase text-secondary ms-1">
                                    {{ $productReviews->count() }} reviews
                                </span>
                            </div>
                        </div>


                        {{-- Add to Cart --}}
                        <div class="product-action transition">
                            @if (Cart::instance('cart')->content()->where('id', $product->id)->count() > 0)
                            <a href="{{ route('cart.index') }}" class="btn-go-to-cart">Go to
                                Cart</a>
                            @else
                            <form method="POST" action="{{ route('cart.add') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="hidden" name="name" value="{{ $product->name }}">
                                @php
                                $sizes = is_array($product->sizes) ? $product->sizes :
                                json_decode($product->sizes, true);
                                @endphp

                                <input type="hidden" name="selected_size" value="{{ $sizes[0] }}">

                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="price"
                                    value="{{ $product->sale_price ?: $product->regular_price }}">
                                <button type="submit" class="btn-main">Add to Cart</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
