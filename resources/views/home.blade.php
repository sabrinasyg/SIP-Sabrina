@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 style="text-align: center; color: white;">Welcome to SMA N 59 Jakarta</h1>
                                <div class="row">
                                    <div class="leftcolumn">
                                        <div class="card">
                                            <h2>Mari Kita Terapkan Protokol Kesehatan 3M</h2>
                                            <h5>Admin, Nov 15, 2020</h5>
                                            <img class="card-img-top align-self-center p-4" src="/img/3m.jpeg" alt="Card image cap" style="width: auto; height: auto">
                                            <p>Demi menghindari kita dari virus corona yang sedang merajalela di seluruh dunia, mari kita terapkan protokol kesehatan 3M sesuai yang telah dianjurkan oleh gubernur DKI Jakarta</p>
                                        </div>
                                        <div class="card">
                                            <h2>Seleksi Penerimaan Siswa Baru melalui PPDB</h2>
                                            <h5>Admin, Jun 8, 2020</h5>
                                            <img class="card-img-top align-self-center p-4" src="/img/ppdb.png" alt="Card image cap" style="width: 50%; height: 50%">
                                            <p>Kini pendaftaran penerimaan siswa baru sudah dibuka. Penerimaan siswa baru terdapat beberapa jalur seperti afirmasi, pindah dinas, prestasi dan wilayah lokal. Teruntuk siswa SMP silahkan memilih SMAN 59 melalui jalur PPDB online.</p>
                                        </div>
                                        <div class="card">
                                            <h2>Jadwal Pelaksanaan UN SMA&SMK 2020</h2>
                                            <h5>Admin, Mar 8, 2020</h5>
                                            <img class="card-img-top align-self-center p-4" src="/img/un.jpg" alt="Card image cap" style="width: 50%; height: 50%">
                                            <p>Ujian Nasional SMA & SMK semakin dekat. Teruntuk kelas 12, diharapkan mampu mempersiapkan diri untuk menghadapi ujian nasional ini. Semoga kalian tetap sehat, semangat dan pertahankan integritas tinggi kejujuran dalam mengerjakan soal.</p>
                                        </div>
                                    </div>
                                    <div class="rightcolumn">
                                        <div class="card" style="text-align: center;">
                                            <h3>Popular Post</h3>
                                            <img class="card-img-top align-self-center p-4" src="/img/kelas.jpg" alt="Card image cap" style="width: 100%; height: 100%">
                                            <p>Daftar Kelas Tahun 2019/2020</p>
                                            <img class="card-img-top align-self-center p-4" src="/img/un.jpg" alt="Card image cap" style="width: 100%; height: 100%">
                                            <p>Jadwal Pelaksanaaan UN SMA&SMK 2020</p>
                                            <img class="card-img-top align-self-center p-4" src="/img/kalender.jpg" alt="Card image cap" style="width: 100%; height: 100%">
                                            <p>Kalender Akademik Tahun 2019/2020</p>
                                        </div>
                                        <div class="card">
                                            <div class="w3-display-container w3-text-white">
                                                <img src="/img/indo.jpg" alt="Weather" style="width:100%">
                                                <div class="w3-xlarge">Jakarta 32&deg; C</div>
                                            </div><br>
                                            <div class="w3-row" style="text-align:center;">
                                                <div class="w3-third w3-center">
                                                    <h5>MON</h5>
                                                    <img src="/img/cuaca1.png" alt="sun" style="width:30px">
                                                </div>
                                                <div class="w3-third w3-center">
                                                    <h5>TUE</h5>
                                                    <img src="/img/cuaca2.png" alt="cloud" style="width:30px">
                                                </div>
                                                <div class="w3-third w3-center w3-margin-bottom">
                                                    <h5>WED</h5>
                                                    <img src="/img/cuaca3.png" alt="clouds" style="width:30px">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection