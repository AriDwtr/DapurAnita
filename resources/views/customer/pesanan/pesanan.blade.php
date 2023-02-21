@extends('customer.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col align-self-center">
                            <h4 class="page-title pb-md-0">Pesanan</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Pesanan</li>
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
                                        <th>Total Produk</th>
                                        <th>Pengiriman</th>
                                        <th>Total Pembayaran</th>
                                        <th>Tipe</th>
                                        <th>Status</th>
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
                                    @foreach ($pesanan_onpaid as $data)
                                        <tr>
                                            <td>#PP00{{ $data->id_pesanan }}</td>
                                            <td><img src="/produk/{{ $data->foto_produk }}" alt=""
                                                    class="thumb-sm rounded-circle me-2">
                                                {{ Str::title($data->nama_produk) }}</td>
                                            <td>{{ $data->quantity }} / Pcs</td>
                                            <td>{{ rupiah($data->harga_total_bayar) }}</td>
                                            <td>{{ $data->nama_kota . ' [ ' . $data->nama_prov . ' ] ' }}</td>
                                            <td>{{ rupiah($data->total_ongkir) }}</td>
                                            <td><span
                                                    class="badge badge-soft-primary p-2">{{ Str::upper($data->tipe_pembayaran) }}</span>
                                            </td>
                                            <td>
                                                @if ($data->tipe_pembayaran == 'dp')
                                                    @if ($data->dp_status== 'dp')
                                                        @if ($data->status == '0')
                                                        <span class="badge bg-danger">Pembayaran di Tolak</span>
                                                        @elseif ($data->status == '1')
                                                        <span class="badge bg-primary">Pembayaran Sedang Di Tinjau</span>
                                                        @else
                                                        <span class="badge bg-success">Pesanan Anda Sedang Di Buat</span>
                                                        @endif
                                                    @elseif ($data->dp_status == 'tagihan')
                                                        <span class="badge bg-danger">Anda Mewajibkan Bayar Sisa
                                                            Tagihan</span>
                                                    @elseif ($data->dp_status == 'upload_lunas')
                                                        <span class="badge bg-success">Sisa Pembayaran Telah Di Upload</span>
                                                    @elseif ($data->dp_status == 'sisa tolak')
                                                        <span class="badge bg-danger">Sisa Pembayaran Di Tolak</span>
                                                    @endif
                                                @elseif ($data->tipe_pembayaran == 'lunas')
                                                    @php
                                                        if ($data->status == '0') {
                                                            echo '<span class="badge bg-danger">Pembayaran di Tolak</span>';
                                                        } elseif ($data->status == '1') {
                                                            echo '<span class="badge bg-primary">Pembayaran Sedang Di Tinjau</span>';
                                                        } else {
                                                            echo '<span class="badge bg-success">Pesanan Anda Sedang Di Buat</span>';
                                                        }
                                                    @endphp
                                                @endif
                                            </td>
                                            <td>
                                                @if ($data->tipe_pembayaran == 'dp')
                                                    @if ($data->status == '0')
                                                        <a href="{{ route('customer.upload_ulang', $data->id_pesanan) }} "
                                                            style="color:blue"><i class="ti ti-cloud-upload"></i>Upload
                                                            Ulang</a>
                                                    @endif
                                                    @if ($data->dp_status == 'tagihan')
                                                        <button type="button" class="btn btn-de-primary btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalDefault">Bayar Tagihan</button>

                                                    @elseif ($data->dp_status == 'sisa tolak')
                                                    <button type="button" class="btn btn-de-primary btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#exampleModalDefault">Bayar Ulang Tagihan</button>
                                                    @elseif ($data->dp_status == 'upload_lunas')

                                                    @endif
                                                @elseif ($data->tipe_pembayaran == 'lunas')
                                                    @php
                                                        if ($data->status == '0') {
                                                            echo '<a href="' . route('customer.upload_ulang', $data->id_pesanan) . '" style="color:blue"><i class="ti ti-cloud-upload"></i>Upload Ulang</a>';
                                                        } elseif ($data->status == '2') {
                                                            echo '<a href="' . route('customer.pesanan_invoice', $data->id_pesanan) . '" target="_blank" class="btn btn-sm btn-secondary"><i class="ti ti-file-invoice"> Invoice</i></a>';
                                                        }
                                                    @endphp
                                                @endif
                                                <div class="modal fade" id="exampleModalDefault" tabindex="-1"
                                                            role="dialog" aria-labelledby="exampleModalDefaultLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <form action="{{ route('customer.upload_sisa_tagihan') }}" method="post" enctype="multipart/form-data">
                                                                    @method('post')
                                                                    @csrf
                                                                    <div class="modal-header">
                                                                        <h6 class="modal-title m-0"
                                                                            id="exampleModalDefaultLabel">Pembayaran Tagihan
                                                                        </h6>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <!--end modal-header-->
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div
                                                                                class="col-lg-3 text-center align-self-center">
                                                                                {{-- <img src="assets/images/small/btc.png"
                                                                                    alt="" class="img-fluid"> --}}
                                                                                <img id="output1" src="/dapuranita/default-produk.png" class="img-fluid">
                                                                            </div>
                                                                            <!--end col-->
                                                                            <div class="col-lg-9">
                                                                                <h5>#PP00{{ $data->id_pesanan }}</h5>
                                                                                <h5>Total Pembayaran : {{ rupiah($data->total_dp) }}</h5>
                                                                                <input type="text" name="id" value="{{ $data->id_pesanan }}" hidden>
                                                                                <input type="file" name="bukti_bayar"
                                                                                    class="form-control mb-2" accept="image/*" id="imgInp1" required>
                                                                            </div>
                                                                            <!--end col-->
                                                                        </div>
                                                                        <!--end row-->
                                                                    </div>
                                                                    <!--end modal-body-->
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-de-secondary btn-sm"
                                                                            data-bs-dismiss="modal">Tutup</button>
                                                                        <button type="submit"
                                                                            class="btn btn-de-primary btn-sm">Upload Pembayaran</button>
                                                                    </div>
                                                                    </form>
                                                                    <!--end modal-footer-->
                                                                </div>
                                                                <!--end modal-content-->
                                                            </div>
                                                            <!--end modal-dialog-->
                                                </div>
                                            </td>
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

@section('js')
<script>
    imgInp1.onchange = evt => {
        const [file] = imgInp1.files
        if (file) {
            output1.src = URL.createObjectURL(file)
        }
    };
</script>
@endsection
