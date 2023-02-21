@extends('admin.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col align-self-center">
                            <h4 class="page-title pb-md-0">Chat</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Chat</li>
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
            @foreach ($chat as $chat)
                @php
                    $badge = DB::Table('chat')
                        ->where('from_id', $chat->id)
                        ->where('status', 'off read')
                        ->get();
                @endphp
                <div class="col-lg-3">
                    <a href="{{ route('admin.chat_detail', $chat->id) }}">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="media p-3  align-items-center">
                                    @if (!empty($chat->foto_profile))
                                        <img src="/foto_profile/{{ $chat->foto_profile }}" alt="profile-user"
                                            class="rounded-circle thumb-lg" />
                                    @else
                                        <img src="/dapuranita/default.jpg" alt="profile-user"
                                            class="rounded-circle thumb-lg" />
                                    @endif
                                    <div class="media-body ms-3 align-self-center">
                                        <h5 class="m-0">{{ Str::title($chat->name) }}<span
                                                class="badge badge-warning font-10">New</span>
                                        </h5>
                                    </div>
                                    <div class="action-btn">
                                        @if ($badge->count() > 0)
                                            <span class="badge rounded-pill bg-danger float-end">{{ $badge->count() }} Pesan </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                        </div>
                    </a>
                    <!--end card-->
                </div>
            @endforeach
        </div>
    @endsection
