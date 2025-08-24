<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Admin Panel</a>
            <div>
                <a class="nav-link d-inline text-white" href="{{ route('pages.index') }}">Pages</a>
                <a class="nav-link d-inline text-white" href="{{ route('pages.create') }}">Add Page</a>
            </div>
        </div>
    </nav>

    <!-- Content Section -->
    <div class="container">
        @yield('content')
    </div>

    <footer class="bg-dark text-white text-center py-2 mt-4">
        <p>© {{ date('Y') }} My Admin Panel</p>
    </footer>
</body>
</html>
