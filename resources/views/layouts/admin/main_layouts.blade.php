<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path=" assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href=" assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href=" assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href=" assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href=" assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href=" assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href=" assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href=" assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src=" assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src=" assets/js/config.js"></script>

    <style>
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #fff;
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .preloader img {
            width: 400px;
            height: 300px;
        }

        .hide-preloader {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.5s, visibility 0.5s;
        }
    </style>
</head>

<body>
    <div class="preloader">
        <img src="https://vafloc01.s3.amazonaws.com/WBStatic/site1102601/dist/img/loader.gif" alt="LOADING">
    </div>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="mb-2 app-brand demo">
                    <a href="{{ $setting->url_web_sekolah }}" target="blank" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="{{ $setting->logo_sekolah }}" width="50" alt="">
                        </span>
                        <span class="app-brand-text menu-text fw-bolder ms-2 text-uppercase">
                            {{ $setting->nama_sekolah }}
                        </span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="align-middle bx bx-chevron-left bx-sm"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="py-1 menu-inner">
                    <!-- Dashboard -->
                    <li class="menu-item active">
                        <a href="{{ route('dashboard') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>

                    <!-- Layouts -->
                    <!-- Check jika user memiliki role sebagai Admin -->
                    @if ($role == 'Administrator')
                        <li class="menu-item">
                            <a href="{{ route('settings') }}" class="menu-link">
                                <i class='bx bx-cog menu-icon tf-icons'></i>
                                <div data-i18n="Authentications">Pengaturan Website</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="/" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-box"></i>
                                <div data-i18n="Layouts">Data Master</div>
                            </a>

                            <ul class="menu-sub">
                                <li class="menu-item">
                                    <a href="{{ route('master-kelas') }}" class="menu-link">
                                        <div data-i18n="Without menu">Data Kelas</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('master-jurusan') }}" class="menu-link">
                                        <div data-i18n="Without navbar">Data Jurusan</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('master-user') }}" class="menu-link">
                                        <div data-i18n="Container">Data Ketua Kelas</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('master-wk') }}" class="menu-link">
                                        <div data-i18n="Fluid">Data Wali Kelas</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="layouts-blank.html" class="menu-link">
                                        <div data-i18n="Blank">Data</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif


                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Pages</span>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div data-i18n="Account Settings">Account Settings</div>
                        </a>

                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                            <div data-i18n="Authentications">Authentications</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="auth-login-basic.html" class="menu-link" target="_blank">
                                    <div data-i18n="Basic">Login</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="auth-register-basic.html" class="menu-link" target="_blank">
                                    <div data-i18n="Basic">Register</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="auth-forgot-password-basic.html" class="menu-link" target="_blank">
                                    <div data-i18n="Basic">Forgot Password</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                            <div data-i18n="Misc">Misc</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="pages-misc-error.html" class="menu-link">
                                    <div data-i18n="Error">Error</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="pages-misc-under-maintenance.html" class="menu-link">
                                    <div data-i18n="Under Maintenance">Under Maintenance</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- Misc -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Misc</span></li>
                    <li class="menu-item">
                        <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                            target="_blank" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-support"></i>
                            <div data-i18n="Support">Support</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                            target="_blank" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-file"></i>
                            <div data-i18n="Documentation">Documentation</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="px-0 nav-item nav-link me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class='bx bx-time-five'></i> &nbsp; <span
                                    class="fw-bold">{{ now()->isoFormat('dddd, D MMMM Y') }}</span>
                            </div>
                        </div>
                        <!-- /Search -->

                        <ul class="flex-row navbar-nav align-items-center ms-auto">

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img class="img-fluid rounded-circle object-fit-cover"
                                            src="{{ Auth::user()->profile_photo_url }}"
                                            alt="{{ Auth::user()->name }}" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img class="object-cover w-8 h-8 rounded-full"
                                                            src="{{ Auth::user()->profile_photo_url }}"
                                                            alt="{{ Auth::user()->name }}" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">{{ Auth::user()->name }}</span>
                                                    <small class="text-muted">{{ $role }}</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('profile.show') }}">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('settings') }}">
                                            <i class="bx bx-cog me-2"></i>
                                            <span class="align-middle">Pengaturan Website</span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <form method="POST" name="logout" action="{{ route('logout') }}">
                                            @csrf
                                            <button class="dropdown-item" onclick="logout()"> <i
                                                    class="bx bx-power-off me-2"></i><span class="align-middle">Log
                                                    Out</span></button>

                                            <script>
                                                function logout() => {
                                                    document.logout.submit();
                                                }
                                            </script>
                                        </form>
                                        {{-- <a class="dropdown-item" href="{{ route('logout') }}">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a> --}}
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->


                @yield('content')


                <!-- Footer -->
                <hr>
                <footer class="mb-3 content-footer footer bg-footer-theme">
                    <div class="flex-wrap py-2 container-xxl d-flex justify-content-between flex-md-row flex-column">
                        <div class="mb-2 text-center mb-md-0">
                            © {{ now()->year }} , by
                            <a href="https://themeselection.com" target="_blank"
                                class="text-uppercase footer-link fw-bolder">Tim IT {{ $setting->nama_sekolah }}</a>
                        </div>
                        <div class="text-center">
                            <a href="https://themeselection.com/license/" class="footer-link me-4"
                                target="_blank">Hak Cipta</a>
                            <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">Help</a>
                            <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/" target="_blank" class="footer-link me-4">Contact</a>
                        </div>
                    </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src=" assets/vendor/libs/jquery/jquery.js"></script>
    <script src=" assets/vendor/libs/popper/popper.js"></script>
    <script src=" assets/vendor/js/bootstrap.js"></script>
    <script src=" assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src=" assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src=" assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src=" assets/js/main.js"></script>

    <!-- Page JS -->
    <script src=" assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script>
        // Hapus preloader setelah selesai memuat halaman
        setTimeout(function() {
            const preloader = document.querySelector('.preloader');
            preloader.classList.add('hide-preloader');
        }, 500);
    </script>
</body>

</html>
