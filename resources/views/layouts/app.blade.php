<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gadget') }}</title>


    <!-- Styles -->

    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/flickity.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet"> --}}

</head>

<body onload="slider()">
    @include('layouts.inc.navbar')
    @yield('content')
</body>
<script src="{{ asset('frontend/js/jquery.js') }}" defer></script>
<script src="{{ asset('frontend/js/flickity.pkgd.min.js') }}" defer></script>
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" defer></script>
<script src="{{ asset('frontend/js/index.js') }}" defer></script>
<script src="{{ asset('frontend/js/checkout.js') }}" defer></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if (session('Status'))
<script>
swal("{{session('Status')}}", "info");
</script>
@endif
@yield('script')

</html>
