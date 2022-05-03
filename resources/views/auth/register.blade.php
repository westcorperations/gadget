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
                <a href="{{ url('/') }}">
                    Gadgets </a>
            </div>
            <div class="navlink d-none d-md-block">
                <a href="{{ url('/') }}">
                    Home</a>
            </div>
            <div class="navlink d-none d-md-block dropdown-toggle dropdown">
                <a href="#">Account</a>
                <div class="dropdown-content">
                    <a href="{{ route('login') }}"> {{ __('Login') }}</a>


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
        <a href="{{ route('register') }}" class="navlink "><span><img src="images/caret-right (1).svg"
                    alt=""></span> {{ __('Register') }}</a>
        <h5 class="text-center">Categories</h5>
        <a href="index.html" class="navlink "> <span><img src="images/caret-right (1).svg" alt=""></span> Home
        </a>
        <a href="#" class="navlink "> <span><img src="images/caret-right (1).svg" alt=""></span>About Us </a>



    </div>
    <div class="login" style="background-image:url('assets{{ '/image/loginbg.jpg' }}');">
        <div class="login-box pt-3">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="row mb-3">
                    <label for="Name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                    <div class="col-md-6">
                        <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror"
                            name="name" value="{{ old('firstname') }}" required autocomplete="firstname"
                            autofocus>

                        @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
                <div class="row mb-3">
                    <label for="lastname" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                    <div class="col-md-6">
                        <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror"
                            name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname"
                            autofocus>

                        @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>

                    <div class="col-md-6">
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                            name="address" value="{{ old('address') }}" required autofocus="address" autofocus>


                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="address2" class="col-md-4 col-form-label text-md-end">Address2 </label>

                    <div class="col-md-6">
                        <input id="address2" type="text" class="form-control @error('address2') is-invalid @enderror"
                            name="address2" value="{{ old('address2') }}"required  autofocus="address2" autofocus>


                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="city"class="col-md-4 col-form-label text-md-end">{{__('City')}}</label>
                    <div class="col-md-6">
                        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror"
                        name="city" value="{{ old('city') }}" required autofocus="city" autofocus>


                    @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="state"class="col-md-4 col-form-label text-md-end">{{__('State')}}</label>
                    <div class="col-md-6">
                        <input id="state" type="text" class="form-control @error('state') is-invalid @enderror"
                        name="state" value="{{ old('state') }}"required  autofocus="state" autofocus>


                    @error('state')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="country"class="col-md-4 col-form-label text-md-end">{{__('Country')}}</label>
                    <div class="col-md-6">
                        <input id="country" type="text" class="form-control @error('country') is-invalid @enderror"
                        name="country" value="{{ old('country') }}" required autofocus="country" autofocus>


                    @error('country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="dob" class="col-md-4 col-form-label text-md-end">Date of birth</label>
                    <div class="col-md-6">
                        <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob"
                            value="{{ old('dob') }}" required autofocus="dob" autofocus>


                        @error('dob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="phone" class="col-md-4 col-form-label text-md-end">Phone Number</label>

                    <div class="col-md-6">
                        <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror"
                            name="phone" value="{{ old('phone') }}" required autofocus="phone" autofocus>


                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>






                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm"
                        class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-4 offset-md-4">
                        <button type="submit" class="btn btn-success">
                            {{ __('Register') }}
                        </button>

                    </div>
                    <div class="col-md-4 ofset-md-4">
                        <button class=" btn btn-primary">
                            <a href="{{ route('login') }}" class="text-decoration-none text-light">
                                {{ __('Login') }}</a></button>
                    </div> <br>

                </div>
       </form>
     </div>

    </div>


    <!-- LOGIN FORM-->


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
