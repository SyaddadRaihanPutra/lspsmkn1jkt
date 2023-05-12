<style>
    @media (max-width: 767px) {

        .nis,
        .jurusan {
            display: none;
        }
    }

    .bg-color {
        background-color: #e6f9ec;
    }

    .bg-color-trans {
        background-color: rgba(187, 244, 227, 0.28);
    }

    /* Tampilan desktop */
    @media only screen and (min-width: 768px) {
        .kehadiran {
            display: flex;
            justify-content: center;
        }
    }

    /* Tampilan mobile */
    @media only screen and (max-width: 767px) {
        .kehadiran {
            display: block;
            margin: 0 auto;
        }

        .kehadiran .btn {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }
    }
</style>
@extends('layouts.ketuakelas.main_layouts')

@section('content')
    <?php
    date_default_timezone_set('Asia/Jakarta');
    $today = date('l'); // Mendapatkan hari saat ini dalam format 'Monday', 'Tuesday', dll.
    $currentTime = date('H:i'); // Mendapatkan waktu saat ini dalam format jam dan menit (24 jam)
    $presensiMessage = ''; // Variabel untuk menyimpan pesan presensi
    $presensiAlertClass = ''; // Variabel untuk menyimpan kelas CSS untuk alert
    $presensiBg = ''; // Variabel untuk menyimpan kelas CSS untuk latar belakang

    switch ($today) {
        case 'Saturday':
        case 'Sunday':
            // Jika hari ini adalah Sabtu atau Minggu (libur)
            $presensiMessage = 'Hari ini sekolah sedang libur.';
            $presensiBg = '#5f61e6'; // Mengatur kelas CSS menjadi 'bg-primary'
            $presensiAlertClass = 'alert-primary'; // Mengatur kelas CSS menjadi 'alert-primary'
            break;
        default:
            // Jika hari ini adalah hari kerja
            if ($currentTime > '10:00') {
                // Jika waktu saat ini telah melewati batas presensi pukul 10.00
                $presensiMessage = 'Telah melewati batas presensi.';
                $presensiAlertClass = 'alert-danger'; // Mengatur kelas CSS menjadi 'alert-danger'
                $presensiBg = '#ff4627'; // Mengatur kelas CSS menjadi 'bg-danger'
            } else {
                // Jika waktu saat ini masih sebelum pukul 10.00
                $presensiMessage = 'Segera melakukan presensi pada hari ini.';
                $presensiMessage .= '<br>Batas Presensi Pukul : 10.00';
                $presensiBg = '#5f61e6'; // Mengatur kelas CSS menjadi 'bg-primary'
                $presensiAlertClass = 'alert-primary'; // Mengatur kelas CSS menjadi 'alert-primary'
            }
            break;
    }
    ?>

    <!-- Menampilkan pesan presensi pada halaman HTML -->
    <div class="mx-4 mt-4 d-block">
        <div class="alert <?= $presensiAlertClass ?> alert-dismissible d-flex" role="alert">
            <span class="p-3 badge badge-center rounded-pill border-label-primary me-2"
                style="background-color: <?= $presensiBg ?>;">
                <i class="bx bx-command fs-6"></i></span>
            <div class="d-flex flex-column ps-1">
                <h6 class="mb-2 alert-heading d-flex align-items-center fw-bold">🔔 Pengingat</h6>
                <small><?php echo $presensiMessage; ?></small>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        </div>
    </div>

    <div class="p-4">
        <div class="card">
            <div class="top-0 card-header sticky-top bg-light d-flex justify-content-between">
                <h5 class="m-0">Data Siswa {{ str_replace('Ketua ', '', Auth::user()->name) }}</h5>
                <span class="badge bg-primary rounded-5 d-flex align-items-center">
                    <small>Total Siswa: &nbsp;</small>
                    <small class="m-0 text-center">{{ $studentCount }}</small>
                </span>
            </div>

            <div class="card-body">
                <div class="mb-4 col-md-4">
                    <form class="d-flex" method="GET" action="/dashboard">
                        <input class="form-control me-2" type="search" name="search" placeholder="Search"
                            aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </form>
                </div>

                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <thead class="table-primary">
                            <tr class="text-center align-middle">
                                <td>
                                    <input type="checkbox" class="form-check-input" id="select-all" name="checkbox"
                                        {{ $currentTime > '10:00' ? 'disabled' : '' }}>
                                </td>
                                <th class="nis">NIS</th>
                                <th>Nama</th>
                                <th class="jurusan">Jurusan</th>
                                <th style="width: 20rem">Actions</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($students->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center">Data Tidak Ditemukan</td>
                                </tr>
                            @else
                                @foreach ($students as $data)
                                    @if (count($students) > 0)
                                        <tr class="text-center">
                                            <td>
                                                <input type="checkbox" class="form-check-input" id="select-all"
                                                    name="checkbox" {{ $currentTime > '10:00' ? 'disabled' : '' }}
                                                    value="{{ $data->id }}">
                                            </td>
                                            <td class="nis">
                                                <strong>{{ $data->nis }}</strong>
                                            </td>
                                            <td>{{ $data->name }}</td>
                                            <td class="jurusan">
                                                @foreach (\App\Models\Kelas::pluck('nama_kelas', 'id') as $kelas_id => $nama_kelas)
                                                    @if ($data->kelas_id == $kelas_id)
                                                        {{ $nama_kelas }}
                                                    @endif
                                                @endforeach
                                                @foreach (\App\Models\Jurusan::pluck('nama_jurusan', 'id') as $jurusan_id => $nama_jurusan)
                                                    @if ($data->jurusan_id == $jurusan_id)
                                                        {{ $nama_jurusan }}
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @if ($currentTime > '10:00')
                                                    <p>
                                                        Melewati Batas Waktu Presensi
                                                    </p>
                                                @else
                                                    <div class="gap-2 d-flex justify-content-center">
                                                        <div class="gap-2 kehadiran">
                                                            <button type="button"
                                                                class="btn btn-primary btn-sm">HADIR</button>
                                                            <button type="button"
                                                                class="btn btn-warning btn-sm">IZIN</button>
                                                            <button type="button"
                                                                class="btn btn-danger btn-sm">ALPHA</button>
                                                            <button type="button" class="btn btn-dark btn-sm">PKL</button>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                            <td></td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="6" class="text-center">Tidak ada data</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                @if ($students->isEmpty())
                @else
                    @if ($currentTime > '10:00')
                        <button class="m-auto mt-3 btn btn-success d-block" disabled>Kirim Absen</button>
                    @else
                        <button class="m-auto mt-3 btn btn-success d-block">Kirim Absen</button>
                    @endif
                @endif
            </div>
        </div>
    </div>
    <script>
        // Add event listener to the "Select All" checkbox
        document.getElementById("select-all").addEventListener("change", function() {
            var checkboxes = document.getElementsByClassName("form-check-input");
            var numSelected = 0;
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = this.checked;
                if (this.checked) {
                    checkboxes[i].closest("tr").classList.add("bg-color-trans");
                    numSelected++;
                } else {
                    checkboxes[i].closest("tr").classList.remove("bg-color-trans");
                }
            }
            document.getElementById("num-selected").innerHTML = numSelected;
        });

        // Add event listener to each checkbox
        var checkboxes = document.getElementsByClassName("form-check-input");
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].addEventListener("change", function() {
                var numSelected = 0;
                for (var i = 0; i < checkboxes.length; i++) {
                    if (checkboxes[i].checked) {
                        checkboxes[i].closest("tr").classList.add("bg-color-trans");
                        numSelected++;
                    } else {
                        checkboxes[i].closest("tr").classList.remove("bg-color-trans");
                    }
                }
                document.getElementById("num-selected").innerHTML = numSelected;
                if (numSelected == checkboxes.length) {
                    document.getElementById("select-all").checked = true;
                } else {
                    document.getElementById("select-all").checked = false;
                }
            });
        }
    </script>
@endsection
