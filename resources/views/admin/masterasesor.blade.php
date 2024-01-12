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
                        Data Asesor
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
                            <h5 class="mb-0">Tambah Data Asesor</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('master-asesor-store') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Nama Asesor</label>
                                    <input type="text" class="form-control" name="name" placeholder="Contoh: Bambang">
                                </div>
                                <div class="mb-3">

                                </div>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl">
                    <div class="mb-4 card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Data Asesor</h5>
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
                                            <th>Nama Asesor</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                </table>
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-bordered table-striped">
                                        <tbody class="text-center">
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>
                                                        <a href="{{ route('master-asesor-edit',  $item->id) }}"
                                                            class="btn btn-primary"><i class='bx bx-edit-alt'></i></a>
                                                        <a href="/master-asesor-delete/{{ $item->id }}"
                                                            class="btn btn-danger"><i class='bx bx-trash'></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{ $data->links() }}
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
