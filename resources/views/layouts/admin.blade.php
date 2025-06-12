@props(['title' => ''])

<!DOCTYPE html>
<html dir="ltr" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{ $title }} | {{ config('app.name', 'Laravel') }}</title>
    <meta charset="utf-8">
    <meta name="author" content="themesflat.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('font/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('icon/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset('images/favicon.ico') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sweetalert.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">


    <style>
        .logout-text {
            color: red;
            font-size: 2rem;

        }

        .logout-text:hover {
            color: rgb(244, 48, 48);
        }

        .log {
            border-top: 2px solid #bbbbbb;
        }
    </style>
</head>

<body class="body">
    <div id="wrapper">
        <div id="page" class="">
            <div class="layout-wrap">
                <div class="section-menu-left">
                    <div class="box-logo">
                        <a href="{{ route('admin.index') }}" id="site-logo-inner">
                            <img class="" id="logo_header" alt="logo"
                                src="{{ asset('images/logo/logo.png') }}"
                                data-light="{{ asset('images/logo/logo.png') }}"
                                data-dark="{{ asset('images/logo/logo.png') }}">
                        </a>
                        <div class="button-show-hide">
                            <i class="icon-menu-left"></i>
                        </div>
                    </div>
                    <div class="center">
                        <div class="center-item">
                            <div class="center-heading">Main Home</div>
                            <ul class="menu-list">
                                <li class="menu-item">
                                    <a href="{{ route('admin.index') }}" class="">
                                        <div class="icon"><i class="icon-grid"></i></div>
                                        <div class="text">Dashboard</div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="center-item">
                            @include('admin.admin-nav')
                        </div>
                    </div>
                </div>
                <div class="section-content-right">

                    <div class="header-dashboard">
                        <div class="wrap">
                            <div class="header-left">
                                <a href="{{route('home.index')}}">
                                    <img class="" id="logo_header_mobile" alt=""
                                        src="{{ asset('images/logo/logo.png') }}"
                                        data-light="{{ asset('images/logo/logo.png') }}"
                                        data-dark="{{ asset('images/logo/logo.png') }}" data-width="154px"
                                        data-height="52px" data-retina="images/logo/logo.png')}}">
                                </a>
                                <div class="button-show-hide">
                                    <i class="icon-menu-left"></i>
                                </div>


                                <form class="form-search flex-grow">
                                    <fieldset class="name">
                                        <input type="text" placeholder="Search here..." class="show-search"
                                            id="search-input" name="name" tabindex="2" value=""
                                            aria-required="true" required="" autocomplete="off">
                                    </fieldset>
                                    <div class="button-submit">
                                        <button class="" type="submit"><i class="icon-search"></i></button>
                                    </div>
                                    <div class="box-content-search">
                                        <ul id="box-content-search"></ul>
                                    </div>
                                </form>

                            </div>
                            <div class="header-grid">
                                <div class="popup-wrap message type-header">
                                    @include('admin.admin-notification')
                                </div>
                                <div class="popup-wrap user type-header">
                                    @include('admin.admin-profile')
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-content">
                        {{ $slot }}
                        <div class="bottom-page">
                            <div class="body-text">Copyright © 2025 E-COM-SELLER</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('js/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        $(function() {
            $('#search-input').on('keyup', function() {
                let searchQuery = $(this).val();

                if (searchQuery.length > 2) {
                    $.ajax({
                        url: "{{ route('admin.search') }}",
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
                                        "{{ route('admin.product.edit', ['id' => 'product_id']) }}"
                                        .replace('__slug__', item.id);

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
