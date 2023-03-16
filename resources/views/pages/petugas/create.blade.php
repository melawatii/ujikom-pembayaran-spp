@extends('pages.layout.index')

@section('content')
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h6 class="font-weight-bolder text-white mt-4 mb-0">Tambah Data Kelas</h6>
            </nav>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <form action="{{ route('dataPetugas.store') }}" method="post">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Username</label>
                                        <input class="form-control" type="text" name="username" placeholder="Masukkan username ...">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Password</label>
                                        <input class="form-control" type="password" name="password" placeholder="Masukkan password ...">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nama Petugas</label>
                                        <input class="form-control" type="text" name="nama_petugas" placeholder="Masukkan nama petugas ...">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Level</label>
                                        <select class="form-control" name="level">
                                            <option value="Admin">Admin</option>
                                            <option value="Petugas">Petugas</option>
                                            <option value="Siswa">Siswa</option>
                                        </select>
                                    </div>
                                </div>
                                <hr class="horizontal dark">
                                <div class="card-header pb-0">
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-primary btn-sm ms-auto">Simpan</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
