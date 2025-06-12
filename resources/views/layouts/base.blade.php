@props(['title' => '', 'bodyClass' => ''])

<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{ $title }} | {{ config('app.name', 'Laravel') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="author" content="surfside media" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com/">
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Allura&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer">

    {{--  new links   --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;700;900&display=swap">
    <link rel="stylesheet" href="{{ asset('new/assets/style.css') }}">
    <link rel="stylesheet" href="{{ asset('new/assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/brands.min.css"
        integrity="sha512-58P9Hy7II0YeXLv+iFiLCv1rtLW47xmiRpC1oFafeKNShp8V5bKV/ciVtYqbk2YfxXQMt58DjNfkXFOn62xE+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" type="image/png" href="https://ext.same-assets.com/1571473267/40491873.png" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>


<body @if ($bodyClass) class="{{ $bodyClass }}" @endif>
    {{ $slot }}
    <script src="{{ asset('assets/js/plugins/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/bootstrap-slider.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/swiper.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/countdown.js') }}"></script>
    <script src="{{ asset('assets/js/theme.js') }}"></script>
    <script>
        $(function() {
            $('#search-input').on('keyup', function() {
                let searchQuery = $(this).val();

                if (searchQuery.length > 2) {
                    $.ajax({
                        url: "{{ route('home.search') }}",
                        method: "GET",
                        data: {
                            query: searchQuery
                        },
                        dataType: "json",
                        success: function(data) {
                            $("#box-content-search").html("");

                            if (data.length === 0) {
                                $("#box-content-search").append(`
                                    <li class="text-center text-muted">No products found.</li>
                                `);
                            } else {
                                $.each(data, function(index, item) {
                                    let link =
                                        "{{ route('shop.product.details', ['product_slug' => '__slug__']) }}"
                                        .replace('__slug__', item.slug);

                                    $("#box-content-search").append(`
                                        <li>
                                            <ul>
                                                <li class="product-item gap14 mb-10">
                                                    <div class="image no-bg">
                                                        <img src="/storage/uploads/products/thumbnails/${item.image}" alt="${item.name}">
                                                    </div>
                                                    <div class="flex items-center justify-between gap20 flex-grow">
                                                        <div class="name">
                                                            <a href="${link}" class="body-text">${item.name}</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="mb-10">
                                                    <div class="divider"></div>
                                                </li>
                                            </ul>
                                        </li>
                                    `);
                                });
                            }
                        },
                        error: function() {
                            $("#box-content-search").html(
                                `<li class="text-danger text-center">Search error occurred.</li>`
                            );
                        }
                    });
                } else {
                    $("#box-content-search").empty();
                }
            });
        });
    </script>
</body>

</html>
