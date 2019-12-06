@extends("admin.master")

@section("body")

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Manage Order</li>
        </ol>

        <!-- Icon Cards-->

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-chart-area"></i>
                Manage Order</div>
            <div class="card-body">

                <div class="table-responsive">

                    @include("message.message")

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Serial NO</th>
                            <th>Customer Name</th>
                            <th>Customer Phone Number</th>
                            <th>Order No</th>
                            <th>Order Total</th>
                            <th>Payment Method</th>
                            <th>Payment Status</th>
                            <th>Order Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Serial NO</th>
                            <th>Customer Name</th>
                            <th>Customer Phone Number</th>
                            <th>Order No</th>
                            <th>Order Total</th>
                            <th>Payment Method</th>
                            <th>Payment Status</th>
                            <th>Order Time</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @php($i = 1)
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->phone_number }}</td>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->total_price }}</td>
                            <td>{{ $order->payment_method }}</td>
                            <td>
                                <form name="paymentStatusUpdate" action="{{ route("admin.orders.update", ["id" => $order->id]) }}" method="post">
                                    @csrf
                                    @method("PUT")
                                    <div class="form-group">
                                        <select class="form-control" name="payment_status">
                                            <option selected>{{ $order->payment_status }}</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Success">Success</option>
                                        </select>
                                    </div>
                                    <input class="btn btn-primary btn-sm btn-block" type="submit" name="update" value="Update" >
                                </form>
                            </td>
                            <td>{{ $order->created_at }}</td>
                            <td>
                                <a href="{{ route("admin.orders.show", ["id" => $order->id ]) }}" class="btn btn-primary btn-sm" title="View details">
                                    <span class="fa fa-info-circle"></span>
                                </a>

                                <form  class="float-left" action="{{ route("admin.orders.destroy", ["id" => $order->id ]) }}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are your sure')"><span class="fa fa-trash"></span></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>

            </div>
        </div>

    </div>

@endsection

