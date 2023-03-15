@extends('pages.layout.index')

@section('content')
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h6 class="font-weight-bolder text-white mt-4 mb-0">Data Siswa</h6>
            </nav>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    @if(session()->has('message'))
                        <div class="mt-4 ms-3 me-3 text-light fw-bold alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div class="card-header pb-0">
                        <a href="{{ route('dataSiswa.create') }}">
                            <button class="btn btn-success d-flex justify-content-end btn-sm ms-auto">Tambah</button>
                        </a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9">No.</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9">NISN</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9">NIS</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9">Nama</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9">Kelas</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9">Alamat</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9">No Telp</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9">SPP</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($siswa as $row)
                                        <tr>
                                            <td class="text-xs font-weight-bolder opacity-7" align="center">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="text-xs font-weight-bolder opacity-7" align="center">
                                                {{ $row->nisn }}
                                            </td>
                                            <td class="text-xs font-weight-bolder opacity-7" align="center">
                                                {{ $row->nis }}
                                            </td>
                                            <td class="text-xs font-weight-bolder opacity-7">
                                                {{ $row->nama }}
                                            </td>
                                            <td class="text-xs font-weight-bolder opacity-7">
                                                {{ $row->id_kelas }}
                                            </td>
                                            <td class="text-xs font-weight-bolder opacity-7">
                                                {{ $row->alamat }}
                                            </td>
                                            <td class="text-xs font-weight-bolder opacity-7">
                                                {{ $row->no_telp }}
                                            </td>
                                            <td class="text-xs font-weight-bolder opacity-7">
                                                Rp {{ number_format($row->id_spp) }}
                                            </td>
                                            <td class="text-xs font-weight-bolder opacity-7 d-flex">
                                                <a href="{{ route('dataSiswa.edit', $row->id) }}">
                                                    <button class="btn btn-warning me-2 btn-sm ms-auto">Edit</button>
                                                </a>
                                                <form action="{{ route('dataSiswa.destroy', $row->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm ms-auto">Hapus</button>
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
</main>
@endsection
