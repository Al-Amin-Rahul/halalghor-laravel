<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Category</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ route("admin.category.create") }}">Add Category</a>
            <a class="dropdown-item" href="{{ route("admin.category.index") }}">Manage Category</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Product</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="{{ route("admin.product.create") }}">Add Product</a>
            <a class="dropdown-item" href="{{ route("admin.product.index") }}">Manage Product</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route("admin.orders.index") }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Manage Order</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route("admin.comments.index") }}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Manage Comment</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>
</ul>