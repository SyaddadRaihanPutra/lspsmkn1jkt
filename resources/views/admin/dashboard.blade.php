@extends('layouts.admin.main_layouts')

@section('title', 'Dashboard')

@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="mb-4 col-lg-8 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">Hi, {{ Auth::user()->name }} 🎉</h5>
                                    <p class="mb-4">
                                        You have done <span class="fw-bold">72%</span> more sales today. Check your new
                                        badge in
                                        your profile.
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
                <div class="order-1 col-lg-4 col-md-4">
                    <div class="row">
                        <div class="mb-4 col-lg-6 col-md-12 col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="flex-shrink-0 avatar">
                                            <img src=" assets/img/icons/unicons/chart-success.png" alt="chart success"
                                                class="rounded" />
                                        </div>
                                    </div>
                                    <span class="mb-1 fw-semibold d-block">Jumlah Siswa</span>
                                    <h3 class="mb-2 card-title">{{ $count }}</h3>
                                    <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>
                                        +72.80%</small>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 col-lg-6 col-md-12 col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="flex-shrink-0 avatar">
                                            <img src=" assets/img/icons/unicons/wallet-info.png" alt="Credit Card"
                                                class="rounded" />
                                        </div>
                                    </div>
                                    <span class="mb-1 fw-semibold d-block">Jumlah Jurusan</span>
                                    <h3 class="mb-2 card-title">{{ $countjurusan }}</h3>
                                    <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>
                                        +28.42%</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Total Revenue -->
                <div class="order-2 mb-4 col-12 col-lg-8 order-md-3 order-lg-2">
                    <div class="card">
                        <div class="row row-bordered g-0">
                            <div class="col-md-8">
                                <h5 class="pb-3 m-0 card-header me-2">Total Revenue</h5>
                                <div id="totalRevenueChart" class="px-2"></div>
                            </div>
                            <div class="col-md-4">
                                <div class="card-body">
                                    <div class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                                                id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                2022
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                                                <a class="dropdown-item" href="javascript:void(0);">2021</a>
                                                <a class="dropdown-item" href="javascript:void(0);">2020</a>
                                                <a class="dropdown-item" href="javascript:void(0);">2019</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="growthChart"></div>
                                <div class="pt-3 mb-2 text-center fw-semibold">62% Company Growth</div>

                                <div class="gap-3 p-4 d-flex px-xxl-4 px-lg-2 gap-xxl-3 gap-lg-1 justify-content-between">
                                    <div class="d-flex">
                                        <div class="me-2">
                                            <span class="p-2 badge bg-label-primary"><i
                                                    class="bx bx-dollar text-primary"></i></span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <small>2022</small>
                                            <h6 class="mb-0">$32.5k</h6>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="me-2">
                                            <span class="p-2 badge bg-label-info"><i
                                                    class="bx bx-wallet text-info"></i></span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <small>2021</small>
                                            <h6 class="mb-0">$41.2k</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Total Revenue -->
                <div class="order-3 col-12 col-md-8 col-lg-4 order-md-2">
                    <div class="row">
                        <div class="mb-4 col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="flex-shrink-0 avatar">
                                            <img src=" assets/img/icons/unicons/paypal.png" alt="Credit Card"
                                                class="rounded" />
                                        </div>
                                        <div class="dropdown">
                                            <button class="p-0 btn" type="button" id="cardOpt4"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="mb-1 d-block">Payments</span>
                                    <h3 class="mb-2 card-title text-nowrap">$2,456</h3>
                                    <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i>
                                        -14.82%</small>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4 col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="flex-shrink-0 avatar">
                                            <img src=" assets/img/icons/unicons/cc-primary.png" alt="Credit Card"
                                                class="rounded" />
                                        </div>
                                        <div class="dropdown">
                                            <button class="p-0 btn" type="button" id="cardOpt1"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="mb-1 fw-semibold d-block">Transactions</span>
                                    <h3 class="mb-2 card-title">$14,857</h3>
                                    <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>
                                        +28.14%</small>
                                </div>
                            </div>
                        </div>
                        <!-- </div>
        <div class="row"> -->
                        <div class="mb-4 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="gap-3 d-flex justify-content-between flex-sm-row flex-column">
                                        <div
                                            class="flex-row d-flex flex-sm-column align-items-start justify-content-between">
                                            <div class="card-title">
                                                <h5 class="mb-2 text-nowrap">Profile Report</h5>
                                                <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                                            </div>
                                            <div class="mt-sm-auto">
                                                <small class="text-success text-nowrap fw-semibold"><i
                                                        class="bx bx-chevron-up"></i> 68.2%</small>
                                                <h3 class="mb-0">$84,686k</h3>
                                            </div>
                                        </div>
                                        <div id="profileReportChart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection
