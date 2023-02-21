@extends('admin.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col align-self-center">
                            <h4 class="page-title pb-md-0">Rekening</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Rekening</li>
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
                        <form action="{{ route('rekening.store') }}" method="post" autocomplete="false">
                            @csrf
                            @method('post')
                            <div class="mb-3">
                                <label for="exampleInputEmail1">Nama Pemilik Rekening</label>
                                <input type="text" name="nama_rek"
                                    class="form-control @error('nama_rek')
                                	is-invalid
                                @enderror"
                                    id="exampleInputEmail1" placeholder="Nama Pemilik Rekening" autocomplete="false">
                                @error('nama_rek')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1">Jenis Rekening</label>
                                <select class="form-select" name="jenis_rek" id="exampleFormControlSelect1">
                                    <option value="bni">BNI</option>
                                    <option value="bca">BCA</option>
                                    <option value="bri">BRI</option>
                                    <option value="mandiri">MANDIRI</option>
                                    <option value="bsi">BSI</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1">Nomor Rekening</label>
                                <input type="number" name="nomor_rek"
                                    class="form-control @error('nomor_rek')
                                	is-invalid
                                @enderror"
                                    id="exampleInputEmail1" placeholder="Nomor Rekening" autocomplete="false">
                                @error('nomor_rek')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-de-primary">Simpan Rekening</button>
                            <button type="reset" class="btn btn-de-danger">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Rekening</h4>
                        <p class="text-muted mb-0">
                            Data Rekening Transaksi Produk
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0 table-centered">
                                <thead>
                                    <tr>
                                        <th>ID Rekening</th>
                                        <th>Nama Rekening</th>
                                        <th>Jenis Rekening</th>
                                        <th>Nomor Rekening</th>
                                        <th class="text-end">Edit / Hapus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rekening as $data)
                                        <tr>
                                            <td>
                                                <b>#K0-{{ $data->id_rekening }}</b>
                                            <td>{{ Str::title($data->nama_rek) }}</td>
                                            <td>{{ Str::upper($data->jenis_rekening) }}</td>
                                            <td>{{ $data->no_rek }}</td>
                                            <td class="text-end">
                                                <div class="dropdown d-inline-block">
                                                    <a class="dropdown-toggle arrow-none" id="dLabel11"
                                                        data-bs-toggle="dropdown" href="#" role="button"
                                                        aria-haspopup="false" aria-expanded="false">
                                                        <i class="las la-ellipsis-v font-20 text-muted"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dLabel11">
                                                        <a class="dropdown-item" href="{{ route('rekening.edit', $data->id_rekening) }}" style="color:darkgoldenrod"><i
                                                            class="ti ti-edit"></i>Edit</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('rekening.destroy', $data->id_rekening) }}"
                                                            style="color:red"
                                                            onclick="event.preventDefault();
                                                        document.getElementById('rekening-form').submit();"><i
                                                                class="ti ti-trash"></i> Hapus</a>
                                                        <form id="rekening-form"
                                                            action="{{ route('rekening.destroy', $data->id_rekening) }}"
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
                            {{ $rekening->links('pagination::bootstrap-5') }}
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
