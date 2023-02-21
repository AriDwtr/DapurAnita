@extends('customer.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col align-self-center">
                            <h4 class="page-title pb-md-0">Checkout</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Checkout</li>
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
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Sekilas Pesanan</h4>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive shopping-cart">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="/produk/{{ $keranjang->foto_produk }}" alt=""height="40">
                                            <p class="d-inline-block align-middle mb-0 product-name">
                                                {{ $keranjang->nama_produk }}</p>
                                        </td>
                                        <td>
                                            {{ $keranjang->quantity }}
                                        </td>
                                        <td>
                                            @php
                                                $stok = $keranjang->quantity;
                                                $harga = $keranjang->harga_produk;
                                                $total = $harga * $stok;
                                                echo rupiah($total);
                                            @endphp
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!--end re-table-->
                        <div class="total-payment">
                            <table class="table mb-0">
                                <tbody>
                                    <tr>
                                        <td class="fw-semibold">Subtotal</td>
                                        <td>{{ rupiah($total) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-semibold">Berat Produk</td>
                                        <td>{{ $berat }} Gram</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-semibold">
                                            Pengiriman (Ongkir)
                                            <br>
                                            [JNE-REG]
                                        </td>
                                        <td>
                                            @php
                                                foreach ($ongkir as $ongkir) {
                                                    // dd($ongkir['costs'][1]);
                                                    $cost = $ongkir['costs'][1];
                                                    foreach ($cost as $costs) {
                                                        $costs = $cost['cost'];
                                                        foreach ($costs as $costs) {
                                                            $harga_ongkir = $costs['value'];
                                                            $estimasi = $costs['etd'];
                                                        }
                                                    }
                                                }
                                                echo rupiah($harga_ongkir);
                                            @endphp
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="fw-semibold">Estimasi Tiba</td>
                                        <td>{{ $estimasi }} Hari</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-semibold  border-bottom-0">Total</td>
                                        <td class="text-dark  border-bottom-0"><strong>
                                                @php
                                                    $total_bayar = $total + $harga_ongkir;
                                                    echo rupiah($total_bayar);
                                                @endphp
                                            </strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <!--end table-->
                        </div>
                        <!--end total-payment-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Alamat Pengiriman</h4>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-header-->
                    <div class="card-body">
                        <form class="mb-0">
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Nama Penerima <small
                                                class="text-danger font-13">*</small></label>
                                        <input type="text" name="nama" class="form-control" id="firstname"
                                            value="{{ $pengiriman->nama_penerima }}" placeholder="Nama Penerima" readonly>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Provinsi<small
                                                class="text-danger font-13">*</small></label>
                                        <input type="text" class="form-control" id="firstname"
                                            value="{{ $pengiriman->nama_prov }}" placeholder="Nama Penerima" readonly>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Kota<small class="text-danger font-13">*</small></label>
                                        <input type="text" class="form-control" id="firstname"
                                            value="{{ $pengiriman->nama_kota }}" placeholder="Nama Penerima" readonly>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Kode Pos<small
                                                class="text-danger font-13">*</small></label>
                                        <input type="text" class="form-control" id="firstname"
                                            value="{{ $pengiriman->kode_pos }}" placeholder="Nama Penerima" readonly>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Nomor Telp<small
                                                class="text-danger font-13">*</small></label>
                                        <input type="text" class="form-control" id="firstname"
                                            value="{{ $pengiriman->no_telp }}" placeholder="Nama Penerima" readonly>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label my-2">Alamat Lengkap<small
                                                class="text-danger font-13">*</small></label>
                                        <input type="text" class="form-control" required=""
                                            value="{{ $pengiriman->alamat_lengkap }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <a href="#" class="text-primary"></a>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="{{ route('alamat.index') }}" class="text-primary">Ubah Alamat <i
                                            class="fas fa-long-arrow-alt-right ml-1"></i></a>
                                </div>
                            </div>
                        </form>
                        <!--end form-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
                <div class="row">
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="card-title">Rekening Pembayaran</h4>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end card-header-->
                            <div class="card-body">
                                @foreach ($rekening as $rekening)
                                    <div class="row no-gutters">
                                        <div class="col-md-3 align-self-center text-center">
                                            @if ($rekening->jenis_rekening == 'bni')
                                                <img class="" height="50" src="/rekening/BNI.jpg"
                                                    alt="Card image">
                                            @elseif ($rekening->jenis_rekening == 'bri')
                                                <img class="" height="50" src="/rekening/bri.png"
                                                    alt="Card image">
                                            @elseif ($rekening->jenis_rekening == 'bsi')
                                                <img class="" height="50" src="/rekening/bsi.jpg"
                                                    alt="Card image">
                                            @elseif ($rekening->jenis_rekening == 'bca')
                                                <img class="" height="50" src="/rekening/bca.png"
                                                    alt="Card image">
                                            @elseif ($rekening->jenis_rekening == 'mandiri')
                                                <img class="" height="50" src="/rekening/mandiri.png"
                                                    alt="Card image">
                                            @endif

                                        </div>
                                        <div class="col-md-9">
                                            <div class="card-body">
                                                <p class="card-text">
                                                    Nama Rekening : <b> {{ Str::title($rekening->nama_rek) }} </b><br>
                                                    Nomor Rekening : <b> {{ $rekening->no_rek }} </b>
                                                </p>
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                        <hr>
                                        <!--end col-->
                                    </div>
                                @endforeach
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center align-item-center">
                                    <h4 class="header-title mb-2">Upload Bukti Bayar</h4>
                                    <img id="output1" src="/dapuranita/default-produk.png" height="200" width="200" alt="" class="rounded">
                                </div>
                                <div class="row mt-2">
                                    <form action="{{ route('customer.upload_store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('post')
                                        <div class="mb-3">
                                            <label for="exampleFormControlSelect1">Jenis Transaksi</label>
                                            <select class="form-select  @error('metode')
                                            is-invalid
                                            @enderror" name="metode" id="exampleFormControlSelect1">
                                            <option value="lunas">Lunas [
                                                Tagihan :
                                                @php
                                                    echo rupiah($total_bayar);
                                                @endphp
                                                ]</option>
                                            <option value="dp">DP [
                                                Tagihan :
                                                @php
                                                $dp  = $total_bayar * 0.5;
                                                echo rupiah($dp);
                                                @endphp
                                                ]</option>
                                            </select>
                                            @error('metode')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <label for="exampleInputEmail1">Upload Bukti Pembayaran</label>
                                        <input type="text" name="total_bayar" value="{{ $total_bayar  }}" id="" hidden>
                                        <input type="text" name="id_pesanan" value="{{ $keranjang->id_pesanan  }}" id="" hidden>
                                        <input type="file" name="bukti_bayar"
                                            class="form-control mb-2 @error('bukti_bayar')
                                        is-invalid
                                    @enderror"
                                            accept="image/*" id="imgInp1">
                                        @error('bukti_bayar')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                        <button type="submit" class="btn btn-success w-100">Upload Bukti Pembayaraan</button>
                                    </form>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
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
