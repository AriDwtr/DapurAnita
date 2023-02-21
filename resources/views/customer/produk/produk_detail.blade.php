@extends('customer.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col align-self-center">
                            <h4 class="page-title pb-md-0">Produk</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Produk</li>
                            </ol>
                        </div>
                        <!--end col-->
                        <div class="col-auto align-self-center">
                            <a href="#" class="btn btn-sm btn-outline-primary" id="Dash_Date">
                                <span class="day-name" id="Day_Name">Today:</span>&nbsp;
                                <span class="" id="Select_date">
                                    @php
                                        echo date('d M');
                                    @endphp
                                </span>
                                <i data-feather="calendar" class="align-self-center icon-xs ms-1"></i>
                            </a>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div>

        @php
            function rupiah($angka)
            {
                $hasil_rupiah = 'Rp ' . number_format($angka, 2, ',', '.');
                return $hasil_rupiah;
            }
        @endphp
        <div class="row">
            <div class="col-12">
                @if (session('gagal'))
                    <div class="alert alert-danger border-0" role="alert">
                        {{ session('gagal') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 align-self-center">
                                <img src="/produk/{{ $produk->foto_produk }}" alt="" class="mx-auto  d-block"
                                    height="400" width="100%">

                            </div>
                            <!--end col-->
                            <div class="col-lg-6 align-self-center">
                                <div class="">
                                    <span
                                        class="badge badge-soft-warning font-13 fw-semibold mb-2">{{ Str::title($produk->nama_kategori) }}</span>
                                    <h5 class="font-24 mb-0">{{ Str::title($produk->nama_produk) }}</h5>

                                    <h6 class="font-20 fw-bold">{{ rupiah($produk->harga_produk) }} </h6>
                                    <h6 class="font-13">Deskripsi :</h6>
                                    <p class="text-muted">
                                        @php
                                            echo htmlspecialchars_decode($produk->deskripsi_produk);
                                        @endphp
                                    </p>
                                    <h6 class="font-13">Sekilas Info :</h6>
                                    <ul class="list-unstyled border-0">
                                        <li class="mb-2"><i class="las la-check-circle text-success me-1"></i>Pesanan Akan
                                            Langsung Di buat
                                            apabila ada pesanan</li>
                                        <li class="mb-2"><i class="las la-check-circle text-success me-1"></i>Pembuatan
                                            Pesanan Berdasarkan
                                            First Order First Serve</li>
                                        <li><i class="las la-check-circle text-success me-1"></i>Jaminan Kualitas Bahan dan
                                            Proses Pembuatan</li>
                                    </ul>
                                    {{-- <h3 class="font-14 text-primary">Stok : {{ $produk->stok }} Pcs (Tersedia)</h3> --}}
                                    <div class="mt-3">
                                        <form action="{{ route('customer.keranjang_store') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('post')
                                            <input class="form-control form-control d-inline-block" style="width:100px;"
                                                type="number" name="quantity" min="1" value="1" max="{{ $produk->stok }}"
                                                id="example-number-input">
                                            <input type="text" name="id_produk" id=""
                                                value="{{ $produk->id_produk }}" hidden>
                                            <button type="submit" class="btn btn-de-primary btn px-4 d-inline-block"><i
                                                    class="mdi mdi-cart me-2"></i>Masukan Keranjang</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>

        {{-- <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <i class="mdi mdi-truck-fast text-success font-30"></i>
                        <h4 class="header-title">Fast Delivery</h4>
                        <p class="text-muted mb-0">
                            Pengiriman Menggunakan Biro Jasa Terpecaya Yaitu JNE
                        </p>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <i class="mdi mdi-refresh text-danger font-30"></i>
                        <h4 class="header-title">Returns in 30 Days</h4>
                        <p class="text-muted mb-0">
                            Jaminan Uang Kembali Apa Bila Barang Tidak Sampai
                        </p>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <i class="mdi mdi-headset text-warning font-30"></i>
                        <h4 class="header-title">Online Support 24/7</h4>
                        <p class="text-muted mb-0">
                            Customer Support Dapur Anita Siap Melayani Pada Jam Kerja 08.00 - 16.00.
                        </p>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <i class="mdi mdi-wallet text-purple font-30"></i>
                        <h4 class="header-title">Secure Payment</h4>
                        <p class="text-muted mb-0">
                            Pembayaran Aman Menggunakan Sistem Transfer Pembayaran Bank Konvensional
                        </p>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div> --}}
        <h4>Komentar Teratas</h4>
        <div class="row">
            @foreach ( $komentar as $komentar)
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="media">
                                    <img class="d-flex align-self-center me-3 rounded-circle"
                                        src="assets/images/small/opp-1.png" alt="" height="50">
                                    <div class="media-body align-self-center">
                                        <h4 class="mt-0 mb-1 font-15">{{ Str::upper($komentar->name) }}</h4>
                                        <p class="text-mute">{{ $komentar->komentar_produk }}</p>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

@section('js')
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2500);
    </script>
@endsection
