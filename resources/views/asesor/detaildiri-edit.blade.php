@extends('layouts.asesor.main_layouts')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="mb-4 col-lg-12 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-12">
                            <div class="card-body">
                                <div>
                                    <div class="d-flex justify-content-between">
                                        <h3>Edit Data Diri Asesor</h3>
                                    </div>
                                    <p>Ubah data diri asesor sesuai dengan data diri asesor yang sebenarnya. (Abaikan jika
                                        tidak ingin diubah)</p>
                                        @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $item)
                                                    <li>{{ $item }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                    <form action="{{ route('update-data-asesor', $user) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="nama_asesor">Nama Asesor: </label>
                                            <input type="text" class="form-control text-uppercase" name="nama_asesor"
                                                id="nama_asesor" value="{{ old('nama_asesor', $asesorData->nama_asesor) }}" oninput="this.value = this.value.toUpperCase()">
                                        </div>
                                        <div class="mb-3">
                                            <label for="no_reg">No. REG: </label>
                                            <input type="text" class="form-control" name="no_reg" id="no_reg"
                                                value="{{ old('no_reg', $asesorData->no_reg) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email">Email: </label>
                                            <input type="email" class="form-control" name="email" id="email"
                                                value="{{ old('email', $asesorData->email) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="no_telp">No. WhatsApp <i>(Aktif)</i>: </label>
                                            <input type="text" class="form-control" name="no_telp" id="no_telp"
                                                value="{{ old('no_telp', $asesorData->no_telp) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat">Alamat Domisili: </label>
                                            <textarea class="form-control" name="alamat" id="alamat" rows="3">{{ old('alamat', $asesorData->alamat) }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="npwp">No. NPWP</label>
                                            <input type="number" class="form-control" name="npwp" id="npwp"
                                                value="{{ old('npwp', $asesorData->npwp) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama_bank">Nama Bank:</label>
                                            <input type="text" class="form-control" name="nama_bank" id="nama_bank"
                                                value="{{ old('nama_bank', $asesorData->nama_bank) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="no_rek">No. Rekening:</label>
                                            <input type="number" class="form-control" name="no_rek" id="no_rek"
                                                value="{{ old('no_rek', $asesorData->no_rek) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="tempat_lahir">Tempat Lahir:</label>
                                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                                value="{{ old('tempat_lahir', $asesorData->tempat_lahir) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="tgl_lahir">Tanggal Lahir:</label>
                                            <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir"
                                                value="{{ old('tgl_lahir', $asesorData->tgl_lahir) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="agama">Agama:</label>
                                            <select name="agama" id="agama" class="form-select">
                                                <option value="" selected disabled>----- Pilih Agama -----</option>
                                                <option value="Islam"
                                                    {{ old('agama', $asesorData->agama) == 'Islam' ? 'selected' : '' }}>
                                                    Islam</option>
                                                <option value="Protestan"
                                                    {{ old('agama', $asesorData->agama) == 'Protestan' ? 'selected' : '' }}>
                                                    Kristen</option>
                                                <option value="Katolik"
                                                    {{ old('agama', $asesorData->agama) == 'Katolik' ? 'selected' : '' }}>
                                                    Katolik</option>
                                                <option value="Hindu"
                                                    {{ old('agama', $asesorData->agama) == 'Hindu' ? 'selected' : '' }}>
                                                    Hindu</option>
                                                <option value="Buddha"
                                                    {{ old('agama', $asesorData->agama) == 'Buddha' ? 'selected' : '' }}>
                                                    Budha</option>
                                                <option value="Konghucu"
                                                    {{ old('agama', $asesorData->agama) == 'Konghucu' ? 'selected' : '' }}>
                                                    Konghucu</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="jk">Jenis Kelamin:</label>
                                            <select name="jk" id="jk" class="form-select">
                                                <option value="" selected disabled>----- Pilih Jenis Kelamin -----
                                                </option>
                                                <option value="L"
                                                    {{ old('jk', $asesorData->jk) == 'L' ? 'selected' : '' }}>Laki-laki
                                                </option>
                                                <option value="P"
                                                    {{ old('jk', $asesorData->jk) == 'P' ? 'selected' : '' }}>Perempuan
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat">Alamat:</label>
                                            <input type="text" class="form-control" name="alamat" id="alamat" rows="3" value="{{ old('alamat', $asesorData->alamat) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="sekolah_id">Jejaring Sekolah:</label>
                                            <select name="sekolah_id" id="sekolah_id" class="form-select">
                                                <option value="" selected disabled>----- Pilih Sekolah -----</option>
                                                @foreach ($sekolah as $item)
                                                    <option value="{{ $item->id_sekolah }}"
                                                        {{ old('sekolah_id', $asesorData->sekolah_id) == $item->id_sekolah ? 'selected' : '' }}>
                                                        {{ $item->nama_sekolah }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="jurusan_id">Jurusan:</label>
                                            <select name="jurusan_id" id="jurusan_id" class="form-select">
                                                <option value="" selected disabled>----- Pilih Jurusan -----</option>
                                                @foreach ($jurusan as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ old('jurusan_id', $asesorData->jurusan_id) == $item->id ? 'selected' : '' }}>
                                                        {{ $item->nama_jurusan }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="scan_ktp">Scan KTP</label>
                                            <input type="file" class="form-control" name="scan_ktp" id="scan_ktp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="scan_npwp">Scan NPWP</label>
                                            <input type="file" class="form-control" name="scan_npwp" id="scan_npwp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="sertif_metodologi">Sertifikat Asesor Metodologi</label>
                                            <input type="file" class="form-control" name="sertif_metodologi"
                                                id="sertif_metodologi">
                                        </div>
                                        <div class="mb-3">
                                            <label for="sertif_kompetensi">Sertifikat Kompetensi Teknis BNSP</label>
                                            <input type="file" class="form-control" name="sertif_kompetensi"
                                                id="sertif_kompetensi">
                                        </div>
                                        <div class="mb-3">
                                            <label for="scan_burek">Scan Buku Rekening</label>
                                            <input type="file" class="form-control" name="scan_burek"
                                                id="scan_burek">
                                        </div>
                                        {{-- <div class="mb-3">
                                            <label for="ttd">Tanda Tangan:</label>
                                            <div id="signature-pad" class="m-signature-pad">
                                                <div class="m-signature-pad--body">
                                                    <canvas class="form-control"></canvas>
                                                </div>
                                                <div class="m-signature-pad--footer">
                                                    <button type="button" class="btn btn-primary btn-sm"
                                                        id="clear">Clear</button>
                                                </div>
                                            </div>
                                            {!! Form::hidden('ttd', null, ['id' => 'ttd']) !!}
                                        </div> --}}
                                        <div class="mb-3">
                                            <a href="{{ route('detaildiri') }}" class="btn btn-secondary">Batal</a>
                                            <button type="submit" class="btn btn-primary">Update Data</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
    <script>
        var canvas = document.querySelector("canvas");
        var signaturePad = new SignaturePad(canvas);

        document.getElementById('clear').addEventListener('click', function() {
            signaturePad.clear();
        });

        document.querySelector('form').addEventListener('submit', function(e) {
            var ttdInput = document.getElementById('ttd');
            ttdInput.value = signaturePad.toDataURL();
        });
    </script>
@endsection
