@extends('admin.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col align-self-center">
                            <h4 class="page-title pb-md-0">List Produk</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Produk</a></li>
                                <li class="breadcrumb-item active">List Produk</li>
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
                @if (session('success'))
                    <div class="alert alert-success border-0" id="alert" role="alert">
                        {{ session('success') }}
                    </div>
                @elseif (session('delete'))
                    <div class="alert alert-danger border-0" id="alert" role="alert">
                        {{ session('delete') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Data Produk Dapur Anita </h4>
                    </div>
                    <!--end card-header-->
                    <div class="card-body">
                        <div class="mb-3">
                            <a href="{{ route('produk.create') }}"class="btn btn-primary"><i class="ti ti-cookie"></i>
                                Tambah Produk Baru</a>
                        </div>
                        <div class="table-responsive">
                            <table class="table" id="datatable_1">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Kode Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Kategori Produk</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Action</th>
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
                                    @foreach ($produk as $produk)
                                        <tr>
                                            <td><b>#P00{{ $produk->id_produk }}</b></td>
                                            <td>{{ Str::title($produk->nama_produk) }}</td>
                                            <td>{{ Str::upper($produk->nama_kategori) }}</td>
                                            <td>{{ $produk->stok }}</td>
                                            <td>{{ rupiah($produk->harga_produk) }}</td>
                                            <td>
                                                @if ($produk->stok > 5)
                                                    <span class="badge bg-success">Stok Aman</span>
                                                @else
                                                    <span class="badge bg-danger">Stok Menipis</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('produk.edit', $produk->id_produk) }}"
                                                    style="color:darkgoldenrod"><i class="ti ti-edit"></i>Edit</a> |
                                                <a href="{{ route('produk.destroy', $produk->id_produk) }}"
                                                    style="color:red"
                                                    onclick="event.preventDefault();
                                                document.getElementById('produk-form-{{ $produk->id_produk }}').submit();"><i
                                                        class="ti ti-trash"></i> Hapus</a>
                                                <form id="produk-form-{{ $produk->id_produk }}"
                                                    action="{{ route('produk.destroy', $produk->id_produk) }}"
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
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
@endsection

@section('css')
    <link href="/metrica/dist/assets/libs/simple-datatables/style.css" rel="stylesheet" type="text/css" />
@endsection

@section('js')
    <script src="/metrica/dist/assets/libs/simple-datatables/umd/simple-datatables.js"></script>
    <script src="/metrica/dist/assets/js/pages/datatable.init.js"></script>

    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2500);
    </script>
@endsection
