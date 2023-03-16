@extends('pages.layout.index')

@section('content')
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h6 class="font-weight-bolder text-white mt-4 mb-0">Data Petugas</h6>
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
                        <a href="{{ route('dataPetugas.create') }}">
                            <button class="btn btn-success d-flex justify-content-end btn-sm ms-auto">Tambah</button>
                        </a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9">No.</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9">Username</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9">Nama Petugas</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9">Level</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($petugas as $row)
                                        <tr>
                                            <td class="text-xs font-weight-bolder opacity-7">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="text-xs font-weight-bolder opacity-7">
                                                {{ $row->username }}
                                            </td>
                                            <td class="text-xs font-weight-bolder opacity-7">
                                                {{ $row->nama_petugas }}
                                            </td>
                                            <td class="text-xs font-weight-bolder opacity-7">
                                                {{ $row->level }}
                                            </td>
                                            <td class="text-xs font-weight-bolder opacity-7">
                                                <form action="{{ route('dataPetugas.destroy',$row->id) }}" method="POST">
                                                    <a href="{{ route('dataPetugas.edit', $row->id) }}" class="btn btn-sm mb-0 me-1 btn-warning">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Apakah Anda yakin?')" class="btn btn-sm mb-0 me-1 btn-danger">Hapus</button>
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
