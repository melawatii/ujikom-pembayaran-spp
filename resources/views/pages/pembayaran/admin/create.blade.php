@extends('pages.layout.index')

@section('content')
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h6 class="font-weight-bolder text-white mt-4 mb-0">Tambah Data Pembayaran</h6>
            </nav>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="post" action="{{ route('dataPembayaran.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="id_petugas" class="form-control-label">Petugas</label>
                                        <input class="form-control" name="id_petugas" id="id_petugas" type="text" value="{{ Auth()->user()->nama_petugas }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="tunggakan" class="form-control-label">NISN</label>
                                        <select class="form-control" name="tunggakan" id="tunggakan" required autofocus>
                                            @foreach($id_tunggakan as $siswa)
                                                <option value="{{$siswa->id}}">{{$siswa->nisn}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama" class="form-control-label">Nama</label>
                                        <select class="form-control" name="nama" id="nama" required>
                                            @foreach($nisn as $siswa)
                                                <option value="{{$siswa->nisn}}">{{$siswa->nama}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="id_spp" class="form-control-label">SPP</label>
                                        <select class="form-control" name="id_spp" id="id_spp" required>
                                            @foreach($id_spp as $spp)
                                                <option value="{{$spp->nominal}}" data-nominal="{{$spp->nominal}}">{{ number_format($spp->nominal) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="bulan_dibayar" class="form-control-label">Jumlah Bulan</label>
                                        <input class="form-control" name="bulan_dibayar" id="bulan_dibayar" type="number" placeholder="Masukkan jumlah bulan dibayar ..." required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama_bulan" class="form-control-label">Bulan Dibayar</label>
                                        <br>
                                        {{-- <input class="form-control" name="nama_bulan" id="nama_bulan" type="text" placeholder="Masukkan nama bulan ..." required> --}}
                                        <input class="form" type="checkbox" name="nama_bulan" id="nama_bulan" value="Januari">
                                        <label class="form" for="nama_bulan">Januari</label> &nbsp;  &nbsp;
                                        <input class="form" type="checkbox" name="nama_bulan" id="nama_bulan" value="Februari">
                                        <label class="form" for="nama_bulan">Februari</label> &nbsp;  &nbsp;
                                        <input class="form" type="checkbox" name="nama_bulan" id="nama_bulan" value="Maret">
                                        <label class="form" for="nama_bulan">Maret</label> &nbsp;  &nbsp;
                                        <input class="form" type="checkbox" name="nama_bulan" id="nama_bulan" value="April">
                                        <label class="form" for="nama_bulan">April</label> &nbsp;  &nbsp;
                                        <input class="form" type="checkbox" name="nama_bulan" id="nama_bulan" value="Mei">
                                        <label class="form" for="nama_bulan">Mei</label> &nbsp;  &nbsp;
                                        <input class="form" type="checkbox" name="nama_bulan" id="nama_bulan" value="Juni">
                                        <label class="form" for="nama_bulan">Juni</label> &nbsp;  &nbsp;
                                        <input class="form" type="checkbox" name="nama_bulan" id="nama_bulan" value="Juli">
                                        <label class="form" for="nama_bulan">Juli</label> &nbsp;  &nbsp;
                                        <input class="form" type="checkbox" name="nama_bulan" id="nama_bulan" value="Agustus">
                                        <label class="form" for="nama_bulan">Agustus</label> &nbsp;  &nbsp;
                                        <input class="form" type="checkbox" name="nama_bulan" id="nama_bulan" value="September">
                                        <label class="form" for="nama_bulan">September</label> &nbsp;  &nbsp;
                                        <input class="form" type="checkbox" name="nama_bulan" id="nama_bulan" value="Oktober">
                                        <label class="form" for="nama_bulan">Oktober</label> &nbsp;  &nbsp;
                                        <input class="form" type="checkbox" name="nama_bulan" id="nama_bulan" value="November">
                                        <label class="form" for="nama_bulan">November</label> &nbsp;  &nbsp;
                                        <input class="form" type="checkbox" name="nama_bulan" id="nama_bulan" value="Desember">
                                        <label class="form" for="nama_bulan">Desember</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="jumlah_bayar" class="form-control-label">Jumlah bayar</label>
                                        <input class="form-control" name="jumlah_bayar" id="jumlah_bayar" type="number" readonly>
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
    document.querySelector('#bulan_dibayar').addEventListener('input', () => {
        const id_spp = parseInt(document.querySelector('#id_spp')[document.querySelector('#id_spp').selectedIndex].dataset.nominal)
        const bulan_dibayar = parseInt(document.querySelector('#bulan_dibayar').value)
        const jumlah_bayar = id_spp * bulan_dibayar
        document.querySelector('#jumlah_bayar').value = jumlah_bayar
    })
</script>
@endsection
