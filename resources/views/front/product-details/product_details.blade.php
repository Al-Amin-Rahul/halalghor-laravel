@extends('front.master')

@section('bodyRight')
    <div class="row">
        <div class="col-lg-7 col-md-7  p-md-5">
            <img src="{{ asset($product->banner) }}" data-imagezoom="true" class="img-thumbnail" width="100%;">
        </div>
        <div class="col-lg-5 col-md-5 p-md-5">
            <div class="title">
                <h5 class="text-justify">{{ $product->name }}</h5>
            </div>
            <div class="product-code">
                <h5>Product code : {{ $product->code }}</h5>
            </div>
            <div class="product-price">
                <h5>Price :
                    <span>
                        <strong>BDT</strong>

                        @if($product->offer_ratio == 0)
                            <strong>{{ $product->price }}</strong>
                        @else
                        <strike>{{ $product->price }}</strike>
                        <strong>{{ number_format(($product->price - (($product->price * $product->offer_ratio) / 100)), 2) }}</strong>
                        @endif
                    </span>
                </h5>
            </div>
            <div class="product-description text-justify">
                <p>{{ $product->description }}</p>
            </div>
            <form action="{{ route("carts.store") }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <input type="hidden" class="form-control" name="product_id" value="{{ $product->id }}">
                        <div class="row">
                            <label class="col-lg-5">qty :</label>
                            <input type="number" class="form-control col-lg-6" name="quantity" value="1">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <input type="submit" name="btn" value="Buy Now" class="btn btn-primary btn-block">
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{--=====================--}}
    <div class="row mt-5">
        <div class="col-lg-6">
            <div class="image">
                <img src="{{asset('/')}}front/images/product-details/delivery.png" style="opacity: .6">
            </div>
            <div class="title">
                <strong>DELIVERED BY</strong>
                <p>Usually in 1-5 business days</p>
            </div>

        </div>
        <div class="col-lg-6">
            <div class="image">
                <img src="{{asset('/')}}front/images/product-details/call.png"style="opacity: .6">
            </div>
            <div class="title">
                <strong>ORDER BY CALL</strong>
                <p>+880 177777777,+880 188888888</p>
            </div>
        </div>
    </div>
    {{--===================--}}
    <div class="row">
        <div class="col-lg-6">
            <p>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#productFeature" aria-expanded="false" aria-controls="collapseExample">
                    Product Feature
                </button>
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#replacePolicy" aria-expanded="false" aria-controls="collapseExample">
                    Replace Policy
                </button>
            </p>
            <div class="collapse" id="productFeature">
                <div class="card card-body">
                    <strong>Product Feature</strong>
                    <p>{!! $product->product_feature !!}</p>
                </div>
            </div>
            <div class="collapse" id="replacePolicy">
                <div class="card card-body">
                    <strong>Replace Policy</strong>
                    <p>Product will be replaced if it has any defect by its manufacturer.</p>
                </div>
            </div>
        </div>
    </div>
{{--------------------------------------}}


@endsection

@section('body')

    <div class="container-fluid">
        <h3 class="text-center m-5 title">Similar Product</h3>
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="row">
                    @foreach($similar_product->products as $s_product)
                        <div class="col-lg-3 col-md-6 col-6 mb-4 product-xs">
                            <div class="card h-100">
                                <a href="{{ route("product-details", ["slug" => $s_product->slug]) }}"><img class="card-img-top" src="{{asset($s_product->banner)}}" alt=""></a>
                                    <div class="card-body name-overflow product-name">
                                        {{($s_product->name) }}
                                    </div>
                                <div class="product-price">
                                    <p class="text-center mt-1"><strong>BDT {{ $s_product->price }}</strong></p>
                                </div>
                                    <div class="card-footer">
                                        <form action="{{ route("carts.store") }}" method="post">
                                            @csrf
                                            <div class="row">
                                                <input type="hidden" class="form-control" name="product_id" value="{{ $s_product->id }}">
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
    </div>


{{--    Comments Section--}}
{{--    {{ dd($comments->count()) }}--}}
    @if($comments->count() > 0)
    <div class="container mt-5">
        <div class="row offset-1">
            <h3 class="border-bottom pb-3">Customer Review For This Product</h3>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="row" >
            <div class="col-lg-6 offset-lg-1 col-md-6 offset-md-1 col-sm-6 offset-sm-1">
                <div class="row">
                    @foreach($comments as $comment)
                    <div class="col-lg-2">
                        <i class="fas fa-user-circle" style="font-size: 40px;"></i>
                        <p>{{ $comment->name }}</p>
                    </div>
                    <div class="col-lg-10">
                        <h5>{{ $comment->created_at->format('F d, Y') }}</h5>
                        <p>{{ $comment->comment }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="container mt-5">
        <div class="row offset-1">
            <h3 class="border-bottom pb-3">Write A Customer Review</h3>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-lg-6 offset-lg-1 col-md-6 offset-md-1 col-sm-6 offset-sm-1">

                @include("message.message")
                <form action="{{ route("comment.store") }}" method="post">
                    @csrf
                    <div class="form-group">
                        <i class="fas fa-comments pl-3"></i>
                        <textarea class="form-control" name="comment" rows="4" placeholder="Comments..">{{ old("comment") }}</textarea>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-user pl-3"></i>
                        <input type="hidden" name="product_id" placeholder="name.." class="form-control" value="{{ $product->id }}">
                        <input type="text" name="name" placeholder="name.." class="form-control" value="{{ old("name") }}">
                    </div>
                    <div class="form-group">
                        <i class="far fa-envelope pl-3"></i>
                        <input type="email" name="email" placeholder="email.." class="form-control" value="{{ old("email") }}">
                    </div>
                    <input type="submit" class="btn btn-outline-success btn-block" name="btn" value="Post">
                </form>
            </div>
        </div>
    </div>
@endsection

@section("extra-js")
    <script src="{{asset('/')}}front/js/jquery-2.1.4.min.js"></script>
    <!-- imagezoom -->
    <script src="{{asset('/')}}front/js/imagezoom.js"></script>
    <!-- //imagezoom -->

@endsection
