@extends('layouts.admin.main_layouts')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1">
                    <li class="breadcrumb-item">
                        <a href="#">DATA MASTER</a>
                    </li>
                    <li class="breadcrumb-item active">
                        Data Jurusan
                    </li>
                </ol>
            </nav>

            <!-- Basic Layout -->
            <div class="row">
                <div class="col-xl">
                    <div class="mb-4 card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Tambah Data Jurusan</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('master-jurusan.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="kelas_id">Kelas</label>
                                    <select name="kelas_id" id="kelas_id" class="form-select" required>
                                        <option value="">---- Pilih Kelas ----</option>
                                        @foreach (\App\Models\Kelas::pluck('nama_kelas', 'id') as $kelas_id => $nama_kelas)
                                            <option value="{{ $kelas_id }}">{{ $nama_kelas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Nama Jurusan</label>
                                    <input type="text" class="form-control" name="nama_jurusan" id="basic-default-fullname"
                                        placeholder="Contoh: TKP 1">
                                </div>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl">
                    <div class="mb-4 card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Data Jurusan</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive text-nowrap">
                                <table class="table table-bordered table-striped">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Jurusan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($jurusan as $j)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @foreach (\App\Models\Kelas::pluck('nama_kelas', 'id') as $kelas_id => $nama_kelas)
                                                        @if ($j->kelas_id == $kelas_id)
                                                            {{ $nama_kelas }}
                                                        @endif
                                                    @endforeach
                                                    {{ $j->nama_jurusan }}
                                                </td>
                                                <td>
                                                    <button data-id="{{ $j->id }}"
                                                        class="btn btn-warning btn-sm detail-btn" data-bs-toggle="modal"
                                                        data-bs-target="#myModal">
                                                        <i class='bx bx-low-vision'></i> Detail
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="myModal" tabindex="-1"
                                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                                                        Detail Jurusan</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p><strong>Kelas:</strong>
                                                                        @foreach (\App\Models\Kelas::pluck('nama_kelas', 'id') as $kelas_id => $nama_kelas)
                                                                            @if ($j->kelas_id == $kelas_id)
                                                                                {{ $nama_kelas }}
                                                                            @endif
                                                                        @endforeach
                                                                    </p>
                                                                    <p><strong>Jurusan:</strong> <span
                                                                            id="nama_jurusan"></span></p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Tutup</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <a href="#" class="btn btn-danger btn-sm"> <i
                                                            class='bx bx-trash'></i> Hapus</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-4">
                                    {{ $jurusan->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
            integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
        </script>


        <script>
            $('#myModal').modal('hide');
            $(document).ready(function() {
                $('.detail-btn').click(function() {
                    const id = $(this).attr('data-id');
                    $.ajax({
                        url: 'master-jurusan/' + id,
                        type: 'GET',
                        data: {
                            "id": id
                        },
                        success: function(data) {
                            // console.log(data);
                            $('#nama_jurusan').html(data.nama_jurusan); //set nama jurusan ke modal
                        }
                    })
                });
            });
        </script>
    @endsection
