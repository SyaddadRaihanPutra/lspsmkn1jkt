@extends('layouts.ketuakelas.main_layouts')

@section('content')
    <div class="p-4">
        <div class="card">
            <h5 class="card-header">Data Siswa {{ str_replace('Ketua ', '', Auth::user()->name) }}</h5>
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
                                <td><input type="checkbox" class="form-check-input" id="select-all" name="checkbox"></td>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th style="width: 20rem">Actions</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $data)
                                @if (count($students) > 0)
                                    <tr class="text-center">
                                        <td><input type="checkbox" class="checkbox form-check-input" name="checkbox[]"
                                                value="{{ $data->id }}"></td>
                                        <td>
                                            <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                            <strong>{{ $data->nis }}</strong>
                                        </td>
                                        <td>{{ $data->name }}</td>
                                        <td>
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
                                            <button class="btn-sm btn btn-primary">HADIR</button>
                                            <button class="btn-sm btn btn-warning">IZIN</button>
                                            <button class="btn-sm btn btn-danger">ALPHA</button>
                                            <button class="btn-sm btn btn-dark">PKL</button>
                                        </td>
                                        <td></td>
                                    </tr>
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-success mt-3 m-auto d-block">Kirim Absen</button>
            </div>
        </div>
    </div>
    <script>
        // Add event listener to the "Select All" checkbox
        document.getElementById("select-all").addEventListener("change", function() {
            var checkboxes = document.getElementsByClassName("checkbox");
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = this.checked;
            }
        });
    </script>
@endsection
