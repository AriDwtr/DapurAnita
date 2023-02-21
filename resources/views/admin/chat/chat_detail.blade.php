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
            <div class="col-12">
                <div class="chat-box-left">
                    <ul class="nav nav-tabs mb-3 nav-justified" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active"id="general_chat_tab" data-bs-toggle="tab" href="#general_chat"
                                role="tab">General</a>
                        </li>
                    </ul>
                    <!--end chat-search-->

                    <div class="chat-body-left" data-simplebar>
                        <div class="tab-content chat-list" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="general_chat">
                                @foreach ($chat as $chat)
                                    @php
                                        $badge = DB::Table('chat')
                                            ->where('from_id', $chat->id)
                                            ->where('status', 'off read')
                                            ->get();
                                    @endphp
                                    <a href="{{ route('admin.chat_detail', $chat->id) }}" class="media new-message">
                                        <div class="media-left">
                                            @if ($chat->foto_profile == null)
                                                <img src="/dapuranita/default.jpg" alt="profile-user"
                                                    class="rounded-circle thumb-md" />
                                            @else
                                                <img src="/foto_profile/{{ $chat->foto_profile }}" alt="profile-user"
                                                    class="rounded-circle thumb-md" />
                                            @endif
                                        </div><!-- media-left -->
                                        <div class="media-body">
                                            <div class="d-inline-block">
                                                <h6>{{ Str::title($chat->name) }}</h6>
                                                @if ($badge->count() > 0)
                                                    <p><span class="badge bg-danger">{{ $badge->count() }} Pesan </span></p>
                                                @endif
                                            </div>
                                        </div><!-- end media-body -->
                                    </a>
                                @endforeach
                                <!--end media-->
                            </div>
                        </div>
                        <!--end tab-content-->
                    </div>
                </div>
                <!--end chat-box-left -->

                <div class="chat-box-right">
                    <div class="chat-header">
                        <a href="" class="media">
                            <div class="media-left">
                                @if ($nama_user->foto_profile == null)
                                    <img src="/dapuranita/default.jpg" alt="user" class="rounded-circle thumb-sm">
                                @else
                                    <img src="/foto_profile/{{ $nama_user->foto_profile }}" alt="user"
                                        class="rounded-circle thumb-sm">
                                @endif
                            </div><!-- media-left -->
                            <div class="media-body">
                                <div>
                                    <h6 class="m-0">{{ Str::title($nama_user->name) }}</h6>
                                </div>
                            </div><!-- end media-body -->
                        </a>
                        <!--end media-->
                        <!-- end chat-features -->
                    </div><!-- end chat-header -->
                    <div class="chat-body" data-simplebar>
                        <div class="chat-detail">
                            @foreach ($pesan as $pesan)
                                <div class="media">
                                    @if ($pesan->from_id == Auth::user()->id)

                                    @else
                                        @if ($pesan->foto_profile == NULL)
                                        <div class="media-img">
                                            <img src="/dapuranita/default.jpg" alt="user" class="rounded-circle thumb-sm">
                                        </div>
                                        @else
                                        <div class="media-img">
                                            <img src="/foto_profile/{{ $pesan->foto_profile }}" alt="user" class="rounded-circle thumb-sm">
                                        </div>
                                        @endif
                                    @endif
                                    <div class="media-body {{ $pesan->from_id == Auth::user()->id ? 'reverse' : '' }}">
                                        <div class="chat-msg">
                                            <p>{{ $pesan->pesan }}</p>
                                        </div>
                                        @if ($pesan->from_id == Auth::user()->id)
                                            <div class=""></div>
                                        @else
                                            <div class="chat-time">{{ $pesan->created_at }}</div>
                                        @endif
                                    </div>
                                    <!--end media-body-->
                                </div>
                            @endforeach
                            <!--end media-->

                            {{-- <div class="media">
                                <div class="media-body reverse">
                                    <div class="chat-msg">
                                        <p>Good Morning !</p>
                                    </div>
                                    <div class="chat-msg">
                                        <p>There are many variations of passages of Lorem Ipsum available.</p>
                                    </div>
                                </div>
                                <!--end media-body-->
                                <div class="media-img">
                                    <img src="assets/images/users/user-8.jpg" alt="user"
                                        class="rounded-circle thumb-sm">
                                </div>
                            </div> --}}
                        </div> <!-- end chat-detail -->
                    </div><!-- end chat-body -->
                    <div class="chat-footer">
                        <form action="{{ route('admin.post_chat') }}" method="post">
                            @csrf
                            @method('post')
                            <div class="row">
                                <div class="col-12 col-md-9">
                                    <span class="chat-admin">
                                        @if (!empty(Auth::user()->foto_profile))
                                            <img src="/foto_profile/{{ Auth::user()->foto_profile }}" alt="profile-user"
                                                class="rounded-circle thumb-sm" />
                                        @else
                                            <img src="/dapuranita/default.jpg" alt="profile-user"
                                                class="rounded-circle thumb-sm" />
                                        @endif
                                    </span>
                                    <input type="text" name="id_from" class="form-control chat-input"
                                                    placeholder="" value="{{ $id }}" hidden>
                                    <input type="text" name="pesan" class="form-control"
                                        placeholder="Type something here..." required>
                                </div><!-- col-8 -->
                                <div class="col-3 text-end">
                                    <div class="d-none d-sm-inline-block chat-features">
                                        <button type="submit" class="btn btn-outline-primary"><i class="ti ti-send"></i>
                                            Kirim Pesan</button>
                                    </div>
                                </div><!-- end col -->
                            </div>
                        </form><!-- end row -->
                    </div><!-- end chat-footer -->
                </div>
                <!--end chat-box-right -->
            </div> <!-- end col -->
        </div>
    </div>
@endsection
