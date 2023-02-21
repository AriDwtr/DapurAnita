@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="row">
                        <div class="col align-self-center">
                            <h4 class="page-title pb-md-0">Produk</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Produk</li>
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
            <div class="col-12">
                @if (session('gagal'))
                    <div class="alert alert-danger border-0" role="alert">
                        {{ session('gagal') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 align-self-center">
                                <img src="/produk/{{ $produk->foto_produk }}" alt="" class="mx-auto  d-block"
                                    height="400" width="100%">

                            </div>
                            <!--end col-->
                            <div class="col-lg-6 align-self-center">
                                <div class="">
                                    <span
                                        class="badge badge-soft-warning font-13 fw-semibold mb-2">{{ Str::title($produk->nama_kategori) }}</span>
                                    <h5 class="font-24 mb-0">{{ Str::title($produk->nama_produk) }}</h5>
                                    {{-- <ul class="list-inline mb-2">
                                        <li class="list-inline-item me-0"><i class="mdi mdi-star text-warning font-16"></i>
                                        </li>
                                        <li class="list-inline-item me-0"><i class="mdi mdi-star text-warning font-16"></i>
                                        </li>
                                        <li class="list-inline-item me-0"><i class="mdi mdi-star text-warning font-16"></i>
                                        </li>
                                        <li class="list-inline-item me-0"><i class="mdi mdi-star text-warning font-16"></i>
                                        </li>
                                        <li class="list-inline-item"><i class="mdi mdi-star text-warning font-16"></i>
                                        </li>
                                        <li class="list-inline-item">5.0 (9830 reviews)</li>
                                    </ul> --}}
                                    <h6 class="font-20 fw-bold">{{ rupiah($produk->harga_produk) }}
                                        {{-- <span class="font-14 text-muted fw-semibold"><del>$180.00</del></span>
                                        <span class="text-danger font-14 fw-semibold ms-2">50% Off</span> --}}
                                    </h6>
                                    <h6 class="font-13">Deskripsi :</h6>
                                    <p class="text-muted">
                                        @php
                                            echo htmlspecialchars_decode($produk->deskripsi_produk);
                                        @endphp
                                    </p>
                                    <h6 class="font-13">Sekilas Info :</h6>
                                    <ul class="list-unstyled border-0">
                                        <li class="mb-2"><i class="las la-check-circle text-success me-1"></i>Pesanan Akan
                                            Langsung Di buat
                                            apabila ada pesanan</li>
                                        <li class="mb-2"><i class="las la-check-circle text-success me-1"></i>Pembuatan
                                            Pesanan Berdasarkan
                                            First Order First Serve</li>
                                        <li><i class="las la-check-circle text-success me-1"></i>Jaminan Kualitas Bahan dan
                                            Proses Pembuatan</li>
                                    </ul>
                                    {{-- <h3 class="font-14 text-primary">Stok : {{ $produk->stok }} Pcs (Tersedia)</h3> --}}
                                    <div class="mt-3">
                                        <input class="form-control form-control d-inline-block" style="width:100px;"
                                            type="number" name="quantity" min="1" value="1"
                                            id="example-number-input">
                                        <input type="text" name="id_produk" id=""
                                            value="{{ $produk->id_produk }}" hidden>
                                        <button type="button" class="btn btn-de-primary btn px-4 d-inline-block"
                                            onclick="executeExample('error')"><i class="mdi mdi-cart me-2"></i>Masukan
                                            Keranjang</button>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>

        {{-- <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <i class="mdi mdi-truck-fast text-success font-30"></i>
                        <h4 class="header-title">Fast Delivery</h4>
                        <p class="text-muted mb-0">
                            Pengiriman Menggunakan Biro Jasa Terpecaya Yaitu JNE
                        </p>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <i class="mdi mdi-refresh text-danger font-30"></i>
                        <h4 class="header-title">Returns in 30 Days</h4>
                        <p class="text-muted mb-0">
                            Jaminan Uang Kembali Apa Bila Barang Tidak Sampai
                        </p>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <i class="mdi mdi-headset text-warning font-30"></i>
                        <h4 class="header-title">Online Support 24/7</h4>
                        <p class="text-muted mb-0">
                            Customer Support Dapur Anita Siap Melayani Pada Jam Kerja 08.00 - 16.00.
                        </p>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <i class="mdi mdi-wallet text-purple font-30"></i>
                        <h4 class="header-title">Secure Payment</h4>
                        <p class="text-muted mb-0">
                            Pembayaran Aman Menggunakan Sistem Transfer Pembayaran Bank Konvensional
                        </p>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div> --}}
        <h4>Komentar Teratas</h4>
        <div class="row">
            @foreach ( $komentar as $komentar)
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="media">
                                    <img class="d-flex align-self-center me-3 rounded-circle"
                                        src="assets/images/small/opp-1.png" alt="" height="50">
                                    <div class="media-body align-self-center">
                                        <h4 class="mt-0 mb-1 font-15">{{ Str::upper($komentar->name) }}</h4>
                                        <p class="text-mute">{{ $komentar->komentar_produk }}</p>
                                    </div>
                                    <!--end media-body-->
                                </div>
                                <!--end media-->
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                    <!--end card-body-->
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>
@endsection

@section('css')
    <link href="/metrica/dist/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
    <link href="/metrica/dist/assets/libs/animate.css/animate.min.css" rel="stylesheet" type="text/css">
@endsection

@section('js')
    <script src="/metrica/dist/assets/libs/sweetalert2/sweetalert2.min.js"></script>
    {{-- <script src="/metrica/dist/assets/js/pages/sweet-alert.init.js"></script> --}}
    <script>
        function executeExample(e) {
            switch (e) {
                case "basicMessage":
                    return void Swal.fire("Any fool can use a computer");
                case "titleText":
                    return void Swal.fire("The Internet?", "That thing is still around?", "question");
                case "errorType":
                    return void Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                        footer: "<a href>Why do I have this issue?</a>"
                    });
                case "customHtml":
                    return void Swal.fire({
                        title: "<strong>HTML <u>example</u></strong>",
                        icon: "info",
                        html: 'You can use <b>bold text</b>, <a href="//sweetalert2.github.io">links</a> and other HTML tags',
                        showCloseButton: !0,
                        showCancelButton: !0,
                        focusConfirm: !1,
                        confirmButtonText: '<i class="fa fa-thumbs-up"></i> Great!',
                        confirmButtonAriaLabel: "Thumbs up, great!",
                        cancelButtonText: '<i class="fa fa-thumbs-down"></i>',
                        cancelButtonAriaLabel: "Thumbs down"
                    });
                case "threeButtons":
                    return void Swal.fire({
                        title: "Do you want to save the changes?",
                        showDenyButton: !0,
                        showCancelButton: !0,
                        confirmButtonText: "Save",
                        denyButtonText: "Don't save"
                    }).then(e => {
                        e.isConfirmed ? Swal.fire("Saved!", "", "success") : e.isDenied && Swal.fire(
                            "Changes are not saved", "", "info")
                    });
                case "customPosition":
                    return void Swal.fire({
                        position: "top-end",
                        icon: "success",
                        title: "Your work has been saved",
                        showConfirmButton: !1,
                        timer: 1500
                    });
                case "customAnimation":
                    return void Swal.fire({
                        title: "Custom animation with Animate.css",
                        showClass: {
                            popup: "animate__animated animate__fadeInDown"
                        },
                        hideClass: {
                            popup: "animate__animated animate__fadeOutUp"
                        }
                    });
                case "warningConfirm":
                    return void Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: !0,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                    }).then(function(e) {
                        e.isConfirmed && Swal.fire("Deleted!", "Your file has been deleted.", "success")
                    });
                case "handleDismiss":
                    const i = Swal.mixin({
                        customClass: {
                            confirmButton: "btn btn-success",
                            cancelButton: "btn btn-danger me-2"
                        },
                        buttonsStyling: !1
                    });
                    return void i.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: !0,
                        confirmButtonText: "Yes, delete it!",
                        cancelButtonText: "No, cancel!",
                        reverseButtons: !0
                    }).then(e => {
                        e.isConfirmed ? i.fire("Deleted!", "Your file has been deleted.", "success") : e.dismiss ===
                            Swal.DismissReason.cancel && i.fire("Cancelled", "Your imaginary file is safe :)",
                                "error")
                    });
                case "customImage":
                    return void Swal.fire({
                        title: "Metrica!",
                        text: "Modal with a Brand Logo.",
                        imageUrl: "assets/images/logo-sm.png",
                        imageWidth: 80,
                        imageHeight: 80,
                        imageAlt: "Custom image"
                    });
                case "customWidth":
                    return void Swal.fire({
                        title: "Custom width, padding, background.",
                        width: 600,
                        padding: 50,
                        background: "rgba(254,254,254,1) url(assets/images/pattern.png)"
                    });
                case "timer":
                    let t;
                    return void Swal.fire({
                        title: "Auto close alert!",
                        html: "I will close in <b></b> milliseconds.",
                        timer: 2e3,
                        timerProgressBar: !0,
                        didOpen: () => {
                            Swal.showLoading();
                            const e = Swal.getHtmlContainer().querySelector("b");
                            t = setInterval(() => {
                                e.textContent = Swal.getTimerLeft()
                            }, 100)
                        },
                        willClose: () => {
                            clearInterval(t)
                        }
                    }).then(e => {
                        e.dismiss === Swal.DismissReason.timer && console.log("I was closed by the timer")
                    });
                case "rtl":
                    return void Swal.fire({
                        title: "هل تريد الاستمرار؟",
                        icon: "question",
                        iconHtml: "؟",
                        confirmButtonText: "نعم",
                        cancelButtonText: "لا",
                        showCancelButton: !0,
                        showCloseButton: !0
                    });
                case "ajaxRequest":
                    return void Swal.fire({
                        title: "Submit your Github username",
                        input: "text",
                        inputAttributes: {
                            autocapitalize: "off"
                        },
                        showCancelButton: !0,
                        confirmButtonText: "Look up",
                        showLoaderOnConfirm: !0,
                        preConfirm: e => fetch("//api.github.com/users/" + e).then(e => {
                            if (e.ok) return e.json();
                            throw new Error(e.statusText)
                        }).catch(e => {
                            Swal.showValidationMessage("Request failed: " + e)
                        }),
                        allowOutsideClick: () => !Swal.isLoading()
                    }).then(e => {
                        e.isConfirmed && Swal.fire({
                            title: e.value.login + "'s avatar",
                            imageUrl: e.value.avatar_url
                        })
                    });
                case "chainingModals":
                    return void Swal.mixin({
                        input: "text",
                        confirmButtonText: "Next &rarr;",
                        showCancelButton: !0,
                        progressSteps: ["1", "2", "3"]
                    }).queue([{
                        title: "Question 1",
                        text: "Chaining swal2 modals is easy"
                    }, "Question 2", "Question 3"]).then(e => {
                        e.value && (e = JSON.stringify(e.value), Swal.fire({
                            title: "All done!",
                            html: `
                  Your answers:
                  <pre><code>${e}</code></pre>
                `,
                            confirmButtonText: "Lovely!"
                        }))
                    });
                case "dynamicQueue":
                    return void Swal.queue([{
                        title: "Your public IP",
                        confirmButtonText: "Show my public IP",
                        text: "Your public IP will be received via AJAX request",
                        showLoaderOnConfirm: !0,
                        preConfirm: () => fetch("//api.ipify.org?format=json").then(e => e.json()).then(e =>
                            Swal.insertQueueStep(e.ip)).catch(() => {
                            Swal.insertQueueStep({
                                icon: "error",
                                title: "Unable to get your public IP"
                            })
                        })
                    }]);
                case "mixin":
                    const o = Swal.mixin({
                        toast: !0,
                        position: "top-end",
                        showConfirmButton: !1,
                        timer: 3e3,
                        timerProgressBar: !0,
                        didOpen: e => {
                            e.addEventListener("mouseenter", Swal.stopTimer), e.addEventListener("mouseleave",
                                Swal.resumeTimer)
                        }
                    });
                    return void o.fire({
                        icon: "success",
                        title: "Signed in successfully"
                    });
                case "declarativeTemplate":
                    return void Swal.fire({
                        template: "#my-template"
                    });
                case "TriggerModalToast":
                    return Swal.bindClickHandler(), void Swal.mixin({
                        toast: !0
                    }).bindClickHandler("data-swal-toast-template");
                case "success":
                    return void Swal.fire({
                        icon: "success",
                        title: "Your work has been saved",
                        timer: 1500
                    });
                case "error":
                    return void Swal.fire({
                        icon: "error",
                        title: "Maaf",
                        text: "Untuk Melakukan Pemesanan Wajib Login!"
                    });
                case "warning":
                    return void Swal.fire({
                        icon: "warning",
                        title: "Oops...",
                        text: "Icon warning!"
                    });
                case "info":
                    return void Swal.fire({
                        icon: "info",
                        title: "Oops...",
                        text: "Icon Info!"
                    });
                case "question":
                    return void Swal.fire({
                        icon: "question",
                        title: "Oops...",
                        text: "Icon question!"
                    })
            }
        }
    </script>
@endsection
