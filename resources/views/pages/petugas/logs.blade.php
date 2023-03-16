@extends('pages.layout.index')

@section('content')
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h6 class="font-weight-bolder text-white mt-4 mb-0">Data Table Logs</h6>
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
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0 mt-5">
                            <table class="table align-items-center mt-5 mb-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9">No.</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9">Histori</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9">Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($logs as $row)
                                        <tr>
                                            <td class="text-xs font-weight-bolder opacity-7">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="text-xs font-weight-bolder opacity-7">
                                                <span class="text-info">{{ $row->user }}</span> {{ $row->message }}
                                            </td>
                                            <td class="text-xs font-weight-bolder opacity-7">
                                                {{ $row->created_at }}
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
