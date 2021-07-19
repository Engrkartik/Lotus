<!-- menu -->
<div class="menu">
    <div class="menu-header d-flex justify-content-center">
        <a href="index-2.html" class="menu-header-logo">
            <img src="{{ asset('public/img/b2clogo.png') }}" alt="logo">
        </a>
        <a href="index-2.html" class="btn btn-sm menu-close-btn">
            <i class="bi bi-x"></i>
        </a>
    </div>
    <div class="menu-body">
        <!-- <div class="dropdown">
            <a href="#" class="d-flex align-items-center" data-bs-toggle="dropdown">
                <div class="avatar me-3">
                    <img src="../../assets/images/user/man_avatar3.jpg" class="rounded-circle" alt="image">
                </div>
                <div>
                    <div class="fw-bold">Timotheus Bendan</div>
                    <small class="text-muted">Sales Manager</small>
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <a href="#" class="dropdown-item d-flex align-items-center">
                    <i class="bi bi-person dropdown-item-icon"></i> Profile
                </a>
                <a href="#" class="dropdown-item d-flex align-items-center">
                    <i class="bi bi-envelope dropdown-item-icon"></i> Inbox
                </a>
                <a href="#" class="dropdown-item d-flex align-items-center" data-sidebar-target="#settings">
                    <i class="bi bi-gear dropdown-item-icon"></i> Settings
                </a>
                <a href="login.html" class="dropdown-item d-flex align-items-center text-danger" target="_blank">
                    <i class="bi bi-box-arrow-right dropdown-item-icon"></i> Logout
                </a>
            </div>
        </div> -->
        <ul class="text-center">
            <li class="menu-divider">Quickcell B2C Admin</li>
            <li>
                <a href="{{url('dashboard')}}">
                    <span class="nav-link-icon">
                        <i class="bi bi-bar-chart"></i>
                    </span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{url('categories')}}">
                    <span class="nav-link-icon">
                        <i class="bi bi-list"></i>
                    </span>
                    <span>Category</span>
                </a>
            </li>
            <li>
                <a href="{{url('sub-categories')}}">
                    <span class="nav-link-icon">
                        <i class="bi bi-layer-backward"></i>
                    </span>
                    <span>Sub-Category</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="nav-link-icon">
                        <i class="bi bi-box-seam"></i>
                    </span>
                    <span>Products</span>
                </a>
                <ul>
                    <li>
                        <a href="{{url('product_list')}}">Products List</a>
                    </li>
                    <li>
                        <a href="{{url('add')}}">Add Product</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <span class="nav-link-icon">
                        <i class="bi bi-basket"></i>
                    </span>
                    <span>Orders</span>
                </a>
                <ul>
                    <li>
                        <a href="{{url('order')}}">Orders List</a>
                    </li>
                    <li>
                        <a href="order-detail.html">Detail</a>
                    </li>
                </ul>
            </li>
            <!-- <li>
                <a href="#">
                    <span class="nav-link-icon">
                        <i class="bi bi-receipt"></i>
                    </span>
                    <span>Orders</span>
                </a>
                <ul>
                    <li>
                        <a href="orders.html">List</a>
                    </li>
                    <li>
                        <a href="order-detail.html">Detail</a>
                    </li>
                </ul>
            </li> -->
            <!-- <li>
                <a href="#">
                    <span class="nav-link-icon">
                        <i class="bi bi-truck"></i>
                    </span>
                    <span>Products</span>
                </a>
                <ul>
                    <li>
                        <a href="product-list.html">List
                            View</a>
                    </li>
                    <li>
                        <a class="active" href="product-grid.html">Grid
                            View</a>
                    </li>
                    <li>
                        <a href="product-detail.html">Product Detail</a>
                    </li>
                    <li>
                        <a href="shopping-cart.html">Shopping
                            Cart</a>
                    </li>
                    <li>
                        <a href="checkout.html">Checkout</a>
                    </li>
                </ul>
            </li> -->

        </ul>
    </div>
</div>
<!-- ./  menu -->


