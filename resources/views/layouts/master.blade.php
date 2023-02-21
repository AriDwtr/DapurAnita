<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>


    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <title>Dapur Anita</title>
    <link rel="shortcut icon" href="/dapuranita/logo1.png">
    <!-- Favicon-->
    @yield('css')



    <!-- App css -->
    <link href="/metrica/dist/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/metrica/dist/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/metrica/dist/assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body data-layout="horizontal" class="">
    <!-- leftbar-tab-menu -->

    <!-- Top Bar Start -->
    <div class="topbar">
        <!-- LOGO -->
        <div class="brand">
            <a href="index.html" class="logo">
                <span>
                    <img src="/dapuranita/logo1.png" alt="logo-small" height="55" width="55">
                </span>
                <span>

                </span>
            </a>
        </div>
        <!--end logo-->
        <!-- Navbar -->
        <nav class="navbar-custom">
            @include('layouts.navbar')
        </nav>
        <!-- end navbar-->
    </div>
    <!-- Top Bar End -->



    <!-- end leftbar-tab-menu-->

    <div class="page-wrapper">
        <!-- Page Content-->
        <div class="page-content-tab">
            @yield('content')
        </div>
        <!-- end page content -->
    </div>

    <!--Start Rightbar-->
    <!--Start Rightbar/offcanvas-->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="Appearance" aria-labelledby="AppearanceLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="m-0 font-14" id="AppearanceLabel">Appearance</h5>
            <button type="button" class="btn-close text-reset p-0 m-0 align-self-center" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <h6>Account Settings</h6>
            <div class="p-2 text-start mt-3">
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" id="settings-switch1">
                    <label class="form-check-label" for="settings-switch1">Auto updates</label>
                </div>
                <!--end form-switch-->
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" id="settings-switch2" checked>
                    <label class="form-check-label" for="settings-switch2">Location Permission</label>
                </div>
                <!--end form-switch-->
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="settings-switch3">
                    <label class="form-check-label" for="settings-switch3">Show offline Contacts</label>
                </div>
                <!--end form-switch-->
            </div>
            <!--end /div-->
            <h6>General Settings</h6>
            <div class="p-2 text-start mt-3">
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" id="settings-switch4">
                    <label class="form-check-label" for="settings-switch4">Show me Online</label>
                </div>
                <!--end form-switch-->
                <div class="form-check form-switch mb-2">
                    <input class="form-check-input" type="checkbox" id="settings-switch5" checked>
                    <label class="form-check-label" for="settings-switch5">Status visible to all</label>
                </div>
                <!--end form-switch-->
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="settings-switch6">
                    <label class="form-check-label" for="settings-switch6">Notifications Popup</label>
                </div>
                <!--end form-switch-->
            </div>
            <!--end /div-->
        </div>
        <!--end offcanvas-body-->
    </div>
    <!--end Rightbar/offcanvas-->
    <!--end Rightbar-->

    <!--Start Footer-->
    <!-- Footer Start -->

    {{-- <footer class="footer text-center text-sm-start">
        &copy;
        <script>
            document.write(new Date().getFullYear())
        </script> Metrica <span class="text-muted d-none d-sm-inline-block float-end">Crafted with <i
                class="mdi mdi-heart text-danger"></i> by Dapur Anita</span>
    </footer> --}}
    <!-- end Footer -->
    <!--end footer-->

    <!-- Javascript  -->
    <!-- vendor js -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/metrica/dist/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/metrica/dist/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="/metrica/dist/assets/libs/feather-icons/feather.min.js"></script>
    <!-- App js -->

    @yield('js')

    <script src="/metrica/dist/assets/js/app.js"></script>
</body>

</html>
