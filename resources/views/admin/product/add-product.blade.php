@extends("admin.master")

@section("extra-css")
    <link rel="stylesheet" href="{{ asset("/") }}admin/ckeditor/samples/css/samples.css">
    <link rel="stylesheet" href="{{ asset("/") }}admin/ckeditor/samples/toolbarconfigurator/lib/codemirror/neo.css">
@endsection

@section("body")

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Add Product</li>
        </ol>

        <!-- Icon Cards-->

        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-chart-area"></i>
                Add Product</div>
            <div class="card-body">

                <form class="offset-1 col-sm-10" action="{{ route("admin.product.store") }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @include("message.message")

                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="name">Name:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" value="{{ old("name") }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="category">Category:</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="sel1" name="category_id">
                                <option><-----------------------------------------Select Category-----------------------------------------></option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="code">Code:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="code" value="{{ old("code") }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="price">Price:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="price" value="{{ old("price") }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="description">Sort Description:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="description" rows="4">{{ old("description") }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="product_feature">Long Description</label>
                        <div class="col-sm-10">
                            <textarea id="editor" class="form-control" name="product_feature" rows="4">{{ old("product_feature") }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="popular">Popular</label>
                        <div class="col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" name="popular" value="1">Yes
                            </label>

                            <label class="radio-inline pl-3">
                                <input type="radio" name="popular" value="0" checked>No
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="offer">Offer</label>
                        <div class="col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" name="offer" value="1" >Yes
                            </label>

                            <label class="radio-inline pl-3">
                                <input type="radio" name="offer" value="0" checked>No
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="offer_ratio">Offer Ratio:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="offer_ratio" value="0">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="publication_status">Publication Status</label>
                        <div class="col-sm-10">
                            <label class="radio-inline">
                                <input type="radio" name="publication_status" value="1" checked>Yes
                            </label>

                            <label class="radio-inline pl-3">
                                <input type="radio" name="publication_status" value="0">No
                            </label>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="control-label col-sm-2" for="banner">Image:</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control-file border" name="banner" accept="image/*">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-info btn-block">Save</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>

@endsection

@section("extra-js")
    <script src="{{ asset("/") }}admin/ckeditor/ckeditor.js"></script>
    <script src="{{ asset("/") }}admin/ckeditor/samples/js/sample.js"></script>

    <script>
        initSample();
    </script>

@endsection
