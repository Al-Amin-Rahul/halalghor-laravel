@extends('front.master')
@section('bodyRight')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @include("message.message")

                    @if(Cart::count() > 0)

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th class="text-right">Price</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($total = 0)
                            @foreach($carts as $cart)
                                <tr>
                                    <td>
                                        <img src="{{ asset($cart->options->image) }}" alt="" width="80">
                                    </td>
                                    <td>{{ substr($cart->name, 0, 50) }}</td>
                                    <td>BDT {{ number_format($u_price = $cart->price, 2) }}</td>
                                    <td>
                                        <form action="{{ route("carts.update", ["rowId" => $cart->rowId]) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input class="cart-qty" type="number" name="cart_qty" value="{{ $quantity = $cart->qty }}" />
                                            <input class="btn btn-secondary btn-sm" type="submit" name="update" value="Update" />
                                        </form>

                                    </td>
                                    <td class="text-right">BDT {{ number_format($price = $u_price * $quantity , 2) }}</td>
                                    <td class="text-right">
                                        <form action="{{ route("carts.destroy", ["rowId" => $cart->rowId]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input class="btn btn-sm btn-danger" type="submit" name="submit" value="Remove" onclick="return confirm('Are you Sure')">
                                        </form>
                                    </td>
                                </tr>
                                @php($total = $total + $price)
                            @endforeach
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Total</strong></td>
                                <td class="text-right">
                                    <strong>BDT {{ number_format($total, 2) }}</strong>
                                    {{ session()->put("total_price", $total) }}
                                    {{--{{ session(['total_price' => $total]) }}--}}
                                </td>
                                <td class="text-right">
                                    <a href="{{ route("carts.removeAll") }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you Sure')">Remove All</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <div class="col mb-2">
                            <div class="row">
                                <div class="col-sm-12  col-md-6">
                                    <a href="{{ route("/") }}" class="btn btn-block btn-dark">Continue Shopping</a>
                                </div>
                                <div class="col-sm-12 col-md-6 text-right">
                                    <a href="{{ route("checkout") }}" class="btn btn-block btn-success text-uppercase">Checkout</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Cart is empty</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
                </div>
@endsection

