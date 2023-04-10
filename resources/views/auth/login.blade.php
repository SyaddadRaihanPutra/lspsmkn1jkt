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

        <title>Login | E - Absensi</title>
        <meta name="description"
            content="Most Powerful &amp; Comprehensive Bootstrap 5 HTML Admin Dashboard Template built for developers!" />
        <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
        <!-- Canonical SEO -->
        <link rel="canonical" href="https://themeselection.com/item/sneat-bootstrap-html-laravel-admin-template/">
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

        <style>
            @import url('https://fonts.googleapis.com/css2?family=Baumans&display=swap');
        </style>

        <!-- Fonts -->
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

        <!-- Core CSS -->
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

        <!-- Vendor Styles -->
        <!-- Vendor -->
        <link rel="stylesheet"
            href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />


        <!-- Page Styles -->
        <!-- Page -->
        <link rel="stylesheet"
            href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/pages/page-auth.css">

        <!-- Include Scripts for customizer, helper, analytics, config -->
        <!-- laravel style -->
        <script
            src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/js/helpers.js">
        </script>
        <!-- beautify ignore:start -->
  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
  <script
      src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/js/template-customizer.js">
  </script>

  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/js/config.js">
  </script>

  <script>
      window.templateCustomizer = new TemplateCustomizer({
          cssPath: '',
          themesPath: '',
          defaultShowDropdownOnHover: true, // true/false (for horizontal layout only)
          displayCustomizer: true,
          lang: 'en',
          pathResolver: function(path) {
              var resolvedPaths = {
                  // Core stylesheets
                  'core.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/core.css?id=f1cefeba0c68d327230d2f6538f276fa',
                  'core-dark.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/core-dark.css?id=a7e1b898874fb932a0d06a8338e83740',

                  // Themes
                  'theme-default.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-default.css?id=cc3d4ef91c8c858754d8ed20c78a3a3c',
                  'theme-default-dark.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-default-dark.css?id=9a338740c08a948bb83b45bbd12fb4aa',
                  'theme-bordered.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-bordered.css?id=8d92124ca46dc5afef2fb07a37c27881',
                  'theme-bordered-dark.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-bordered-dark.css?id=18f699a37ba20ce77d7e28d9cb364a77',
                  'theme-semi-dark.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-semi-dark.css?id=91f37f96f7ed4b04e63de6773e24ffa5',
                  'theme-semi-dark-dark.css': 'https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/theme-semi-dark-dark.css?id=0c263a3742f3ca2d2cb3e92439d5f540',
              }
              return resolvedPaths[path] || path;
          },
          'controls': ["rtl", "style", "layoutType", "showDropdownOnHover", "layoutNavbarFixed",
              "layoutFooterFixed", "themes"
          ],
      });
  </script>
  <!-- beautify ignore:end -->

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
        <!-- Layout Content -->
        <div class="preloader">
            <img src="https://vafloc01.s3.amazonaws.com/WBStatic/site1102601/dist/img/loader.gif" alt="LOADING">
        </div>
        <!-- Content -->
        <div class="authentication-wrapper authentication-cover">
            <div class="m-0 authentication-inner row">
                <!-- /Left Text -->
                <div class="p-5 d-none d-lg-flex col-lg-7 col-xl-8 align-items-center"
                    style="background-image: url('https://lh3.googleusercontent.com/p/AF1QipMkJofWjQk0gxxhXBCQu6RSYwiymxX8gigVw2db=s1360-w1360-h1020');background-size: cover;background-repeat: no-repeat; box-shadow: 0 0 300px rgba(0,0,0,0.9) inset;">
                    <div class="w-100 d-flex justify-content-left">
                        <h5 class="text-white text-uppercase" style="transform: translateZ(0) translateY(300px);">
                            <i class='bx bx-map fs-4'></i> {{ $setting->nama_sekolah_long }}</small>
                            <p style="font-size: 15px">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $setting->alamat_sekolah }}</p>
                        </h5>
                    </div>
                </div>
                <!-- /Left Text -->

                <!-- Login -->
                <div class="p-4 d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5"
                    style="background-image: url('https://shuffle.dev/vendor/shuffle/img/pattern-generator/background-pattern.png');">
                    <div class="mx-auto w-px-400">
                        <!-- Logo -->
                        <div class="mb-4 app-brand">
                            <a href="{{ $setting->url_sekolah }}" class="gap-2 app-brand-link">
                                <img src="{{ $setting->logo_sekolah }}" class="img-fluid" width="60" alt="">
                                <span class="text-uppercase app-brand-text demo text-body fw-bolder fs-1"
                                    style="font-family: 'Baumans', cursive;">&nbsp;E - Absensi</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h4 class="mb-2 fw-bold"></h4>
                        <p class="mb-4">Aplikasi absensi siswa/i {{ $setting->nama_sekolah }}. Silahkan login
                            menggunakan akun anda.</p>
                        <x-validation-errors class="mb-4" />
                        <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label">Email or Username</label>
                                <x-input id="email" class="block w-full mt-1 form-control" type="email"
                                    name="email" :value="old('email')" required autofocus autocomplete="username" />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                    @if (Route::has('password.request'))
                                        <a class="text-sm text-gray-600 rounded-md hover:text-gray-900"
                                            href="{{ route('password.request') }}">
                                            {{ __('Forgot your password?') }}
                                        </a>
                                    @endif
                                </div>
                                <div class="input-group input-group-merge">
                                    <x-input id="password" class="block w-full form-control" type="password"
                                        name="password" required autocomplete="current-password" />
                                    <span class="shadow-sm cursor-pointer input-group-text"><i
                                            class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me">
                                    <label class="form-check-label" for="remember-me">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            {{-- <button class="btn btn-primary d-grid w-100">
                                Sign in
                            </button> --}}
                            <x-button class="btn btn-primary d-grid w-100">
                                {{ __('Log in') }}
                            </x-button>
                        </form>

                        <p class="text-center">
                            <span>Belum punya akun?</span>
                            <a href="https://wa.me/+6281398011515">
                                <span>Hubungi Admin</span>
                            </a>
                        </p>
                        <!-- /Login -->
                    </div>
                </div>
                <!--/ Content -->
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
                    src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/i18n/i18n.js?id=74a027f4696264ade8796f88b3d49c14">
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
                    src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js">
                </script>
                <script
                    src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js">
                </script>
                <script
                    src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/js/main.js?id=e0aeed34a47c1efb009b120245cce82e">
                </script>

                <script src="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/js/pages-auth.js">
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
