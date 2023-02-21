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

        <div class="row">
            <div class="col-md-3">
                {{-- <div class="card">
                    <div class="card-body">
                        <form action="#">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Cari Produk..."
                                    aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-de-warning" type="button" id="button-addon2"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div> --}}
                <div class="card">
                    <div class="card-body">
                        <h5 style="text-align: center"> Kategori Produk</h5>
                        <hr>
                        @foreach ($kategori as $kategori)
                            <li style="color:goldenrod;text-align:left">
                                <a href="{{ route('customer.produk_kategori', $kategori->id_kategori) }}"
                                    style="color:goldenrod;text-align:left;font-size:15px">{{ Str::title($kategori->nama_kategori) }}</a>
                            </li>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div class="row">
                    @php
                        function rupiah($angka)
                        {
                            $hasil_rupiah = 'Rp ' . number_format($angka, 2, ',', '.');
                            return $hasil_rupiah;
                        }
                    @endphp
                    @foreach ($produk as $data)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <!--end ribbon-->
                                    <img src="/produk/{{ $data->foto_produk }}" alt="" class="rounded d-block"
                                        height="180" width="285">
                                    <div class="d-flex justify-content-between align-items-center my-4">
                                        <div>
                                            <p class="text-muted mb-2">{{ Str::title($data->nama_kategori) }}</p>
                                            <a href="{{ route('customer.produk_detail', $data->id_produk) }}" class="header-title">{{ Str::title($data->nama_produk) }}</a>
                                        </div>
                                        <div>
                                            <h5 class="text-dark mt-0 mb-2">{{ rupiah($data->harga_produk) }}</h5>
                                        </div>
                                    </div>
                                    <div class="d-grid">
                                        <a href="{{ route('customer.produk_detail', $data->id_produk) }}" class="btn btn-de-warning">Lihat Produk</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
