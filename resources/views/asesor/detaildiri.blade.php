@extends('layouts.asesor.main_layouts')

@section('content')
    {{-- @dd($asesorData) --}}
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="mb-4 col-lg-12 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-12">
                            <div class="card-body">
                                <div>
                                    @if(session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            <strong>{{ session('success') }}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <div class="d-flex justify-content-between">
                                        <h3>Detail Data Diri Asesor</h3>
                                        <a href="{{ route('edit-data-asesor', $asesorData->id_asesor) }}" class="ml-auto btn btn-secondary" style="position: relative; display: inline-flex; align-items: center;">
                                            <i class='bx bxs-edit' style="margin-right: 5px;"></i>
                                            <span>Edit</span>
                                        </a>
                                    </div>
                                    <p>Berikut adalah data diri Anda yang terdaftar di sistem.</p>
                                    <style>
                                        th {
                                            width: 150px;
                                        }

                                        td.dot {
                                            width: 20px
                                        }
                                    </style>
                                    <div>
                                        <table>
                                            <tr>
                                                <th>
                                                    Nama Lengkap
                                                </th>
                                                <td class="dot">
                                                    :
                                                </td>
                                                <td class="text-uppercase">
                                                    {{ $asesorData->nama_asesor }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    No. REG
                                                </th>
                                                <td class="dot">
                                                    :
                                                </td>
                                                <td class="text-uppercase">
                                                    {{ $asesorData->no_reg }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Email
                                                </th>
                                                <td class="dot">
                                                    :
                                                </td>
                                                <td>
                                                    {{ $asesorData->email }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    No. Telepon
                                                </th>
                                                <td class="dot">
                                                    :
                                                </td>
                                                <td>
                                                    {{ $asesorData->no_telp }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    No. NPWP
                                                </th>
                                                <td class="dot">
                                                    :
                                                </td>
                                                <td>
                                                    {{ $asesorData->npwp }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Nama Bank
                                                </th>
                                                <td class="dot">
                                                    :
                                                </td>
                                                <td>
                                                    {{ $asesorData->nama_bank }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    No. Rekening
                                                </th>
                                                <td class="dot">
                                                    :
                                                </td>
                                                <td>
                                                    {{ $asesorData->no_rek }}
                                                </td>
                                            <tr>
                                                <th>
                                                    Tempat Lahir
                                                </th>
                                                <td class="dot">
                                                    :
                                                </td>
                                                <td>
                                                    {{ $asesorData->tempat_lahir }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Tanggal Lahir
                                                </th>
                                                <td class="dot">
                                                    :
                                                </td>
                                                <td>
                                                    {{ $asesorData->tgl_lahir }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Jenis Kelamin
                                                </th>
                                                <td class="dot">
                                                    :
                                                </td>
                                                <td>
                                                    {{ $asesorData->jk }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Alamat Domisili
                                                </th>
                                                <td class="dot">
                                                    :
                                                </td>
                                                <td>
                                                    {{ $asesorData->alamat }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Jejaring Sekolah
                                                </th>
                                                <td class="dot">
                                                    :
                                                </td>
                                                <td>
                                                    {{ $asesorData->sekolah->nama_sekolah }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Bidang Keahlian
                                                </th>
                                                <td class="dot">
                                                    :
                                                </td>
                                                <td>
                                                    {{ $asesorData->jurusan->nama_jurusan }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>
                                                    Tanda Tangan
                                                </th>
                                                <td class="dot">
                                                    :
                                                </td>
                                                <td>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#modalToggle">
                                                        <img src="{{ $asesorData->ttd }}" alt="image scan ktp" width="150">
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <button type="button" class="mt-3 btn btn-primary w-100"
                                                    data-bs-toggle="modal" data-bs-target="#modalToggle">
                                                    SCAN KTP
                                                </button>
                                                <button type="button" class="mt-3 btn btn-primary w-100"
                                                    data-bs-toggle="modal" data-bs-target="#modalToggle2">
                                                    SCAN NPWP
                                                </button>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <button type="button" class="mt-3 btn btn-primary w-100"
                                                    data-bs-toggle="modal" data-bs-target="#modalToggle3">
                                                    SERTIFIKAT ASESOR METODOLOGI
                                                </button>
                                                <button type="button" class="mt-3 btn btn-primary w-100"
                                                    data-bs-toggle="modal" data-bs-target="#modalToggle4">
                                                    SERTIFIKAT KOMPETENSI TEKNIS BNSP
                                                </button>
                                            </div>
                                            <div class="col-12">
                                                <button type="button" class="mt-3 btn btn-primary w-100"
                                                    data-bs-toggle="modal" data-bs-target="#modalToggle5">
                                                    SCAN BUKU REKENING
                                                </button>
                                            </div>
                                        </div>

                                        <div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel"
                                            tabindex="-1" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalToggleLabel">Detail Scan KTP</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ asset(str_replace('/public/uploads/scan_ktp', '', 'storage/uploads/scan_ktp/' . $asesorData->scan_ktp)) }}"
                                                            alt="image scan ktp" width="150">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="modalToggle2" aria-labelledby="modalToggleLabel"
                                            tabindex="-1" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalToggleLabel">Detail </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ asset(str_replace('/public/uploads/scan_npwp', '', 'storage/uploads/scan_npwp/' . $asesorData->scan_npwp)) }}"
                                                            alt="image scan npwp" width="150">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="modalToggle3" aria-labelledby="modalToggleLabel"
                                            tabindex="-1" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalToggleLabel">Detail SCAN SERTIFIKAT
                                                            ASESOR METODOLOGI</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <embed
                                                            src="{{ asset(str_replace('/public/uploads/sertif_metodologi', '', 'storage/uploads/sertif_metodologi/' . $asesorData->sertif_metodologi)) }}"
                                                            type="application/pdf" width="100%" height="600px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="modalToggle4" aria-labelledby="modalToggleLabel"
                                            tabindex="-1" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalToggleLabel">Detail SCAN
                                                            SERTIFIKAT KOMPETENSI TEKNIS BNSP</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <embed
                                                            src="{{ asset(str_replace('/public/uploads/sertif_kompetensi', '', 'storage/uploads/sertif_kompetensi/' . $asesorData->sertif_kompetensi)) }}"
                                                            type="application/pdf" width="100%" height="600px">

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal fade" id="modalToggle5" aria-labelledby="modalToggleLabel"
                                            tabindex="-1" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalToggleLabel">Detail SCAN
                                                            SERTIFIKAT KOMPETENSI TEKNIS BNSP</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <embed
                                                            src="{{ asset(str_replace('/public/uploads/scan_burek', '', 'storage/uploads/scan_burek/' . $asesorData->scan_burek)) }}"
                                                            type="application/pdf" width="100%" height="600px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
