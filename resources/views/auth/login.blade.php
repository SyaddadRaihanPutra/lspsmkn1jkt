<x-guest-layout>
    <!DOCTYPE html>

    <html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
        data-assets-path="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/"
        data-base-url="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo-1"
        data-framework="laravel" data-template="blank-menu-theme-default-light">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport"
            content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

        <title>Login | LSP SMKN 1 Jakarta</title>
        <meta name="description"
            content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon/LSP-SMKN1.ico" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href=" assets/vendor/fonts/boxicons.css" />
        <link rel="stylesheet"
            href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/fonts/fontawesome.css?id=89157e39c524ff7f679d3aebf872b7b9" />
        <link rel="stylesheet"
            href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/fonts/flag-icons.css?id=403b97c176f3cdf56a3cbf09107ee240" />
        <link rel="stylesheet"
            href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/core.css?id=f1cefeba0c68d327230d2f6538f276fa"
            class="template-customizer-core-css" />
        <link rel="stylesheet"
            href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-default.css?id=cc3d4ef91c8c858754d8ed20c78a3a3c"
            class="template-customizer-theme-css" />
        <link rel="stylesheet"
            href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/css/demo.css?id=24b55ca26d6f2bafc5a21ff5a4bcdfb3" />
        <link rel="stylesheet"
            href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css?id=d9fa6469688548dca3b7e6bd32cb0dc6" />
        <link rel="stylesheet"
            href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/typeahead-js/typeahead.css?id=8fc311b79b2aeabf94b343b6337656cf" />
        <link rel="stylesheet"
            href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/pages/page-auth.css">
        <script
            src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/js/helpers.js">
        </script>
        <script
            src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/js/template-customizer.js">
        </script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Baumans&display=swap');

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
        <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/js/config.js">
        </script>
    </head>

    <body>
        <div class="preloader">
            <img src="https://vafloc01.s3.amazonaws.com/WBStatic/site1102601/dist/img/loader.gif" alt="LOADING">
        </div>
        <!-- Content -->
        <div class="authentication-wrapper authentication-cover">
            <div class="m-0 authentication-inner row">
                <!-- Login -->
                <div class="p-4 d-flex col-12 col-lg-12 col-xl-12 align-items-center authentication-bg p-sm-5"
                    style="background-image: url('https://shuffle.dev/vendor/shuffle/img/pattern-generator/background-pattern.png');">
                    <div class="p-4 mx-auto shadow-lg w-px-400 card rounded-5">
                        <!-- Logo -->
                        <div class="gap-3 mb-4 app-brand d-flex align-items-center justify-content-center">
                            <a href="{{ $setting->url_sekolah }}" class="gap-2 app-brand-link">
                                <img src="{{ asset('storage/logo_sekolah/' . $setting->logo_sekolah) }}"
                                    class="img-fluid" width="45" alt="">
                            </a>

                            <a href="https://bnsp.go.id/" target="_blank">
                                <img src="{{ asset('assets/img/logo-bnsp.svg') }}" width="100" alt="">
                            </a>
                        </div>
                        <p class="text-center text-uppercase text-body fw-bolder fs-3"
                            style="font-family: 'Baumans', cursive; letter-spacing: .1rem;">LSP SMKN 1 JAKARTA</p>
                        <!-- /Logo -->
                        <p class="mb-4 text-center">
                            Login untuk melanjutkan ke sistem informasi
                        </p>
                        <x-validation-errors class="mb-4" />
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Selamat!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <x-input id="email" class="block w-full mt-1 form-control" type="email"
                                    name="email" :value="old('email')" required autofocus autocomplete="username"
                                    placeholder="budi@lsp.smkn1jakarta.sch.id" />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                    @if (Route::has('password.request'))
                                        <a class="text-sm text-gray-600 rounded-md hover:text-gray-900"
                                            href="{{ route('password.request') }}">
                                            {{ __('Lupa kata sandi?') }}
                                        </a>
                                    @endif
                                </div>
                                <div class="input-group input-group-merge">
                                    <x-input id="password" class="block w-full form-control" type="password"
                                        name="password" required autocomplete="current-password"
                                        placeholder="*******" />
                                    <span class="shadow-sm cursor-pointer input-group-text"><i
                                            class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <x-button class="btn btn-primary d-grid w-100">
                                {{ __('Masuk') }}
                            </x-button>
                        </form>
                        <hr>

                        <a href="{{ route('register-asesor') }}" class="btn btn-warning d-grid"><span><i
                                    class='bx bx-user-voice'></i> REGISTRASI SEBAGAI ASESOR</span></a>
                        <a href="{{ route('register') }}" class="mt-3 btn btn-success d-grid"><span><i
                                    class='bx bx-user-pin'></i> REGISTRASI SEBAGAI ASESI</span></a>

                        <div class="mt-5 text-center">
                            <small>&copy; {{ now()->year }} | Hak Cipta TIM IT {{ $setting->nama_sekolah }}</small>
                            <small>
                                <p>Application Version 1.0 <span class="rounded-pill badge bg-danger">BETA_VERSION</span></p>
                            </small>
                        </div>
                    </div>
                </div>
                <script
                    src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/jquery/jquery.js?id=08d304be7f95879ae643fabf15fb255a">
                </script>
                <script
                    src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/popper/popper.js?id=70485ad9be8ba3e426172708feb35181">
                </script>
                <script
                    src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/js/bootstrap.js?id=3cb2c653a33d885b40641d15713e3994">
                </script>
                <script
                    src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js?id=44b8e955848dc0c56597c09f6aebf89a">
                </script>
                <script
                    src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/hammer/hammer.js?id=5c0a4017d0ce861e87a50c0c1401eb81">
                </script>
                <script
                    src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/typeahead-js/typeahead.js?id=f6bda588c16867a6cc4158cb4ed37ec6">
                </script>
                <script
                    src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/js/menu.js?id=03d9787739b295480194ce0a121ae550">
                </script>
                <script
                    src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js">
                </script>
                <script
                    src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/js/main.js?id=e0aeed34a47c1efb009b120245cce82e">
                </script>
                <!-- END: Page JS-->
                <script>
                    // Hapus preloader setelah selesai memuat halaman
                    setTimeout(function() {
                        const preloader = document.querySelector('.preloader');
                        preloader.classList.add('hide-preloader');
                    }, 500);
                </script>
    </body>

    </html>
</x-guest-layout>
