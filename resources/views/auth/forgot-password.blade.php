<x-guest-layout>
    <link rel="stylesheet" href=" assets/vendor/fonts/boxicons.css" />
    <!-- Core CSS -->
    <link rel="stylesheet"
        href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template/demo/assets/vendor/css/rtl/core.css?id=f1cefeba0c68d327230d2f6538f276fa"
        class="template-customizer-core-css" />

    <x-authentication-card>
        <x-slot name="logo">
            <a href="{{ $setting->url_sekolah }}">
                <img src="storage/logo_sekolah/{{ $setting->logo_sekolah }}" class="mx-auto mb-3" width="60" alt="">
                <span class="block text-2xl text-center text-gray-600 uppercase "
                    style="font-family: 'Baumans', cursive; font-weight: 800">Sistem Informasi LSP</span>
                <p class="block text-2xl text-center text-gray-600 uppercase" style="font-family: 'Baumans', cursive;">
                    {{ $setting->nama_sekolah }}</p>
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Lupa kata sandi Anda? Tidak masalah. Beri tahu kami alamat email Anda dan kami akan mengirimi Anda tautan setel ulang kata sandi melalui email.') }}
        </div>

        @if (session('status'))
            <div class="p-4 mb-4 text-green-700 bg-green-100 border-l-4 border-green-500" role="alert">
                {{ session('status') }}
            </div>
        @endif


        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />
            </div>
            <div class="flex items-center justify-between mt-4 space-x-10">
                <a href="{{ route('login') }}" class="text-sm text-gray-600 rounded-md hover:text-gray-900">
                    <i class="bx bx-chevron-left bx-sm"></i>
                    Back to login
                </a>
                <x-button class="flex-row-reverse justify-end">
                    {{ __('Send Reset Link') }}
                </x-button>
            </div>

        </form>
    </x-authentication-card>
</x-guest-layout>
