<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path=" assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title') | {{ config('app.name') }}</title>

    <meta name="description" content="" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/LSP-SMKN1.ico') }}" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>


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
                            <img src="{{ asset('storage/logo_sekolah/' . $setting->logo_sekolah) }}" width="50"
                                alt="">
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
                                <div data-i18n="Authentications">Pengaturan Sistem</div>
                            </a>
                        </li>

                        <li class="menu-item">
                            <a href="/" class="menu-link menu-toggle">
                                <i class="menu-icon tf-icons bx bx-box"></i>
                                <div data-i18n="Layouts">Data Master</div>
                            </a>
                            <ul class="menu-sub">
                                <li class="menu-item">
                                    <a href="{{ route('master-sekolah') }}" class="menu-link">
                                        <div data-i18n="Without navbar">Data Sekolah</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('master-jurusan') }}" class="menu-link">
                                        <div data-i18n="Without navbar">Data Jurusan</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a href="{{ route('master-asesor') }}" class="menu-link">
                                        <div data-i18n="Without navbar">Data Asesor</div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif


                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Pages</span>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link">
                            <i class='bx bx-file menu-icon tf-icons'></i>
                            <div data-i18n="Account Settings">Export Presensi</div>
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
                            <a href="{{ $setting->url_web_sekolah }}" target="_blank"
                                class="text-uppercase footer-link fw-bolder">Tim IT {{ $setting->nama_sekolah }}</a>
                        </div>
                        <div class="text-center">
                            <!-- Button trigger modal -->
                            <a class="footer-link me-4" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                href="@copyright">
                                Hak Cipta
                            </a>
                            <a href="https://themeselection.com/" target="_blank"
                                class="footer-link me-4">Bantuan</a>
                            <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                                target="_blank" class="footer-link me-4">Contact</a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hak Cipta Aplikasi
                                                Presensi Siswa SMKN 1 Jakarta</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" style="text-align: justify!important;">
                                            <p class="fw-bolder" style="text-decoration: underline;">Pernyataan Hak
                                                Cipta:</p>
                                            <p>Seluruh hak cipta dari aplikasi Presensi Siswa SMKN 1 Jakarta, termasuk
                                                tetapi tidak terbatas pada desain, kode sumber, grafik, tampilan, dan
                                                dokumentasi yang terkait, adalah milik SMKN 1 Jakarta dan dilindungi
                                                oleh undang-undang hak cipta di
                                                Indonesia dan seluruh dunia.</p>
                                            <p>Tidak ada bagian dari aplikasi ini yang boleh direproduksi,
                                                didistribusikan, atau dipindai ulang dalam bentuk apapun atau dengan
                                                cara apapun tanpa izin tertulis terlebih dahulu dari SMKN 1 Jakarta.</p>
                                            <p>Penggunaan aplikasi Presensi Siswa SMKN 1 Jakarta hanya diizinkan bagi
                                                pengguna yang telah memperoleh izin tertulis dari SMKN 1 Jakarta. Segala
                                                pelanggaran
                                                terhadap hak cipta akan ditindak sesuai dengan hukum yang berlaku.</p>
                                            <p class="fw-bolder" style="text-decoration: underline;">Pernyataan
                                                Penolakan:</p>
                                            <p>Aplikasi Presensi Siswa SMKN 1 Jakarta disediakan "apa adanya" tanpa
                                                jaminan apapun, baik tersurat maupun tersirat, termasuk namun tidak
                                                terbatas pada jaminan untuk tujuan tertentu, tidak ada pelanggaran, atau
                                                ketepatan waktu.</p>
                                            <p>SMKN 1 Jakarta tidak bertanggung
                                                jawab atas kerusakan langsung, tidak langsung, khusus, insidental, atau
                                                konsekuensial yang diakibatkan oleh penggunaan aplikasi ini.</p>
                                            <p>SMKN 1 Jakarta berhak untuk mengubah,
                                                memperbarui, atau menghapus bagian dari aplikasi ini tanpa pemberitahuan
                                                sebelumnya.</p>
                                            <p class="fw-bolder" style="text-decoration: underline;">Pernyataan
                                                Penggunaan:</p>
                                            <p>Aplikasi Presensi Siswa SMKN 1 Jakarta hanya boleh digunakan untuk tujuan
                                                pendidikan dan tidak boleh digunakan untuk tujuan komersial.</p>
                                            <p>Pengguna aplikasi ini harus mematuhi peraturan dan kebijakan SMKN 1
                                                Jakarta terkait penggunaan aplikasi ini.</p>
                                            <p>SMKN 1 Jakarta tidak bertanggung
                                                jawab atas penggunaan aplikasi ini yang melanggar peraturan dan
                                                kebijakan SMKN 1 Jakarta.</p>
                                            <img src="assets/img/qrcode_57389426_772e0f72fe3234b4091428b187cee34c.png"
                                                width="80" alt="">
                                            <hr>
                                            <small>Hak Cipta &copy; 2023 SMKN 1 Jakarta</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
