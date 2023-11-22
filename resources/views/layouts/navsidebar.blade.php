<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('view.dashboard') }}">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-faucet-drip"></i>
    </div>
    <div class="sidebar-brand-text mx-2 ml-3">Aguaboo</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="{{ route('view.dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Feature
</div>

<!-- Nav Item - Accounts -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-user"></i>
        <span>Accounts</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Accounts:</h6>
            <a class="collapse-item" href="{{ route('view.customers') }}">Customers</a>
            <a class="collapse-item" href="{{ route('view.staff') }}">Staff</a>
        </div>
    </div>
</li>

<!-- Nav Item - Orders -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('view.orders') }}">
        <i class="fas fa-fw fa-receipt"></i>
        <span>Orders</span></a>
</li>

<!-- Nav Item - Deliveries -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('view.deliveries') }}">
        <i class="fas fa-fw fa-truck"></i>
        <span>Deliveries</span></a>
</li>

<!-- Nav Item - Galloons -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('view.galloons') }}">
        <i class="fas fa-fw fa-droplet"></i>
        <span>Galloons</span></a>
</li>

<!-- Nav Item - Products -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('view.products') }}">
        <i class="fas fa-fw fa-bottle-water"></i>
        <span>Products</span></a>
</li>

<!-- Nav Item - Trucks -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('view.trucks') }}">
        <i class="fas fa-fw fa-truck"></i>
        <span>Trucks</span></a>
</li>

<!-- Nav Item - Sales Report -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('view.salesreport') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Sales Report</span></a>
</li>

 <!-- Nav Item - Settings -->
 <li class="nav-item">
    <a class="nav-link" href="{{ route('view.settings') }}">
        <i class="fas fa-fw fa-cogs"></i>
        <span>Settings</span></a>
</li>           

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>



</ul>