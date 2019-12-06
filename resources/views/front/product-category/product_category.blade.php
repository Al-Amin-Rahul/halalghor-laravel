@extends('front.master')
@section('bodyRight')
    @foreach($category_products as $category)
        <div class="container-fluid">
            <h3 class="text-center title m-3">{{ $category->name }}</h3>
            <div class="row">
                @foreach($category->products as $product)
                    <div class="col-lg-4 col-md-6 col-6 mb-4">
                        <div class="card h-100">
                            <a href="{{ route("product-details", ["slug" => $product->slug]) }}"><img class="card-img-top" src="{{ asset($product->banner) }}" alt=""></a>
                            <div class="card-body name-overflow product-name" title="{{ ($product->name) }}">
                                {{ ($product->name) }}
                            </div>
                            <div class="product-price">
                                <p class="text-center mt-1"><strong>BDT {{ $product->price }}</strong></p>
                            </div>
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
            {{--{{ $category->products->links() }}--}}
        </div>
    @endforeach
@endsection

@section('body')
    <div class="container mt-5">
        <h2 class="text-center title">Offer Product</h2>
        <div class="row">
            @foreach($offer_products as $product)
                <div class="col-lg-3 col-md-6 col-6 mb-4 product-xs mb-4">
                    <div class="card h-100" style="position: relative;">
                        <a href="{{ route("product-details", ["slug" => $product->slug] ) }}"><img class="card-img-top" src="{{ asset($product->banner) }}" alt=""></a>
                        <div class="p-1 " style="position: absolute">
                            <p class="bg-danger text-center text-offer" style="color: white; width: 50px;border-radius: 5px;">{{ $product->offer_ratio }}%</p>
                        </div>
                        <div class="card-body name-overflow product-name" title="{{($product->name) }}">
                            {{($product->name) }}
                        </div>
                        <div class="row justify-content-center mt-2 mb-2">
                            <span class="product-price"><strong>BDT</strong>
                                <strong>{{ number_format(($product->price - (($product->price * $product->offer_ratio) / 100)), 2) }}</strong>
                            </span>
                        </div>
                        <div class="row justify-content-center">
                            <strike>{{ $product->price }}</strike>
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
@endsection
