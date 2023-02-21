@extends('customer.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col align-self-center">
                            <h4 class="page-title pb-md-0">Keranjang</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Keranjang</li>
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
            <div class="col-lg-12">
                @if (session('gagal'))
                <div class="alert alert-danger border-0" role="alert">
                    {{ session('gagal') }}
                </div>
                @endif
                <div class="card">
                    <!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Harga</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Checkout</th>
                                        <th>Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($keranjang as $keranjang)
                                        <tr>
                                            <td>
                                                <img src="/produk/{{ $keranjang->foto_produk }}"
                                                    alt=""height="40" class="me-2">
                                                <p class="d-inline-block align-middle mb-0">
                                                    <a href="{{ route('customer.produk_detail', $keranjang->id_produk) }}"
                                                        class="d-inline-block align-middle mb-0 product-name">{{ Str::title($keranjang->nama_produk) }}</a>
                                                    <br>
                                                    <span
                                                        class="text-muted font-13">{{ Str::title($keranjang->nama_kategori) }}</span>
                                                </p>
                                            </td>
                                            <td>{{ rupiah($keranjang->harga_produk)  }}</td>
                                            <td>
                                                <form action="{{ route('customer.keranjang_update', $keranjang->id_keranjang) }}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('put')
                                                    <input type="text" name="id_produk" value="{{ $keranjang->id_produk }}" id="" hidden>
                                                    <input class="form-control w-25" style="display:inline-block" name="quantity" type="number" value="{{ $keranjang->quantity }}">
                                                    <button type="submit" class="btn btn-sm btn-primary">Perbaharui</button>
                                                </form>
                                            </td>
                                            <td>
                                                @php
                                                    $stok = $keranjang->quantity;
                                                    $harga = $keranjang->harga_produk;
                                                    $total = $harga * $stok;
                                                    echo rupiah($total);
                                                @endphp
                                            </td>
                                            <td>
                                                <a href="{{ route('customer.checkout', $keranjang->id_keranjang) }}" class="text-primary">Checkout <i
                                                    class="fas fa-long-arrow-alt-right ml-1"></i></a>
                                            </td>
                                            <td>
                                                <a href="{{ route('customer.keranjang_delete', $keranjang->id_keranjang) }}"
                                                    style="color:red"
                                                    onclick="event.preventDefault();
                                                document.getElementById('keranjang-form-{{ $keranjang->id_keranjang }}').submit();"><i
                                                        class="ti ti-trash"></i> Hapus</a>
                                                <form id="keranjang-form-{{ $keranjang->id_keranjang }}"
                                                    action="{{ route('customer.keranjang_delete', $keranjang->id_keranjang) }}"
                                                    method="POST" class="d-none">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-->
                </div>
                <!--end card-body-->
            </div>
            <!--end col-->

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
