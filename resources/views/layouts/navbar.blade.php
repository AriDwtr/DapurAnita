<ul class="list-unstyled topbar-nav float-end mb-0">
    {{-- <li class="dropdown hide-phone">
        <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#" role="button"
            aria-haspopup="false" aria-expanded="false">
            <i class="ti ti-search"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-lg p-0">
            <!-- Top Search Bar -->
            <div class="app-search-topbar">
                <form action="#" method="get">
                    <input type="search" name="search" class="from-control top-search mb-0"
                        placeholder="Type text...">
                    <button type="submit"><i class="ti ti-search"></i></button>
                </form>
            </div>
        </div>
    </li> --}}

    {{-- <li class="notification-list">
        <a class="nav-link arrow-none nav-icon offcanvas-btn" href="#" data-bs-toggle="offcanvas"
            data-bs-target="#Appearance" role="button" aria-controls="Rightbar">
            <i class="ti ti-settings ti-spin"></i>
        </a>
    </li> --}}

    {{-- <li class="dropdown notification-list">
        <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#" role="button"
            aria-haspopup="false" aria-expanded="false">
            <i class="ti ti-mail"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-lg pt-0">

            <h6
                class="dropdown-item-text font-15 m-0 py-3 border-bottom d-flex justify-content-between align-items-center">
                Emails <span class="badge bg-soft-primary badge-pill">3</span>
            </h6>
            <div class="notification-menu" data-simplebar>
                <!-- item-->
                <a href="#" class="dropdown-item py-3">
                    <small class="float-end text-muted ps-2">2 min ago</small>
                    <div class="media">
                        <div class="avatar-md bg-soft-primary">
                            <img src="assets/images/users/user-1.jpg" alt="" class="thumb-sm rounded-circle">
                        </div>
                        <div class="media-body align-self-center ms-2 text-truncate">
                            <h6 class="my-0 fw-normal text-dark">Your order is placed</h6>
                            <small class="text-muted mb-0">Dummy text of the printing and industry.</small>
                        </div>
                        <!--end media-body-->
                    </div>
                    <!--end media-->
                </a>
                <!--end-item-->
                <!-- item-->
                <a href="#" class="dropdown-item py-3">
                    <small class="float-end text-muted ps-2">10 min ago</small>
                    <div class="media">
                        <div class="avatar-md bg-soft-primary">
                            <img src="assets/images/users/user-4.jpg" alt="" class="thumb-sm rounded-circle">
                        </div>
                        <div class="media-body align-self-center ms-2 text-truncate">
                            <h6 class="my-0 fw-normal text-dark">Meeting with designers</h6>
                            <small class="text-muted mb-0">It is a long established fact that a
                                reader.</small>
                        </div>
                        <!--end media-body-->
                    </div>
                    <!--end media-->
                </a>
                <!--end-item-->
                <!-- item-->
                <a href="#" class="dropdown-item py-3">
                    <small class="float-end text-muted ps-2">40 min ago</small>
                    <div class="media">
                        <div class="avatar-md bg-soft-primary">
                            <img src="assets/images/users/user-2.jpg" alt="" class="thumb-sm rounded-circle">
                        </div>
                        <div class="media-body align-self-center ms-2 text-truncate">
                            <h6 class="my-0 fw-normal text-dark">UX 3 Task complete.</h6>
                            <small class="text-muted mb-0">Dummy text of the printing.</small>
                        </div>
                        <!--end media-body-->
                    </div>
                    <!--end media-->
                </a>
                <!--end-item-->
                <!-- item-->
                <a href="#" class="dropdown-item py-3">
                    <small class="float-end text-muted ps-2">1 hr ago</small>
                    <div class="media">
                        <div class="avatar-md bg-soft-primary">
                            <img src="assets/images/users/user-5.jpg" alt="" class="thumb-sm rounded-circle">
                        </div>
                        <div class="media-body align-self-center ms-2 text-truncate">
                            <h6 class="my-0 fw-normal text-dark">Your order is placed</h6>
                            <small class="text-muted mb-0">It is a long established fact that a
                                reader.</small>
                        </div>
                        <!--end media-body-->
                    </div>
                    <!--end media-->
                </a>
                <!--end-item-->
                <!-- item-->
                <a href="#" class="dropdown-item py-3">
                    <small class="float-end text-muted ps-2">2 hrs ago</small>
                    <div class="media">
                        <div class="avatar-md bg-soft-primary">
                            <img src="assets/images/users/user-3.jpg" alt="" class="thumb-sm rounded-circle">
                        </div>
                        <div class="media-body align-self-center ms-2 text-truncate">
                            <h6 class="my-0 fw-normal text-dark">Payment Successfull</h6>
                            <small class="text-muted mb-0">Dummy text of the printing.</small>
                        </div>
                        <!--end media-body-->
                    </div>
                    <!--end media-->
                </a>
                <!--end-item-->
            </div>
            <!-- All-->
            <a href="javascript:void(0);" class="dropdown-item text-center text-primary">
                View all <i class="fi-arrow-right"></i>
            </a>
        </div>
    </li> --}}

    <li class="dropdown">
        <a class="nav-link font-14" href="{{ route('login') }}">
            <span><i class="ti ti-user menu-icon"></i>Masuk</span>
        </a>
    </li>
    <!--end topbar-profile-->
    <li class="menu-item">
        <!-- Mobile menu toggle-->
        <a class="navbar-toggle nav-link" id="mobileToggle" onclick="toggleMenu()" onclick="toggleMenu()">
            <div class="lines">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </a><!-- End mobile menu toggle-->
    </li>
    <!--end menu item-->
</ul>
<!--end topbar-nav-->

<div class="navbar-custom-menu">
    <div id="navigation">
        <!-- Navigation Menu-->
        <ul class="navigation-menu">
            <li class="nav-item dropdown parent-menu-item">
                <a class="nav-link" href="/">
                    <span><i class="ti ti-smart-home menu-icon"></i>Dashboard</span>
                </a>

            </li>

            <li class="nav-item dropdown parent-menu-item">
                <a class="nav-link" href="{{ route('home.produk') }}">
                    <span><i class="ti ti-building-store menu-icon"></i>Produk</span>
                </a>

            </li>
        </ul><!-- End navigation menu -->
    </div> <!-- end navigation -->
</div>
<!-- Navbar -->
