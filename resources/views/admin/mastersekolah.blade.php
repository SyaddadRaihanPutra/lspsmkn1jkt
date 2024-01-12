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
                        Data Sekolah
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
                            <h5 class="mb-0">Tambah Data Sekolah</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('master-sekolah-store') }}">
                                @csrf
                                @method('POST')
                                <div class="mb-3">
                                    <label class="form-label" for="nama_sekolah">Nama Sekolah</label>
                                    <input type="text" class="form-control" name="nama_Sekolah"
                                        id="nama_sekolah" placeholder="Contoh: SMKN 1 Jakarta">
                                </div>
                                <div class="mb-3">
                                    <label for="no_telp" class="form-label">No. Telepon</label>
                                    <input type="number" class="form-control" name="no_telp" id="no_telp"
                                        placeholder="Contoh: 081234567890">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat" rows="3"
                                        placeholder="Contoh: Jl. Raya Bogor KM 30"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl">
                    <div class="mb-4 card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Data Sekolah</h5>
                        </div>
                        <div class="card-body">
                            <form class="mb-4 d-flex" method="GET" action="/master-Sekolah">
                                <input class="form-control me-2" type="search" name="search" placeholder="Search"
                                    aria-label="Search">
                                <button class="btn btn-outline-primary" type="submit">Search</button>
                            </form>
                            <div class="table-responsive text-nowrap">
                                <table class="table text-center table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Sekolah</th>
                                            <th>Alamat</th>
                                            <th>No. Telp</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($sekolah as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama_sekolah }}</td>
                                                <td>{{ $item->alamat }}</td>
                                                <td>{{ $item->no_telp }}</td>
                                                <td>
                                                    <a href="{{ route('master-sekolah-edit', $item->id_sekolah) }}"
                                                        class="btn btn-warning">Edit</a>
                                                    <a href="{{ route('master-sekolah-delete', $item->id_sekolah) }}"
                                                        class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
