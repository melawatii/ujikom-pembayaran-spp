@extends('pages.layout.index')

@section('content')
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h6 class="font-weight-bolder text-white mt-4 mb-0">Data Tunggakan</h6>
            </nav>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive mt-5 p-0">
                            <table class="table align-items-center mt-5 mb-0" id="dataTable">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9">No</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9">Petugas</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9">NISN</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9">Nama</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9">SPP</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9">Bulan Tunggakan</th>
                                        <th class="text-uppercase text-xs font-weight-bolder opacity-9">Total Tunggakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tunggakan as $row)
                                        <tr>
                                            <td class="text-xs font-weight-bolder opacity-7">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="text-xs font-weight-bolder opacity-7">
                                                {{ $row->id_petugas }}
                                            </td>
                                            <td class="text-xs font-weight-bolder opacity-7" >
                                                {{ $row->nisn }}
                                            </td>
                                            <td class="text-xs font-weight-bolder opacity-7">
                                                {{ $row->nama }}
                                            </td>
                                            <td class="text-xs font-weight-bolder opacity-7">
                                                Rp {{ number_format($row->id_spp) }}
                                            </td>
                                            @if($row->sisa_tunggakan <= 0)
                                                <td class="text-xs font-weight-bolder opacity-7 text-success">
                                                {{ $row->sisa_bulan }} Bulan
                                                </td>
                                            @elseif($row->sisa_tunggakan > 0)
                                                <td class="text-xs font-weight-bolder opacity-7 text-danger">
                                                {{ $row->sisa_bulan }} Bulan
                                                </td>
                                            @endif
                                            @if($row->sisa_tunggakan <= 0)
                                                <td class="text-xs font-weight-bolder opacity-7 text-success">
                                                Rp {{ number_format($row->sisa_tunggakan) }}
                                                </td>
                                            @elseif($row->sisa_tunggakan > 0)
                                                <td class="text-xs font-weight-bolder opacity-7 text-danger">
                                                Rp {{ number_format($row->sisa_tunggakan) }}
                                                </td>
                                            @endif
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
