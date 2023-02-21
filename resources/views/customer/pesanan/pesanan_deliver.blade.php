@extends('customer.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col align-self-center">
                            <h4 class="page-title pb-md-0">Pesanan DiKirim</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Pesanan Dikirim</li>
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
                                        <th>Ekspedisi</th>
                                        <th>Quantity</th>
                                        <th>Pengiriman</th>
                                        <th>invoice</th>
                                        <th>Status</th>
                                        <th>Tanggal Di Kirim</th>
                                        <th>Action</th>
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
                                                <p class="d-inline-block align-middle mb-0">
                                                    <a href=""
                                                        class="d-inline-block align-middle mb-0 product-name">{{ Str::title($data->nama_produk) }}</a>
                                                    <br>
                                                    <span class="text-muted font-13">Resi Jne : {{ $data->no_resi }}</span>
                                                </p>
                                            </td>
                                            <td>
                                                <img src="/dapuranita/jne.jpeg" alt="" height="40">
                                            </td>
                                            <td>{{ $data->quantity }} / Pcs</td>
                                            <td>{{ $data->nama_kota . ' [ ' . $data->nama_prov . ' ] ' }}</td>
                                            <td><a href="{{ route('customer.pesanan_invoice', $data->id_pesanan) }}"
                                                    target="_blank" class="btn btn-sm btn-secondary"><i
                                                        class="ti ti-file-invoice"> Invoice</i></a></td>
                                            <td>
                                                <span class="badge bg-success">Dalam Pengiriman</span>
                                            </td>
                                            <td>
                                                @php
                                                    $date = date('d-M-Y', strtotime($data->updated_at));
                                                    echo $date;
                                                @endphp
                                            </td>
                                            <td>
                                                <a href="" class="btn btn-success"  data-bs-toggle="modal"
                                                    data-bs-target="#komentar-{{ $data->id_pesanan }}">Terima Pesanan</a>
                                            </td>
                                            <div id="komentar-{{ $data->id_pesanan }}" class="modal fade"
                                                tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <form action="{{ route('customer.pesanan_diterima', $data->id_pesanan) }}"
                                                                method="post">
                                                                @csrf
                                                                <input type="text" name="id_pesanan"
                                                                    id=""
                                                                    value="{{ $data->id_pesanan }}" hidden>
                                                                <input type="text" name="id_produk"
                                                                    id=""
                                                                    value="{{ $data->id_produk }}" hidden>
                                                                <input type="text" name="id_user"
                                                                    id="" value="{{ Auth::user()->id }}"
                                                                    hidden>
                                                                <div class="row">
                                                                    <div class="col-xl-12 mb-2">
                                                                        <label for="">Komentar
                                                                            Produk</label>
                                                                        <textarea class="form-control" name="komentar" id="" cols="30" rows="10">Produk Memuaskan Sekali</textarea>
                                                                    </div>
                                                                    <div class="col-xl-12 mb-2">
                                                                        <button type="submit"
                                                                            class="btn btn-primary w-100">Kirim
                                                                            Komentar</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
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
