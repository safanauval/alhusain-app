@extends('layouts.sidebar')

@section('title', 'Dashboard')

@section('content')
    <!-- Style CSS -->
    <link href="{{ asset('css/pages.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" />

    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- Halaman -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="display-6"><strong>Dashboard</strong></h2>
            </div>
            <!-- Cards Summary -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card text-dark bg-white mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Hallo, Selamat Datang!</strong></h5>
                            <p class="card-text display-6"><strong><i class="bi bi-person-square"></i>
                                    {{ session('username') }}</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-dark bg-info mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Jumlah Siswa Laki-Laki</strong> <i class="bi bi-gender-male"></i>
                            </h5>
                            <p class="card-text display-6"><strong>{{ $lakilaki }}</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-dark mb-3" style="background-color: #f78fb3;">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Jumlah Siswa Perempuan</strong> <i
                                    class="bi bi-gender-female"></i></h5>
                            <p class="card-text display-6"><strong>{{ $perempuan }}</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-dark bg-danger mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Jumlah Siswa KB</strong> <i class="bi bi-collection"></i></h5>
                            <p class="card-text display-6"><strong>{{ $kbCount }}</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-dark bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Jumlah Siswa TK A</strong> <i class="bi bi-collection"></i></h5>
                            <p class="card-text display-6"><strong>{{ $tkACount }}</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-dark bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Jumlah Siswa TK B</strong> <i class="bi bi-collection"></i></h5>
                            <p class="card-text display-6"><strong>{{ $tkBCount }}</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection