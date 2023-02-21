<ul class="list-unstyled topbar-nav float-end mb-0">
    <li class="dropdown hide-phone">
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
    </li>

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

    <li class="dropdown notification-list">
        <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#"
            role="button" aria-haspopup="false" aria-expanded="false">
            <i class="ti ti-shopping-cart"></i>
            @php
                $notif_keranjang = DB::table('keranjang')
                    ->join('produk', 'produk.id_produk', '=', 'keranjang.id_produk')
                    ->select('keranjang.*', 'produk.nama_produk', 'produk.foto_produk')
                    ->where('keranjang.id_user', Auth::user()->id)
                    ->get();
            @endphp
            @if ($notif_keranjang->count() > 0)
                <span class="alert-badge"></span>
            @endif
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-lg pt-0">
            <h6
                class="dropdown-item-text font-15 m-0 py-3 border-bottom d-flex justify-content-between align-items-center">
                Keranjang Saya
                @if ($notif_keranjang->count() > 0)
                    <span class="badge bg-soft-primary badge-pill">{{ $notif_keranjang->count() }}</span>
                @endif

            </h6>
            <div class="notification-menu" data-simplebar>
                <!-- item-->
                @forelse ($notif_keranjang as $notif_keranjang)
                    <a href="{{ route('customer.keranjang') }}" class="dropdown-item py-3">
                        <div class="media">
                            <div class="avatar-md bg-soft-primary">
                                <img src="/produk/{{ $notif_keranjang->foto_produk }}" alt=""
                                    class="thumb-sm rounded-circle">
                            </div>
                            <div class="media-body align-self-center ms-2 text-truncate">
                                <h6 class="my-0 fw-normal text-dark">{{ Str::title($notif_keranjang->nama_produk) }}
                                </h6>
                                <small class="text-muted mb-0">Jumlah Pesanan :
                                    {{ $notif_keranjang->quantity }}</small>
                            </div>
                            <!--end media-body-->
                        </div>
                        <!--end media-->
                    </a>
                @empty
                @endforelse
                <!--end-item-->
            </div>
            <!-- All-->
            <a href="{{ route('customer.keranjang') }}" class="dropdown-item text-center text-primary">
                Lihat Keranjang <i class="fi-arrow-right"></i>
            </a>
        </div>
    </li>

    <li class="dropdown">
        <a class="nav-link dropdown-toggle nav-user" data-bs-toggle="dropdown" href="#" role="button"
            aria-haspopup="false" aria-expanded="false">
            <div class="d-flex align-items-center">
                @if (!empty(Auth::user()->foto_profile))
                    <img src="/foto_profile/{{ Auth::user()->foto_profile }}" alt="profile-user"
                        class="rounded-circle me-0 me-md-2 thumb-sm" />
                @else
                    <img src="/dapuranita/default.jpg" alt="profile-user"
                        class="rounded-circle me-0 me-md-2 thumb-sm" />
                @endif
                <div class="user-name">
                    <small class="d-none d-lg-block font-11">{{ Str::upper(Auth::user()->type) }}</small>
                    <span class="d-none d-lg-block fw-semibold font-12">
                        @php
                            $nama = explode(' ', Auth::user()->name);
                            echo Str::title($nama[0]);
                        @endphp
                        <i class="mdi mdi-chevron-down"></i></span>
                </div>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="{{ route('customer.profile') }}"><i
                    class="ti ti-user font-16 me-1 align-text-bottom"></i> Profile</a>
            <a class="dropdown-item" href="{{ route('alamat.index') }}"><i
                    class="fas fa-address-book font-16 me-1 align-text-bottom"></i> Alamat Antar</a>
            {{-- <a class="dropdown-item" href="#"><i class="ti ti-settings font-16 me-1 align-text-bottom"></i>
                Settings</a> --}}
            <div class="dropdown-divider mb-0"></div>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
    document.getElementById('logout-form').submit();"><i
                    class="ti ti-power font-16 me-1 align-text-bottom"></i> Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
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
                <a class="nav-link" href="{{ route('customer.dashboard') }}">
                    <span><i class="ti ti-smart-home menu-icon"></i>Dashboard</span>
                </a>

            </li>

            <li class="nav-item dropdown parent-menu-item">
                <a class="nav-link" href="{{ route('customer.produk') }}">
                    <span><i class="ti ti-building-store menu-icon"></i>Produk</span>
                </a>

            </li>
            @php
                $notif_pesanan = DB::table('pesanan')
                    ->join('produk', 'produk.id_produk', '=', 'pesanan.id_produk')
                    ->select('pesanan.*', 'produk.nama_produk', 'produk.foto_produk')
                    ->where('pesanan.id_user', Auth::user()->id)
                    ->where(function ($query) {
                        $query
                            ->where('pesanan.status', 0)
                            ->orWhere('pesanan.status', 1)
                            ->orWhere('pesanan.status', 2)
                            ->orWhere('pesanan.status', 3);
                    })
                    ->get();

                $notif_onpaid = DB::table('pesanan')
                    ->join('produk', 'produk.id_produk', '=', 'pesanan.id_produk')
                    ->select('pesanan.*', 'produk.nama_produk', 'produk.foto_produk')
                    ->where('pesanan.id_user', Auth::user()->id)
                    ->where(function ($query) {
                        $query
                            ->where('pesanan.status', 0)
                            ->orWhere('pesanan.status', 1)
                            ->orWhere('pesanan.status', 2);
                    })
                    ->get();

                $notif_onroad = DB::table('pesanan')
                    ->join('produk', 'produk.id_produk', '=', 'pesanan.id_produk')
                    ->select('pesanan.*', 'produk.nama_produk', 'produk.foto_produk')
                    ->where('pesanan.id_user', Auth::user()->id)
                    ->where(function ($query) {
                        $query->where('pesanan.status', 3);
                    })
                    ->get();

            @endphp
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarApps" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span><i class="ti ti-truck menu-icon"></i>My Order </span>
                    @if ($notif_pesanan->count() > 0)
                        <span class="badge bg-danger">{{ $notif_pesanan->count() }}</span>
                    @endif
                </a>
                <ul class="dropdown-menu animate slideIn" aria-labelledby="navbarApps">
                    <li>
                        <a href="{{ route('customer.pesanan') }}" class="dropdown-item">
                            Lihat Pesanan
                            @if ($notif_onpaid->count() > 0)
                                <span class="badge bg-danger">{{ $notif_onpaid->count() }}</span>
                            @endif
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('customer.pesanan_deliver') }}" class="dropdown-item">
                            Pengiriman
                            @if ($notif_onroad->count() > 0)
                                <span class="badge bg-danger">{{ $notif_onroad->count() }}</span>
                            @endif
                        </a>
                    </li>
                </ul>
                <!--end submenu-->
            </li>
            <li class="nav-item dropdown parent-menu-item">
                <a class="nav-link" href="{{ route('customer.pesanan_history') }}">
                    <span><i class="ti ti-history menu-icon"></i>Riwayat Pesanan</span>
                </a>

            </li>
            @php
                $notif_chat = DB::Table('chat')
                    ->where('to_id', Auth::user()->id)
                    ->where('status', 'off read')
                    ->get();
            @endphp
            <li class="nav-item dropdown parent-menu-item">
                <a class="nav-link" href="{{ route('customer.chat') }}">
                    <span><i class="ti ti-brand-hipchat menu-icon"></i>Chat</span>
                    @if ($notif_chat->count() > 0)
                    <span class="badge bg-danger">{{ $notif_chat->count() }}</span>
                    @endif
                </a>

            </li>
            <!--end nav-item-->
            <!--end nav-item-->
            <!--end nav-item-->
        </ul><!-- End navigation menu -->
    </div> <!-- end navigation -->
</div>
<!-- Navbar -->
