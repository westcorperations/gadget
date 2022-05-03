@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row  ">
            <div class="col ">
                <h3 class="fw-bolder  fs-3 m-0"> New Collection</h3>
                <small class="text-danger pt-0 fst-italic">original gadgets </small>

            </div>

        </div>
    </div>


    <!-- carosel banner -->
    <div class="banner ">
        <div class="slider ">
            <img src="images/iphone132.png" alt="banner image 1" id="slideImg">


        </div>
        <div class="overlay">
            <div class="content">
                <h5 class=" h3 h6-sm"> Get Affordable Gadgets</h3>
                    <p>Shop with us and never regret. Remember to sign up to our news letter for regular updates</p>
                    <div>
                        <button type="button" class="btn btn-outline-success btn-sm">SHOP NOW</button>
                        <button type="button" class="btn btn-outline-info btn-sm">NEWSLETTER</button>

                    </div>
            </div>

        </div>



    </div>




    <!-- ADS slider -->

    <div class="carousel " data-flickity='{ "autoPlay": true,"wrapAround": true, "contain": true}'>
        <img src="images/gargetbanner1.jpg" class="carousel-cell">
        <img src="images/laptop1.png" class="carousel-cell">
        <img src="images/banner1.jpg" class="carousel-cell">
        <img src="images/iphone132.png" class="carousel-cell">
        <img src="images/accessories1.png" class="carousel-cell">
        <img src="images/iphone13-img.png" class="carousel-cell">
        <img src="images/iphone13blue.png" class="carousel-cell">

    </div> <br>

    <!-- phone category home display -->
    <div class="product_data2">

        <div class="phonedeals ">

            <div class="header p-2">
                <span class="h4 fw-bolder"> Phones</span><br>
                <small class="text-light">shop with ease</small>
                <a href="{{ url('category/phones') }}" class="float-end h5 text-decoration-none text-light align-center">see
                    all</a>
            </div>

            <div class="content">

                <div class="carousel" data-flickity='{ "wrapAround": true, "contain": true}'>
                    @empty($phones)
                    <div class="phone_data">
                        <h3>No Product Available!</h3>
                    </div>
                    @endempty
                    @foreach ($phones as $phone)
                        <div class="phone_data">
                            <div class="card ">

                                <a href="{{ url('product/' . $phone->id) }}">
                                    <div class="card-header ">
                                        <span class="product-name fs-6 fw-bolder">{{ $phone->name }}</span><br>
                                        <span class="product-brand fs-6 fw-bold">Brand</span>
                                    </div>

                                    <div class="card-img">
                                        <img src="{{ asset('assets/uploads/product/' . $phone->image) }}" alt=""
                                            class="carousel-cell">
                                    </div>
                                    <div class="card-footer">
                                        <div class="product-price">
                                            <span class="fs-6 fw-bolder">${{ $phone->selling_price }}</span> <br>
                                            <span class=" fw-bolder "> <small>Price</small> </span>
                                        </div>
                                        <input type="hidden" value="{{ $phone->id }}" class="phone_id">
                                </a>
                                <div class="product-icon">
                                    <button class="btn phoneaddtocart btn-outline-dark ">
                                        <img src="images/shopping-cart.png" alt=""></button>
                                </div>


                            </div>
                        </div>



                </div>
                @endforeach

            </div>

        </div>


    </div> <br> <br>

    <!-- laptop category home display -->
    <div class="phonedeals  ">
        <div class="header p-2">
            <span class="h4 fw-bolder"> Laptops</span><br>
            <small class="text-light">ready to shop with ease</small>
            <a href="{{ url('category/laptop') }}" class="float-end h5 text-decoration-none text-light align-center">see
                all</a>
        </div>
        <div class="content">
            <div class="carousel " data-flickity='{ "wrapAround": true, "contain": true}'>
                @empty($laptops)
                    <div class="phone_data">
                        <h3>No Product Available!</h3>
                    </div>
                    @endempty
                @foreach ($laptops as $laptop)
                    <a href="{{ url('product/' . $laptop->id) }}">

                        <div class="card laptop_data">
                            <div class="card-header ">
                                <span class="product-name fs-6 fw-bolder text-justify">{{ $laptop->name }}</span><br>
                                <span class="product-brand fs-6 fw-bold">Brand</span>
                            </div>

                            <div class="card-img">
                                <img src="{{ asset('assets/uploads/product/' . $laptop->image) }}" alt=""
                                    class="carousel-cell">
                            </div>
                            <div class="card-footer">
                                <div class="product-price">
                                    <span class="fs-6 fw-bolder">${{ $laptop->selling_price }}</span> <br>
                                    <span class=" fw-bolder "> <small>Price</small> </span>
                                </div>
                                <input type="hidden" value="{{ $laptop->id }}" class="laptop_id">
                    </a>
                    <div class="product-icon">
                        <button class="btn laptopaddtocart btn-outline-dark ">
                            <img src="images/shopping-cart.png" alt=""> </button>
                    </div>
            </div>
        </div>
        @endforeach
    </div>


    </div>
    </div> <br> <br>

    <!-- ACCESORIES SECTION  -->

    <div class="phonedeals  ">
        <div class="header p-2">
            <span class="h4 fw-bolder"> Accesories</span><br>
            <small class="text-light">ready to shop with ease</small>
            <a href="{{ url('category/Accessories') }}"
                class="float-end h5 text-decoration-none text-light align-center">see all</a>
        </div>
        <div class="content">
            <div class="carousel " data-flickity='{ "wrapAround": true, "contain": true}'>
                @empty($assets)
                    <div class="phone_data">
                        <h3>No product Available!</h3>
                    </div>
                    @endempty
                @foreach ($assets as $asset)
                    <a href="{{ url('product/' . $asset->id) }}">

                        <div class="card assesories_data">
                            <div class="card-header ">
                                <span class="product-name fs-6 fw-bolder">{{ $asset->name }}</span><br>
                                <span class="product-brand fs-6 fw-bold">Brand</span>
                            </div>

                            <div class="card-img">
                                <img src="{{ asset('assets/uploads/product/' . $asset->image) }}" alt="image"
                                    class="carousel-cell">
                            </div>
                            <div class="card-footer">
                                <div class="product-price">
                                    <span class="fs-6 fw-bolder">${{ $asset->selling_price }}</span> <br>
                                    <span class=" fw-bolder "> <small>Price</small> </span>
                                </div>
                                <input type="hidden" value="{{ $asset->id }}" class="assesories_id">
                    </a>
                    <div class="product-icon">
                        <button class="btn assesoriesaddtocart  btn-outline-dark ">
                            <img src="images/shopping-cart.png" alt=""></button>
                    </div>
            </div>
        </div>
        @endforeach

    </div>


    </div>
    </div>

    </div>
@endsection
