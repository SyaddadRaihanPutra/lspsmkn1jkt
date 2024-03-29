@extends('layouts.admin.main_layouts')

@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1">
                    <li class="breadcrumb-item"><span class="align-middle">
                        <span>
                            <i class="menu-icon tf-icons bx bx-box"></i>
                        </span>
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
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                </button>
                            </div>
                        @endif
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Tambah Data Jurusan</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('master-jurusan.store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Nama Jurusan</label>
                                    <input type="text" class="form-control" name="nama_jurusan"
                                        id="basic-default-fullname" placeholder="Contoh: TKP 1">
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
                            <form class="mb-4 d-flex" method="GET" action="/master-jurusan">
                                <input class="form-control me-2" type="search" name="search" placeholder="Search"
                                    aria-label="Search">
                                <button class="btn btn-outline-primary" type="submit">Search</button>
                            </form>
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
                                        @if ($jurusan->count() > 0)
                                            @foreach ($jurusan as $j)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        {{ $j->nama_jurusan }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('master-jurusan.update', $j->id) }}/edit" class="btn btn-primary btn-sm">Edit</a>
                                                        <form class="d-inline" id="delete-form-{{ $j->id }}"
                                                            action="{{ route('master-jurusan.delete', $j->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#deleteModal{{ $j->id }}">
                                                                <i class="bx bx-trash"></i> Hapus
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deleteModal{{ $j->id }}"
                                                                tabindex="-1" role="dialog"
                                                                aria-labelledby="deleteModalLabel{{ $j->id }}"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered"
                                                                    style="width: 25rem;">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="deleteModalLabel{{ $j->id }}">
                                                                                Konfirmasi Hapus Data</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Apakah Anda yakin ingin menghapus
                                                                            {{ $j->nama_jurusan }}?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Batal</button>
                                                                            <button type="submit" class="text-white btn"
                                                                                style="background-color: #e57373"
                                                                                onclick="event.preventDefault(); document.getElementById('delete-form-{{ $j->id }}').submit();">
                                                                                Hapus
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="3">Data tidak ditemukan</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                <div class="mt-4">
                                    <ul class="pagination pagination-sm justify-content-start">
                                        <?php
                                        $paginator = $jurusan->onEachSide(1);
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
                                            <li class="page-item{{ $paginator->currentPage() == $page ? ' active' : '' }}">
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
                                    <small>Showing {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }} of {{ $paginator->total() }} entries</small>
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
