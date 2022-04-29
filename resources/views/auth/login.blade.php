<!DOCTYPE html>
<html lang="en">
<!-- head  -->
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
    <!-- nav bar for destop -->
    <div class="navbarz fixed-top">
        <div class="navlinks   ">
            <div class="menu d-xl-none d-md-none">
                <button class="" onclick="openNav()">

                    <img src="images/menu.png" alt="" srcset="" id="">
                </button>
            </div>
            <div class="navlogo d-none d-md-block  ">
                <a href="{{url('/')}}">
                    Gadgets </a></div>
            <div class="navlink d-none d-md-block">
                <a href="{{url('/')}}">
                    Home</a>
            </div>
            <div class="navlink d-none d-md-block dropdown-toggle dropdown">
                <a href="#">Account</a>
                <div class="dropdown-content">
                    <a href="{{ route('register') }}"> {{ __('Register') }}</a>
                    
           
                </div>
            </div>
           


            <div class="navlink d-none d-md-block">
                <a href="#">
                    About Us</a>
            </div>
            
        </div>

        </div>
    </div>


    <!-- side nav for mobile -->
    <div class="sidenav" id="mySidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <h5 class="text-center">Account</h5>
        <a href="{{  route('register')   }}" class="navlink "><span><img src="images/caret-right (1).svg" alt=""></span> {{ __('Register')}}</a>
        <h5 class="text-center">Categories</h5>
       <a href="index.html" class="navlink "> <span><img src="images/caret-right (1).svg" alt=""></span> Home </a>
        <a href="#" class="navlink "> <span><img src="images/caret-right (1).svg" alt=""></span>About Us </a>
        


    </div>



    <!-- LOGIN FORM-->
    <div class="login"style="background-image:url('assets{{'/image/loginbg.jpg'}}')"; >
<div class="login-box">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <img src="images/abstract-user-flat-4.svg" alt="" srcset="" class="d-lg-none ">
        <label for="email"class="fs-lg-4 fs-5 pt-3 form-label"> {{ __('Email') }}</label> <br> 
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" 
        value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
   
    
        <label for="password"class="fs-5  form-label" >{{__('Password')}}</label> <br>
        <input type="password" name="password" id="password" class=" form-control @error( 'password') is-invalid @enderror"
        value="{{ old('password') }}" required >
<div>
        <button type="submit" class=" d-inline btn-success"> {{ __('Login') }}</button> 
        <button class=" btn-primary"><a href="{{  route('register')   }}"class="text-decoration-none text-light">{{__('Register')}}</a></button></div> <br>
        <div class="forgot-pswd ">
        <a href=""class="">Forgot password?</a></span></small>
        </div>



    </form>
     </div>
     </div>

    <!-- <div>
        d
    </div> 
 -->





</body>
<script src="{{ asset('frontend/js/flickity.pkgd.min.js') }}" defer></script>
     <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" defer></script>
     <script src="{{ asset('frontend/js/index.js') }}" defer></script>
     @yield('script')
</html>