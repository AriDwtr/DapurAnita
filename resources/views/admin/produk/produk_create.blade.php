@extends('admin.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col align-self-center">
                            <h4 class="page-title pb-md-0">Tambah Produk</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Produk</a></li>
                                <li class="breadcrumb-item active">Tambah Produk</li>
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <h4 class="card-title">Form Tambah Barang</h4>
                            <p class="text-muted mb-0">Mohon Di Perhatikan Baik Baik Pengisian Form Barang</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('produk.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="mb-3">
                                    <label for="exampleInputEmail1">Nama Produk</label>
                                    <input type="text" class="form-control @error('nama_produk') is-invalid @enderror"
                                        name="nama_produk" value="{{ old('nama_produk') }}" placeholder="Nama Produk">
                                    @error('nama_produk')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1">Kategori Produk</label>
                                    <select class="form-select @error('kategori_produk') is-invalid @enderror"
                                        name="kategori_produk" id="exampleFormControlSelect1">
                                        @foreach ($kategori as $kategori)
                                            <option value="{{ $kategori->id_kategori }}" {{ $kategori->id_kategori == old('kategori_produk') ? 'selected' : '' }}>
                                                {{ Str::upper($kategori->nama_kategori) }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori_produk')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1">Stok Produk</label>
                                            <input type="number"
                                                class="form-control @error('stok_produk') is-invalid @enderror"
                                                name="stok_produk" value="{{ old('stok_produk') }}" placeholder="Stok Produk">
                                            @error('stok_produk')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1">Berat Produk <span style="color:red">/ * Satuan
                                                    Gram</span></label>
                                            <input type="number"
                                                class="form-control @error('berat_produk') is-invalid @enderror"
                                                name="berat_produk" value="{{ old('berat_produk') }}" placeholder="50000">
                                            @error('berat_produk')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1">Harga Produk <span
                                                    style="color:red"></span></label>
                                            <input id='input_mask_currency' name="harga_produk"
                                                class="form-control @error('harga_produk') is-invalid @enderror"
                                                type="text" value="{{ old('harga_produk') }}" placeholder="Harga Produk">
                                            @error('harga_produk')
                                                <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <img id="output1" src="/dapuranita/default-produk.png" class="img-fluid" />
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="exampleInputEmail1">Upload Foto Produk</label>
                                        <input type="file" name="img1"
                                            class="form-control @error('img1')
                                        is-invalid
                                    @enderror"
                                            accept="image/*" id="imgInp1">
                                        @error('img1')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="exampleInputEmail1">Deskripsi Produk</label>
                                        <textarea
                                            class="@error('deskripsi_produk')
                                            is-invalid
                                        @enderror"
                                            id="basic-conf" name="deskripsi_produk" placeholder="Tulis Deskripsi Produk">{{ old('deskripsi_produk') }}</textarea>
                                        @error('deskripsi_produk')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary w-100">Posting Produk Baru</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
@endsection

@section('js')
<script src="/metrica/dist/assets/libs/tinymce/tinymce.min.js"></script>
<script src="/metrica/dist/assets/js/pages/form-editor.init.js"></script>
    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script>
        imgInp1.onchange = evt => {
            const [file] = imgInp1.files
            if (file) {
                output1.src = URL.createObjectURL(file)
            }
        };

        $("#input_mask_currency").inputmask({
            prefix: 'Rp ',
            radixPoint: ',',
            groupSeparator: ".",
            alias: "numeric",
            autoGroup: true,
            digits: 0
        });
    </script>
@endsection
