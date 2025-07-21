<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'KB & TK AL-HUSAIN')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
    @stack('styles')

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Dashboard JS -->
    <script src="{{ asset('js/sidebar.js') }}"></script>
    @stack('scripts')

    <!-- Sidebar CSS ... -->
    <link href="{{ asset(path: 'css/sidebar.css') }}" rel="stylesheet" />
    @stack('styles')
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" id="sidebarToggle">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar">
                <h4 class="navbar-brand">
                    <img src="{{ asset('images/logo.png') }}" alt="KB & TK AL-HUSAIN Logo"
                        style="width:30px; height:30px; object-fit:contain;" class="d-inline-block align-top">
                    <span class="ms-2">KB & TK AL-HUSAIN</span>
                </h4>
            </div>
            <div class="dropdown-center">
                <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-expanded="true"><span
                        class="person-name">{{ session('username') }}</span>
                    <i class="bi bi-person-circle"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-lg-end p-3 border-0"
                    style="min-width: 0px; height: 30px; background-color:transparent;">
                    <li class="dropdown" style="margin-top: -5px;">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger mb-4">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <body>
        <!-- Overlay -->
        <div class="overlay" id="overlay"></div>

        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <ul class="sidebar-menu">
                <li><a style="font-weight: 500;" href="{{ route('dashboard') }}"><i class="bi bi-speedometer2"></i>
                        Dashboard</a></li>
                <li><a style="font-weight: 500;" href="./students"><i class="bi bi-people-fill"></i>
                        Daftar Siswa</a></li>
                <li><a style="font-weight: 500;" href="./classlist"><i class="bi bi-door-open"></i> Daftar
                        Kelas</a></li>
                <li><a style="font-weight: 500;" href="reports/index"><i class="bi bi-journal-text"></i>
                        Rapor</a></li>
            </ul>
        </div>
        <!-- Main Content -->
        <main class="container py-4">
            @yield('content')
        </main>

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
        @stack('scripts')
    </body>

</html>