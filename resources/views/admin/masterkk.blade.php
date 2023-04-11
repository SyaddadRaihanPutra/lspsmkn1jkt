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
                                    <label class="form-label" for="nama_ketua_kelas">Nama Ketua Kelas</label>
                                    <input list="nama-ketua-kelas" class="form-control" id="nama_ketua_kelas" name="name"
                                        placeholder="Contoh: Ketua Kelas - X TKP 1" required>
                                        <datalist id="nama-ketua-kelas">
                                            <option value="Ketua Kelas ">
                                        </datalist>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="example@smkn1jkt.sch.id" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="******" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="kelas_id">Role</label>
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
                                    <label class="form-label" for="kelas_id">Nama Kelas</label>
                                    <select name="kelas_id" id="kelas_id" class="form-select" required>
                                        <option value="">---- Pilih Kelas ----</option>
                                        @foreach (\App\Models\Kelas::pluck('nama_kelas', 'id') as $kelas_id => $nama_kelas)
                                            <option value="{{ $kelas_id }}">{{ $nama_kelas }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="jurusan_id">Nama Jurusan</label>
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
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-xl">
                    <div class="mb-4 card">
                        <div class="card-header d-flex justify-content-between align-items-center">
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
                                                    <a href="#" class="btn btn-primary btn-sm"><i
                                                            class='bx bx-edit'></i> Edit</a>
                                                    <form action="{{ route('master-user.delete', $kk->id) }}"
                                                        method="POST" style="display: inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button onclick="return confirm('Yakin ingin menghapus {{ $kk->name }}')" type="submit" class="btn btn-danger btn-sm"><i
                                                                class='bx bx-trash'></i> Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-4">
                                    {{ $ketuakelas->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
    @endsection
