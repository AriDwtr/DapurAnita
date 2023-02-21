@extends('customer.layout.master')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col align-self-center">
                            <h4 class="page-title pb-md-0">Foto Profil</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
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
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="met-profile">
                            <div class="row">
                                <div class="col-lg-4 align-self-center mb-3 mb-lg-0">
                                    <div class="met-profile-main">
                                        <div class="met-profile-main-pic">
                                            @if (!empty(Auth::user()->foto_profile))
                                                <img src="/foto_profile/{{ Auth::user()->foto_profile }}" alt=""
                                                    height="110" class="rounded-circle">
                                            @else
                                                <img src="/dapuranita/default.jpg" alt="" height="110"
                                                    class="rounded-circle">
                                            @endif
                                            <span class="met-profile_main-pic-change">
                                                <a data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                                                    <i class="fas fa-camera"></i>
                                                </a>
                                            </span>
                                        </div>
                                        <div class="met-profile_user-detail">
                                            <h5 class="met-user-name">{{ Str::Title(Auth::user()->name) }}</h5>
                                            <p class="mb-0 met-user-name-post">{{ Str::upper(Auth::user()->type) }}</p>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->

                                <div class="col-lg-4 ms-auto align-self-center">
                                    <ul class="list-unstyled personal-detail mb-0">
                                        <li class=""><i
                                                class="las la-phone mr-2 text-secondary font-22 align-middle"></i> <b> Telp
                                            </b> : {{ Auth::user()->hp }}</li>
                                        <li class="mt-2"><i
                                                class="las la-envelope text-secondary font-22 align-middle mr-2"></i> <b>
                                                Email </b> : {{ Auth::user()->email }}</li>
                                    </ul>

                                </div>
                                <!--end col-->
                                <div class="col-lg-4 align-self-center">
                                    <div class="row">
                                    </div>
                                    <!--end row-->
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </div>
                        <!--end f_profile-->
                    </div>
                    <!--end card-body-->
                    <div class="card-body p-0">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#Settings" role="tab"
                                    aria-selected="true">Settings</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane p-3 active" id="Settings" role="tabpanel">
                                <div class="row">
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h4 class="card-title">Personal Information</h4>
                                                    </div>
                                                    <!--end col-->
                                                </div>
                                                <!--end row-->
                                            </div>
                                            <!--end card-header-->
                                            <div class="card-body">
                                                <form action="{{ route('customer.profile_data_update', Auth::user()->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="form-group mb-3 row">
                                                        <label
                                                            class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Nama
                                                            Lengkap</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input
                                                                class="form-control @error('nama')
                                                            is-invalid
                                                        @enderror"
                                                                name="nama" type="text"
                                                                value="{{ Auth::user()->name }}">
                                                            @error('nama')
                                                                <span class="invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label
                                                            class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Nomor
                                                            Telp</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class="las la-phone"></i></span>
                                                                <input type="number"
                                                                    class="form-control @error('telp')
                                                                is-invalid
                                                            @enderror"
                                                                    name="telp" value="{{ Auth::user()->hp }}"
                                                                    placeholder="Phone" aria-describedby="basic-addon1">
                                                                @error('telp')
                                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label
                                                            class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Email
                                                            Address</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <div class="input-group">
                                                                <span class="input-group-text"><i
                                                                        class="las la-at"></i></span>
                                                                <input type="email" name="email"
                                                                    class="form-control  @error('email')
                                                                is-invalid
                                                            @enderror"
                                                                    value="{{ Auth::user()->email }}" placeholder="Email"
                                                                    aria-describedby="basic-addon1">
                                                                @error('email')
                                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <div class="col-lg-9 col-xl-8 offset-lg-3">
                                                            <button type="submit" class="btn btn-de-primary">Perbaharui
                                                                Profil</button>
                                                            <button type="button"
                                                                class="btn btn-de-danger">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6 col-xl-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title">Ubah Password</h4>
                                            </div>
                                            <!--end card-header-->
                                            <div class="card-body">
                                                <form
                                                    action="{{ route('customer.profile_password_update', Auth::user()->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="form-group mb-3 row">
                                                        <label
                                                            class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">
                                                            Password Baru</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input
                                                                class="form-control  @error('password')
                                                        is-invalid
                                                    @enderror"
                                                                type="password" placeholder="New Password"
                                                                name="password">
                                                            @error('password')
                                                                <span class="invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <label
                                                            class="col-xl-3 col-lg-3 text-end mb-lg-0 align-self-center form-label">Tulis
                                                            Ulang
                                                            Password</label>
                                                        <div class="col-lg-9 col-xl-8">
                                                            <input
                                                                class="form-control  @error('repassword')
                                                        is-invalid
                                                    @enderror"
                                                                type="password" placeholder="Re-Password"
                                                                name="repassword">
                                                            @error('repassword')
                                                                <span class="invalid-feedback">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3 row">
                                                        <div class="col-lg-9 col-xl-8 offset-lg-3">
                                                            <button type="submit" class="btn btn-de-primary">Ubah
                                                                Password</button>
                                                            <button type="button"
                                                                class="btn btn-de-danger">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--end card-body-->
                                        </div>
                                        <!--end card-->
                                    </div> <!-- end col -->
                                </div>
                                <!--end row-->
                            </div>
                        </div>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        <!-- end page title end breadcrumb -->
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h6 class="modal-title m-0" id="exampleModalCenterTitle">Center Modal</h6>
                    <button type="button" style="background-color: white" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <!--end modal-header-->
                <form action="{{ route('admin.profile_foto_update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-3 text-center align-self-center">
                            @if (!empty(Auth::user()->foto_profile))
                            <img id="output1" src="/foto_profile/{{ Auth::user()->foto_profile }}" class="img-fluid" />
                            @else
                            <img id="output1" src="/dapuranita/default.jpg" class="img-fluid" />
                            @endif
                        </div>
                        <!--end col-->
                        <div class="col-lg-9">
                            <h5>Upload Foto Profile</h5>
                            <input type="file" name="img1" class="form-control" accept="image/*" id="imgInp1">
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end modal-body-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-de-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-de-primary btn-sm">Simpan dan Ubah Foto Profil</button>
                </div>
                </form>
                <!--end modal-footer-->
            </div>
            <!--end modal-content-->
        </div>
        <!--end modal-dialog-->
    </div>
@endsection

@section('js')
    <script>
        imgInp1.onchange = evt => {
            const [file] = imgInp1.files
            if (file) {
                output1.src = URL.createObjectURL(file)
            }
        }

        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $(this).remove();
            });
        }, 2500);
    </script>
@endsection
