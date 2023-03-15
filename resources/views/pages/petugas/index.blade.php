@extends('pages.layout.index')

@section('content')
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h6 class="font-weight-bolder text-white mt-3 mb-0">Data Petugas</h6>
        </nav>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
                <a href="{{ route('dataPetugas.create') }}">
                    <button class="btn btn-success d-flex justify-content-end btn-sm ms-auto">Create</button>
                </a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Username</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Petugas</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Level</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($petugas as $row)
                        <tr>
                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4">
                                {{ $loop->iteration }}
                            </td>
                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                {{ $row->username }}
                            </td>
                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                {{ $row->nama_petugas }}
                            </td>
                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                {{ $row->level }}
                            </td>
                            <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 d-flex">
                                <a href="{{ route('dataPetugas.edit', $row->id) }}">
                                    <button class="btn btn-warning me-2 btn-sm ms-auto">Edit</button>
                                </a>
                                <form action="{{ route('dataPetugas.destroy', $row->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-sm ms-auto">Delete</button>
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
