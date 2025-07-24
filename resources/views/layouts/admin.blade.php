<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - @yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
            flex-shrink: 0;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 15px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
        }

        .sidebar .sidebar-header {
            font-size: 1.5rem;
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid #495057;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="sidebar-header">
            <a href="{{ route('admin.home') }}" class="text-white text-decoration-none">
                <strong>TMR Admin</strong>
            <!-- TMR Admin -->
        </div>
        <a href="{{ route('admin.routes.index') }}">📍 Rute Perjalanan</a>
        <a href="{{ route('admin.trips.index') }}">🧳 Trip / Paket Wisata</a>
        <a href="{{ url('/') }}">🏠 Kembali ke Website</a>
        <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" style="width: 100%; text-align: left; padding: 15px; background: none; border: none; color: white;">
            🚪 Logout
        </button>
    </form>
    </div>
    
    <div class="content">
        @yield('content')
    </div>

</body>
</html>
