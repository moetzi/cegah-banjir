<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CeBan Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <h1 class="logo">CeBan<br><span>CEGAH BANJIR</span></h1>
            <nav>
                <a href="{{ route('admin.homepage') }}">Homepage</a>
                <a href="{{ route('admin.das') }}">Status DAS</a>
                <a href="{{ route('admin.users') }}">Kelola Pengguna</a>
            </nav>
        </aside>
        <main class="main-content">
            <header>
                <div class="profile">
                    <img src="https://i.pravatar.cc/40" alt="Admin">
                    <span>Admin</span>
                </div>
            </header>
            <section>
                @yield('content')
            </section>
        </main>
    </div>
</body>
</html>
