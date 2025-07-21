@extends('layouts.sidebar')

@section('title', 'Daftar Siswa')

@section('content')
    <!-- Style Students -->
    <link href="{{ asset('css/pages.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/students.css') }}" rel="stylesheet" />

    <!-- Student JS -->
    <script src="{{ asset('js/studentmodal.js') }}"></script>
    @stack('scripts')

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <!-- Main Content -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- Header with Add Button -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="display-6"><strong>Daftar Siswa</strong></h2>
                <button class="btn btn-primary btn-tambah" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                    <i class="bi bi-plus-lg"></i><span class="text-mobile">Tambah Siswa</span>
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

            <!-- Student Data Table -->
            <div class="card mb-4">
                <div class="card-header bg-white d-flex align-items-center">
                    <i class="bi bi-table me-2"></i>
                    <h5 class="mb-0">Data Siswa</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @if ($students->count() > 0)
                            <table class="table table-hover">
                                <thead class="thead-light">
                                    <tr>
                                        <th>No</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Guru</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tahun Lahir</th>
                                        <th>Tahun Ajaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($students as $student)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $student->nisn }}</td>
                                            <td>{{ $student->nama }}</td>
                                            <td>{{ $student->kelas }}</td>
                                            <td>{{ $student->guru_kelas }}</td>
                                            <td>{{ $student->jenis_kelamin}}</td>
                                            <td>{{ $student->tahun_lahir }}</td>
                                            <td>{{ $student->tahun_ajaran }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-warning edit-student-btn" data-bs-toggle="modal"
                                                    data-bs-target="#editStudentModal" data-nisn="{{ $student->nisn }}"
                                                    data-nama="{{ $student->nama }}" data-kelas="{{ $student->kelas }}"
                                                    data_guru_kelas="{{ $student->guru_kelas }}"
                                                    data-jenis_kelamin="{{ $student->jenis_kelamin }}"
                                                    data-tahun_lahir="{{ $student->tahun_lahir }}"
                                                    data-tahun_ajaran="{{ $student->tahun_ajaran }}">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <button class="btn btn-sm btn-danger delete-student-btn" data-bs-toggle="modal"
                                                    data-bs-target="#deleteStudentModal" data-nisn="{{ $student->nisn }}"
                                                    data-nama="{{ $student->nama }}">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-info">Tidak ada data siswa</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Student Modal -->
    <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStudentModalLabel">Tambah Data Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('students.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nisn" class="form-label">NISN</label>
                            <input type="text" class="form-control" id="nisn" name="nisn" required>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas</label>
                            <select class="form-select" id="kelas" name="kelas" required>
                                <option value="">- Pilih Kelas -</option>
                                <option value="KB">KB</option>
                                <option value="TK A">TK A</option>
                                <option value="TK B">TK B</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_guru_kelas" class="form-label">Guru</label>
                            <input type="text" class="form-control" id="guru_kelas" name="guru_kelas" required>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="">- Pilih Jenis Kelamin -</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tahun_lahir" class="form-label">Tahun Lahir</label>
                            <input type="number" class="form-control" id="tahun_lahir" name="tahun_lahir" min="1990"
                                max="{{ date('Y') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                            <select class="form-select" id="tahun_ajaran" name="tahun_ajaran" required>
                                <option value="">- Pilih Tahun Ajaran -</option>
                                @for($i = date('Y') - 1; $i <= date('Y') + 3; $i++)
                                    <option value="{{ $i }}/{{ $i + 1 }}">{{ $i }}/{{ $i + 1 }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Student Modal -->
    <div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editStudentModalLabel">Edit Data Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editStudentForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="edit_nisn" class="form-label">NISN</label>
                            <input type="text" class="form-control" id="edit_nisn" name="nisn" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="edit_nama" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_kelas" class="form-label">Kelas</label>
                            <select class="form-select" id="edit_kelas" name="kelas" required>
                                <option value="">- Pilih Kelas -</option>
                                <option value="KB">KB</option>
                                <option value="TK A">TK A</option>
                                <option value="TK B">TK B</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_guru_kelas" class="form-label">Guru</label>
                            <input type="text" class="form-control" id="edit_guru_kelas" name="guru_kelas" required>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <select class="form-select" id="edit_jenis_kelamin" name="jenis_kelamin" required>
                                <option value="">- Jenis Kelamin -</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_tahun_lahir" class="form-label">Tahun Lahir</label>
                            <input type="number" class="form-control" id="edit_tahun_lahir" name="tahun_lahir" min="1990"
                                max="{{ date('Y') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_tahun_ajaran" class="form-label">Tahun Ajaran</label>
                            <select class="form-select" id="edit_tahun_ajaran" name="tahun_ajaran" required>
                                <option value="">- Pilih Tahun Ajaran -</option>
                                @for($i = date('Y') - 5; $i <= date('Y') + 1; $i++)
                                    <option value="{{ $i }}/{{ $i + 1 }}">{{ $i }}/{{ $i + 1 }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="deleteStudentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteStudentModalLabel">Konfirmasi Hapus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus data siswa <span id="studentNameToDelete" class="fw-bold"></span>?
                    </p>
                    <p class="text-danger">Data yang dihapus tidak dapat dikembalikan!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="deleteStudentForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection