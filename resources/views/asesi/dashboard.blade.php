@extends('layouts.asesi.main_layouts')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="mb-4 col-lg-12 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-7">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Halo, {{ Auth::user()->name }} 👋</h5>
                                <p class="mb-4">
                                    Ini adalah halaman dashboard asesi. Anda dapat melihat informasi terkait
                                </p>

                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
                            </div>
                        </div>
                        <div class="text-center col-sm-5 text-sm-left">
                            <div class="px-0 pb-0 card-body px-md-4">
                                <img src=" assets/img/illustrations/man-with-laptop-light.png" height="140"
                                    alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                    data-app-light-img="illustrations/man-with-laptop-light.png" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Revenue -->
            <center>
                <div class="row mb-5">
                    <div class="col-md">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img class="card-img card-img-left img-fluid" src="{{ asset('assets/img/apl1.jpg') }}"
                                        alt="Card image">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body" style="text-align: left;">
                                        <h5 class="card-title">FR.APL 01</h5>
                                        <p class="card-text text-uppercase">
                                            Permohonan Sertifikasi Kompetensi
                                        </p>
                                        <p class="card-text"><small class="text-muted">*) Wajib diisi sebelum mengisi FR.APL
                                                02</small></p>
                                        <a href="#" class="btn btn-primary">Isi Formulir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md">
                        <div class="card mb-3">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img class="card-img card-img-left img-fluid" src="{{ asset('assets/img/apl2.jpg') }}"
                                        alt="Card image">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body" style="text-align: left;">
                                        <h5 class="card-title">FR.APL 01</h5>
                                        <p class="card-text">
                                            Skema Sertifikasi Kompetensi Keahlian
                                        </p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                        <a href="#" class="btn btn-primary disable">Isi Formulir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </center>

            <div class="order-2 mb-4 col-12 col-lg-8 order-md-3 order-lg-2">
                <div class="card">
                    <div class="row row-bordered g-0">
                        <div class="col-md-12">
                            <h5 class="pb-3 m-0 card-header me-2"><span class="fs-3"><i
                                        class='bx bx-info-circle'></i></span> Pengumuman</h5>
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">Judul pengumuman</div>
                                    <div class="card-text">6 hours ago - Admin</div>
                                    <div class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam
                                        voluptatum, quibusdam, quia, quod voluptates voluptatem quos dolorum
                                        exercitationem quas voluptate quidem? Quisquam voluptatum, quibusdam, quia, quod
                                        voluptates voluptatem quos dolorum exercitationem quas voluptate quidem?
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Total Revenue -->
            <div class="order-3 col-12 col-md-8 col-lg-4 order-md-2">
                <div class="flex-column row">
                    <div class="mb-4 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="flex-shrink-0 avatar">
                                        <i class='p-1 text-white rounded bx bx-calendar fs-2 bg-gray'></i>
                                    </div>
                                </div>
                                <span class="pt-3 mb-1 text-center fw-semibold d-block">Lihat jadwal anda</span>
                                <a href="#" class="mt-3 mb-1 d-block btn btn-info">Detail</a>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="flex-shrink-0 avatar">
                                        <i class='p-1 text-white rounded bx bxs-user-detail fs-2 bg-gray'></i>
                                    </div>
                                </div>
                                <span class="pt-3 mb-1 text-center fw-semibold d-block">Lihat data diri anda</span>
                                {{-- <a href="{{ route('detaildiri') }}" class="mt-3 mb-1 d-block btn btn-info">Detail</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
