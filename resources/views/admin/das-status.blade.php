<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CeBan Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI&display=swap" rel="stylesheet">
    <style>
        .dashboard-wrapper {
            max-width: 1000px;
            margin: 0 auto;
        }
        .alert-icon {
            width: 200px; /* Manually resizable size */
            height: auto;
        }
    </style>
</head>
<body>
<div class="container">
    <aside class="sidebar">
        <h1 class="logo">CeBan<br><span>CEGAH BANJIR</span></h1>
        <nav>
            <a href="{{ route('admin.homepage') }}">Dashboard</a>
            <a class="active" href="{{ route('admin.das') }}">Status DAS</a>
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

        <div class="dashboard-wrapper">
            <div class="dashboard">
                <!-- Full Width Ketinggian Air Card -->
                <div class="card full-width" style="background:#fff; color:#2b7be4;">
                    <h2 style="margin-top: 0;">Ketinggian Air</h2>
                    <img src="{{ asset('images/chart-placeholder.png') }}" alt="Ketinggian Air" style="width: 100%; height: auto;">
                </div>

                <!-- Side-by-Side Info Cards -->
                <div class="info-cards" style="display: flex; gap: 20px;">
                    <div class="info-card alert-card" style="flex: 1;">
                        <h2>Notifikasi Darurat</h2>
                        <div class="alert-content">
                            <img src="{{ asset('images/alert-icon.png') }}" alt="Alert Icon" class="alert-icon">
                            <p>Tidak ada notifikasi</p>
                        </div>
                    </div>
                    <div class="info-card" style="flex: 1;">
                        <h2>Statistik Evakuasi</h2>
                        <img src="{{ asset('images/chart-evakuasi.png') }}" alt="Statistik Evakuasi" style="width: 100%; height: auto;">
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
