@extends("admin.master")

@section("body")

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Manage Product</li>
        </ol>

        <!-- Icon Cards-->

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-chart-area"></i>
                Manage Product</div>
            <div class="card-body">

                <div class="table-responsive">

                    @include("message.message")

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Serial NO</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Code</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Short Description</th>
                            <th>Long Description</th>
                            <th>Popular</th>
                            <th>Offer</th>
                            <th>Offer Ratio</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Serial NO</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Code</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Popular</th>
                            <th>Offer</th>
                            <th>Offer Ratio</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @php($i = 1)
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->code }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                <img src="{{ asset($product->banner) }}" alt="Photo" width="80">
                            </td>
                            <td>{{ $product->description }}</td>
                            <td>{!! $product->product_feature !!}</td>
                            <td>{{ ($product->popular == 0) ? "No" : "Yes" }}</td>
                            <td>{{ ($product->offer == 0) ? "No" : "Yes" }}</td>
                            <td>{{ $product->offer_ratio }}%</td>
                            <td>{{ ($product->publication_status == 0) ? "Inactive" : "Active" }}</td>
                            <td>

                                <a href="{{ route("admin.product.edit", ["id" => $product->id ]) }}" class="btn btn-info btn-sm">
                                    <span class="fa fa-edit"></span>
                                </a>

                                <form  class="float-left" action="{{ route("admin.product.destroy", ["id" => $product->id ]) }}" method="post">
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
