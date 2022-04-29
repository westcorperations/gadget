<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white text-white" id="sidenav-main">
  <div class="container-fluid">
    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Brand -->
    <a class="navbar-brand pt-0" href="./index.html">
      <img src="#" class="navbar-brand-img" alt="...">
    </a>
    <!-- User -->
    <ul class="nav align-items-center d-md-none">
      <li class="nav-item dropdown">
        <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="ni ni-bell-55"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="media align-items-center">
            <span class="avatar avatar-sm rounded-circle">
              <img alt="Image placeholder" src="#">
            </span>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
          <div class=" dropdown-header noti-title">
            <h6 class="text-overflow m-0">Welcome!</h6>
          </div>
          <a href="#" class="dropdown-item">
            <i class="ni ni-single-02"></i>
            <span>My profile</span>
          </a>
          <a href="#" class="dropdown-item">
            <i class="ni ni-settings-gear-65"></i>
            <span>Settings</span>
          </a>
          <a href="#" class="dropdown-item">
            <i class="ni ni-calendar-grid-58"></i>
            <span>Activity</span>
          </a>
          <a href="#" class="dropdown-item">
            <i class="ni ni-support-16"></i>
            <span>Support</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       
                                    
            <i class="ni ni-user-run"></i>
            <span> {{ __('Logout') }}</span>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        </div>
      </li>
    </ul>
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
      <!-- Collapse header -->
      <div class="navbar-collapse-header d-md-none">
        <div class="row">
          <div class="col-6 collapse-brand">
            <a href="#">
              <img src="#">
            </a>
          </div>
          <div class="col-6 collapse-close">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
              <span></span>
              <span></span>
            </button>
          </div>
        </div>
      </div>
      <!-- Form -->
      <form class="mt-4 mb-3 d-md-none">
        <div class="input-group input-group-rounded input-group-merge">
          <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <span class="fa fa-search"></span>
            </div>
          </div>
        </div>
      </form>
      <!-- Navigation -->
      <ul class="navbar-nav  ">
        <li class="nav-item  ">
          <a class="nav-link  {{Request::is('/dashboard') ?'active':''}}" href="{{url('/dashboard')}}">
            <i class="ni ni-tv-2 text-primary"></i> Dashboard
          </a>
        </li>
        
        <li class="nav-item  ">
          <a class="nav-link {{Request::is('categories') ?'active':''}}" href="{{url('categories')}}">
            <i class="ni ni-single-02 text-yellow"></i>categories
          </a>
        </li>
        <li class="nav-item " >
          <a class="nav-link {{Request::is('add-category') ?'active':''}}" href="{{url('add-category')}}">
            <i class="ni ni-single-02 text-yellow"></i> Add Category
          </a>
        </li>
        <li class="nav-item  ">
          <a class="nav-link {{Request::is('products') ?'active':''}}" href="{{url('products')}}">
            <i class="ni ni-single-02 text-yellow"></i>Products
          </a>
        </li>
        <li class="nav-item " >
          <a class="nav-link {{Request::is('add-products') ?'active':''}}" href="{{url('add-products')}}">
            <i class="ni ni-single-02 text-yellow"></i> Add Products
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#">
            <i class="ni ni-bullet-list-67 text-red"></i> Users
          </a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="ni ni-circle-08 text-pink"></i> Register Admins
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{Request::is('orders')?'active':''}}" href="{{url('orders')}}">
            <i class="ni ni-circle-08 text-pink"></i> Orders 
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="ni ni-circle-08 text-pink"></i>sales analysis
          </a>
        </li>
      </ul>
      <!-- Divider -->
      
    </div>
  </div>
</nav>