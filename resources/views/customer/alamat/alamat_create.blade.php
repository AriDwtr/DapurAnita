@extends('customer.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col align-self-center">
                            <h4 class="page-title pb-md-0">Alamat</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Alamat</li>
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
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title">Alamat Pengiriman</h4>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <div class="card-body">
                        <form class="mb-0" action="{{ route('alamat.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('post')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Nama Penerima <small
                                                class="text-danger font-13">*</small></label>
                                        <input type="text" name="nama"
                                            class="form-control @error('nama')
                                            is-invalid
                                        @enderror"
                                            id="firstname" placeholder="Nama Penerima">
                                        @error('nama')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label my-2">Provinsi<small
                                                class="text-danger font-13">*</small></label>
                                        <select id="default" class="form-control @error('provinsi') is-invalid @enderror"
                                            name="provinsi">
                                            <option disabled selected>Pilih Provinsi</option>
                                            @foreach ($provinsi as $provinsi)
                                                <option
                                                    value="{{ $provinsi['province_id'] . '|' . $provinsi['province'] }}">
                                                    {{ $provinsi['province'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('provinsi')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label my-2">Kota / Kabupaten<small
                                                class="text-danger font-13">*</small></label>
                                        <select id="default1" class="form-control @error('kota') is-invalid @enderror"
                                            name="kota">
                                            <option disabled selected>Pilih Kota / Kabupaten</option>
                                            @foreach ($city as $city)
                                                <option value="{{ $city['city_id'] . '|' . $city['city_name'] }}">
                                                    {{ $city['city_name'] }}</option>
                                            @endforeach
                                        </select>
                                        @error('kota')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label my-2">Kode Pos <small
                                                class="text-danger font-13">*</small></label>
                                        <input type="number" name="kode_pos"
                                            class="form-control @error('kode_pos')
                                            is-invalid
                                        @enderror"
                                            placeholder="Kode Pos">
                                        @error('kode_pos')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label my-2">Nomor Telp<small
                                                class="text-danger font-13">*</small></label>
                                        <input type="number" name="telp"
                                            class="form-control @error('telp')
                                            is-invalid
                                        @enderror"
                                            placeholder="Nomor Telp">
                                        @error('telp')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                            <div class="row mt-2 mb-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label my-2">Alamat<small
                                                class="text-danger font-13">*</small></label>
                                        <textarea name="alamat"
                                            class="form-control @error('alamat') is-invalid @enderror"
                                            id="" cols="5" rows="5" placeholder="Alamat Lengkap"></textarea>
                                        @error('alamat')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Simpan Alamat Pengiriman</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link href="/metrica/dist/assets/libs/mobius1-selectr/selectr.min.css" rel="stylesheet" type="text/css" />
    <link href="/metrica/dist/assets/libs/huebee/huebee.min.css" rel="stylesheet" type="text/css" />
    <link href="/metrica/dist/assets/libs/vanillajs-datepicker/css/datepicker.min.css" rel="stylesheet"
        type="text/css" />
@endsection

@section('js')
    <script src="/metrica/dist/assets/libs/mobius1-selectr/selectr.min.js"></script>
    <script src="/metrica/dist/assets/libs/huebee/huebee.pkgd.min.js"></script>
    <script src="/metrica/dist/assets/libs/vanillajs-datepicker/js/datepicker-full.min.js"></script>
    <script src="/metrica/dist/assets/js/moment.js"></script>
    <script src="/metrica/dist/assets/libs/imask/imask.min.js"></script>

    <script src="/metrica/dist/assets/js/pages/forms-advanced.js"></script>

    <script>
        new Selectr("#default1");
    </script>
@endsection
