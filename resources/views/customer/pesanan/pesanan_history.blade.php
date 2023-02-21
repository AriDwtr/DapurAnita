@extends('customer.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col align-self-center">
                            <h4 class="page-title pb-md-0">Riwayat Pesanan</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Riwayat Pesanan</li>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No Pesanan</th>
                                        <th>Nama Produk</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Total Belanja</th>
                                        <th>invoice</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        function rupiah($angka)
                                        {
                                            $hasil_rupiah = 'Rp ' . number_format($angka, 2, ',', '.');
                                            return $hasil_rupiah;
                                        }
                                    @endphp
                                    @foreach ($pesanan as $pesanan)
                                        <tr>
                                            <td>
                                                #PP00 {{ $pesanan->id_pesanan }}
                                            </td>
                                            <td>
                                                <img src="/produk/{{ $pesanan->foto_produk }}" alt=""
                                                    height="40">
                                                <p class="d-inline-block align-middle mb-0">
                                                    <a href=""
                                                        class="d-inline-block align-middle mb-0 product-name">{{ Str::title($pesanan->nama_produk) }}</a>
                                                    <br>
                                                </p>
                                            </td>
                                            <td>{{ $pesanan->quantity }} / Pcs</td>
                                            <td><span class="badge bg-success">Selesai</span></td>
                                            <td>{{ rupiah($pesanan->total_ongkir) }}</td>
                                            <td>
                                                <a href="{{ route('admin.pesanan_invoice', $pesanan->id_pesanan) }}"
                                                    target="_blank" class="btn btn-sm btn-secondary"><i
                                                        class="ti ti-file-invoice"> Invoice</i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div> <!-- end col -->
        </div>
    </div>
@endsection
