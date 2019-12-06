<div class="container-fluid">
    <div class="row">
        <div class="offset-1"></div>
        <div class="col-md-3 sidebar">
            <div class="list-group mt-2 mb-2">
                <a class="list-group-item "><i class="fas fa-bars"></i> Catagory</a>
            </div>
            <div class="list-group product-catagory sidebar_home">
                @foreach($categories as $category)
                <a href="{{ route("category-products", ["slug" => $category->slug]) }}" class="list-group-item list-group-item-action">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
        <div  class="col-lg-7 col-md-12 slider-home-top">
           @yield('bodyRight')
        </div>
    </div>
</div>
