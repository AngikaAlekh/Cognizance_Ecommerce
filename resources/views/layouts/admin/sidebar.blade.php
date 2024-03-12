<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item {{ Request::is('admin/trash') ? 'active' : '' }}">
        <a class="nav-link" href="{{ url('/admin/trash') }}">
            <i class="fas fa-trash"></i>
            <span>Trash</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Home
    </div>

    <li class="nav-item {{ Request::is('admin/featured/products') || Request::is('admin/featured/categories') ? 'active' : '' }}">
        <a class="nav-link {{ Request::is('admin/featured/products') || Request::is('admin/featured/categories') ? '' : 'collapsed' }}" href="#" data-toggle="collapse" data-target="#collapseFeatured"
            aria-expanded="{{ Request::is('admin/featured/products') || Request::is('admin/featured/categories') ? true : false }}" aria-controls="collapseFeatured">
            <i class="fas fa-fw fa-cog"></i>
            <span>Featured</span>
        </a>
        <div id="collapseFeatured" class="collapse {{ Request::is('admin/featured/products') || Request::is('admin/featured/categories') ? 'show' : '' }}" aria-labelledby="headingFeatured" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::is('admin/featured/products') ? 'active' : '' }}" href="{{ url('/admin/featured/products') }}">Products</a>
                <a class="collapse-item {{ Request::is('admin/featured/categories') ? 'active' : '' }}" href="{{ url('/admin/featured/categories') }}">Categories</a>
            </div>
        </div>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory"
            aria-expanded="true" aria-controls="collapseCategory">
            <i class="fas fa-fw fa-cog"></i>
            <span>Categories</span>
        </a>
        <div id="collapseCategory" class="collapse" aria-labelledby="headingCategory" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/admin/category/create') }}">Add Category</a>
                <a class="collapse-item" href="{{ url('/admin/categories') }}">View Categories</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCourse"
            aria-expanded="true" aria-controls="collapseCourse">
            <i class="fas fa-fw fa-cog"></i>
            <span>Products</span>
        </a>
        <div id="collapseCourse" class="collapse" aria-labelledby="headingCourse" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ url('/admin/product/create') }}">Add Product</a>
                <a class="collapse-item" href="{{ url('/admin/products') }}">View Products</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
