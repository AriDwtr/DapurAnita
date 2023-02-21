@extends('admin.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col align-self-center">
                            <h4 class="page-title pb-md-0">Kategori Produk</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Kategori</li>
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
            @if (session('success'))
                <div class="alert alert-success border-0" id="alert" role="alert">
                    {{ session('success') }}
                </div>
            @elseif (session('delete'))
                <div class="alert alert-danger border-0" id="alert" role="alert">
                    {{ session('delete') }}
                </div>
            @endif
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Kategori Baru</h4>
                        <p class="text-muted mb-0">Masukan Kategori baru</p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('kategori.store') }}" method="post" autocomplete="false">
                            @csrf
                            @method('post')
                            <div class="mb-3">
                                <label for="exampleInputEmail1">Kategori</label>
                                <input type="text" name="kategori"
                                    class="form-control @error('kategori')
                                	is-invalid
                                @enderror"
                                    id="exampleInputEmail1" placeholder="Nama Kategori" autocomplete="false">
                                @error('kategori')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1">Kategori</label>
                                <textarea name="deskripsi_kategori"
                                    class="form-control @error('deskirpsi_kategori')
                                    is-invalid
                                @enderror"
                                    id="" cols="20" rows="5" placeholder="Deskripsi Kategori"></textarea>
                                @error('deskirpsi_kategori')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-de-primary">Simpan Kategori</button>
                            <button type="reset" class="btn btn-de-danger">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Kategori</h4>
                        <p class="text-muted mb-0">
                            Daftar Kategori Produk Yang Akan Di Pasarkan
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0 table-centered">
                                <thead>
                                    <tr>
                                        <th>ID Kategori</th>
                                        <th>Nama Kategori</th>
                                        <th>Deskripsi Kategori</th>
                                        <th class="text-end">Edit / Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategori as $data)
                                        <tr>
                                            <td>
                                                <b>#K0-{{ $data->id_kategori }}</b>
                                            <td>{{ Str::title($data->nama_kategori) }}</td>
                                            <td>{{ $data->deskripsi_kategori }}</td>
                                            <td class="text-end">
                                                <div class="dropdown d-inline-block">
                                                    <a class="dropdown-toggle arrow-none" id="dLabel11"
                                                        data-bs-toggle="dropdown" href="#" role="button"
                                                        aria-haspopup="false" aria-expanded="false">
                                                        <i class="las la-ellipsis-v font-20 text-muted"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel11">
                                                        <a class="dropdown-item" href="{{ route('kategori.edit', $data->id_kategori) }}" style="color:darkgoldenrod"><i
                                                            class="ti ti-edit"></i>Edit</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('kategori.destroy', $data->id_kategori) }}"
                                                            style="color:red"
                                                            onclick="event.preventDefault();
                                                        document.getElementById('kategori-form').submit();"><i
                                                                class="ti ti-trash"></i> Hapus</a>
                                                        <form id="kategori-form"
                                                            action="{{ route('kategori.destroy', $data->id_kategori) }}"
                                                            method="POST" class="d-none">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!--end /table-->
                        </div>
                        <div class="d-felx justify-content-center mt-2">
                            {{ $kategori->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
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
