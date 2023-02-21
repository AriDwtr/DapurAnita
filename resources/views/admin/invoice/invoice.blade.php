@extends('admin.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col align-self-center">
                            <h4 class="page-title pb-md-0">Invoice</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Invoice</li>
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
            <div class="col-lg-10 mx-auto">
                <div class="card">
                    <div class="card-body invoice-head">
                        <div class="row">
                            <div class="col-md-4 align-self-center">
                                <img src="/dapuranita/logo1.png" alt="logo-small" class="logo-sm me-1" height="40">
                                <img src="assets/images/logo.png" alt="logo-large" class="logo-lg brand-light"
                                    height="16">
                                <p class="mt-2 mb-0 text-muted">Invoice Pesanan Kode #PP00{{ $pesanan->id_pesanan }}</p>
                            </div>
                            <!--end col-->
                            <div class="col-md-8">

                                <ul class="list-inline mb-0 contact-detail float-end">
                                    <li class="list-inline-item">
                                        <div class="ps-3">
                                            <i class="mdi mdi-web"></i>
                                            <p class="text-muted mb-0">www.Dapur-Anita.com</p>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="ps-3">
                                            <i class="mdi mdi-phone"></i>
                                            <p class="text-muted mb-0">0857-4059-0305</p>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="ps-3">
                                            <i class="mdi mdi-map-marker"></i>
                                            <p class="text-muted mb-0">51372 Kendal, Indonesia</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                    <div class="card-body">
                        <div class="row row-cols-3 d-flex justify-content-md-between">
                            <div class="col-md-3 d-print-flex">
                                <div class="">
                                    <h6 class="mb-0"><b>Order Date :</b> {{ date('d/M/Y', strtotime($pesanan->updated_at)) }}</h6>
                                    <h6><b>Order ID :</b> # 00{{ $pesanan->id_pesanan }}</h6>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-3 d-print-flex">
                                <div class="">
                                    <address class="font-13">
                                        <strong class="font-14">Tertuju Untuk :</strong><br>
                                        {{ Str::title($pesanan->nama_penerima) }}<br>
                                        {{ $pesanan->alamat_lengkap }}<br>
                                        {{ $pesanan->nama_kota.', '.$pesanan->nama_prov }}<br>
                                        <abbr title="Phone">No Telp:</abbr> {{ $pesanan->no_telp }}
                                    </address>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-3 d-print-flex">
                                <div class="">
                                    <address class="font-13">
                                        <strong class="font-14">Pengirim :</strong><br>
                                        Dapur Anita<br>
                                        Perumahan Griya Mutiara Prima No. C3<br>
                                        Ds. Mororejo, RT.01/RW.02
                                        Kec. Kaliwungu Kab.Kendal, Jawa Tengah<br>
                                        <abbr title="Phone">No. Telp:</abbr> 0857-4059-0305
                                    </address>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive project-invoice">
                                    <table class="table table-bordered mb-0">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Pesanan</th>
                                                <th>Quantity</th>
                                                <th>Harga Produk</th>
                                                <th>Subtotal</th>
                                            </tr>
                                            <!--end tr-->
                                        </thead>
                                        @php
                                        function rupiah($angka)
                                        {
                                            $hasil_rupiah = 'Rp ' . number_format($angka, 2, ',', '.');
                                            return $hasil_rupiah;
                                        }
                                         @endphp
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h5 class="mt-0 mb-1 font-14">{{ Str::title($pesanan->nama_produk) }}</h5>
                                                </td>
                                                <td>{{ $pesanan->quantity }}</td>
                                                <td>
                                                    @php
                                                        $harga = $pesanan->harga_total_bayar / $pesanan->quantity;
                                                        echo rupiah($harga);
                                                    @endphp
                                                    </td>
                                                <td>{{ rupiah($pesanan->harga_total_bayar) }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="border-0"></td>
                                                <td class="border-0 font-14 text-dark"><b>Berat Total : {{ $pesanan->quantity * $pesanan->berat.' Gram' }}</b></td>
                                                <td class="border-0 font-14 text-dark"><b>-</b></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="border-0"></td>
                                                <td class="border-0 font-14 text-dark"><b>Ongkir : {{ $pesanan->nama_kota }}</b></td>
                                                <td class="border-0 font-14 text-dark"><b>{{ rupiah($pesanan->ongkir) }}</b></td>
                                            </tr>
                                            <tr class="bg-black text-white">
                                                <th colspan="2" class="border-0"></th>
                                                <td class="border-0 font-14"><b>Total</b></td>
                                                <td class="border-0 font-14"><b>{{ rupiah($pesanan->total_ongkir) }}</b></td>
                                            </tr>
                                            <!--end tr-->
                                        </tbody>
                                    </table>
                                    <!--end table-->
                                </div>
                                <!--end /div-->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                        <div class="row">
                            <div class="col-lg-6">
                            </div>
                            <!--end col-->
                            <div class="col-lg-6 align-self-center">
                                <div class="float-none float-md-end" style="width: 30%;">
                                    <small>Dapur Anita</small>
                                    <img src="/dapuranita/logo1.png" alt="" class="mt-2 mb-1"
                                        height="20">
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <hr>
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-12 col-xl-4 ms-auto align-self-center">
                                <div class="text-center"><small class="font-12">Terima Kasih Atas Kepercayaaan Terhadap Produk Kami</small></div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-12 col-xl-4">
                                <div class="float-end d-print-none mt-2 mt-md-0">
                                    <a href="javascript:window.print()" class="btn btn-de-info btn-sm">Cetak</a>
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
    </div>
@endsection
