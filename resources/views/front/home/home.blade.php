@extends('front.master')
@section('extra-css')
    <link rel="stylesheet" href="{{ asset("/") }}front/css/owl.carousel.min.css">
@endsection
@section('bodyRight')
    @include("message.message")
    <div id="carouselChange" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselChange" data-slide-to="0" class="active"></li>
            <li data-target="#carouselChange" data-slide-to="1"></li>
            <li data-target="#carouselChange" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('/')}}front/images/slider-home-top/img-slider-one.jpg" class="d-block w-100 img-slider" alt="..." height="400px">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First Slide</h5>
                    <p>First Slide Description Will Goes Here</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('/')}}front/images/slider-home-top/img-slider-two.jpg" class="d-block w-100 img-slider" alt="..."height="400px">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second Slide</h5>
                    <p>Second Slide Description Will Goes Here</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{asset('/')}}front/images/slider-home-top/img-slider-three.jpg" class="d-block w-100 img-slider" alt="..."height="400px">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third Slide</h5>
                    <p>Third Slide Description Will Goes Here</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselChange" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselChange" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
@endsection
{{--End Slider--}}
@section('body')

{{--    =================Offer======================--}}

    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-6 col-md-6 col-6">
                <h2 class="title">Offer Product</h2>
            </div>
            <div class="col-lg-6 col-md-6 col-6">
                <a href="{{ route("offer_product.show") }}"><h5 class="float-right border-dark p-1 title-box" style="box-sizing: border-box;border: 1px solid darkgreen;color: black">See All</h5></a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="slider">
            <div class="owl-carousel" id="ps">
                @foreach($offer_products as $product)
                    <div class="item">
                         <div class="card h-100" style="position: relative;">
                             <a href="{{ route("product-details", ["slug" => $product->slug] ) }}"><img class="card-img-top" src="{{ asset($product->banner) }}" alt=""></a>
                             <div class="" style="position: absolute">
                                <p class="bg-danger text-center text-offer" style="color: white; width: 50px;border-radius: 5px;">{{ $product->offer_ratio }}%</p>
                            </div>
                             <div class="stock" style="position: absolute">
                                <h6 class="bg-dark p-1 text-stock" style="color: white;border-radius: 5px;">Stock Out</h6>
                            </div>

                            <div class="card-body name-overflow product-name" title="{{($product->name) }}">
                                {{($product->name) }}
                            </div>

                            <div class="row justify-content-center mt-2 mb-2">
                                <span class="product-price">
                                    <strong>BDT</strong>
                                        <strike>{{ $product->price }}</strike>
                                    <strong>{{ number_format(($product->price - (($product->price * $product->offer_ratio) / 100)), 2) }}</strong>
                                </span>
                            </div>

                            <div class="card-footer">
                                <form action="{{ route("carts.store") }}" method="post">
                                 @csrf
                                    <div class="row">
                                        <input type="hidden" class="form-control" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" class="form-control" name="quantity" value="1">
                                        <div class="col-lg-12">
                                            <input type="submit" name="btn" value="Add to Cart" class="btn btn-success btn-block">
                                        </div>
                                    </div>
                                </form>
                            </div>
                         </div>
                     </div>
                 @endforeach
             </div>
         </div>
    </div>


{{--========================End Offer===============--}}



{{--===========================Popular===================--}}

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-6">
                <h2 class="title">Popular Product</h2>
            </div>
            <div class="col-lg-6 col-md-6 col-6">
                <a href="{{ route("popular_product.show") }}"><h5 class="float-right border-dark p-1 title-box" style="box-sizing: border-box;border: 1px solid darkgreen;color: black">See All</h5></a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="slider">
            <div class="owl-carousel" id="ps">
                @foreach($popular_products as $product)
                    <div class="item">
                        <div class="card h-100">
                            <a href="{{ route("product-details", ["slug" => $product->slug] ) }}"><img class="card-img-top" src="{{ asset($product->banner) }}" alt=""></a>
                            <div class="card-body name-overflow product-name" title="{{ ($product->name) }}">
                                {{ ($product->name) }}
                            </div>
                            <div class="row justify-content-center">
                                <span class="product-price"><strong>BDT {{ $product->price }}</strong></span>
                            </div>
                            <div class="card-footer">
                                <form action="{{ route("carts.store") }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <input type="hidden" class="form-control" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" class="form-control" name="quantity" value="1">
                                        <div class="col-lg-12">
                                            <input type="submit" name="btn" value="Add to Cart" class="btn btn-success btn-block">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                     </div>
                @endforeach
            </div>
        </div>
    </div>

{{--============================End Popular=============--}}

