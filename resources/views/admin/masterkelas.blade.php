@extends('layouts.admin.main_layouts')

@section('title', 'Data Kelas')

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
                        Data Kelas
                    </li>
                </ol>
            </nav>

            <!-- Basic Layout -->
            <div class="row">
                <div class="col-xl">
                    <div class="mb-4 card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Tambah Data Kelas</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('master-kelas.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label" for="basic-default-fullname">Nama Kelas</label>
                                    <input type="text" class="form-control" name="kelas" id="basic-default-fullname"
                                        placeholder="Contoh: X">
                                </div>
                                <button type="submit" class="btn btn-primary">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl">
                    <div class="mb-4 card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Data Kelas</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive text-nowrap">
                                <table class="table text-center table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Kelas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kelas as $k)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $k->nama_kelas }}</td>
                                                <td>
                                                    <form action="{{ route('master-kelas.delete', $k->id) }}" method="POST"
                                                        id="deleteForm">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-danger btn-sm"
                                                            id="deleteBtn"><i class='bx bx-trash'></i> Delete</button>
                                                    </form>
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

        <!-- Include SweetAlert2 library -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Add a script to handle the delete confirmation -->
        <script>
            document.getElementById('deleteBtn').addEventListener('click', function() {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You are about to delete class {{ $k->nama_kelas }}!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                    customClass: {
                        container: 'my-swal-container' // Add your custom class name here
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('deleteForm').submit();
                    }
                });
            });
        </script>
        <style>
            /* Define your custom class */
            .my-swal-container {
                z-index: 9999;
            }
        </style>
    @endsection
