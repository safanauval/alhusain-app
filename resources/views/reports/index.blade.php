@extends('layouts.sidebar')

@section('title', 'Rapor')

@section('content')
    <!-- Style CSS -->
    <link href="{{ asset('css/pages.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/report.css') }}" rel="stylesheet" />

    <!-- JavaScript -->
    <script src="{{ asset('js/reportmodal.js') }}"></script>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="display-6"><strong>Daftar Rapor Siswa</strong></h2>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addReportModal">
                    <i class="bi bi-plus-lg"></i><span class="text-button"> Tambah Rapor</span>
                </button>
            </div>

            <!-- Success/Error Messages -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

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
                            <i class="bi bi-table me-2"></i>
                            <h5 class="mb-0">Daftar Rapor KB</h5>
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
                                                <th>Kelas</th>
                                                <th>Tahun Ajaran</th>
                                                <th>Semester</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($kb as $report)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $report->nisn }}</td>
                                                    <td>{{ $report->nama }}</td>
                                                    <td>{{ $report->kelas }}</td>
                                                    <td>{{ $report->tahun_ajaran }}</td>
                                                    <td>{{ $report->semester }}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-info view-report-btn" data-bs-toggle="modal"
                                                            data-bs-target="#viewReportModal" data-id="{{ $report->id_report }}"
                                                            data-nisn="{{ $report->nisn }}" data-nama="{{ $report->nama}}"
                                                            data-kelas="{{ $report->kelas}}"
                                                            data-tahun_ajaran="{{ $report->tahun_ajaran }}">
                                                            <i class=" bi bi-eye"></i><span class="text-button"> Lihat</span>
                                                        </button>
                                                        <button class="btn btn-sm btn-warning edit-report-btn"
                                                            data-bs-toggle="modal" data-bs-target="#editReportModal"
                                                            data-id="{{ $report->id_report }}">
                                                            <i class="bi bi-pencil-square"></i><span class="text-button">
                                                                Edit</span>
                                                        </button>
                                                        <button class="btn btn-sm btn-danger delete-report-btn"
                                                            data-bs-toggle="modal" data-bs-target="#deleteReportModal"
                                                            data-nisn="{{ $report->nisn }}" data-nama="{{ $report->nama }}">
                                                            <i class="bi bi-trash"></i><span class="text-button"> Hapus</span>
                                                        </button>
                                                        <button class="btn btn-sm btn-success print-report-btn"
                                                            data-bs-toggle="modal" data-bs-target="#printReportModal"
                                                            data-report-name="{{ $report->nama }}" data-nisn="{{ $report->nisn }}">
                                                            <i class="bi bi-file-earmark-pdf"></i> <span class="text-button"> Cetak
                                                                PDF</span>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-info">Tidak ada data rapor KB</div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- TK A Tab -->
                <div class="tab-pane fade" id="tk-a" role="tabpanel" aria-labelledby="tk-a-tab">
                    <div class="card mb-4">
                        <div class="card-header bg-white d-flex align-items-center">
                            <i class="bi bi-table me-2"></i>
                            <h5 class="mb-0">Daftar Rapor TK A</h5>
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
                                                <th>Kelas</th>
                                                <th>Tahun Ajaran</th>
                                                <th>Semester</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tkA as $report)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $report->nisn }}</td>
                                                    <td>{{ $report->nama }}</td>
                                                    <td>{{ $report->kelas }}</td>
                                                    <td>{{ $report->tahun_ajaran }}</td>
                                                    <td>{{ $report->semester }}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-info view-report-btn" data-bs-toggle="modal"
                                                            data-bs-target="#viewReportModal" data-id="{{ $report->id_report }}"
                                                            data-nisn="{{ $report->nisn }}" data-nama="{{ $report->nama}}"
                                                            data-kelas="{{ $report->kelas}}"
                                                            data-tahun_ajaran="{{ $report->tahun_ajaran }}">
                                                            <i class=" bi bi-eye"></i><span class="text-button"> Lihat</span>
                                                        </button>
                                                        <button class="btn btn-sm btn-warning edit-report-btn"
                                                            data-bs-toggle="modal" data-bs-target="#editReportModal"
                                                            data-id="{{ $report->id_report }}">
                                                            <i class="bi bi-pencil-square"></i><span class="text-button">
                                                                Edit</span>
                                                        </button>
                                                        <button class="btn btn-sm btn-danger delete-report-btn"
                                                            data-bs-toggle="modal" data-bs-target="#deleteReportModal"
                                                            data-nisn="{{ $report->nisn }}" data-nama="{{ $report->nama }}">
                                                            <i class="bi bi-trash"></i><span class="text-button"> Hapus</span>
                                                        </button>
                                                        <button class="btn btn-sm btn-success print-report-btn"
                                                            data-bs-toggle="modal" data-bs-target="#printReportModal"
                                                            data-report-name="{{ $report->nama }}" data-nisn="{{ $report->nisn }}">
                                                            <i class="bi bi-file-earmark-pdf"></i> <span class="text-button"> Cetak
                                                                PDF</span>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-info">Tidak ada data rapor TK A</div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- TK B Tab -->
                <div class="tab-pane fade" id="tk-b" role="tabpanel" aria-labelledby="tk-b-tab">
                    <div class="card mb-4">
                        <div class="card-header bg-white d-flex align-items-center">
                            <i class="bi bi-table me-2"></i>
                            <h5 class="mb-0">Daftar Rapor TK B</h5>
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
                                                <th>Kelas</th>
                                                <th>Tahun Ajaran</th>
                                                <th>Semester</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($tkB as $report)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $report->nisn }}</td>
                                                    <td>{{ $report->nama }}</td>
                                                    <td>{{ $report->kelas }}</td>
                                                    <td>{{ $report->tahun_ajaran }}</td>
                                                    <td>{{ $report->semester }}</td>
                                                    <td>
                                                        <button class="btn btn-sm btn-info view-report-btn" data-bs-toggle="modal"
                                                            data-bs-target="#viewReportModal" data-id="{{ $report->id_report }}"
                                                            data-nisn="{{ $report->nisn }}" data-nama="{{ $report->nama}}"
                                                            data-kelas="{{ $report->kelas}}"
                                                            data-tahun_ajaran="{{ $report->tahun_ajaran }}">
                                                            <i class=" bi bi-eye"></i><span class="text-button"> Lihat</span>
                                                        </button>
                                                        <button class="btn btn-sm btn-warning edit-report-btn"
                                                            data-bs-toggle="modal" data-bs-target="#editReportModal"
                                                            data-id="{{ $report->id_report }}">
                                                            <i class="bi bi-pencil-square"></i><span class="text-button">
                                                                Edit</span>
                                                        </button>
                                                        <button class="btn btn-sm btn-danger delete-report-btn"
                                                            data-bs-toggle="modal" data-bs-target="#deleteReportModal"
                                                            data-nisn="{{ $report->nisn }}" data-nama="{{ $report->nama }}">
                                                            <i class="bi bi-trash"></i><span class="text-button"> Hapus</span>
                                                        </button>
                                                        <button class="btn btn-sm btn-success print-report-btn"
                                                            data-bs-toggle="modal" data-bs-target="#printReportModal"
                                                            data-report-name="{{ $report->nama }}" data-nisn="{{ $report->nisn }}">
                                                            <i class="bi bi-file-earmark-pdf"></i> <span class="text-button"> Cetak
                                                                PDF</span>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-info">Tidak ada data rapor TK B</div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Add Report Modal -->
    <div class="modal fade" id="addReportModal" tabindex="-1" aria-labelledby="addReportModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addReportModalLabel">Tambah Rapor Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('reports.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- Header Section -->
                        <div class="table-responsive">
                            <table class="table table-bordered evaluation-table">
                                <thead>
                                    <tr style="border:none;">
                                        <th colspan="3" style="border:none;">
                                            <select class="form-select form-select-sm" id="nisn" name="nisn" required>
                                                <option value="">- Pilih Siswa -</option>
                                                @foreach($students as $student)
                                                    <option value="{{ $student->nisn }}" data-nama="{{ $student->nama }}"
                                                        data-kelas="{{ $student->kelas }}"
                                                        data-guru-kelas="{{ $student->guru_kelas }}"
                                                        data-tahun_ajaran="{{ $student->tahun_ajaran }}">
                                                        {{ $student->nama }} ({{ $student->kelas }})
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('nisn')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </th>
                                        <th colspan="4" style="border:none;">
                                            <select class="form-select form-select-sm" name="semester" required>
                                                <option value="">- Pilih Semester -</option>
                                                <option value="1">Semester 1</option>
                                                <option value="2">Semester 2</option>
                                            </select>
                                        </th>
                                    </tr>
                                    <tr style="border:none;">
                                        <th colspan="7" class="text-center" style="border:none;">LAPORAN CAPAIAN
                                            PEMBELAJARAN SISWA</th>
                                    </tr>
                                    <tr style="border:none;">
                                        <th colspan="7" class="text-center" style="border:none;" id="display-kelas">KELAS
                                        </th>
                                    </tr>
                                    <tr style="border:none;">
                                        <th colspan="7" class="text-center" style="border:none;">SEMESTER</th>
                                    </tr>
                                    <tr style="border:none;">
                                        <th colspan="7" class="text-center" style="border:none;">TAHUN PELAJARAN <span
                                                id="display-tahun">TAHUN</span></th>
                                    </tr>
                                    <tr style="border:none;">
                                    <tr style="border:none;">
                                        <th colspan="2" style="border:none;"></th>
                                        <th colspan="3" class="text-center" style="border:none;" id="display-nama">NAMA
                                            SISWA</th>
                                        <th colspan="2" style="border:none;"></th>
                                    </tr>
                                    <tr>
                                        <th width="65%" colspan="2" style="text-align: center;">CAPAIAN PEMBELAJARAN</th>
                                        <th width="5%" style="text-align: center;">BM</th>
                                        <th width="5%" style="text-align: center;">MM</th>
                                        <th width="5%" style="text-align: center;">BSH</th>
                                        <th width="5%" style="text-align: center;">BSB</th>
                                        <th width="15%" style="text-align: center;">KET</th>
                                    </tr>
                                </thead>
                                <!-- Evaluation Table -->
                                <tbody>
                                    <!-- A. NILAI AGAMA DAN BUDI PEKERTI -->
                                    <tr class="section-header">
                                        <td colspan="7">A.<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>NILAI AGAMA DAN BUDI
                                            PEKERTI</td>
                                    </tr>
                                    <!-- POIN A1 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>1</strong>
                                        </td>
                                        <td><strong>Dapat mengucapkan bacaan doa dan lagu keagamaan sederhana</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1.1. Mengikuti bacaan doa/berdoa sebelum dan sesudah kegiatan</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="A11" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('A11')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_A11">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1.2. Menirukan lagu-lagu keagamaan</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="A12" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('A12')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_A12">
                                        </td>
                                    </tr>
                                    <!-- POIN A2 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>2</strong>
                                        </td>
                                        <td><strong>Dapat mengucapkan bacaan doa dan lagu keagamaan sederhana</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>2.1. Mengikuti bacaan doa/berdoa sebelum dan sesudah kegiatan</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="A21" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('A21')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_A21">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2.2. Menirukan lagu-lagu keagamaan</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="A22" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('A22')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_A22">
                                        </td>
                                    </tr>
                                    <!-- POIN A3 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>3</strong>
                                        </td>
                                        <td><strong>Mengucap doa sebelum dan sesudah melakukan sesuatu</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>3.1. Doa sebelum melakukan kegiatan </td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="A31" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('A31')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_A31">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3.2. Doa setelah melakukan kegiatan</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="A32" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('A32')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_A32">
                                        </td>
                                    </tr>
                                    <!-- POIN A4 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>4</strong>
                                        </td>
                                        <td><strong>Mengenal berprilaku baik dan sopan</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>4.1. Berbicara/ berbahasa yang baik/sopan dengan sesama teman</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="A41" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('A41')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_A41">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4.2. Bersikap ramah</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="A42" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('A42')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_A42">
                                        </td>
                                    </tr>
                                    <!-- POIN A5 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>5</strong>
                                        </td>
                                        <td><strong>Membiasakan diri berprilaku baik</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>5.1. Menggunakan barang orang lain dengan hati-hati</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="A51" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('A51')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_A51">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5.2. Mau menghormati teman, guru,orang tua atau orang dewasa lainnya</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="A52" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('A52')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_A52">
                                        </td>
                                    </tr>
                                    <!-- POIN A6 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>6</strong>
                                        </td>
                                        <td><strong>Dapat mengenal sopan santun dan mulai berperilaku saling
                                                menghormati</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>6.1. Membiasakan diri mengucapkan salam</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="A61" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('A61')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_A61">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6.2. Membiasakan diri membalas salam</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="A62" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('A62')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_A62">
                                        </td>
                                    </tr>
                                    <!--Iqro Section -->
                                    <tr>
                                        <td rowspan="2" style="vertical-align: top; text-align: center;"><strong>7</strong>
                                        </td>
                                        <td><strong>Perkembangan membaca Iqro'</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jilid ......<input type="number" class="form-control-sm text-center"
                                                style="width: 25px; border:none;" name="A7JIL" min="1" max="6">.......
                                            Halaman ......<input type="number" class="form-control-sm text-center"
                                                style="width: 35px; border:none;" name="A7HAL" min="1" max="30">......
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="keterangan_A7">
                                        </td>
                                    </tr>
                                    <!-- B. JATI DIRI -->
                                    <tr class="section-header">
                                        <td colspan="7">B.<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>JATI DIRI</td>
                                    </tr>
                                    <!-- Poin B1 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>1</strong>
                                        </td>
                                        <td><strong>Dapat berinteraksi dengan teman sebaya dan orang dewasa yang
                                                dikenal</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1.1. Senang bermain dengan teman</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="B11" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('B11')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_B11">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1.2. Mampu bekerja sendiri</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="B12" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('B12')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_B12">
                                        </td>
                                    </tr>
                                    <!-- POIN B2 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>2</strong>
                                        </td>
                                        <td><strong>Mau berbagi, menolong dan membantu teman</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>2.1. Mau berbagi dengan teman</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="B21" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('B21')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_B21">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2.2. Bersedia bermain dengan teman</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="B22" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('B22')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_B22">
                                        </td>
                                    </tr>
                                    <!-- POIN B3 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>3</strong>
                                        </td>
                                        <td><strong>Menunjukkan antusiasme dalam melakukan permainan kompetitif secara
                                                positif</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>3.1. Mau mengikuti lomba dalam permainan</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="B31" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('B31')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_B31">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3.2. Bersikap sportif dalam permainan</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="B32" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('B32')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_B32">
                                        </td>
                                    </tr>
                                    <!-- C. DASAR DASAR LITERASI,MATEMATIK,SAINS,TEKNOLOGI DAN SENI-->
                                    <tr class="section-header">
                                        <td colspan="7">C.<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>DASAR DASAR
                                            LITERASI,MATEMATIK,SAINS,TEKNOLOGI DAN
                                            SENI</td>
                                    </tr>
                                    <!-- POIN C1 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>1</strong>
                                        </td>
                                        <td><strong>Bahasa</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1.1. Mengikuti dua petunjuk atau lebih petunjuk/perintah</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="C11" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('C11')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_C11">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1.2. Bertanya dan berkomentar tentang cerita yang di dengar</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="C12" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('C12')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_C12">
                                        </td>
                                    </tr>
                                    <!-- POIN C2 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>2</strong>
                                        </td>
                                        <td><strong>Keaksaraan</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>2.1. Meniru huruf</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="C21" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('C21')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_C21">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2.2. Membuat huruf</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="C22" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('C22')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_C22">
                                        </td>
                                    </tr>
                                    <!-- POIN C3 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>3</strong>
                                        </td>
                                        <td><strong>Mulai menunjukkan dorongan untuk membaca</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>3.1. Tertarik pada buku cerita</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="C31" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('C31')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_C31">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3.2. Meminta untuk dibacakan buku cerita</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="C32" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('C32')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_C32">
                                        </td>
                                    </tr>
                                    <!-- D. MATEMATIKA/NALAR-->
                                    <tr class="section-header">
                                        <td colspan="7">D.<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>MATEMATIKA/NALAR</td>
                                    </tr>
                                    <!-- POIN D1 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>1</strong>
                                        </td>
                                        <td><strong>Dapat mengenal klasifikasi sederhana</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1.1. Mengelompokkan benda berdasarkan ciri tertentu (menurut
                                            warna,ukuran,bentuk)</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="D11" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('D11')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_D11">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1.2. Menunjukkan benda yang memiliki ciri tertentu ( misal: kasar, halus)</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="D12" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('D12')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_D12">
                                        </td>
                                    </tr>
                                    <!-- POIN D2 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>2</strong>
                                        </td>
                                        <td><strong>Mulai menunjukkan tentang konsep bilangan</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>2.1. Mengenal konsep bilangan 1-10</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="D21" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('D21')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_D21">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2.2. Mampu berhitung 1-10</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="D22" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('D22')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_D22">
                                        </td>
                                    </tr>
                                    <!-- POIN D3 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>3</strong>
                                        </td>
                                        <td><strong>Menunjukkan pemaaman tentan geometri</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>3.1. Menunjukkan bentuk geometri (lingkaran,segitiga,segi empat)</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="D31" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('D31')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_D31">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3.2. Membedakan benda berdasarkan bentuk geometri</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="D32" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM">BM</option>
                                                <option value="MM">MM</option>
                                                <option value="BSH">BSH</option>
                                                <option value="BSB">BSB</option>
                                            </select>
                                            @error('D32')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_D32">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Teacher Signature -->
                        <div class="row mt-4">
                            <div class="col-md-6 offset-md-6 text-center">
                                <div class="form-group">
                                    <label>Guru Kelas</label>
                                    <input type="text" class="form-control" name="guru_kelas">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Rapor</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- View Report Modal -->
    <div class="modal fade" id="viewReportModal" tabindex="-1" aria-labelledby="viewReportModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewReportModalLabel">Detail Rapor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="viewReportForm">
                    @csrf
                    @isset($report)
                        <div class="card mb-4">
                            <!-- Evaluation Table -->
                            <div class="table-responsive">
                                <table class="table table-bordered evaluation-table">
                                    <thead>
                                        <tr style="border:none;">
                                            <th colspan="7" class="text-center" style="border:none;">LAPORAN CAPAIAN
                                                PEMBELAJARAN SISWA</th>
                                        </tr>
                                        <tr style="border:none;">
                                            <th colspan="7" class="text-center" style="border:none;">{{ $report->kelas }}
                                            </th>
                                        </tr>
                                        <tr style="border:none;">
                                            <th colspan="7" class="text-center" style="border:none;">SEMESTER
                                                {{ $report->semester }}
                                            </th>
                                        </tr>
                                        <tr style="border:none;">
                                            <th colspan="7" class="text-center" style="border:none;">TAHUN PELAJARAN
                                                {{ $report->tahun_ajaran }}
                                            </th>
                                        </tr>
                                        <tr style="border:none;">
                                            <th colspan="2" style="border:none;"></th>
                                            <th colspan="3" class="text-center" style="border:none;">
                                                {{ $report->nama }}
                                            </th>
                                            <th colspan="2" style="border:none;"></th>
                                        </tr>
                                        <tr>
                                            <th width="65%" colspan="2" style="text-align: center;">CAPAIAN PEMBELAJARAN</th>
                                            <th width="5%" style="text-align: center;">BM</th>
                                            <th width="5%" style="text-align: center;">MM</th>
                                            <th width="5%" style="text-align: center;">BSH</th>
                                            <th width="5%" style="text-align: center;">BSB</th>
                                            <th width="15%" style="text-align: center;">KET</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- A. NILAI AGAMA DAN BUDI PEKERTI -->
                                        <tr class="section-header">
                                            <td colspan="7">A.<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>NILAI AGAMA DAN BUDI
                                                PEKERTI</td>
                                        </tr>
                                        <!-- POIN A1 -->
                                        <tr>
                                            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>1</strong>
                                            </td>
                                            <td><strong>Dapat mengucapkan bacaan doa dan lagu keagamaan sederhana</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>1.1. Mengikuti bacaan doa/berdoa sebelum dan sesudah kegiatan</td>
                                            <td style="text-align: center;">{{ $report->A11 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A11 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A11 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A11 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_A11 }}</td>
                                        </tr>
                                        <tr>
                                            <td>1.2. Menirukan lagu-lagu keagamaan</td>
                                            <td style="text-align: center;">{{ $report->A12 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A12 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A12 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A12 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_A12 }}</td>
                                        </tr>
                                        <!-- POIN A2 -->
                                        <tr>
                                            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>2</strong>
                                            </td>
                                            <td><strong>Dapat mengucapkan bacaan doa dan lagu keagamaan sederhana</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>2.1. Mengikuti bacaan doa/berdoa sebelum dan sesudah kegiatan</td>
                                            <td style="text-align: center;">{{ $report->A21 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A21 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A21 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A21 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_A21 }}</td>
                                        </tr>
                                        <tr>
                                            <td>2.2. Menirukan lagu-lagu keagamaan</td>
                                            <td style="text-align: center;">{{ $report->A22 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A22 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A22 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A22 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_A22 }}</td>
                                        </tr>
                                        <!-- POIN A3 -->
                                        <tr>
                                            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>3</strong>
                                            </td>
                                            <td><strong>Mengucap doa sebelum dan sesudah melakukan sesuatu</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>3.1. Doa sebelum melakukan kegiatan </td>
                                            <td style="text-align: center;">{{ $report->A31 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A31 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A31 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A31 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_A31 }}</td>
                                        </tr>
                                        <tr>
                                            <td>3.2. Doa setelah melakukan kegiatan</td>
                                            <td style="text-align: center;">{{ $report->A32 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A32 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A32 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A32 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_A32 }}</td>
                                        </tr>
                                        <!-- POIN A4 -->
                                        <tr>
                                            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>4</strong>
                                            </td>
                                            <td><strong>Mengenal berprilaku baik dan sopan</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>4.1. Berbicara/ berbahasa yang baik/sopan dengan sesama teman</td>
                                            <td style="text-align: center;">{{ $report->A41 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A41 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A41 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A41 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_A41 }}</td>
                                        </tr>
                                        <tr>
                                            <td>4.2. Bersikap ramah</td>
                                            <td style="text-align: center;">{{ $report->A42 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A42 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A42 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A42 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_A42 }}</td>
                                        </tr>
                                        <!-- POIN A5 -->
                                        <tr>
                                            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>5</strong>
                                            </td>
                                            <td><strong>Membiasakan diri berprilaku baik</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>5.1. Menggunakan barang orang lain dengan hati-hati</td>
                                            <td style="text-align: center;">{{ $report->A51 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A51 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A51 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A51 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_A52 }}</td>
                                        </tr>
                                        <tr>
                                            <td>5.2. Mau menghormati teman, guru,orang tua atau orang dewasa lainnya</td>
                                            <td style="text-align: center;">{{ $report->A52 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A52 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A52 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A52 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_A52 }}</td>
                                        </tr>
                                        <!-- POIN A6 -->
                                        <tr>
                                            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>6</strong>
                                            </td>
                                            <td><strong>Dapat mengenal sopan santun dan mulai berperilaku saling
                                                    menghormati</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>6.1. Membiasakan diri mengucapkan salam</td>
                                            <td style="text-align: center;">{{ $report->A61 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A61 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A61 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A61 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_A61 }}</td>
                                        </tr>
                                        <tr>
                                            <td>6.2. Membiasakan diri membalas salam</td>
                                            <td style="text-align: center;">{{ $report->A62 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A62 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A62 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->A62 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_A62 }}</td>
                                        </tr>
                                        <!--Iqro Section -->
                                        <tr>
                                            <td rowspan="2" style="vertical-align: top; text-align: center;"><strong>7</strong>
                                            </td>
                                            <td><strong>Perkembangan membaca Iqro'</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td aria-required="true">
                                                Jilid ...... {{ $report->A7JIL }} .......
                                                Halaman ...... {{ $report->A7HAL }} ......
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                {{ $report->ket_A7 }}
                                            </td>
                                        </tr>
                                        <!-- B. JATI DIRI -->
                                        <tr class="section-header">
                                            <td colspan="7">B.<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>JATI DIRI</td>
                                        </tr>
                                        <!-- Poin B1 -->
                                        <tr>
                                            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>1</strong>
                                            </td>
                                            <td><strong>Dapat berinteraksi dengan teman sebaya dan orang dewasa yang
                                                    dikenal</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>1.1. Senang bermain dengan teman</td>
                                            <td style="text-align: center;">{{ $report->B11 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->B11 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->B11 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->B11 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_B11 }}</td>
                                        </tr>
                                        <tr>
                                            <td>1.2. Mampu bekerja sendiri</td>
                                            <td style="text-align: center;">{{ $report->B12 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->B12 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->B12 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->B12 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_B12 }}</td>
                                        </tr>
                                        <!-- POIN B2 -->
                                        <tr>
                                            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>2</strong>
                                            </td>
                                            <td><strong>Mau berbagi, menolong dan membantu teman</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>2.1. Mau berbagi dengan teman</td>
                                            <td style="text-align: center;">{{ $report->B21 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->B12 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->B21 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->B21 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_B21 }}</td>
                                        </tr>
                                        <tr>
                                            <td>2.2. Bersedia bermain dengan teman</td>
                                            <td style="text-align: center;">{{ $report->B22 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->B22 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->B22 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->B22 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_B22 }}</td>
                                        </tr>
                                        <!-- POIN B3 -->
                                        <tr>
                                            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>3</strong>
                                            </td>
                                            <td><strong>Menunjukkan antusiasme dalam melakukan permainan kompetitif secara
                                                    positif</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>3.1. Mau mengikuti lomba dalam permainan</td>
                                            <td style="text-align: center;">{{ $report->B31 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->B31 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->B31 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->B31 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_B31 }}</td>
                                        </tr>
                                        <tr>
                                            <td>3.2. Bersikap sportif dalam permainan</td>
                                            <td style="text-align: center;">{{ $report->B32 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->B32 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->B32 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->B32 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_B32 }}</td>
                                        </tr>
                                        <!-- C. DASAR DASAR LITERASI,MATEMATIK,SAINS,TEKNOLOGI DAN SENI-->
                                        <tr class="section-header">
                                            <td colspan="7">C.<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>DASAR DASAR
                                                LITERASI,MATEMATIK,SAINS,TEKNOLOGI DAN
                                                SENI</td>
                                        </tr>
                                        <!-- POIN C1 -->
                                        <tr>
                                            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>1</strong>
                                            </td>
                                            <td><strong>Bahasa</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>1.1. Mengikuti dua petunjuk atau lebih petunjuk/perintah</td>
                                            <td style="text-align: center;">{{ $report->C11 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->C11 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->C11 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->C11 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_C11 }}</td>
                                        </tr>
                                        <tr>
                                            <td>1.2. Bertanya dan berkomentar tentang cerita yang di dengar</td>
                                            <td style="text-align: center;">{{ $report->C12 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->C12 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->C12 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->C12 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_C12 }}</td>
                                        </tr>
                                        <!-- POIN C2 -->
                                        <tr>
                                            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>2</strong>
                                            </td>
                                            <td><strong>Keaksaraan</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>2.1. Meniru huruf</td>
                                            <td style="text-align: center;">{{ $report->C21 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->C21 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->C21 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->C21 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_C21 }}</td>
                                        </tr>
                                        <tr>
                                            <td>2.2. Membuat huruf</td>
                                            <td style="text-align: center;">{{ $report->C22 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->C22 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->C22 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->C22 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_C22 }}</td>
                                        </tr>
                                        <!-- POIN C3 -->
                                        <tr>
                                            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>3</strong>
                                            </td>
                                            <td><strong>Mulai menunjukkan dorongan untuk membaca</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>3.1. Tertarik pada buku cerita</td>
                                            <td style="text-align: center;">{{ $report->C31 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->C31 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->C31 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->C31 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_C31 }}</td>
                                        </tr>
                                        <tr>
                                            <td>3.2. Meminta untuk dibacakan buku cerita</td>
                                            <td style="text-align: center;">{{ $report->C32 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->C32 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->C32 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->C32 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_C32 }}</td>
                                        </tr>
                                        <!-- D. MATEMATIKA/NALAR-->
                                        <tr class="section-header">
                                            <td colspan="7">D.<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>MATEMATIKA/NALAR</td>
                                        </tr>
                                        <!-- POIN D1 -->
                                        <tr>
                                            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>1</strong>
                                            </td>
                                            <td><strong>Dapat mengenal klasifikasi sederhana</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>1.1. Mengelompokkan benda berdasarkan ciri tertentu (menurut
                                                warna,ukuran,bentuk)</td>
                                            <td style="text-align: center;">{{ $report->D11 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->D11 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->D11 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->D11 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_D11 }}</td>
                                        </tr>
                                        <tr>
                                            <td>1.2. Menunjukkan benda yang memiliki ciri tertentu ( misal: kasar, halus)</td>
                                            <td style="text-align: center;">{{ $report->D12 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->D12 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->D12 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->D12 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_D12 }}</td>
                                        </tr>
                                        <!-- POIN D2 -->
                                        <tr>
                                            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>2</strong>
                                            </td>
                                            <td><strong>Mulai menunjukkan tentang konsep bilangan</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>2.1. Mengenal konsep bilangan 1-10</td>
                                            <td style="text-align: center;">{{ $report->D21 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->D21 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->D21 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->D21 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_D21 }}</td>
                                        </tr>
                                        <tr>
                                            <td>2.2. Mampu berhitung 1-10</td>
                                            <td style="text-align: center;">{{ $report->D22 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->D22 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->D22 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->D22 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_D22 }}</td>
                                        </tr>
                                        <!-- POIN D3 -->
                                        <tr>
                                            <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>3</strong>
                                            </td>
                                            <td><strong>Menunjukkan pemaaman tentan geometri</strong></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>3.1. Menunjukkan bentuk geometri (lingkaran,segitiga,segi empat)</td>
                                            <td style="text-align: center;">{{ $report->D31 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->D31 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->D31 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->D31 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_D31 }}</td>
                                        </tr>
                                        <tr>
                                            <td>3.2. Membedakan benda berdasarkan bentuk geometri</td>
                                            <td style="text-align: center;">{{ $report->D32 == 'BM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->D32 == 'MM' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->D32 == 'BSH' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->D32 == 'BSB' ? '✓' : '' }}</td>
                                            <td style="text-align: center;">{{ $report->ket_D32 }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Teacher Signature -->
                            <div class="row mt-4">
                                <div class="col-md-6 offset-md-6 text-center">
                                    <div class="form-group">
                                        <label><strong>Guru Kelas</strong></label>
                                        <p class="form-control-static">{{ $report->guru_kelas }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endisset
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Report Modal -->
    <div class="modal fade" id="editReportModal" tabindex="-1" aria-labelledby="editReportModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editReportModalLabel">Edit Rapor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @isset($report)
                    <form action="{{ route('reports.update', $report->nisn) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Header Section -->
                        <div class="table-responsive">
                            <table class="table table-bordered evaluation-table">
                                <thead>
                                    <tr style="border:none;">
                                        <th colspan="3" style="border:none;">
                                            <select class="form-select form-select-sm" id="nisn" name="nisn" required disabled>
                                                <option value="{{ $report->nisn }}" selected>
                                                    {{ $report->nama }} ({{ $report->nisn }})
                                                </option>
                                            </select>
                                        </th>
                                        <th colspan="4" style="border:none;">
                                            <select class="form-select form-select-sm" name="semester" required>
                                                <option value="1" {{ $report->semester == 1 ? 'selected' : '' }}>Semester 1
                                                </option>
                                                <option value="2" {{ $report->semester == 2 ? 'selected' : '' }}>Semester 2
                                                </option>
                                            </select>
                                        </th>
                                    </tr>
                                    <tr style="border:none;">
                                        <th colspan="7" class="text-center" style="border:none;">LAPORAN CAPAIAN PEMBELAJARAN
                                            SISWA</th>
                                    </tr>
                                    <tr style="border:none;">
                                        <th colspan="7" class="text-center" style="border:none;">{{ $report->kelas }}</th>
                                    </tr>
                                    <tr style="border:none;">
                                        <th colspan="7" class="text-center" style="border:none;">SEMESTER
                                            {{ $report->semester }}
                                        </th>
                                    </tr>
                                    <tr style="border:none;">
                                        <th colspan="7" class="text-center" style="border:none;">TAHUN PELAJARAN
                                            {{ $report->tahun_ajaran }}
                                        </th>
                                    </tr>
                                    <tr style="border:none;">
                                        <th colspan="2" style="border:none;"></th>
                                        <th colspan="3" class="text-center" style="border:none;">{{ $report->nama }}</th>
                                        <th colspan="2" style="border:none;"></th>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <th width="65%" colspan="2" style="text-align: center;">CAPAIAN PEMBELAJARAN</th>
                                        <th width="5%" style="text-align: center;">BM</th>
                                        <th width="5%" style="text-align: center;">MM</th>
                                        <th width="5%" style="text-align: center;">BSH</th>
                                        <th width="5%" style="text-align: center;">BSB</th>
                                        <th width="15%" style="text-align: center;">KET</th>
                                    </tr>
                                </thead>
                                <!-- Evaluation Table -->
                                <tbody>
                                    <!-- A. NILAI AGAMA DAN BUDI PEKERTI -->
                                    <tr class="section-header">
                                        <td colspan="7">A.<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>NILAI AGAMA DAN BUDI
                                            PEKERTI</td>
                                    </tr>
                                    <!-- POIN A1 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>1</strong></td>
                                        <td><strong>Dapat mengucapkan bacaan doa dan lagu keagamaan sederhana</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1.1. Mengikuti bacaan doa/berdoa sebelum dan sesudah kegiatan</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="A11" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->A11 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->A11 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->A11 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->A11 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_A11"
                                                value="{{ $report->ket_A11 }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1.2. Menirukan lagu-lagu keagamaan</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="A12" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->A12 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->A12 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->A12 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->A12 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_A12"
                                                value="{{ $report->ket_A12 }}">
                                        </td>
                                    </tr>
                                    <!-- POIN A2 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>2</strong>
                                        </td>
                                        <td><strong>Dapat mengucapkan bacaan doa dan lagu keagamaan sederhana</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>2.1. Mengikuti bacaan doa/berdoa sebelum dan sesudah kegiatan</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="A21" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->A21 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->A21 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->A21 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->A21 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_A21"
                                                value="{{ $report->ket_A21 }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2.2. Menirukan lagu-lagu keagamaan</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="A22" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->A22 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->A22 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->A22 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->A22 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_A22"
                                                value="{{ $report->ket_A22 }}">
                                        </td>
                                    </tr>
                                    <!-- POIN A3 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>3</strong>
                                        </td>
                                        <td><strong>Mengucap doa sebelum dan sesudah melakukan sesuatu</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>3.1. Doa sebelum melakukan kegiatan </td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="A31" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->A31 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->A31 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->A31 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->A31 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_A31"
                                                value="{{ $report->ket_A31 }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3.2. Doa setelah melakukan kegiatan</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="A32" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->A32 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->A32 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->A32 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->A32 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_A32"
                                                value="{{ $report->ket_A32 }}">
                                        </td>
                                    </tr>
                                    <!-- POIN A4 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>4</strong>
                                        </td>
                                        <td><strong>Mengenal berprilaku baik dan sopan</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>4.1. Berbicara/ berbahasa yang baik/sopan dengan sesama teman</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="A41" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->A41 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->A41 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->A41 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->A41 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_A41"
                                                value="{{ $report->ket_A41 }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4.2. Bersikap ramah</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="A42" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->A42 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->A42 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->A42 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->A42 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_A42"
                                                value="{{ $report->ket_A42 }}">
                                        </td>
                                    </tr>
                                    <!-- POIN A5 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>5</strong>
                                        </td>
                                        <td><strong>Membiasakan diri berprilaku baik</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>5.1. Menggunakan barang orang lain dengan hati-hati</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="A51" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->A51 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->A51 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->A51 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->A51 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_A51"
                                                value="{{ $report->ket_A51 }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5.2. Mau menghormati teman, guru,orang tua atau orang dewasa lainnya</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="A52" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->A52 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->A52 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->A52 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->A52 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_A52"
                                                value="{{ $report->ket_A52 }}">
                                        </td>
                                    </tr>
                                    <!-- POIN A6 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>6</strong>
                                        </td>
                                        <td><strong>Dapat mengenal sopan santun dan mulai berperilaku saling
                                                menghormati</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>6.1. Membiasakan diri mengucapkan salam</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="A61" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->A61 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->A61 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->A61 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->A61 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_A61"
                                                value="{{ $report->ket_A61 }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6.2. Membiasakan diri membalas salam</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="A62" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->A62 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->A62 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->A62 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->A62 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_A62"
                                                value="{{ $report->ket_A62 }}">
                                        </td>
                                    </tr>
                                    <!--Iqro Section -->
                                    <tr>
                                        <td rowspan="2" style="vertical-align: top; text-align: center;"><strong>7</strong>
                                        </td>
                                        <td><strong>Perkembangan membaca Iqro'</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td aria-required="true">
                                            Jilid ...... {{ $report->A7JIL }} .......
                                            Halaman ...... {{ $report->A7HAL }} ......
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            {{ $report->ket_A7 }}
                                        </td>
                                    </tr>
                                    <!-- B. JATI DIRI -->
                                    <tr class="section-header">
                                        <td colspan="7">B.<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>JATI DIRI</td>
                                    </tr>
                                    <!-- Poin B1 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>1</strong>
                                        </td>
                                        <td><strong>Dapat berinteraksi dengan teman sebaya dan orang dewasa yang
                                                dikenal</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1.1. Senang bermain dengan teman</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="B11" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->B11 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->B11 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->B11 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->B11 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_B11"
                                                value="{{ $report->ket_B11 }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1.2. Mampu bekerja sendiri</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="B12" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->B12 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->B12 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->B12 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->B12 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_B12"
                                                value="{{ $report->ket_B12 }}">
                                        </td>
                                    </tr>
                                    <!-- POIN B2 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>2</strong>
                                        </td>
                                        <td><strong>Mau berbagi, menolong dan membantu teman</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>2.1. Mau berbagi dengan teman</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="B21" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->B21 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->B21 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->B21 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->B21 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_B21"
                                                value="{{ $report->ket_B21 }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2.2. Bersedia bermain dengan teman</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="B22" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->B22 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->B22 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->B22 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->B22 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_B22"
                                                value="{{ $report->ket_B22 }}">
                                        </td>
                                    </tr>
                                    <!-- POIN B3 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>3</strong>
                                        </td>
                                        <td><strong>Menunjukkan antusiasme dalam melakukan permainan kompetitif secara
                                                positif</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>3.1. Mau mengikuti lomba dalam permainan</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="B31" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->B31 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->B31 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->B31 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->B31 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_B31"
                                                value="{{ $report->ket_B31 }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3.2. Bersikap sportif dalam permainan</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="B32" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->B32 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->B32 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->B32 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->B32 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_B32"
                                                value="{{ $report->ket_B32 }}">
                                        </td>
                                    </tr>
                                    <!-- C. DASAR DASAR LITERASI,MATEMATIK,SAINS,TEKNOLOGI DAN SENI-->
                                    <tr class="section-header">
                                        <td colspan="7">C.<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>DASAR DASAR
                                            LITERASI,MATEMATIK,SAINS,TEKNOLOGI DAN
                                            SENI</td>
                                    </tr>
                                    <!-- POIN C1 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>1</strong>
                                        </td>
                                        <td><strong>Bahasa</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1.1. Mengikuti dua petunjuk atau lebih petunjuk/perintah</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="C11" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->C11 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->C11 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->C11 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->C11 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_C11"
                                                value="{{ $report->ket_C11 }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1.2. Bertanya dan berkomentar tentang cerita yang di dengar</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="C12" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->C12 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->C12 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->C12 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->C12 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_C12"
                                                value="{{ $report->ket_C12 }}">
                                        </td>
                                    </tr>
                                    <!-- POIN C2 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>2</strong>
                                        </td>
                                        <td><strong>Keaksaraan</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>2.1. Meniru huruf</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="C21" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->C21 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->C21 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->C21 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->C21 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_C21"
                                                value="{{ $report->ket_C21 }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2.2. Membuat huruf</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="C22" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->C22 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->C22 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->C22 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->C22 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_C22"
                                                value="{{ $report->ket_C22 }}">
                                        </td>
                                    </tr>
                                    <!-- POIN C3 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>3</strong>
                                        </td>
                                        <td><strong>Mulai menunjukkan dorongan untuk membaca</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>3.1. Tertarik pada buku cerita</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="C31" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->C31 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->C31 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->C31 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->C31 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_C31"
                                                value="{{ $report->ket_C31 }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3.2. Meminta untuk dibacakan buku cerita</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="C32" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->C32 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->C32 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->C32 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->C32 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_C32"
                                                value="{{ $report->ket_C32 }}">
                                        </td>
                                    </tr>
                                    <!-- D. MATEMATIKA/NALAR-->
                                    <tr class="section-header">
                                        <td colspan="7">D.<span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>MATEMATIKA/NALAR</td>
                                    </tr>
                                    <!-- POIN D1 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>1</strong>
                                        </td>
                                        <td><strong>Dapat mengenal klasifikasi sederhana</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1.1. Mengelompokkan benda berdasarkan ciri tertentu (menurut
                                            warna,ukuran,bentuk)</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="D11" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->D11 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->D11 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->D11 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->D11 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_D11"
                                                value="{{ $report->ket_D11 }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1.2. Menunjukkan benda yang memiliki ciri tertentu ( misal: kasar, halus)</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="D12" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->D12 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->D12 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->D12 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->D12 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_D12"
                                                value="{{ $report->ket_D12 }}">
                                        </td>
                                    </tr>
                                    <!-- POIN D2 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>2</strong>
                                        </td>
                                        <td><strong>Mulai menunjukkan tentang konsep bilangan</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>2.1. Mengenal konsep bilangan 1-10</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="D21" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->D21 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->D21 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->D21 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->D21 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_D21"
                                                value="{{ $report->ket_D21 }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2.2. Mampu berhitung 1-10</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="D22" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->D22 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->D22 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->D22 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->D22 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_D22"
                                                value="{{ $report->ket_D22 }}">
                                        </td>
                                    </tr>
                                    <!-- POIN D3 -->
                                    <tr>
                                        <td rowspan="3" style="vertical-align: top; text-align: center;"><strong>3</strong>
                                        </td>
                                        <td><strong>Menunjukkan pemaaman tentan geometri</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>3.1. Menunjukkan bentuk geometri (lingkaran,segitiga,segi empat)</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="D31" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->D31 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->D31 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->D31 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->D31 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_D31"
                                                value="{{ $report->ket_D31 }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3.2. Membedakan benda berdasarkan bentuk geometri</td>
                                        <td colspan="4">
                                            <select class="form-select form-select-sm" name="D32" required>
                                                <option value="">- Pilih -</option>
                                                <option value="BM" {{ $report->D32 == 'BM' ? 'selected' : '' }}>BM</option>
                                                <option value="MM" {{ $report->D32 == 'MM' ? 'selected' : '' }}>MM</option>
                                                <option value="BSH" {{ $report->D32 == 'BSH' ? 'selected' : '' }}>BSH</option>
                                                <option value="BSB" {{ $report->D32 == 'BSB' ? 'selected' : '' }}>BSB</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control form-control-sm" name="ket_D32"
                                                value="{{ $report->ket_D32 }}">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Additional Fields -->
                        <input type="hidden" name="guru_kelas" value="{{ $report->guru_kelas }}">

                        <!-- Teacher Signature -->
                        <div class="row mt-4">
                            <div class="col-md-6 offset-md-6 text-center">
                                <div class="form-group">
                                    <label>Guru Kelas</label>
                                    <input type="text" class="form-control text-center" value="{{ $report->guru_kelas }}"
                                        readonly>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary me-2">
                                Simpan Perubahan
                            </button>
                            <a href="{{ route('reports.index') }}" class="btn btn-danger">
                                Batal
                            </a>
                        </div>
                    </form>
                @endisset
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteReportModal" tabindex="-1" aria-labelledby="deleteReportModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteReportModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus rapor siswa <span id="reportNameToDelete" class="fw-bold"></span>?
                    </p>
                    <p class="text-danger">Data yang dihapus tidak dapat dikembalikan!</p>
                </div>
                @isset($report)
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form id="deleteReportForm" action="{{ route('reports.destroy', $report->nisn) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </div>
                @endisset
            </div>
        </div>
    </div>

    <!-- Print Confirmation Modal -->
    <div class="modal fade" id="printReportModal" tabindex="-1" aria-labelledby="printReportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="printReportModalLabel">Konfirmasi Cetak Rapor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin mencetak rapor untuk siswa <span id="reportNameToPrint"
                            class="fw-bold"></span>?</p>
                </div>
                @isset($report)
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form id="printReportForm" action="{{ route('reports.pdf', $report->nisn) }}" method="GET"
                            target="_blank">
                            @csrf
                            <button type="submit" class="btn btn-primary"><i class="bi bi-file-earmark-pdf"></i> Cetak
                                PDF</button>
                        </form>
                    </div>
                @endisset
            </div>
        </div>
    </div>

@endsection