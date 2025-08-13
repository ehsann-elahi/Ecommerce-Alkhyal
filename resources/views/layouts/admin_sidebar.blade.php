@auth('admin')
<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item"><a class="nav-item-hold" href="{{ route('dashboard')}}"><i class="nav-icon i-Bar-Chart"></i><span class="nav-text">Dashboard</span></a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item"><a class="nav-item-hold" href="{{ route('category.index')}}"><i class="nav-icon i-Windows-2"></i><span class="nav-text">Categories</span></a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item" data-item="products"><a class="nav-item-hold"><i class="nav-icon i-Windows-2"></i><span class="nav-text">Products</span></a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item"><a class="nav-item-hold" href="{{ route('order.index')}}"><i class="nav-icon i-Windows-2"></i><span class="nav-text">Orders</span></a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item"><a class="nav-item-hold" href="{{ route('subscribers.index')}}"><i class="nav-icon i-Windows-2"></i><span class="nav-text">Subscribers</span></a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item"><a class="nav-item-hold" href="{{ route('promotion.index')}}"><i class="nav-icon i-Windows-2"></i><span class="nav-text">Promotion Banner</span></a>
                <div class="triangle"></div>
            </li>
        </ul>
    </div>

    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <ul class="childNav" data-parent="products">
            <li class="nav-item"><a class="nav-item-hold" href="{{ route('product.index') }}"><i class="nav-icon i-Library"></i><span class="nav-text">View Products</span></a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item"><a class="nav-item-hold" href="{{ route('product.create') }}"><i class="nav-icon i-Add "></i><span class="nav-text">Add New</span></a>
                <div class="triangle"></div>
            </li>
        </ul>
    </div>
    <div class="sidebar-overlay"></div>
</div>
@endauth