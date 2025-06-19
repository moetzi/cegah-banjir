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
            <a class="active" href="{{ route('admin.homepage') }}">Dashboard</a>
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

        <div class="dashboard">

            <!-- Weather Card -->
            <div class="weather-card">
                <div class="weather-bg"></div> <!-- city background -->
                <div class="weather-blur"></div> <!-- blur layer -->

                <div class="weather-content">
                    <div class="weather-left">
                        <h2 class="location">Cempaka Putih</h2>
                        <p class="region">DKI Jakarta</p>
                        <div class="temperature">29°C</div>
                        <p class="condition">sebagian berawan</p>
                    </div>
                    <div class="weather-right">
                        <img src="{{ asset('images/cloudy.png') }}" alt="Weather Icon">
                    </div>
                </div>
            </div>


            <!-- Info Cards -->
            <div class="info-cards">
                <div class="info-card info-blue">
                    <strong>Informasi Cara Penanggulangan Banjir</strong>
                    <p>Untuk mengetahui cara mengatasi penanggulangan saat datangnya bencana banjir. Lihat informasi selengkapnya.</p>
                </div>
                <div class="info-card info-yellow">
                    <strong>Status Siaga 2</strong>
                    <p>Terdapat peringatan status siaga 2 pada lokasi Johar baru dan pancoran. Lihat informasi selengkapnya.</p>
                </div>
            </div>

            <!-- Map Section -->
            <div class="map-section">
                <h3>Lokasi Anda</h3>
                <div class="map-container">
                    <iframe src=
                    "https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15866.4895429744!2d106.8670735!3d-6.181268950000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f4f8c2ffea73%3A0x8b3c9d1a03648bbb!2sCempaka%20Putih%2C%20Central%20Jakarta%20City%2C%20Jakarta!5e0!3m2!1sen!2sid!4v1750344566820!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

        </div>
    </main>
</div>
</body>
</html>
