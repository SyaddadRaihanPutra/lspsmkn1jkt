@extends('layouts.admin.main_layouts')

@section('title', 'Pengaturan')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                    <i class='bx bx-cog'></i>
                </li>
                <li class="breadcrumb-item active">
                    <span class="underline align-middle">Pengaturan Website</span>
                </li>
            </ol>
        </nav>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl">
                <div class="mb-4 card">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    @endif
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Pengaturan Website</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label class="mb-1">Nama Sekolah</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text" id="basic-addon-search31"><i
                                            class="bx bxs-school"></i></span>
                                    <input type="text" class="form-control" name="nama_sekolah"
                                        value="{{ old('nama_sekolah') ?? $setting->nama_sekolah }}"
                                        id="basic-default-fullname" placeholder="Contoh: SMKN 1 Jakarta">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="mb-1">Nama Sekolah <small><i>(Long)</i></small></label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text" id="basic-addon-search31"><i
                                            class="bx bxs-school"></i></span>
                                    <input type="text" class="form-control" name="nama_sekolah_long"
                                        value="{{ old('nama_sekolah_long') ?? $setting->nama_sekolah_long }}"
                                        id="basic-default-fullname" placeholder="Contoh: SMKN 1 Jakarta">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="mb-1">Alamat Sekolah</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text" id="basic-addon-search31"><i
                                            class="bx bx-map"></i></span>
                                    <input type="text" class="form-control" name="alamat_sekolah"
                                        value="{{ old('alamat_sekolah') ?? $setting->alamat_sekolah }}"
                                        id="basic-default-fullname" placeholder="Contoh: SMKN 1 Jakarta">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="mb-1">Logo Sekolah</label>
                                <small>
                                    <p>(Upload gambar dengan ukuran minimal 60 piksel</a> )
                                    </p>
                                </small>
                                <div>
                                    <input type="file" name="logo_sekolah" class="form-control" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="mb-1">URL Web Sekolah</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text" id="basic-addon-search31"><i
                                            class='bx bx-link'></i></span>
                                    <input type="text" class="form-control" name="url_web_sekolah"
                                        value="{{ old('url_web_sekolah') ?? $setting->url_web_sekolah }}"
                                        id="basic-default-fullname" placeholder="Contoh: SMKN 1 Jakarta">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
