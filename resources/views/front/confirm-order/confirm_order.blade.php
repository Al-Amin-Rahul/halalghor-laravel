@extends('front.master')
@section('bodyRight')
    <div class="container-fluid mt-2">
        <div class="row">
            <div class="col-lg-12">

                <div class="row">
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Your cart</span>
                            <span class="badge badge-secondary badge-pill">{{ Cart::count() }}</span>
                        </h4>
                        <ul class="list-group mb-3">
                            @foreach($carts as $cart)
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">{{ $cart->name }}</h6>
                                    <small class="text-muted">Quantity {{ $quantity = $cart->qty }}</small>
                                </div>
                                <span class="text-muted">{{ number_format($cart->price * $quantity, 2) }}</span>
                            </li>
                            @endforeach
                            {{--<li class="list-group-item d-flex justify-content-between bg-light">--}}
                                {{--<div class="text-success">--}}
                                    {{--<h6 class="my-0">Promo code</h6>--}}
                                    {{--<small>EXAMPLECODE</small>--}}
                                {{--</div>--}}
                                {{--<span class="text-success">-$5</span>--}}
                            {{--</li>--}}
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total (BDT)</span>
                                <strong>TK {{ number_format(session()->get("total_price"), 2) }}</strong>
                            </li>
                        </ul>

                        {{--<form class="card p-2">--}}
                            {{--<div class="input-group">--}}
                                {{--<input type="text" class="form-control" placeholder="Promo code">--}}
                                {{--<div class="input-group-append">--}}
                                    {{--<button type="submit" class="btn btn-secondary">Redeem</button>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</form>--}}
                    </div>
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3">Billing address</h4>

                        @include("message.message")

                        <form class="needs-validation" action="{{ route("checkout") }}" method="post" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="Name">Name</label>
                                    <input type="text" class="form-control" id="Name" name="name" placeholder="" value="" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="+880 1*********" value="">
                            </div>

                            <div class="mb-3">
                                <label for="address">Address</label>
                                <textarea class="form-control" name="address" id="" rows="4"></textarea>
                            </div>
                            <hr class="mb-4">
                            <input class="btn btn-success btn-lg btn-block add-cart-btn" type="submit" name="continueToCheckout" value="Continue to Checkout"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
