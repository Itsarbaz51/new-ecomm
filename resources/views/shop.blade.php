<x-app-layout title="shop">
    <section>
        @if ($current_category)
        <div class="hero-slide-wrapper">
            <img src="{{ asset('storage/uploads/categories/' . $current_category->image) }}" alt={{
                $current_category->name }} class="w-full h-full object-cover">
            <div
                class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center text-center text-white px-4">
                <h1 class="text-3xl md:text-5xl font-bold mb-4 drop-shadow">{{ strtoupper($current_category->name) }}
                </h1>
                <a href="#productGrid" class="btn-main">Browse Now</a>
            </div>
        </div>
        @else
        {{-- Default --}}
        <div class="hero-slide-wrapper w-full h-full relative">
            <img src="https://trdnt.co.uk/cdn/shop/files/Black___Pink_Grunge_Coming_Soon_Instagram_Post__1366_x_1000_px.png?v=1730924497&width=1780"
                alt="Shop background" class="w-full h-full object-cover">
            <div
                class="absolute inset-0 bg-black/40 flex flex-col items-center justify-center text-center text-white px-4">
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
                            <option value="12" {{ $size==12 ? 'selected' : '' }}>Show</option>
                            <option value="24" {{ $size==24 ? 'selected' : '' }}>24</option>
                            <option value="48" {{ $size==48 ? 'selected' : '' }}>48</option>
                            <option value="102" {{ $size==102 ? 'selected' : '' }}>102</option>
                        </select>

                        <!-- Order Dropdown -->
                        <select class="form-select w-auto border-2 py-0" name="orderby" id="orderby">
                            <option value="-1" {{ $order==-1 ? 'selected' : '' }}>Default</option>
                            <option value="1" {{ $order==1 ? 'selected' : '' }}>Date, New to Old</option>
                            <option value="2" {{ $order==2 ? 'selected' : '' }}>Date, Old to New</option>
                            <option value="3" {{ $order==3 ? 'selected' : '' }}>Price, Low to High</option>
                            <option value="4" {{ $order==4 ? 'selected' : '' }}>Price, High to Low</option>
                        </select>
                    </div>
                </div>
            </div>


            @include('layouts.products', $products);


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
