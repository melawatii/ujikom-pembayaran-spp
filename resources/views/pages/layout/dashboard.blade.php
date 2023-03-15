@extends('pages.layout.index')

@section('content')
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h6 class="font-weight-bolder text-white mt-4 mb-0">Dashboard Aplikasi Pembayaran SPP</h6>
            </nav>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <?php
                            date_default_timezone_set('Asia/Jakarta');
                            echo date('d-m-Y');
                            echo ' &nbsp;&nbsp; <i id="h"></i> : <i id="m"></i> : <i id="s"></i>';
                        ?>
                        <br>
                        Halo, <b>{{ Auth::user()->nama_petugas }}</b>
                        <br>
                        Selamat datang kembali di Aplikasi Pembayaran SPP
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    window.setTimeout("waktu()", 1000);
    function waktu() {
        var waktu = new Date();
        setTimeout("waktu()", 1000);
        document.getElementById("h").innerHTML = waktu.getHours();
        document.getElementById("m").innerHTML = waktu.getMinutes();
        document.getElementById("s").innerHTML = waktu.getSeconds();
    }
</script>
@endsection
