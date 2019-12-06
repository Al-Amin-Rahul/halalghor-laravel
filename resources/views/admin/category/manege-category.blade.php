@extends("admin.master")

@section("body")

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Manage Category</li>
        </ol>

        <!-- Icon Cards-->

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-chart-area"></i>
                Manage Category</div>
            <div class="card-body">

                <div class="table-responsive">

                    @include("message.message")

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Serial NO</th>
                            <th>Name</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Serial NO</th>
                            <th>name</th>
                            <th>publication_status</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @php($i = 1)
                        @foreach($categories as $category)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->publication_status == 1 ? "Active" : "Inactive" }}</td>
                            <td>

                                <a href="{{ route("admin.category.edit", ["id" => $category->id ]) }}" class="btn btn-info btn-sm">
                                    <span class="fa fa-edit"></span>
                                </a>

                                <form  class="float-left" action="{{ route("admin.category.destroy", ["id" => $category->id ]) }}" method="post">
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
