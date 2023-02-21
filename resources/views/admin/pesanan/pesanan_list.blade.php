@extends('admin.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col align-self-center">
                            <h4 class="page-title pb-md-0">Pesanan Masuk</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Pesanan Masuk</li>
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
                    <!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Produk</th>
                                        <th>Quantity</th>
                                        <th>Total Tagihan</th>
                                        <th>Pengiriman</th>
                                        <th>Tipe</th>
                                        <th>Status</th>
                                        <th>Cek Bukti</th>
                                        <th>Action</th>
                                        <th>Tanggal Pesan</th>
                                    </tr>
                                    <!--end tr-->
                                </thead>
                                <tbody>
                                    @php
                                        function rupiah($angka)
                                        {
                                            $hasil_rupiah = 'Rp ' . number_format($angka, 2, ',', '.');
                                            return $hasil_rupiah;
                                        }
                                    @endphp
                                    @foreach ($pesanan as $data)
                                        <tr>
                                            <td>#PP00{{ $data->id_pesanan }}</td>
                                            <td><img src="/produk/{{ $data->foto_produk }}" alt=""
                                                    class="thumb-sm rounded-circle me-2">
                                                {{ Str::title($data->nama_produk) }}</td>
                                            <td>{{ $data->quantity }} / Pcs</td>
                                            <td>{{ rupiah($data->total_ongkir) }}</td>
                                            <td>{{ $data->nama_kota . ' [ ' . $data->nama_prov . ' ] ' }}</td>
                                            <td><span class="badge badge-soft-primary p-2">{{ Str::upper($data->tipe_pembayaran) }}</span></td>
                                            <td>
                                                <span class="badge badge-soft-success p-2">Telah Upload Bukti
                                                    Pembayaran</span>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalCenter-{{ $data->id_pesanan }}">Cek Bukti
                                                    Pembayaran</button>
                                            </td>
                                            <td>
                                                <a href="{{ route ('admin.pesanan_terima', $data->id_pesanan) }}" style="color:green" onclick="return confirm('Apakah Yakin Pembayaran Telah Sesuai ?');"><i class="ti ti-checks"></i>Terima</a>
                                                |
                                                <a href="{{ route ('admin.pesanan_tolak', $data->id_pesanan) }}" style="color:red"><i class="ti ti-circle-x"></i>Tolak</a>
                                            </td>
                                            <td>
                                                @php
                                                    $date = date('d-M-Y', strtotime($data->updated_at));
                                                    echo $date;
                                                @endphp
                                            </td>
                                            <div class="modal fade" id="exampleModalCenter-{{ $data->id_pesanan }}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h6 class="modal-title m-0" id="exampleModalCenterTitle">Bukti
                                                                Pembayaran</h6>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <!--end modal-header-->
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-lg-3 text-center align-self-center">
                                                                    @if ($data->tipe_pembayaran=="dp")
                                                                    <img src="/bukti_bayar/{{ $data->bukti_bayar_dp }}"
                                                                        alt="" class="img-fluid" data-action="zoom">
                                                                    @else
                                                                    <img src="/bukti_bayar/{{ $data->bukti_bayar }}"
                                                                        alt="" class="img-fluid" data-action="zoom">
                                                                    @endif
                                                                </div>
                                                                <!--end col-->
                                                                <div class="col-lg-9">
                                                                    <h5>#PP00{{ $data->id_pesanan }}</h5>
                                                                    @if ($data->tipe_pembayaran=="dp")
                                                                    <h5>Total Tagihan : {{ rupiah($data->total_dp) }}</h5>
                                                                    @else
                                                                    <h5>Total Tagihan : {{ rupiah($data->total_ongkir) }}</h5>
                                                                    @endif
                                                                    <span class="badge bg-soft-secondary">Klik Gambar Untuk
                                                                        Zoom</span>
                                                                </div>
                                                                <!--end col-->
                                                            </div>
                                                            <!--end row-->
                                                        </div>
                                                        <!--end modal-body-->
                                                        <!--end modal-footer-->
                                                    </div>
                                                    <!--end modal-content-->
                                                </div>
                                                <!--end modal-dialog-->
                                            </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" type="text/css" href="/js/zoom.css">
@endsection

@section('js')
    <script src="/js/zoom.js"></script>
@endsection
