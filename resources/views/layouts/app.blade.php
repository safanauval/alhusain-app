<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'KB & TK AL-HUSAIN')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
    @stack('styles')

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('font-awesome/6.4.0/css/all.min.css') }}">

    <!-- ... other head elements ... -->
    <link href="{{ asset(path: 'css/app.css') }}" rel="stylesheet" />
    @stack('styles')
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-custom">
        <div class="container-fluid">
            <h4 class="navbar-brand">
                <img src="{{ asset('images/logo.png') }}" alt="KB & TK AL-HUSAIN Logo"
                    style="width:30px; height:30px; object-fit:contain;" class="d-inline-block align-top">
                <span class="ms-2">KB & TK AL-HUSAIN</span>
            </h4>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>

</html>