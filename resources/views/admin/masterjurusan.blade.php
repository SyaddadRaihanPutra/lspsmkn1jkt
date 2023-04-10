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
              <form>
                <div class="mb-3">
                  <label class="form-label" for="basic-default-fullname">Nama Jurusan</label>
                  <input type="text" class="form-control" id="basic-default-fullname" placeholder="Contoh: TKP 1">
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
                                <td>{{ $j->nama_jurusan }}</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm"><i class='bx bx-edit'></i> Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm"> <i class='bx bx-trash'></i> Hapus</a>
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
@endsection
