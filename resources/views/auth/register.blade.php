<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ ('assets/bootstrap/css/bootstrap.min.css') }}">
    <title>Registrasi Asesi | LSP SMKN 1 JAKARTA</title>
     <!-- Favicon -->
     <link rel="icon" type="image/x-icon" href=" assets/img/favicon/LSP-SMKN1.ico" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: #ececec;
        }

        .box-area {
            width: 930px;
        }

        .right-box {
            padding: 40px 30px 40px 40px;
        }

        ::placeholder {
            font-size: 16px;
        }

        .rounded-4 {
            border-radius: 20px;
        }

        .rounded-5 {
            border-radius: 30px;
        }

        @media only screen and (max-width: 768px) {

            .box-area {
                margin: 0 10px;

            }

            .left-box {
                height: 100px;
                overflow: hidden;
            }

            .right-box {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="p-3 bg-white border shadow row rounded-5 box-area">
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: #103cbe;">
                <div class="mb-3 featured-image">
                    <img src="assets/img/1.png" class="img-fluid" style="width: 250px;">
                </div>
                {{-- <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;"></p> --}}
                <small class="text-center text-white text-wrap"
                    style="width: 17rem;">Data yang anda berikan akan menjadi acuan saat memverifikasi data</small>
            </div>
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="mb-4 header-text">
                        <h2>Registrasi Asesi</h2>
                        <p>Isi data diri anda dengan benar</p>
                    </div>
                    @if($errors->any())
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
                        <div class="mb-3 input-group">
                            <input type="text" name="name" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Nama Lengkap">
                        </div>
                        <div class="mb-3 input-group">
                            <input type="text" name="email" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Alamat Email">
                        </div>
                        <div class="mb-3 input-group">
                            <input type="password" name="password" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Kata Sandi">
                        </div>
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
                    <small>Sudah punya akun? <a href="{{ route('login') }}" class="text-decoration-none">Masuk</a></small>
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
