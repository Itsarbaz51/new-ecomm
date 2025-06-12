<x-app-layout title="favrate-products">
    {{-- @dd($wishlists) --}}
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
                    @include('user.account-nav')
                </div>
                <div class="col-lg-9">
                    <div class="page-content my-account__wishlist">
                        @if (Cart::instance('wishlist')->content()->count() > 0)
                            <div class="products-grid row row-cols-2 row-cols-lg-3" id="products-grid">
                                @foreach ($wishlistItems as $wishlistItem)
                                    <div class="product-card-wrapper">
                                        <div class="product-card mb-3 mb-md-4 mb-xxl-5">
                                            <div class="pc__img-wrapper">
                                                <div class="swiper-container background-img js-swiper-slider"
                                                    data-settings='{"resizeObserver": true}'>
                                                    @foreach ($products as $product)
                                                        <div class="swiper-wrapper">
                                                            <div class="swiper-slide">
                                                                <img loading="lazy"
                                                                    src="{{ 'storage/uploads/products/thumbnails/' . $product->image }}"
                                                                    width="330" height="400"
                                                                    alt="Cropped Faux leather Jacket" class="pc__img" />
                                                            </div>
                                                            <div class="swiper-slide">
                                                                @foreach (explode(',', $product->images) as $path)
                                                                    {{-- @php dump($path); @endphp --}}
                                                                    <img loading="lazy"
                                                                        src="{{ asset('storage/uploads/products/gallery/' . trim($path)) }}"
                                                                        width="330" height="400"
                                                                        alt="Product Image" class="pc__img">
                                                                @endforeach


                                                            </div>
                                                        </div>
                                                    @endforeach
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
                                                    action="{{ route('wishlist.item.remove', ['rowId' => $wishlistItem->rowId]) }}"
                                                    method="POST" id="remove-item-{{ $wishlistItem->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="javascript:void(0)" class="btn-remove-from-wishlist"
                                                        onclick="document.getElementById('remove-item-{{ $wishlistItem->id }}').submit();">
                                                        <svg width="12" height="12" viewBox="0 0 12 12"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <use href="#icon_close" />
                                                        </svg>
                                                    </a>
                                                </form>
                                            </div>

                                            <div class="pc__info position-relative">
                                                @foreach ($products as $product)
                                                    <p class="pc__category">{{ $product->category->name }}</p>
                                                @endforeach
                                                <h6 class="pc__title">{{ $wishlistItem->name }}</h6>
                                                <div class="product-card__price d-flex">
                                                    <span class="money price">₹{{ $wishlistItem->price }}</span>
                                                </div>

                                                @if (Cart::instance('wishlist')->content()->where('id', $product->id)->count() > 0)
                                                    <form
                                                        action="{{ route('wishlist.item.remove', ['rowId' => Cart::instance('wishlist')->content()->where('id', $product->id)->first()->rowId]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist filled-heart"
                                                            title="Remove from Wishlist">
                                                            <svg width="16" height="16" viewBox="0 0 20 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <use href="#icon_heart" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('wishlist.add') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id"
                                                            value="{{ $product->id }}" />
                                                        <input type="hidden" name="name"
                                                            value="{{ $product->name }}" />
                                                        <input type="hidden" name="quantity" value="1" />
                                                        <input type="hidden" name="price"
                                                            value="{{ $product->sale_price == '' ? $product->regular_price : $product->sale_price }}" />
                                                        <button
                                                            class="pc__btn-wl position-absolute top-0 end-0 bg-transparent border-0 js-add-wishlist"
                                                            title="Add To Wishlist">
                                                            <svg width="16" height="16" viewBox="0 0 20 20"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <use href="#icon_heart" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                        <div class="row justify-content-center align-items-center" style="min-height: 300px;">
                            <div class="col-md-6 text-center">
                                <p class="mb-3">No item found in your wishlist</p>
                                <a href="{{ route('shop.index') }}" class="btn btn-info">Wishlist Now</a>
                            </div>
                        </div>                        
                        @endif
                    </div>
                </div>
            </div>
        </section>
    </main>
</x-app-layout>
