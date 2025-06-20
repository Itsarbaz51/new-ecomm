<x-admin-layout title="product-edit">
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Product information</h3>
                <ul class="breadcrumbs flex items-center flex-wrap justify-start gap10">
                    <li>
                        <a href="{{ route('admin.index') }}">
                            <div class="text-tiny">Dashboard</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <a href="{{ route('admin.products') }}">
                            <div class="text-tiny">Products</div>
                        </a>
                    </li>
                    <li>
                        <i class="icon-chevron-right"></i>
                    </li>
                    <li>
                        <div class="text-tiny">Add product</div>
                    </li>
                </ul>
            </div>
            <!-- form-add-product -->
            <form class="tf-section-2 form-add-product" method="POST" enctype="multipart/form-data"
                action="{{ route('admin.product.update', ['id' => $product->id]) }}">
                @csrf
                @method('PUT')
                <div class="wg-box">
                    <fieldset class="name">
                        <div class="body-title mb-10">Product name <span class="tf-color-1">*</span>
                        </div>
                        <input class="mb-10" type="text" placeholder="Enter product name" name="name" tabindex="0"
                            value="{{ $product->name }}" aria-required="true" required="">
                        <div class="text-tiny">Do not exceed 100 characters when entering the
                            product name.</div>
                    </fieldset>
                    @error('name')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror

                    <fieldset class="name">
                        <div class="body-title mb-10">Slug <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Enter product slug" name="slug" tabindex="0"
                            value="{{ $product->slug }}" aria-required="true" required="">
                        <div class="text-tiny">Do not exceed 100 characters when entering the
                            product name.</div>
                    </fieldset>
                    @error('slug')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror

                    <div class="gap22 cols">
                        <fieldset class="category">
                            <div class="body-title mb-10">Category <span class="tf-color-1">*</span>
                            </div>
                            <div class="select">
                                <select class="" name="category_id">
                                    <option>Choose category</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id === $product->category_id ?
                                        'selected' : '' }}>
                                        {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </fieldset>
                        @error('category_id')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                        @enderror
                        <fieldset class="brand">
                            <div class="body-title mb-10">Brand <span class="tf-color-1">*</span>
                            </div>
                            <div class="select">
                                <select class="" name="brand_id">
                                    <option>Choose Brand</option>
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ $brand->id === $product->brand_id ? 'selected' :
                                        '' }}>
                                        {{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </fieldset>
                        @error('brand_id')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-y-2">

                        {{--
                        <!-- Size Selector --> --}}
                        @php
                        $selectedSizes = json_decode($product->sizes, true);
                        $allSizes = ['Free', 'XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL'];
                        @endphp

                        <fieldset class="space-y-2">
                            <legend class="body-title mb-10">Size <span class="tf-color-1">*</span></legend>
                            <div class="flex gap-3 overflow-x-auto pb-2">
                                @foreach ($allSizes as $size)
                                <label class="inline-flex items-center space-x-1">
                                    <input type="checkbox" name="sizes[]" value="{{ $size }}"
                                        class="size-option accent-blue-500" {{ $size==='Free' ? 'id=freeSize' : '' }} {{
                                        in_array(trim($size), array_map('trim', $selectedSizes)) ? 'checked' : '' }}>
                                    <span class="text-sm">{{ $size }}</span>
                                </label>
                                @endforeach
                            </div>
                        </fieldset>





                        {{--
                        <!-- Color Selector --> --}}
                        {{-- <fieldset class="space-y-2">
                            <legend class="body-title mb-10">Color <span class="tf-color-1">*</span>
                            </legend>
                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-2">
                                @foreach (['Black', 'White', 'Red', 'Blue', 'Green', 'Yellow', 'Pink', 'Orange',
                                'Purple', 'Gray', 'Navy', 'Brown', 'Beige', 'Maroon', 'Olive'] as $color)
                                <label class="inline-flex items-center space-x-1">
                                    <input type="checkbox" name="colors[]" value="{{ $color }}" class="accent-blue-500">
                                    <span class="text-sm">{{ $color }}</span>
                                </label>
                                @endforeach
                            </div>
                        </fieldset> --}}

                        {{--
                        <!-- Weight Field --> --}}
                        <fieldset class="space-y-2">
                            <label for="weight" class="body-title mb-10">
                                Weight <span class="tf-color-1">*</span> <span class="text-sm text-gray-500">(gm)</span>
                            </label>
                            <input type="text" name="weight" placeholder="Enter product weight"
                                value="{{ $product->weight }}" required class="mb-10">
                        </fieldset>

                    </div>

                    <fieldset class="shortdescription">
                        <div class="body-title mb-10">Short Description <span class="tf-color-1">*</span></div>
                        <textarea class="mb-10 ht-150" name="short_description" placeholder="Short Description"
                            tabindex="0" aria-required="true" required="">{{ $product->short_description }}</textarea>
                        <div class="text-tiny">Do not exceed 100 characters when entering the
                            product name.</div>
                    </fieldset>
                    @error('short_description')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror
                    <fieldset class="description">
                        <div class="body-title mb-10">Description <span class="tf-color-1">*</span>
                        </div>
                        <textarea class="mb-10" name="description" placeholder="Description" tabindex="0"
                            aria-required="true" required="">{{ $product->description }}</textarea>
                        <div class="text-tiny">Do not exceed 100 characters when entering the
                            product name.</div>
                    </fieldset>
                    @error('description')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror
                </div>
                <div class="wg-box">
                    <fieldset>
                        <div class="body-title">Upload images <span class="tf-color-1">*</span>
                        </div>
                        <div class="upload-image flex-grow">
                            <div class="item" id="imgpreview">
                                {{-- @dd('img' . $product->image) --}}
                                <img src="{{ asset('storage/uploads/products/thumbnails/' . $product->image) }}"
                                    class="effect8" alt="">
                            </div>
                            <div id="upload-file" class="item up-load">
                                <label class="uploadfile" for="myFile">
                                    <span class="icon">
                                        <i class="icon-upload-cloud"></i>
                                    </span>
                                    <span class="body-text">Drop your images here or select <span class="tf-color">click
                                            to browse</span></span>
                                    <input type="file" id="myFile" name="image" accept="image/*">
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    @error('image')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror

                    <fieldset>
                        <div class="body-title mb-10">Upload Gallery Images</div>
                        <div class="upload-image mb-16">
                            <div class="item">

                                @foreach (explode(',', $product->images) as $image)
                                <img src="{{ asset('storage/uploads/products/gallery/' . trim($image)) }}"
                                    alt="Product Image" style="width: 100px; height: 100px; margin-right: 10px;">
                                @endforeach



                            </div>
                            <div id="galUpload" class="item up-load">
                                <label class="uploadfile" for="gFile">
                                    <span class="icon">
                                        <i class="icon-upload-cloud"></i>
                                    </span>
                                    <span class="text-tiny">Drop your images here or select <span class="tf-color">click
                                            to browse</span></span>
                                    <input type="file" id="gFile" name="images[]" accept="image/*" multiple>
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    @error('images')
                    <span class="alert alert-danger text-center">{{ $message }}</span>
                    @enderror

                    <div class="cols gap22">
                        <fieldset class="name">
                            <div class="body-title mb-10">Regular Price <span class="tf-color-1">*</span></div>
                            <input class="mb-10" type="text" placeholder="Enter regular price" name="regular_price"
                                tabindex="0" value="{{ $product->regular_price }}" aria-required="true" required="">
                        </fieldset>
                        @error('regular_price')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                        @enderror
                        <fieldset class="name">
                            <div class="body-title mb-10">Sale Price <span class="tf-color-1">*</span></div>
                            <input class="mb-10" type="text" placeholder="Enter sale price" name="sale_price"
                                tabindex="0" value="{{ $product->sale_price }}" aria-required="true" required="">
                        </fieldset>
                        @error('sale_price')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="cols gap22">
                        <fieldset class="name">
                            <div class="body-title mb-10">SKU <span class="tf-color-1">*</span>
                            </div>
                            <input class="mb-10" type="text" placeholder="Enter SKU" name="SKU" tabindex="0"
                                value="{{ $product->SKU }}" aria-required="true" required="">
                        </fieldset>
                        @error('SKU')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                        @enderror
                        <fieldset class="name">
                            <div class="body-title mb-10">Quantity <span class="tf-color-1">*</span>
                            </div>
                            <input class="mb-10" type="text" placeholder="Enter quantity" name="quantity" tabindex="0"
                                value="{{ $product->quantity }}" aria-required="true" required="">
                        </fieldset>
                        @error('quantity')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="cols gap22">
                        <fieldset class="name">
                            <div class="body-title mb-10">Stock</div>
                            <div class="select mb-10">
                                <select class="" name="stock_status">
                                    <option value="instock" {{ $product->stock_status == 'instock' ? 'selected' : ''
                                        }}>in stock
                                    </option>
                                    <option value="outofstock" {{ $product->stock_status == 'outofstock' ? 'selected' :
                                        '' }}>out of stock
                                    </option>
                                </select>
                            </div>
                        </fieldset>
                        @error('stock_status')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                        @enderror
                        <fieldset class="name">
                            <div class="body-title mb-10">Featured</div>
                            <div class="select mb-10">
                                <select class="" name="featured">
                                    <option value="0" {{ $product->featured == '0' ? 'selected' : '' }}>No
                                    </option>
                                    <option value="1" {{ $product->featured == '1' ? 'selected' : '' }}>Yes
                                    </option>
                                </select>
                            </div>
                        </fieldset>
                        @error('featured')
                        <span class="alert alert-danger text-center">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="cols gap10">
                        <button class="tf-button w-full" type="submit" loading='lazy'>Update product</button>
                    </div>
                </div>
            </form>
            <!-- /form-add-product -->
        </div>
        <!-- /main-content-wrap -->
    </div>
</x-admin-layout>
<script>
    $(document).ready(function() {
        $('#myFile').on('change', function(e) {
            const file = this.files[0];

            if (file) {
                if (!file.type.startsWith('image/')) {
                    alert("Please upload a valid image file.");
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(event) {
                    console.log("File loaded:", event.target.result);

                    // Ensure the preview div is shown and set the image src
                    $('#imgpreview').show().html(
                        `<img src="${event.target.result}" class="effect8" alt="preview">`);

                    // Hide the upload area
                    $('#upload-file').hide();
                };
                reader.readAsDataURL(file);
            }
        });
        $('#gFile').on('change', function(e) {
            const photoInp = $("#gFile")
            const gPhotos = this.files;
            $.each(gPhotos, function(key, value) {
                $('#galUpload').prepend(
                    `<div class='item gitems'><img src="${URL.createObjectURL(value)}"/></div>`
                )
            });
        });


        $('input[name="name"]').on("input", function() {
            $('input[name="slug"]').val(slugify($(this).val()));
        });

        function slugify(text) {
            return text.toString().toLowerCase()
                .trim()
                .replace(/\s+/g, '-')
                .replace(/[^\w\-]+/g, '')
                .replace(/\-\-+/g, '-');
        }
    });


    document.addEventListener('DOMContentLoaded', function () {
        const freeSizeCheckbox = document.getElementById('freeSize');
        const sizeOptions = document.querySelectorAll('.size-option');

        function toggleSizes() {
            const isFreeChecked = freeSizeCheckbox.checked;
            sizeOptions.forEach(cb => {
                if (cb !== freeSizeCheckbox) {
                    cb.disabled = isFreeChecked;
                    if (isFreeChecked) cb.checked = false;
                }
            });
        }

        freeSizeCheckbox.addEventListener('change', toggleSizes);

        // Run once on page load in case "Free" is pre-checked
        toggleSizes();
    });

</script>
