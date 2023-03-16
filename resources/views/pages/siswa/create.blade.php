@extends('pages.layout.index')

@section('content')
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h6 class="font-weight-bolder text-white mt-4 mb-0">Tambah Data Siswa</h6>
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
                            <form action="{{ route('dataSiswa.store') }}" method="post">
                                @csrf
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">NISN</label>
                                        <input class="form-control" type="number" name="nisn" placeholder="Masukkan nisn ..." required autofocus>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">NIS</label>
                                        <input class="form-control" type="number" name="nis" placeholder="Masukkan nis ..." required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nama</label>
                                        <input class="form-control" type="text" name="nama" placeholder="Masukkan nama ..." required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="example-text-input" class="form-control-label">Kelas</label>
                                        <select name="id_kelas" class="form-control" required>
                                            @foreach ($id_kelas as $kelas)
                                                <option value="{{ $kelas->nama_kelas }}">{{ $kelas->nama_kelas }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Alamat</label>
                                        <textarea class="form-control" type="text" name="alamat" placeholder="Masukkan alamat ..." required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">No Telp</label>
                                        <input class="form-control" type="number" name="no_telp" placeholder="Masukkan no telp ..." required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label label for="example-text-input" class="form-control-label">SPP</label>
                                        <select name="id_spp" class="form-control" required>
                                            @foreach ($id_spp as $spp)
                                                <option value="{{ $spp->nominal }}">{{ $spp->nominal }}</option>
                                            @endforeach
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
    </div>
</main>
@endsection
