@extends('layouts.admin.main_layouts')

@section('title', 'Ketua Kelas')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1">
                    <li class="breadcrumb-item">
                        <span>
                            <i class="menu-icon tf-icons bx bx-box"></i>
                        </span>
                    </li>
                    <li class="breadcrumb-item active">
                        Data Ketua Kelas
                    </li>
                </ol>
            </nav>

            <!-- Basic Layout -->
            <div class="row">
                <div class="col-xl">
                    <div class="mb-4 card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Tambah Data Ketua Kelas</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('master-user.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="nama_ketua_kelas">Nama Ketua Kelas<span
                                            class="text-danger">*</span></label>
                                    <input list="nama-ketua-kelas" class="form-control" id="nama_ketua_kelas" name="name"
                                        placeholder="Contoh: Ketua Kelas X TKP 1" required>
                                    <datalist id="nama-ketua-kelas">
                                        <option value="Ketua Kelas ">
                                    </datalist>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="email">Email<span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="example@smkn1jkt.sch.id" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="password">Password<span
                                            class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="******" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="kelas_id">Role<span class="text-danger">*</span></label>
                                    <select name="role" id="role" class="form-select" required>
                                        <option value="">---- Pilih Role ----</option>
                                        <option value="1">Administrator</option>
                                        <option value="2">Guru</option>
                                        <option value="3">Ketua Kelas</option>
                                        <option value="4">Wali Kelas</option>
                                        <option value="5">Piket</option>
                                        <option value="6">Orang Tua</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="kelas_id">Nama Kelas<span
                                            class="text-danger">*</span></label>
                                    <select name="kelas_id" id="kelas_id" class="form-select" required>
                                        <option value="">---- Pilih Kelas ----</option>
                                        @foreach (\App\Models\Kelas::pluck('nama_kelas', 'id') as $kelas_id => $nama_kelas)
                                            <option value="{{ $kelas_id }}">{{ $nama_kelas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="jurusan_id">Nama Jurusan<span
                                            class="text-danger">*</span></label>
                                    <select name="jurusan_id" id="jurusan_id" class="form-select" required>
                                        <option value="">---- Pilih Jurusan ----</option>
                                        @foreach (\App\Models\Jurusan::pluck('nama_jurusan', 'id')->filter(function ($nama_jurusan, $jurusan_id) {
            return !\App\Models\User::where('jurusan_id', $jurusan_id)->exists();
        }) as $jurusan_id => $nama_jurusan)
                                            <option value="{{ $jurusan_id }}">
                                                {{ $nama_jurusan }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                                <button type="submit" class="btn btn-primary">Tambah Data</button>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-xl">
                    <div class="mb-4 card">
                        <!-- Tampilan data atau konten lainnya -->
                        <div class="card-header" style="max-width: 25rem;">
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    </button>
                                </div>
                            @endif
                            <h5 class="mb-0">Data Ketua Kelas</h5>
                        </div>
                        <div class="card-body">
                            <form class="mb-4 d-flex" method="GET" action="/master-kk">
                                <input class="form-control me-2" type="search" name="search" placeholder="Search"
                                    aria-label="Search">
                                <button class="btn btn-outline-primary" type="submit">Search</button>
                            </form>
                            <div class="table-responsive text-nowrap">
                                <table class="table table-bordered table-striped">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Ketua Kelas</th>
                                            <th>Email</th>
                                            <th>Jurusan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($ketuakelas->isEmpty())
                                            <tr>
                                                <td colspan="5" class="text-center">Data Tidak Ditemukan</td>
                                            </tr>
                                        @else
                                            @foreach ($ketuakelas as $kk)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $kk->name }}</td>
                                                    <td>{{ $kk->email }}</td>
                                                    <td>
                                                        @foreach (\App\Models\Kelas::pluck('nama_kelas', 'id') as $kelas_id => $nama_kelas)
                                                            @if ($kk->kelas_id == $kelas_id)
                                                                {{ $nama_kelas }}
                                                            @endif
                                                        @endforeach
                                                        @foreach (\App\Models\Jurusan::pluck('nama_jurusan', 'id') as $jurusan_id => $nama_jurusan)
                                                            @if ($kk->jurusan_id == $jurusan_id)
                                                                {{ $nama_jurusan }}
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <!-- Tombol Delete -->
                                                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                            data-target="#confirmDeleteModal"><i class='bx bx-trash'></i>
                                                            Delete</button>

                                                        <!-- Modal Konfirmasi Delete -->
                                                        <div class="modal fade" id="confirmDeleteModal" tabindex="-1"
                                                            role="dialog" aria-labelledby="confirmDeleteModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" style="width: 25rem;">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="confirmDeleteModalLabel">Konfirmasi Hapus
                                                                        </h5>
                                                                        <button type="button" class="btn-close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Yakin ingin menghapus {{ $kk->name }}?</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Batal</button>

                                                                        <!-- Form untuk mengirim permintaan DELETE -->
                                                                        <form
                                                                            action="{{ route('master-user.delete', $kk->id) }}"
                                                                            method="POST" style="display: inline-block">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="btn btn-danger" style="background-color: #e57373">Hapus</button>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>

                                </table>
                                <div class="mt-4">
                                    <ul class="pagination pagination-sm justify-content-start">
                                        <?php
                                        $paginator = $ketuakelas->onEachSide(1);
                                        $pages = $paginator->getUrlRange(1, $paginator->lastPage());
                                        ?>
                                        {{-- Tombol previous --}}
                                        @if ($paginator->currentPage() > 1)
                                            <li class="page-item">
                                                <a class="page-link"
                                                    href="{{ $paginator->url($paginator->currentPage() - 1) }}">Prev
                                                    Page</a>
                                            </li>
                                        @endif

                                        {{-- Nomor halaman --}}
                                        @foreach ($pages as $page => $url)
                                            <li
                                                class="page-item{{ $paginator->currentPage() == $page ? ' active' : '' }}">
                                                <a class="border page-link border-primary"
                                                    href="{{ $url }}">{{ $page }}</a>
                                            </li>
                                        @endforeach

                                        {{-- Tombol next --}}
                                        @if ($paginator->hasMorePages())
                                            <li class="page-item">
                                                <a class="page-link"
                                                    href="{{ $paginator->url($paginator->currentPage() + 1) }}">Next
                                                    Page</a>
                                            </li>
                                        @endif
                                    </ul>
                                    <small>Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of
                                        {{ $paginator->total() }} entries</small>
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
    @endsection
