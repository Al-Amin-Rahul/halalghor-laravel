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
                            <th>Customer Email</th>
                            <th>Product's Name</th>
                            <th>Comment</th>
                            <th>Date/Time</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Serial NO</th>
                            <th>Customer Name</th>
                            <th>Customer Email</th>
                            <th>Product's Name</th>
                            <th>Comment</th>
                            <th>Date/Time</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @php($i = 1)
                        @foreach($comments as $comment)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $comment->name }}</td>
                            <td>{{ $comment->email }}</td>
                            <td>{{ $comment->product->name }}</td>
                            <td>{{ $comment->comment }}</td>
                            <td>{{ $comment->created_at }}</td>
                            <td>
                                <form name="paymentStatusUpdate" action="{{ route("admin.comments.update", ["id" => $comment->id]) }}" method="post">
                                    @csrf
                                    @method("PUT")
                                    <div class="form-group">
                                        <select class="form-control" name="active">
                                            <option selected>{{ ($comment->active == 0) ? "Inactive" : "Active"}}</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                    <input class="btn btn-primary btn-sm btn-block" type="submit" name="update" value="Update" >
                                </form>
                            </td>
                            <td>
                                <form  class="float-left" action="{{ route("admin.comments.destroy", ["id" => $comment->id ]) }}" method="post">
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

