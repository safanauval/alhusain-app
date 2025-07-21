@extends('layouts.sidebar')

@section('title', 'Daftar Kelas')

@section('content')
    <!-- Style CSS -->
    <link href="{{ asset('css/pages.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/classlist.css') }}" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- Header -->
            <h2 class="display-6 mb-4"><strong>Daftar Kelas</strong></h2>

            <!-- Tab Navigation -->
            <ul class="nav nav-tabs mb-4" id="classTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="kb-tab" data-bs-toggle="tab" data-bs-target="#kb" type="button"
                        role="tab" aria-controls="kb" aria-selected="true">
                        <strong>KB</strong>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tk-a-tab" data-bs-toggle="tab" data-bs-target="#tk-a" type="button"
                        role="tab" aria-controls="tk-a" aria-selected="false">
                        <strong>TK A</strong>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="tk-b-tab" data-bs-toggle="tab" data-bs-target="#tk-b" type="button"
                        role="tab" aria-controls="tk-b" aria-selected="false">
                        <strong>TK B</strong>
                    </button>
                </li>
            </ul>

            <!-- Tab Content -->
            <div class="tab-content" id="classTabsContent">
                <!-- KB Tab -->
                <div class="tab-pane fade show active" id="kb" role="tabpanel" aria-labelledby="kb-tab">
                    <div class="card mb-4">
                        <div class="card-header bg-white d-flex align-items-center">
                            <i class="bi bi-people-fill me-2"></i>
                            <h5 class="mb-0">Daftar Siswa KB</h5>
                            <span class="badge bg-primary ms-auto">{{ $kb->count() }} Siswa</span>
                        </div>
                        <div class="card-body">
                            @if($kb->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>NISN</th>
                                                <th>Nama</th>
                                                <th>Guru</th>
                                                <th>Tahun Lahir</th>
                                                <th>Tahun Ajaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($kb as $student)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $student->nisn }}</td>
                                                    <td>{{ $student->nama }}</td>
                                                    <td>{{ $student->guru_kelas }}</td>
                                                    <td>{{ $student->tahun_lahir }}</td>
                                                    <td>{{ $student->tahun_ajaran }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-info">Tidak ada siswa di kelas KB</div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- TK A Tab -->
                <div class="tab-pane fade" id="tk-a" role="tabpanel" aria-labelledby="tk-a-tab">
                    <div class="card mb-4">
                        <div class="card-header bg-white d-flex align-items-center">
                            <i class="bi bi-people-fill me-2"></i>
                            <h5 class="mb-0">Daftar Siswa TK A</h5>
                            <span class="badge bg-primary ms-auto">{{ $tkA->count() }} Siswa</span>
                        </div>
                        <div class="card-body">
                            @if($tkA->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>NISN</th>
                                                <th>Nama</th>
                                                <th>Guru</th>
                                                <th>Tahun Lahir</th>
                                                <th>Tahun Ajaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tkA as $student)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $student->nisn }}</td>
                                                    <td>{{ $student->nama }}</td>
                                                    <td>{{ $student->guru_kelas }}</td>
                                                    <td>{{ $student->tahun_lahir }}</td>
                                                    <td>{{ $student->tahun_ajaran }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-info">Tidak ada siswa di kelas TK A</div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- TK B Tab -->
                <div class="tab-pane fade" id="tk-b" role="tabpanel" aria-labelledby="tk-b-tab">
                    <div class="card mb-4">
                        <div class="card-header bg-white d-flex align-items-center">
                            <i class="bi bi-people-fill me-2"></i>
                            <h5 class="mb-0">Daftar Siswa TK B</h5>
                            <span class="badge bg-primary ms-auto">{{ $tkB->count() }} Siswa</span>
                        </div>
                        <div class="card-body">
                            @if($tkB->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>NISN</th>
                                                <th>Nama</th>
                                                <th>Guru</th>
                                                <th>Tahun Lahir</th>
                                                <th>Tahun Ajaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tkB as $student)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $student->nisn }}</td>
                                                    <td>{{ $student->nama }}</td>
                                                    <td>{{ $student->guru_kelas }}</td>
                                                    <td>{{ $student->tahun_lahir }}</td>
                                                    <td>{{ $student->tahun_ajaran }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-info">Tidak ada siswa di kelas TK B</div>
                            @endif
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection