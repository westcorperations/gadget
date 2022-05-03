  <!-- nav bar for destop -->
  <div class="navbarz fixed-top">
    <div class="navlinks   ">
      <div class="menu d-xl-none d-lg-none">
        <button class="" onclick="openNav()">

          <img src="/images/menu.png" alt="" srcset="" id="">
        </button>
      </div>
      <div class="navlogo d-none d-lg-block  ">
        <a href="{{url('/')}}">
          Gadgets </a>
      </div>
      <div class="navlink d-none d-lg-block">
        <a href="{{url('/')}}">
          Home</a>
      </div>
      <div class="navlink d-none d-lg-block dropdown-toggle dropdown">
        <a href="#">Account</a>
        <div class="dropdown-content">
          <a href="{{url('user-dashboard')}}">Profile</a>
          {{-- <a href="login.html">Login</a> --}}
          @guest
          @if (Route::has('login'))

                  <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>

          @endif
          {{-- <a href="signup.html">Signup</a> --}}
          @if (Route::has('register'))

                                    <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>

                            @endif
                            @else


                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>


                        @endguest
        </div>
      </div>
      <div class="navlink d-none d-lg-block dropdown-toggle dropdown">
        <a href="">Category</a>
        <div class="dropdown-content">
          <a href="{{ url('category/phones') }}">Phones</a>
          <a href="{{ url('category/laptop') }}">Laptop</a>
          <a href="{{ url('category/Accessories') }}">Accessories</a>
        </div>
      </div>
      <div class="navlink d-none d-lg-block">
        <a href="#">
          About Us</a>
      </div>
      <div class="navsearch d-none d-lg-block">
        <form action="">
          <input type="search" name="" id="" placeholder="search any product">
        </form>
      </div>

    </div>


    <div class="navicons ">


{{--
      <div class="navicon">
        <img src="/images/wishlist.svg" alt="wishlist" class="">
        <span class='badge badge-warning' id='lblCartCount'> 5 </span> --}}

      {{-- </div> --}}
      <div class="navicon">
       <a href="{{url('cart')}}"> <img src="/images/shopping-cart.png" alt="cart" class="">
        <span class='badge badge-warning cartcount' id='lblCartCount'>0</span>
</a>

      </div>

    </div>
  </div>


  <!-- side nav for mobile -->
  <div class="sidenav" id="mySidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <h5 class="text-center">Account</h5>
    <a href="{{url('user-dashboard')}}" class="navlink "><span><img src="images/caret-right (1).svg" alt=""></span> Profile</a>

    @guest
    @if (Route::has('login'))

            <a class="" href="{{ route('login') }}">{{ __('Login') }}</a>

    @endif
    {{-- <a href="signup.html">Signup</a> --}}
    @if (Route::has('register'))

  <a class="navlink" href="{{ route('register') }}"><span><img src="images/caret-right (1).svg" alt=""></span> {{ __('Register') }}</a>

                      @endif
                      @else


                              <a class="navlink" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                               <span><img src="images/caret-right (1).svg" alt=""></span>
                                  {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>


                  @endguest

    <h5 class="text-center">Categories</h5>
    <a href="{{ url('category/phone') }}" class="navlink "> <span><img src="images/caret-right (1).svg" alt=""></span>Phone </a>
    <a href="{{ url('category/laptop') }}" class="navlink "><span><img src="images/caret-right (1).svg" alt=""></span>Computers</a>
    <a href="{{ url('category/Accessories') }}" class="navlink "><span><img src="images/caret-right (1).svg" alt=""></span>Accessories</a>
    <h5 class="text-center">Others</h5>
    <a href="#" class="navlink "> <span><img src="images/caret-right (1).svg" alt=""></span>About Us </a>
    <a href="{{url('/')}}" class="navlink "> <span><img src="images/caret-right (1).svg" alt=""></span> Home </a>



  </div>
