@extends('layouts.asesi.main_layouts')

@section('title', 'Detail Diri')
@section('content')
{{-- @dd($asesiData) --}}
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="mb-4 col-lg-12 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-12">
                        <div class="card-body">
                            <div>
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('success') }}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <div class="d-flex justify-content-between">
                                    <h3>Detail Data Diri Asesi</h3>
                                    <a href="{{ route('edit-data-asesi', $asesiData->id_asesi) }}"
                                        class="ml-auto btn btn-outline-secondary btn-sm"
                                        style="position: relative; display: inline-flex; align-items: center;">
                                        <i class='bx bxs-edit'></i>
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
                                                {{ $asesiData->nama_asesi }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                NIS
                                            </th>
                                            <td class="dot">
                                                :
                                            </td>
                                            <td>
                                                @if(($asesiData->nis == null))
                                                 <span class="text-danger">Belum mengisi</span>
                                                @else
                                                {{ $asesiData->nis }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                NISN
                                            </th>
                                            <td class="dot">
                                                :
                                            </td>
                                            <td>
                                                @if(($asesiData->nisn == null))
                                                 <span class="text-danger">Belum mengisi</span>
                                                @else
                                                {{ $asesiData->nisn }}
                                                @endif
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
                                                {{ $asesiData->email }}
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
                                                @if(($asesiData->no_telp == null))
                                                 <span class="text-danger">Belum mengisi</span>
                                                @else
                                                {{ $asesiData->no_telp }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Tempat Lahir
                                            </th>
                                            <td class="dot">
                                                :
                                            </td>
                                            <td>
                                                @if(($asesiData->tempat_lahir == null))
                                                 <span class="text-danger">Belum mengisi</span>
                                                @else
                                                {{ $asesiData->tempat_lahir }}
                                                @endif
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
                                                @if(($asesiData->tgl_lahir == null))
                                                 <span class="text-danger">Belum mengisi</span>
                                                @else
                                                {{ $asesiData->tgl_lahir }}
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>
                                                Agama
                                            </th>
                                            <td class="dot">
                                                :
                                            </td>
                                            <td>
                                                @if(($asesiData->agama == null))
                                                 <span class="text-danger">Belum mengisi</span>
                                                @else
                                                {{ $asesiData->agama }}
                                                @endif
                                            </td>
                                        <tr>
                                            <th>
                                                Jenis Kelamin
                                            </th>
                                            <td class="dot">
                                                :
                                            </td>
                                            <td>
                                                @if(($asesiData->jk == null))
                                                 <span class="text-danger">Belum mengisi</span>
                                                @else
                                                {{ $asesiData->jk }}
                                                @endif
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
                                                @if(($asesiData->alamat == null))
                                                 <span class="text-danger">Belum mengisi</span>
                                                @else
                                                {{ $asesiData->alamat }}
                                                @endif
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
                                                {{ $asesiData->sekolah->nama_sekolah }}
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
                                                {{ $asesiData->jurusan->nama_jurusan }}
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
                                                @if(($asesiData->ttd == null))
                                                 <span class="text-danger">Belum mengisi</span>
                                                @else
                                                <img src="{{ $asesiData->ttd }}"
                                                    alt="image ttd" width="150">
                                                @endif
                                            </td>
                                        </tr>
                                    </table>

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
                                                    <img src="{{ asset(str_replace('/public/uploads/scan_ktp', '', 'storage/uploads/scan_ktp/' . $asesiData->scan_ktp)) }}"
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
                                                    <img src="{{ asset(str_replace('/public/uploads/scan_npwp', '', 'storage/uploads/scan_npwp/' . $asesiData->scan_npwp)) }}"
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
                                                    <h5 class="modal-title" id="modalToggleLabel">Detail SCAN
                                                        SERTIFIKAT
                                                        ASESOR METODOLOGI</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <embed
                                                        src="{{ asset(str_replace('/public/uploads/sertif_metodologi', '', 'storage/uploads/sertif_metodologi/' . $asesiData->sertif_metodologi)) }}"
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
                                                        src="{{ asset(str_replace('/public/uploads/sertif_kompetensi', '', 'storage/uploads/sertif_kompetensi/' . $asesiData->sertif_kompetensi)) }}"
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
                                                        src="{{ asset(str_replace('/public/uploads/scan_burek', '', 'storage/uploads/scan_burek/' . $asesiData->scan_burek)) }}"
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
