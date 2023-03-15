@extends('pages.layout.index')

@section('content')
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h6 class="font-weight-bolder text-white mt-4 mb-0">Edit Data Tunggakan</h6>
            </nav>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="post" action="{{ route('dataTunggakan.update', $tunggakan->id) }}">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Petugas</label>
                                        <input class="form-control" name="id_petugas" id="id_petugas" type="text" value="{{ Auth()->user()->nama_petugas }}" value="{{ $tunggakan->id_petugas }}" readonly>
                                        @error('id_petugas')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">NISN</label>
                                        <select class="form-control" name="nisn" id="nisn" value="{{ old('nisn') }}" value="{{ $tunggakan->nisn }}" required autofocus>
                                            @foreach($nisn as $siswa)
                                                <option value="{{$siswa->nisn}}">{{$siswa->nisn}}</option>
                                            @endforeach
                                        </select>
                                        @error('nisn')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nama</label>
                                        <select class="form-control" name="nama" id="nama" value="{{ old('nisn') }}" value="{{ $tunggakan->nama }}" required>
                                            @foreach($nisn as $siswa)
                                                <option value="{{$siswa->nama}}">{{$siswa->nama}}</option>
                                            @endforeach
                                        </select>
                                        @error('nisn')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">SPP</label>
                                        <select class="form-control" name="id_spp" id="id_spp" value="{{ old('id_spp') }}" value="{{ $tunggakan->id_spp }}" required>
                                            @foreach($id_spp as $spp)
                                                <option value="{{$spp->nominal}}" data-nominal="{{$spp->nominal}}">{{ number_format($spp->nominal) }}</option>
                                            @endforeach
                                        </select>
                                        @error('id_spp')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Bulan Tunggakan</label>
                                        <input class="form-control" name="bulan_tunggakan" id="bulan_tunggakan" type="number" placeholder="Masukkan jumlah bulan tunggakan ..." value="{{ old('bulan_tunggakan') }} value="{{ $tunggakan->bulan_tunggakan }}" required>
                                        @error('bulan_tunggakan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Total Tunggakan</label>
                                        <input class="form-control" name="total_tunggakan" id="total_tunggakan" type="number" value="{{ old('total_tunggakan') }}" value="{{ $tunggakan->total_tunggakan }}" readonly>
                                        @error('total_tunggakan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <div class="d-flex justify-content-end mt-4">
                                <button class="btn btn-primary btn-sm me-3">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    document.querySelector('#bulan_tunggakan').addEventListener('input', () => {
        const id_spp = parseInt(document.querySelector('#id_spp')[document.querySelector('#id_spp').selectedIndex].dataset.nominal)
        const bulan_tunggakan = parseInt(document.querySelector('#bulan_tunggakan').value)
        const total_tunggakan = id_spp * bulan_tunggakan
        document.querySelector('#total_tunggakan').value = total_tunggakan
    })
</script>
@endsection
