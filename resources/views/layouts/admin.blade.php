<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin | CeBan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }
        .sidebar {
            background: #3793e0;
            min-height: 100vh;
            padding: 2rem 1rem;
            color: #fff;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            margin: 1rem 0;
        }
        .sidebar a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="d-flex">
    <div class="sidebar">
        <h4 class="mb-4 fw-bold">CeBan Admin</h4>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('admin.statusDAS') }}">Status DAS</a>
        <a href="{{ route('admin.evakuasi') }}">Request Evakuasi</a>
        <a href="{{ route('admin.users') }}">Manajemen User</a>
        <a href="{{ route('admin.logout') }}" class="text-danger">Logout</a>
    </div>
    <div class="p-4 w-100">
        @yield('content')
    </div>
</div>

</body>
</html>