<!-- layout-wrapper -->
<div class="layout-wrapper">

    <!-- header -->
    <div class="header">
        <div class="menu-toggle-btn">
            <!-- Menu close button for mobile devices -->
            <a href="#">
                <i class="bi bi-list"></i>
            </a>
        </div>
        <!-- Logo -->
        <a href="index-2.html" class="logo">
            <img width="100" src="{{ asset('public/img/b2clogo.png') }}" alt="logo">
        </a>
        <!-- ./ Logo -->
        <!-- <div class="page-title">Products</div> -->
        <form class="search-form">
            <div class="input-group">
                <button class="btn btn-outline-light" type="button" id="button-addon1">
                    <i class="bi bi-search"></i>
                </button>
                <input type="text" class="form-control" placeholder="Search..."
                    aria-label="Example text with button addon" aria-describedby="button-addon1">
                <a href="#" class="btn btn-outline-light close-header-search-bar">
                    <i class="bi bi-x"></i>
                </a>
            </div>
        </form>
        <div class="header-bar ms-auto">
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item">
                    <a href="#" class="nav-link nav-link-notify" data-count="2" data-sidebar-target="#notifications">
                        <i class="bi bi-bell icon-lg"></i>
                    </a>
                </li>
                <!-- <li class="nav-item dropdown">
                    <a href="#" class="nav-link nav-link-notify" data-count="3" data-bs-toggle="dropdown">
                        <i class="bi bi-cart2 icon-lg"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0">
                        <h6 class="m-0 px-4 py-3 border-bottom">Shopping Cart</h6>
                        <div class="dropdown-menu-body">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item d-flex align-items-center">
                                    <a href="#" class="text-danger me-3" title="Remove">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <a href="#" class="me-3 flex-shrink-0 ">
                                        <img src="../../assets/images/products/3.jpg" class="rounded" width="60"
                                            alt="...">
                                    </a>
                                    <div>
                                        <h6>Digital clock</h6>
                                        <div>1 x $1.190,90</div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group list-group-flush">
                                <div class="list-group-item d-flex align-items-center">
                                    <a href="#" class="text-danger me-3" title="Remove">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <a href="#" class="me-3 flex-shrink-0 ">
                                        <img src="../../assets/images/products/4.jpg" class="rounded" width="60"
                                            alt="...">
                                    </a>
                                    <div>
                                        <h6>Toy Car</h6>
                                        <div>1 x $139.58</div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group list-group-flush">
                                <div class="list-group-item d-flex align-items-center">
                                    <a href="#" class="text-danger me-3" title="Remove">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <a href="#" class="me-3 flex-shrink-0 ">
                                        <img src="../../assets/images/products/5.jpg" class="rounded" width="60"
                                            alt="...">
                                    </a>
                                    <div>
                                        <h6>Sunglasses</h6>
                                        <div>2 x $50,90</div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group list-group-flush">
                                <div class="list-group-item d-flex align-items-center">
                                    <a href="#" class="text-danger me-3" title="Remove">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <a href="#" class="me-3 flex-shrink-0 ">
                                        <img src="../../assets/images/products/6.jpg" class="rounded" width="60"
                                            alt="...">
                                    </a>
                                    <div>
                                        <h6>Cake</h6>
                                        <div>1 x $10,50</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h6 class="m-0 px-4 py-3 border-top small">Sub Total : <strong
                                class="text-primary">$1.442,78</strong></h6>
                    </div>
                </li> -->
                <!-- <li class="nav-item ms-3">
                    <button class="btn btn-primary btn-icon">
                        <i class="bi bi-plus-circle"></i> Add Product
                    </button>
                </li> -->
            </ul>
        </div>
        <!-- Header mobile buttons -->
        <div class="header-mobile-buttons">
            <a href="#" class="search-bar-btn">
                <i class="bi bi-search"></i>
            </a>
            <a href="#" class="actions-btn">
                <i class="bi bi-three-dots"></i>
            </a>
        </div>
        <!-- ./ Header mobile buttons -->
    </div>
    <!-- ./ header -->