<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi Asesor</title>
    <link rel="stylesheet" href="{{ 'assets/bootstrap/css/bootstrap.min.css' }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/LSP-SMKN1.ico') }}" />
</head>

<body>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <li class="list-item">{{ $error }}</li>
        @endforeach
    @endif
    <div class="d-flex justify-content-center align-items-center">
        <div class="shadow-sm card" style="width: 25rem;">
            <div class="card-body">
                <form method="POST" action="{{ route('register-asesor-post') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="name">Nama</label>
                        <input class="mb-3 form-control" id="name" type="text" name="nama_asesor" oninput="this.value = this.value.toUpperCase()" required>
                    </div>
                    <input type="hidden" name="role" value="2">
                    <div>
                        <label for="email">Email</label>
                        <input class="mb-3 form-control" id="email" type="email" name="email" required>
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input class="mb-3 form-control" id="password" type="password" name="password" required>
                    </div>
                    <div>
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input class="mb-3 form-control" id="password_confirmation" type="password"
                            name="password_confirmation" required>
                    </div>
                    <div>
                        <label for="no_reg">No. REG</label>
                        <input class="mb-3 form-control" id="no_reg" type="text" name="no_reg" oninput="this.value = this.value.toUpperCase()" required>
                    </div>
                    <div>
                        <label for="npwpw">NPWP</label>
                        <input class="mb-3 form-control" id="npwp" type="text" name="npwp" required>
                    </div>
                    <div>
                        <label for="nama_bank">Nama Bank</label>
                        <input class="mb-3 form-control" id="nama_bank" type="text" name="nama_bank" oninput="this.value = this.value.toUpperCase()" required>
                    </div>
                    <div>
                        <label for="no_rek">No. Rekening</label>
                        <input class="mb-3 form-control" id="no_rek" type="text" name="no_rek" required>
                    </div>
                    <div>
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input class="mb-3 form-control" id="tempat_lahir" type="text" name="tempat_lahir" required>
                    </div>
                    <div>
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input class="mb-3 form-control" id="tgl_lahir" type="date" name="tgl_lahir" required>
                    </div>
                    <div>
                        <label for="agama">Agama</label>
                        <select name="agama" id="agama" class="form-select">
                            <option value="" selected disabled>----- Pilih Agama -----</option>
                            <option value="Islam">Islam</option>
                            <option value="Protestan">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Budha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                    <div>
                        <label for="jk">Jenis Kelamin</label>
                        <select name="jk" id="jk" class="form-select">
                            <option value="" selected disabled>----- Pilih Jenis Kelamin -----</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div>
                        <label for="alamat">Alamat</label>
                        <textarea class="mb-3 form-control" name="alamat" id="alamat" cols="30" rows="5"></textarea>
                    </div>
                    <div>
                        <label for="no_telp">No. Telepon</label>
                        <input class="mb-3 form-control" id="no_telp" type="number" name="no_telp" required>
                    </div>
                    <div>
                        <label for="sekolah_id">Sekolah</label>
                        <select name="sekolah_id" id="sekolah_id" class="form-select">
                            <option value="" selected disabled>----- Pilih Sekolah -----</option>
                            @foreach ($sekolah as $item)
                                <option value="{{ $item->id_sekolah }}">{{ $item->nama_sekolah }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="jurusan_id">Kompetensi Keahlian</label>
                        <select name="jurusan_id" id="jurusan_id" class="form-select">
                            <option value="" selected disabled>----- Pilih Kompetensi Keahlian -----</option>
                            @foreach ($jurusan as $j)
                                <option value="{{ $j->id }}">{{ $j->nama_jurusan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="scan_ktp">Scan KTP</label>
                        <small>Ukuran File Maks: 1MB(Megabyte) JPG | PNG</small>
                        <input id="scan_ktp" type="file" name="scan_ktp" class="mb-3 form-control" required>
                    </div>
                    <div>
                        <label for="scan_npwp">Scan NPWP</label>
                        <small>Ukuran File Maks: 1MB(Megabyte) JPG | PNG</small>
                        <input id="scan_npwp" type="file" name="scan_npwp" class="mb-3 form-control" required>
                    </div>
                    <div>
                        <label for="sertif_metodologi">SCAN SERTIFIKAT ASESOR METODOLOGI</label>
                        <small>Ukuran File Maks: 1MB(Megabyte) PDF</small>
                        <input id="sertif_metodologi" type="file" name="sertif_metodologi"
                            class="mb-3 form-control" required>
                    </div>
                    <div>
                        <label for="sertif_kompetensi">SCAN SERTIFIKAT KOMPETENSI TEKNIS BNSP</label>
                        <small>Ukuran File Maks: 1MB(Megabyte) PDF</small>
                        <input id="sertif_kompetensi" type="file" name="sertif_kompetensi"
                            class="mb-3 form-control" required>
                    </div>
                    <div>
                        <label for="scan_burek">Scan Buku Rekening</label>
                        <small>Ukuran File Maks: 1MB(Megabyte) PDF</small>
                        <input id="scan_burek" type="file" name="scan_burek" class="mb-3 form-control" required>
                    </div>
                    <div>
                        <label for="ttd">Tanda Tangan:</label>
                        <div id="signature-pad" class="m-signature-pad">
                            <div class="m-signature-pad--body">
                                <canvas class="form-control mb-3"></canvas>
                            </div>
                            <div class="m-signature-pad--footer">
                                <button type="button" class="btn btn-primary btn-sm" id="clear">Clear</button>
                            </div>
                        </div>
                        {!! Form::hidden('ttd', null, ['id' => 'ttd']) !!}
                    </div>
                    <div>
                        <button type="submit" class="mt-3 btn btn-primary d-block col-12">Daftar</button>
                    </div>
                </form>
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

</body>

</html>
