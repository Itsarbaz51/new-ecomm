<x-app-layout title="shop">
    <section>
        @if ($current_category)
            <div class="hero-slide-wrapper">
                <img src="{{ asset('storage/uploads/categories/' . $current_category->image) }}"
                    alt={{ $current_category->name }} class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center text-center text-white px-4">
                    <h1 class="text-3xl md:text-5xl font-bold mb-4 drop-shadow">{{ strtoupper($current_category->name) }} PRODUCTS</h1>
                    <a href="#productGrid" class="btn-main">Browse Now</a>
                </div>
            </div>
        @else
            {{-- Default --}}
            <div class="hero-slide-wrapper w-full h-full relative">
                <img src="https://trdnt.co.uk/cdn/shop/files/Black___Pink_Grunge_Coming_Soon_Instagram_Post__1366_x_1000_px.png?v=1730924497&width=1780"
                    alt="Shop background" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center text-center text-white px-4">
                    <h1 class="text-3xl md:text-5xl font-bold mb-4 drop-shadow">SHOP ALL PRODUCTS</h1>
                    <a href="#productGrid" class="btn-main">Browse Now</a>
                </div>
            </div>
        @endif



        <div style="padding: 0px 10px">

            <div class="container-fluid px-3">
                <div class="row align-items-center mb-4 pb-md-2">
                    <!-- Breadcrumb -->
                    <div class="col-12 col-md-6 mb-2 mb-md-0 items-center">
                        <div>
                            <a href="{{ route('home.index') }}" class="menu-link text-uppercase fw-medium">Home</a>
                            <span class="breadcrumb-separator fw-medium px-1">/</span>
                            <a href="#" class="menu-link text-uppercase fw-medium">The Shop</a>
                        </div>
                    </div>

                    <!-- Sort & Filter Controls -->
                    <div
                        class="col-12 col-md-6 d-flex flex-wrap justify-content-between justify-content-md-end align-items-center gap-2">
                        <!-- Page Size Dropdown -->
                        <select class="form-select w-auto border-2 py-0" name="pagesize" id="pagesize">
                            <option value="12" {{ $size == 12 ? 'selected' : '' }}>Show</option>
                            <option value="24" {{ $size == 24 ? 'selected' : '' }}>24</option>
                            <option value="48" {{ $size == 48 ? 'selected' : '' }}>48</option>
                            <option value="102" {{ $size == 102 ? 'selected' : '' }}>102</option>
                        </select>

                        <!-- Order Dropdown -->
                        <select class="form-select w-auto border-2 py-0" name="orderby" id="orderby">
                            <option value="-1" {{ $order == -1 ? 'selected' : '' }}>Default</option>
                            <option value="1" {{ $order == 1 ? 'selected' : '' }}>Date, New to Old</option>
                            <option value="2" {{ $order == 2 ? 'selected' : '' }}>Date, Old to New</option>
                            <option value="3" {{ $order == 3 ? 'selected' : '' }}>Price, Low to High</option>
                            <option value="4" {{ $order == 4 ? 'selected' : '' }}>Price, High to Low</option>
                        </select>
                    </div>
                </div>
            </div>


            @if ($products->isEmpty())
                <div class="flex flex-col items-center justify-center py-16 text-center text-gray-500">
                    <svg style="width: 50px" class="mb-4 text-red-400" fill="none" stroke="currentColor"
                        stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v2m0 4h.01M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9 9 4.03 9 9z" />
                    </svg>
                    <p class="text-lg font-medium text-red-500">No items found.</p>
                    <p class="text-sm text-gray-400 mt-1">Please try adjusting your filters or search terms.</p>
                </div>
            @else
                <div class="container my-5" id="productGrid">
                    <h2 class="mb-5 text-center fw-bold">All Products</h2>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4" id="products-grid">
                        @foreach ($products as $product)
                            <div class="col-md-3 col-sm-6">
                                <div class="card h-100 shadow-sm product-card product-hover">
                                    <div class="position-relative overflow-hidden">
                                        <div class="swiper-container" data-settings='{"resizeObserver": true}'>
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide">
                                                    <a
                                                        href="{{ route('shop.product.details', ['product_slug' => $product->slug]) }}">
                                                        <img src="{{ asset('storage/uploads/products/thumbnails/' . $product->image) }}"
                                                            class="card-img-top" alt="{{ $product->name }}">
                                                    </a>
                                                </div>
                                                @foreach (explode(',', $product->images) as $image)
                                                    <div class="swiper-slide">
                                                        <a
                                                            href="{{ route('shop.product.details', ['product_slug' => $product->slug]) }}">
                                                            <img src="{{ asset('storage/uploads/products/gallery/' . $image) }}"
                                                                class="card-img-top product-image"
                                                                alt="{{ $product->name }}">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        {{-- Wishlist Button --}}
                                        {{--  <div class="position-absolute top-0 end-0 m-2 z-1">
                                @if (Cart::instance('wishlist')->content()->where('id', $product->id)->count() > 0)
                                    <form
                                        action="{{ route('wishlist.item.remove', ['rowId' => Cart::instance('wishlist')->content()->where('id', $product->id)->first()->rowId]) }}"
                                        method="POST">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm p-1 bg-white rounded-circle shadow-sm filled-heart"
                                            title="Remove from Wishlist">
                                            <svg width="16" height="16">
                                                <use href="#icon_heart" />
                                            </svg>
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('wishlist.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="name" value="{{ $product->name }}">
                                        <input type="hidden" name="quantity" value="1">
                                        <input type="hidden" name="price"
                                            value="{{ $product->sale_price ?: $product->regular_price }}">
                                        <button class="btn btn-sm p-1 bg-white rounded-circle shadow-sm"
                                            title="Add to Wishlist">
                                            <svg width="16" height="16">
                                                <use href="#icon_heart" />
                                            </svg>
                                        </button>
                                    </form>
                                @endif
                            </div>  --}}
                                    </div>

                                    <div class="card-body text-center">
                                        <p class="card-title">{{ $product->category->name }}</p>
                                        <h6 class="card-title mb-2">
                                            <a href="{{ route('shop.product.details', ['product_slug' => $product->slug]) }}"
                                                class="text-dark text-decoration-none">
                                                {{ $product->name }}
                                            </a>
                                        </h6>

                                        {{-- Price --}}
                                        <div class="mb-2">
                                            @if ($product->sale_price)
                                                <span
                                                    class="text-decoration-line-through text-muted ms-1">₹{{ $product->regular_price }}</span>
                                                <span class="fw-bold text-danger">₹{{ $product->sale_price }}</span>
                                            @else
                                                <span
                                                    class="text-decoration-line-through text-muted ms-1">₹{{ $product->regular_price }}</span>
                                            @endif
                                        </div>

                                        {{-- Reviews --}}
                                        <div class="d-flex justify-content-center align-items-center mb-3">
                                            <div class="d-flex">
                                                @for ($i = 0; $i < 5; $i++)
                                                    <svg class="mb-1 text-warning" width="14" height="14">
                                                        <use href="#icon_star" />
                                                    </svg>
                                                @endfor
                                            </div>
                                            <span class="ms-2 text-muted small">8k+ reviews</span>
                                        </div>

                                        {{-- Add to Cart / Go to Cart --}}
                                        <div class="product-action transition">
                                            @if (Cart::instance('cart')->content()->where('id', $product->id)->count() > 0)
                                                <a href="{{ route('cart.index') }}" class="btn btn-primary">Go to
                                                    Cart</a>
                                            @else
                                                <form method="POST" action="{{ route('cart.add') }}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <input type="hidden" name="name" value="{{ $product->name }}">
                                                    <input type="hidden" name="quantity" value="1">
                                                    <input type="hidden" name="price"
                                                        value="{{ $product->sale_price ?: $product->regular_price }}">
                                                    <button type="submit" class="btn btn-primary">Add to
                                                        Cart</button>
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

            <div class="divdev"></div>
            <div class="flex items-center justify-between flex-wrap gap10 wgp-pagination">
                {{ $products->withQueryString()->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </section>

    <form id="frmfilter" method="GET" accept="{{ route('shop.index') }}">

        <input type="hidden" name="page" value="{{ $products->currentPage() }}">
        <input type="hidden" name="size" id="size" value="{{ $size }}" />
        <input type="hidden" name="order" id="order" value="{{ $order }}" />
        <input type="hidden" name="brands" id="hdnBrands" />
        <input type="hidden" name="categories" id="hdnCategories" />
        <input type="hidden" name="min" id="hdnMinPrice" value="{{ $min_price }}" />
        <input type="hidden" name="max" id="hdnMaxPrice" value="{{ $max_price }}" />
    </form>
</x-app-layout>

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
