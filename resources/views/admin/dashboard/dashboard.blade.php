@extends('admin.layout.master')

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                    {{-- <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        </ol>
                    </div> --}}
                </div>
            </div>
        </div>
        @php
            $total_penjualan = DB::Table('pesanan')
                ->where('status', '4')
                ->orWhere('status', '3')
                ->get();
            $total_customer = DB::Table('users')
                ->where('id', '!=', Auth::user()->id)
                ->get();
            $total_pendapatan = DB::Table('pesanan')
                ->select(DB::raw('SUM(harga_total_bayar) as total_pendapatan'))
                ->where('status', '4')
                ->orWhere('status', '3')
                ->get();
            $total_produk = DB::Table('pesanan')
                ->select(DB::raw('SUM(quantity) as total_produk'))
                ->where('status', '4')
                ->get();
        @endphp
        @php
            function rupiah($angka)
            {
                $hasil_rupiah = 'Rp ' . number_format($angka, 2, ',', '.');
                return $hasil_rupiah;
            }
        @endphp
        <div class="row">
            <div class="col-lg-12">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-9">
                                        <p class="text-dark mb-0 fw-semibold">Pengguna Terdaftar</p>
                                        <h3 class="my-1 font-20 fw-bold">{{ $total_customer->count() }}</h3>
                                    </div>
                                    <!--end col-->
                                    <div class="col-3 align-self-center">
                                        <div
                                            class="d-flex justify-content-center align-items-center thumb-md bg-light-alt rounded-circle mx-auto">
                                            <i class="ti ti-users font-24 align-self-center text-muted"></i>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end card-body-->
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-9">
                                        <p class="text-dark mb-0 fw-semibold">Total Transaksi Bulan Ini</p>
                                        <h3 class="my-1 font-20 fw-bold">{{ $total_penjualan->count() }}</h3>
                                    </div>
                                    <!--end col-->
                                    <div class="col-3 align-self-center">
                                        <div
                                            class="d-flex justify-content-center align-items-center thumb-md bg-light-alt rounded-circle mx-auto">
                                            <i class="ti ti-clock font-24 align-self-center text-muted"></i>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end card-body-->
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-9">
                                        <p class="text-dark mb-0 fw-semibold">Total Pendapatan</p>
                                        @foreach ($total_pendapatan as $total_pendapatan)
                                            <h3 class="my-1 font-20 fw-bold">@php echo rupiah($total_pendapatan->total_pendapatan) @endphp</h3>
                                        @endforeach
                                    </div>
                                    <!--end col-->
                                    <div class="col-3 align-self-center">
                                        <div
                                            class="d-flex justify-content-center align-items-center thumb-md bg-light-alt rounded-circle mx-auto">
                                            <i class="ti ti-clock font-24 align-self-center text-muted"></i>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end card-body-->
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-9">
                                        <p class="text-dark mb-0 fw-semibold">Produk Terjual Bulan Ini</p>
                                        @foreach ($total_produk as $total_produk)
                                            <h3 class="my-1 font-20 fw-bold">{{ $total_produk->total_produk }} </h3>
                                        @endforeach
                                    </div>
                                    <!--end col-->
                                    <div class="col-3 align-self-center">
                                        <div
                                            class="d-flex justify-content-center align-items-center thumb-md bg-light-alt rounded-circle mx-auto">
                                            <i class="ti ti-confetti font-24 align-self-center text-muted"></i>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end card-body-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Transaksi Terakhir</h4>
                    </div>
                    <!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="datatable_1">
                                <thead class="thead-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Produk</th>
                                        <th>Quantity</th>
                                        <th>Pengiriman</th>
                                        <th>invoice</th>
                                        <th>Tanggal Order</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pesanan as $data)
                                        <tr>
                                            <td>#PP00{{ $data->id_pesanan }}</td>
                                            <td><img src="/produk/{{ $data->foto_produk }}" alt=""
                                                    class="thumb-sm rounded-circle me-2">
                                                {{ Str::title($data->nama_produk) }}</td>
                                            <td>{{ $data->quantity }} / Pcs</td>
                                            <td>{{ $data->nama_kota . ' [ ' . $data->nama_prov . ' ] ' }}</td>
                                            <td><a href="{{ route('admin.pesanan_invoice', $data->id_pesanan) }}"
                                                    target="_blank" class="btn btn-sm btn-secondary"><i
                                                        class="ti ti-file-invoice"> Invoice</i></a></td>
                                            <td>
                                                @php
                                                    $date = date('d-M-Y', strtotime($data->updated_at));
                                                    echo $date;
                                                @endphp
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> --}}
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-4">Produk Terjual</h4>
                        <canvas id="myChart" width="100" height="30"></canvas>
                    </div>
                </div>
                <!--end card-->
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link href="/metrica/dist/assets/libs/simple-datatables/style.css" rel="stylesheet" type="text/css" />
@endsection

@section('js')
    <script src="/Chart.js/Chart.bundle.js"></script>
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    @php
                        $data_produk = DB::table('pesanan')
                        ->join('produk','produk.id_produk','=','pesanan.id_produk')
                        ->select('pesanan.*','produk.nama_produk')
                        ->where('pesanan.status','3')
                        ->orWhere('pesanan.status','4')
                        ->get();
                    @endphp
                    labels: [
                        @php
                            foreach($data_produk as $data){
                                echo "'".$data->nama_produk."',";
                            };
                        @endphp
                    ],
                    datasets: [{
                        label: 'Produk',
                        data: [
                            @php
                            foreach($data_produk as $data2){
                                echo $data2->quantity.",";
                            };
                        @endphp
                        ],
                        backgroundColor: [
                            @php
                            foreach($data_produk as $data){
                                echo "'rgba(52, 76, 235, 1)',";
                            };
                            @endphp
                        ],
                        borderColor: [
                            @php
                            foreach($data_produk as $data){
                                echo "'rgba(52, 76, 235, 1)',";
                            };
                            @endphp
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>
    <script src="/metrica/dist/assets/libs/simple-datatables/umd/simple-datatables.js"></script>
    <script src="/metrica/dist/assets/js/pages/datatable.init.js"></script>
@endsection
