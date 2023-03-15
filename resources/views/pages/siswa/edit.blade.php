@extends('pages.layout.index')

@section('content')
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h6 class="font-weight-bolder text-white mt-3 mb-0">Create Data Siswa</h6>
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
                            <form action="{{ route('dataSiswa.update', $siswa->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">NISN</label>
                                        <input class="form-control" type="number" name="nisn" value="{{ $siswa->nisn }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">NIS</label>
                                        <input class="form-control" type="number" name="nis" value="{{ $siswa->nis }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nama</label>
                                        <input class="form-control" type="text" name="nama" value="{{ $siswa->nama }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Kelas</label>
                                        @foreach ($id_kelas as $kelas)
                                            <select name="id_kelas" class="form-control" value="{{ $siswa->id_kelas }}">
                                                <option value="{{ $kelas->nama_kelas }}">{{ $kelas->nama_kelas }}</option>
                                            </select>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">SPP</label>
                                        @foreach ($id_spp as $spp)
                                            <select name="id_spp" class="form-control" value="{{ $siswa->id_spp }}">
                                                <option value="{{ $spp->nominal }}">{{ $spp->nominal }}</option>
                                            </select>
                                    @endforeach
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Alamat</label>
                                        <textarea class="form-control" type="text" name="alamat" value="{{ $siswa->alamat }}"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">No Telp</label>
                                        <input class="form-control" type="number" name="no_telp" value="{{ $siswa->no_telp }}">
                                    </div>
                                </div>
                                <hr class="horizontal dark">
                                <div class="card-header pb-0">
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-primary btn-sm ms-auto">Save</button>
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
