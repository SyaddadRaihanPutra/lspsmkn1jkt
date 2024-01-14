<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ 'assets/bootstrap/css/bootstrap.min.css' }}">
    <title>Registrasi Asesi | LSP SMKN 1 JAKARTA</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href=" assets/img/favicon/LSP-SMKN1.ico" />
    <link rel="stylesheet" href="{{ asset('assets/css/regis.css') }}">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="p-3 bg-white border shadow row rounded-5 box-area">
            <div class="col-md-5 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: #304767;">
                <div class="mb-3 featured-image">
                    <img src="assets/img/1.png" class="img-fluid" style="width: 250px;">
                </div>
                {{-- <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;"></p> --}}
                <small class="text-center text-white text-wrap" style="width: 17rem;">Data yang anda berikan akan
                    menjadi acuan saat memverifikasi data</small>
            </div>
            <div class="col-md-7 right-box">
                <div class="row align-items-center">
                    <div class="mb-4 header-text">
                        <div class="gap-2 mb-3 d-flex">
                            <img src="storage/logo_sekolah/{{ $setting->logo_sekolah }}" width="40" alt="">
                            <img src="{{ asset('assets/img/logo-bnsp.svg') }}" width="100" alt="">
                        </div>
                        <h2>Registrasi Asesi</h2>
                        <p>Isi data diri anda dengan benar</p>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li class="list-item">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('register-post') }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="role" value="3">
                        <div class="mb-3 form-floating">
                            <input type="text" name="name" class="form-control form-control-lg bg-light fs-6"
                                id="floatingName" placeholder="Nama Lengkap"
                                oninput="this.value = this.value.toUpperCase()">
                            <label for="floatingName">Nama Lengkap</label>
                        </div>

                        <div class="mb-3 form-floating">
                            <input type="email" name="email" class="form-control form-control-lg bg-light fs-6"
                                id="floatingEmail" placeholder="Alamat Email">
                            <label for="floatingEmail">Alamat Email</label>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="password" name="password"
                                        class="form-control form-control-lg bg-light fs-6" id="floatingPassword"
                                        placeholder="Kata Sandi">
                                    <label for="floatingPassword"><small>Kata Sandi</small></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="password" name="password_confirmation"
                                        class="form-control form-control-lg bg-light fs-6" id="floatingConfirmPassword"
                                        placeholder="Konfirmasi Kata Sandi">
                                    <label for="floatingConfirmPassword"><small>Konfirmasi Kata Sandi</small></label>
                                </div>
                            </div>
                            <small>
                                <p id="error_pass" class="text-danger"></p>
                            </small>
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var passwordInput = document.querySelector('input[name="password"]');
                                var confirmPasswordInput = document.querySelector('input[name="password_confirmation"]');
                                var errorPass = document.querySelector('#error_pass');

                                function validatePassword() {
                                    if (confirmPasswordInput.value === '') {
                                        errorPass.innerHTML = 'Konfirmasi password tidak boleh kosong';
                                    } else if (passwordInput.value !== confirmPasswordInput.value) {
                                        errorPass.innerHTML = 'Password tidak sama';
                                    } else {
                                        errorPass.innerHTML = '';
                                    }
                                }

                                confirmPasswordInput.addEventListener('input', validatePassword);
                            });
                        </script>

                        <div class="mb-3 input-group">
                            <select name="sekolah_id" id="sekolah_id" class="form-select">
                                <option value="" selected disabled>----- Pilih Sekolah -----</option>
                                @foreach ($sekolah as $item)
                                    <option value="{{ $item->id_sekolah }}">{{ $item->nama_sekolah }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 input-group">
                            <select name="jurusan_id" id="jurusan_id" class="form-select">
                                <option value="" selected disabled>----- Pilih Jurusan -----</option>
                                @foreach ($jurusan as $j)
                                    <option value="{{ $j->id }}">{{ $j->nama_jurusan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 input-group">
                            <button class="btn btn-lg btn-primary w-100 fs-6">Register</button>
                        </div>
                    </form>
                    <div class="row">
                        <small>Sudah punya akun? <a href="{{ route('login') }}"
                                class="text-decoration-none">Masuk</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}
