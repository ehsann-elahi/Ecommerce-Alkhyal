    <div class="loader"></div>
    <div id="alert" class="toast-container position-fixed top-0 end-0 start-0"></div>
    <nav id="top">
        <div class="container">
            <div class="row">
                <div class="top-left hidden-sm col-6">
                    <!-- start contact -->
                    <div class="customer-support">
                        <div class="customer-text">
                            Customer Support: <a href="tel:+971547165924" style="color: white;">+971547165924</a>
                        </div>
                    </div>
                </div>
                <div class="top-right col-6">
                    <!-- start account -->
                    <div id="header_ac" class="dropdown">
                        <a href="#" title="Login" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <span>Login</span><i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a href="{{route('register_user')}}" class="dropdown-item">Register</a></li>
                            <li><a href="{{route('login')}}" class="dropdown-item">Login</a></li>
                            <li><a href="{{ route('wishlist.page') }}" id="wishlist-total" class="dropdown-item" title="Wish List">Wish List (0)</a></li>
                            <li><a href="{{ route('compare.page') }}" id="compare-total" class="dropdown-item" title="Compare">Compare Product (0)</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <header>
        <div class="header-top">
            <div class="container">
                <div class="header-main">
                    <div class="header-inner">
                        <div id="navMenu">
                            <!-- start menu -->
                            <nav class="navbar navbar-expand-lg navbar_menu">
                                <ul class="d-flex p-2 m-0" id="headerMenu">
                                    <li><a href="{{route('index')}}">Home</a></li>
                                    <li><a href="{{route('allproduct')}}">Our Products</a></li>
                                    <li><a href="{{route('getEstimate')}}">Get Estimate</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- start logo -->
                        <div id="logo">
                            <a href="{{route('index')}}"><img loading="lazy" src="{{asset('assets/front/image/catalog/logo.png')}}" title="Your Store" alt="Your Store" class="img-fluid" /></a>
                        </div>
                        <div class="header-right header-links" id="navMenu">
                            <!-- start search -->
                            <div class="btn_search">
                                <ul class="d-flex p-2 m-0 align-items-center" id="headerMenu">
                                    <li><a href="{{route('help')}}">Help</li>
                                    <li><a href="{{route('about')}}">About Us</a></li>
                                    <li>
                                        <!-- start cart -->
                                        <div class="header_cart" id="header-cart">
                                            <div id="cart" class="btn-group btn-block">
                                                <button type="button" data-bs-toggle="dropdown" data-loading-text="Loading..." class="btn btn-inverse btn-block btn-lg dropdown-toggle">
                                                    <span id="cart-totalx"></span>
                                                </button>
                                                <span class="cart-count">{{ session('cart') ? count(session('cart')) : 0 }}</span>
                                                <ul class="dropdown-menu dropdown-menu-end p-2 shadow-lg rounded">
                                                    @if(session('cart') && count(session('cart')) > 0)
                                                    <li>
                                                        <h6 class="dropdown-header text-center fw-bold text-primary">Your Cart</h6>
                                                    </li>
                                                    <li class="cart-items-list p-0">
                                                        @foreach(session('cart') as $key => $item)
                                                        <div class="cart-item d-flex align-items-center border-bottom pb-2 pt-2">
                                                            <img loading="lazy" src="{{ asset('assets/upload/prod/' . $item['image']) }}" alt="{{ $item['name'] }}" class="rounded" width="60" height="60">
                                                            <div class="ms-3">
                                                                <h6 class="m-0">{{ $item['name'] }}</h6>
                                                                <p class="text-muted small mb-1">{{ $item['quantity'] }} × <strong class="text-dark">{{ $item['price'] }} AED</strong></p>
                                                            </div>
                                                            <button class="btn btn-danger btn-sm ms-auto remove-from-cart" data-id="{{ $key }}">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </div>
                                                        @endforeach
                                                    </li>
                                                    <li class="p-2 mx-0">
                                                        <div class="d-flex gap-2">
                                                            <a href="{{ route('cart.view') }}" class="btn btn-primary btn-sm flex-grow-1">View Cart</a>
                                                            <a href="{{ route('cart.clear') }}" class="btn btn-danger btn-sm flex-grow-1 clear-cart">Clear Cart</a>
                                                        </div>
                                                    </li>
                                                    @else
                                                    <li>
                                                        <p class="text-center product-cart-empty text-muted">Your shopping cart is empty!</p>
                                                    </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="d-md-none header-right header-links">
                            <nav id="menu" class="navbar navbar-expand-lg navbar_menu">
                                <div class="navbar-header">
                                    <button type="button" class="btn btn-navbar navbar-toggler" id="btnMenuBar"><i class="fa fa-bars" aria-hidden="true"></i><span class="menu-title"></span></button>
                                </div>
                                <div id="topCategoryList" class="main-menu menu-navbar navbar py-0 clearfix" data-more="More" style="display: none;">
                                    <div class="menu-close"><span id="category" class="">Menu</span><i class="icon-close"></i></div>
                                    <ul class="nav">
                                        <li class="menulist home"><a id="home" href="{{route('index')}}">Home</a></li>
                                        <li class="menulist home"><a id="home" href="{{route('allproduct')}}">Our Products</a></li>
                                        <li class="menulist home"><a id="home" href="{{route('getEstimate')}}">Get Estimate</a></li>
                                        <li class="menulist home"><a id="home" href="{{route('about')}}">About Us</a></li>
                                    </ul>
                                </div>
                            </nav>
                            <div class="btn_search">
                            </div>
                            <div class="header_cart" id="header-cart">
                                <div id="cart" class="btn-group btn-block">
                                    <button type="button" data-bs-toggle="dropdown" data-loading-text="Loading..." class="btn btn-inverse btn-block btn-lg dropdown-toggle">
                                        <span id="cart-totalx"></span>
                                    </button>
                                    <span class="cart-count">{{ session('cart') ? count(session('cart')) : 0 }}</span>
                                    <ul class="dropdown-menu dropdown-menu-end p-2 shadow-lg rounded">
                                        @if(session('cart') && count(session('cart')) > 0)
                                        <li>
                                            <h6 class="dropdown-header text-center fw-bold text-primary">Your Cart</h6>
                                        </li>
                                        <li class="cart-items-list p-0">
                                            @foreach(session('cart') as $key => $item)
                                            <div class="cart-item d-flex align-items-center border-bottom pb-2 pt-2">
                                                <img loading="lazy" src="{{ asset('assets/upload/prod/' . $item['image']) }}" alt="{{ $item['name'] }}" class="rounded" width="60" height="60">
                                                <div class="ms-3">
                                                    <h6 class="m-0">{{ $item['name'] }}</h6>
                                                    <p class="text-muted small mb-1">{{ $item['quantity'] }} × <strong class="text-dark">{{ $item['price'] }} AED</strong></p>
                                                </div>
                                                <button class="btn btn-danger btn-sm ms-auto remove-from-cart" data-id="{{ $key }}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                            @endforeach
                                        </li>
                                        <li class="p-2 mx-0">
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('cart.view') }}" class="btn btn-primary btn-sm flex-grow-1">View Cart</a>
                                                <a href="{{ route('cart.clear') }}" class="btn btn-danger btn-sm flex-grow-1 clear-cart">Clear Cart</a>
                                            </div>
                                        </li>
                                        @else
                                        <li>
                                            <p class="text-center product-cart-empty text-muted">Your shopping cart is empty!</p>
                                        </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header>