{{--===============================Women's Fashion============--}}

    @foreach($categories as $category)
    @if($category->name != "Women's Fashion")
        @continue
    @else
    <div class="container-fluid">
        <h2 class="text-center mb-5 title">Women's Fashion</h2>
    </div>
{{--        <a href="{{ route("category-products", ["slug" => $category->slug]) }}" class="list-group-item list-group-item-action">{{ $category->name }}</a>--}}
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="card-footer">

                    <div class="row ">
                        <div class="col-lg-4 col-md-3">
                            <div class="fashion">
                                <a href="{{ route("category-products", ["slug" => $category->slug]) }}"><img src="{{asset('/')}}front/images/fashion/SIDE-1_1.jpg" class="img-fluid" width="100%"style="height: 250px;"></a>
                            </div>
                            <div class="fashion">
                                <a href="{{ route("category-products", ["slug" => $category->slug]) }}"><img src="{{asset('/')}}front/images/fashion/SIDE-4.jpg" class="img-fluid" width="100%" style="height: 250px;"></a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="fashion h-100">
                                <a href="{{ route("category-products", ["slug" => $category->slug]) }}"><img src="{{asset('/')}}front/images/fashion/middle_womens.jpg" class="img-fluid" width="100%" height="400px;" style="height: 500px;"> </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3 mb-4">
                            <div class="fashion">
                                <a href="{{ route("category-products", ["slug" => $category->slug]) }}"><img src="{{asset('/')}}front/images/fashion/SIDE-3_1.jpg" class="img-fluid border-dark" width="100%" height="200px;" style="height: 250px;"></a>
                            </div>
                            <div class="fashion">
                                <a href="{{ route("category-products", ["slug" => $category->slug]) }}"><img src="{{asset('/')}}front/images/fashion/www.jpg" class="img-fluid" width="100%" height="200px;" style="height: 250px;"></a>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
    </div>
    @endif
    @endforeach

{{--=======================End Women's Fashion==============--}}

{{--=====================All Catagories=============--}}

    @foreach($categories as $category)
        @if($category->name == "Men's Fashion" || $category->name == "Women's Fashion")
            @continue
        @else
            <div class="container">
                <h2 class="title mt-5">{{ $category->name }}</h2>
            </div>
                <div class="container">
                    <div class="slider">
                        <div class="owl-carousel" id="ps">
                            @foreach($category->products as $product)
                                <div class="item">
                                    <div class="card">
                                        <a href="{{ route("product-details", ["slug" => $product->slug] ) }}"><img class="card-img-top" src="{{ asset($product->banner) }}" alt=""></a>
                                        <div class="card-body name-overflow product-name" title="{{ ($product->name) }}">
                                            {{($product->name)}}
                                        </div>
                                        <p class="text-center mt-1 product-price"><strong>BDT {{ $product->price }}</strong></p>
                                        <div class="card-footer">
                                            <form action="{{ route("carts.store") }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <input type="hidden" class="form-control" name="product_id" value="{{ $product->id }}">
                                                    <input type="hidden" class="form-control" name="quantity" value="1">
                                                    <div class="col-lg-12">
                                                        <input type="submit" name="btn" value="Add to Cart" class="btn btn-success btn-block add-cart-btn">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

{{--=============End All Catgories==============--}}


    @foreach($categories as $category)
        @if($category->name != "Men's Fashion")
            @continue
        @else
            <div class="container-fluid">
                <h2 class="text-center mt-5 mb-5 title">Men's Fashion</h2>
            </div>
{{--            <a href="{{ route("category-products", ["slug" => $category->slug]) }}" class="list-group-item list-group-item-action">{{ $category->name }}</a>--}}
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 mb-4">
                                <div class="fashion">
                                    <a href="{{ route("category-products", ["slug" => $category->slug]) }}"><img src="{{asset('/')}}front/images/fashion/SIDE-1.jpg" class="img-fluid" width="100%"style="height: 200px;"></a>
                                </div>
                                <div class="fashion">
                                    <a href="{{ route("category-products", ["slug" => $category->slug]) }}"><img src="{{asset('/')}}front/images/fashion/SIDE-2.jpg" class="img-fluid" width="100%" height="200px;" style="height: 200px;"></a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 mb-4">
                                <div class="fashion h-100">
                                    <a href="{{ route("category-products", ["slug" => $category->slug]) }}"><img src="{{asset('/')}}front/images/fashion/middle_mens.jpg" class="img-fluid" width="100%" height="400px;" style="height: 400px;"> </a>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 mb-4">
                                <div class="fashion">
                                    <a href="{{ route("category-products", ["slug" => $category->slug]) }}"><img src="{{asset('/')}}front/images/fashion/SIDE-3.jpg" class="img-fluid" width="100%" height="200px;" style="height: 200px;"></a>
                                </div>
                                <div class="fashion">
                                    <a href="{{ route("category-products", ["slug" => $category->slug]) }}"><img src="{{asset('/')}}front/images/fashion/mensss.jpg" class="img-fluid" width="100%" height="200px;" style="height: 200px;"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach

<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-lg-5 offset-lg-4 col-md-5 col-12 offset-md-3 " >
            <iframe  class="facebook-container" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fhalalghor&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="300" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
        </div>
    </div>
</div>


@endsection

@section("extra-js")

    <script src="{{ asset("/") }}front/js/owl.carousel.min.js"></script>
    <script>
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true,
            animateOut: 'fadeOut',
            autoHeight:false,
            autoHeightClass: 'owl-height',
            nav:true,
            dots:false,
            responsiveClass:true,
            navText:[
                '<i class="fa fa-arrow-left arrow_icone" style="color: wheat"></i>',
                '<i class="fa fa-arrow-right arrow_icone" style="color: wheat"></i>'
            ],

            responsive: {
                0: {
                    items: 2,
                    nav:true,
                },
                768: {
                    items: 3,
                },
                1000: {
                    items: 4,
                    loop: true
                },
            }

        });
    </script>
<script>
    var owl = $('.owl-carousel-fixed');
    owl.owlCarousel({
        margin:10,
        autoHeight:false,
        dots:false,
        responsiveClass:true,
        responsive: {
            0: {
                items: 2,
            },
            768: {
                items: 3,
            },
            1000: {
                items: 4,
                loop: true
            },
        }

    });
</script>
@endsection
