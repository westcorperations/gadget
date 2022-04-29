<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Gadget') }}</title>

    
    <!-- Styles -->
    {{-- icons --}}
    <link href="{{ asset('frontend/admin/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/admin/css/nucleo.css') }}" rel="stylesheet">
    {{-- css --}}
    <link href="{{ asset('frontend/admin/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet">
    {{-- fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    
</head>
<body class="">
  @include('layouts.inc.adminsidebar')
  <div class="main-content">
    @include('layouts.inc.adminnav')
  
    {{-- content  --}}
    @yield('content')
   @include('layouts.inc.adminfooter')
  </div>
    
    
    </main>
     <!-- Scripts -->
    
     <script src="{{ asset('frontend/admin/js/jquery.min.js') }}" defer></script>
     <script src="{{ asset('frontend/admin/js/bootstrap.bundle.min.js') }}" defer></script>
     <script src="{{ asset('frontend/admin/js/argon-dashboard.min.js?v=1.1.2') }}" defer></script>
     @yield('script')
     
</body>
</html>
