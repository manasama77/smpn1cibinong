{{-- Theme from https://bootstrapmade.com/tempo-free-onepage-bootstrap-theme/ --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} | {{ $page_title ?? '' }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Tempo
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/tempo-free-onepage-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    {{-- @vite(['resources/css/landing/style.css', 'resources/sass/landing_custom.scss', 'resources/vendor/bootstrap/css/bootstrap.min.css', 'resources/vendor/bootstrap-icons/bootstrap-icons.css', 'resources/vendor/boxicons/css/boxicons.min.css', 'resources/vendor/glightbox/css/glightbox.min.css', 'resources/vendor/remixicon/remixicon.css', 'resources/vendor/swiper/swiper-bundle.min.css', 'resources/vendor/bootstrap/js/bootstrap.bundle.min.js', 'resources/vendor/glightbox/js/glightbox.min.js', 'resources/vendor/isotope-layout/isotope.pkgd.min.js', 'resources/vendor/swiper/swiper-bundle.min.js', 'resources/vendor/php-email-form/validate.js', 'resources/js/landing_page.js']) --}}
    @vite(['resources/css/landing/style.css', 'resources/sass/landing_custom.scss'])
</head>

<body>

    <!-- ======= Header ======= -->
    @include('partials.landing.navbar')
    <!-- End Header -->

    <!-- ======= Main Section ======= -->
    @yield('isi_aku_mas')
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    @include('partials.landing.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script src="https://kit.fontawesome.com/5f4be2ccfb.js" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
