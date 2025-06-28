<!DOCTYPE html>
<html lang="id">

<head>
    <title>Status Banjir DAS | CeBan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <style>
        :root {
            --ceban-blue: #3c91ed;
        }

        body {
            background-color: #f0f7ff;
        }


        .text-ceban-blue {
            color: var(--ceban-blue);
        }

        .border-primary {
            border-color: var(--ceban-blue) !important;
        }

        .btn-primary {
            background-color: var(--ceban-blue);
            border-color: var(--ceban-blue);
        }

        .btn-primary:hover {
            background-color: #2972c2;
            border-color: #2972c2;
        }

        .btn-outline-primary {
            color: var(--ceban-blue);
            border-color: var(--ceban-blue);
        }

        .btn-outline-primary:hover {
            background-color: var(--ceban-blue);
            color: white;
        }

        .form-label {
            font-weight: 500;
        }

        .card-header .btn {
            float: right;
        }

        /* --- Style Kustom untuk Navbar Bootstrap --- */
        .navbar.sticky-top {
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .navbar-brand.text-ceban-blue:hover {
            color: var(--ceban-blue) !important;
        }

        .navbar-brand {
            padding-top: 0;
            padding-bottom: 0;
        }

        .navbar-nav .nav-link {
            color: var(--ceban-blue);
            font-weight: 600;
            transition: color 0.3s ease-out;
            position: relative;
            padding-left: 0.5rem;
            padding-right: 0.5rem;
        }

        .navbar-nav .nav-link:hover {
            font-weight: 800;
            color: var(--ceban-blue) !important;
        }

        .navbar-nav .nav-link.active {
            font-weight: 800;
            color: var(--ceban-blue) !important;
        }

        #hover-line {
            position: absolute;
            bottom: -16px;
            height: 3px;
            background-color: var(--ceban-blue);
            width: 0;
            opacity: 0;
            transition: none;
        }

        .navbar-nav .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -16px;
            /* Posisi vertikal sama dengan #hover-line */
            left: 0;
            width: 100%;
            height: 3px;
            background-color: var(--ceban-blue);
        }

        /* --- CSS Animasi --- */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .table-responsive {
            max-height: 450px;
            /* Batasi tinggi tabel agar bisa di-scroll jika hasil banyak */
        }

        .fade-in-effect {
            animation: fadeIn 0.7s ease-out forwards;
            opacity: 0;
        }
    </style>
</head>


<body>
    <nav class="navbar navbar-expand-lg sticky-top fade-in-effect shadow-sm">
        <div class="container">
            <span class="navbar-brand fw-bolder fs-4 text-ceban-blue p-0">CeBan</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mx-auto position-relative">
                    <a class="nav-link mx-lg-3" href="/">Home</a>
                    <a class="nav-link active mx-lg-3" aria-current="page" href="/status-banjir">Status Banjir</a>
                    <a class="nav-link mx-lg-3" href="/#about">About</a>
                    <a class="nav-link mx-lg-3" href="/request-evakuasi">Request Evakuasi</a>

                    <div id="hover-line"></div>
                </div>

                <div class="d-none d-lg-block" style="width: 160px; visibility: hidden;"></div>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap fade-in-effect"
            style="animation-delay: 150ms;">
            <div>
                <h2 class="fw-bold text-ceban-blue">Status Terkini Pompa Air</h2>
                <p class="text-muted mb-0">Data diperbarui secara realtime dari seluruh pompa air.</p>
            </div>
            <button id="lihatPetaBtn" class="btn btn-primary" disabled>
                <i class="fas fa-map-location-dot"></i> Lihat Peta
            </button>
        </div>

        <div class="card shadow-sm mb-4 fade-in-effect" style="animation-delay: 300ms;">
            <div class="card-body">
                <form id="form-pencarian">
                    <div class="row g-3 align-items-end">
                        <div class="col-md-3">
                            <label for="tanggalInput" class="form-label"><i class="fas fa-calendar-alt"></i>
                                Tanggal</label>
                            <input type="date" class="form-control" id="tanggalInput" required>
                        </div>
                        <div class="col-md-3">
                            <label for="waktuInput" class="form-label"><i class="fas fa-clock"></i> Waktu
                                (hh:mm)</label>
                            <input type="time" class="form-control" id="waktuInput" required>
                        </div>
                        <div class="col-md-4">
                            <label for="searchStation" class="form-label"><i class="fas fa-water-ladder"></i> Nama
                                Pompa</label>
                            <input type="text" class="form-control" id="searchStation"
                                placeholder="Contoh: Pompa Air Dinoyo">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-search"></i> Cari Data
                            </button>
                        </div>
                    </div>
                </form>

                <hr class="my-4 pd-4">

                <!-- Area untuk menampilkan hasil -->
                <div id="area-hasil">
                    <div id="loading-indicator" class="text-center d-none">
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Mencari data di database...</p>
                    </div>

                    <div id="alert-tidak-ditemukan" class="alert alert-warning d-none" role="alert">
                        <i class="fas fa-exclamation-triangle"></i>
                        <strong>Data tidak ditemukan.</strong> Periksa kembali tanggal dan waktu yang Anda masukkan.
                    </div>

                    <div id="tabel-hasil" class="table-responsive d-none">
                        <table class="table table-striped table-hover table-bordered">
                            <thead class="table-dark sticky-top">
                                <tr>
                                    <th>Nama Pompa</th>
                                    <th>Cuaca</th>
                                    <th>Tinggi Air (cm)</th>
                                    <th>Pompa Aktif</th>
                                    <th>Status Banjir</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                <!-- Isi tabel akan dibuat oleh JavaScript -->
                            </tbody>
                        </table>
                    </div>

                    <div id="pesan-awal" class="text-center text-muted pt-3">
                        <i class="fas fa-info-circle fa-2x mb-2"></i>
                        <p>Silakan pilih tanggal dan waktu, lalu klik "Cari Data" untuk menampilkan data riwayat.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Firebase SDK -->
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script>

    <script>
        // Firebase Config
        const firebaseConfig = {
            apiKey: "AIzaSyCtvJ2hGE0jvp_wOGqH8uG7pg1sgrvTLwo",
            authDomain: "cegah-banjir.firebaseapp.com",
            databaseURL: "https://cegah-banjir-default-rtdb.asia-southeast1.firebasedatabase.app",
            projectId: "cegah-banjir",
            storageBucket: "cegah-banjir.appspot.com",
            messagingSenderId: "878634677325",
            appId: "1:878634677325:web:d6077eaf62ea13490a1804",
            measurementId: "G-W3YXYXR23B"
        };

        // Inisialisasi Firebase
        firebase.initializeApp(firebaseConfig);
        const database = firebase.database();

        // Elemen UI
        const form = document.getElementById('form-pencarian');
        const lihatPetaBtn = document.getElementById('lihatPetaBtn');
        const loadingIndicator = document.getElementById('loading-indicator');
        const alertNotFound = document.getElementById('alert-tidak-ditemukan');
        const tableResult = document.getElementById('tabel-hasil');
        const tableBody = document.getElementById('tableBody');
        const initialMessage = document.getElementById('pesan-awal');

        // Variabel untuk menyimpan parameter pencarian terakhir yang berhasil
        let lastSearchParams = null;

        // Mengisi tanggal & waktu saat ini sebagai nilai default untuk kemudahan pengguna
        const now = new Date();
        document.getElementById('tanggalInput').valueAsDate = now;
        document.getElementById('waktuInput').value = now.toTimeString().substring(0, 5);

        // Event listener untuk form submit, bukan lagi pada setiap input
        form.addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah reload halaman
            renderData(); // Panggil fungsi render utama
        });

        // Event listener untuk tombol "Lihat Peta"
        lihatPetaBtn.addEventListener('click', () => {
            if (lastSearchParams) {
                const {
                    tanggal,
                    waktu,
                    pompa
                } = lastSearchParams;
                const url =
                    `/status-peta?tanggal=${encodeURIComponent(tanggal)}&waktu=${encodeURIComponent(waktu)}&pompa=${encodeURIComponent(pompa)}`;
                window.location.href = url;
            }
        });

        function renderData() {
            // 1. Tampilkan loading dan sembunyikan yang lain
            loadingIndicator.classList.remove('d-none');
            alertNotFound.classList.add('d-none');
            tableResult.classList.add('d-none');
            initialMessage.classList.add('d-none');

            // Nonaktifkan tombol peta setiap kali pencarian baru dimulai
            lihatPetaBtn.disabled = true;
            lastSearchParams = null;

            // 2. Ambil nilai dari input
            const tanggal = document.getElementById('tanggalInput').value;
            const waktu = document.getElementById('waktuInput').value;
            const keyword = document.getElementById('searchStation').value.trim().toLowerCase();

            if (!tanggal || !waktu) {
                loadingIndicator.classList.add('d-none');
                alertNotFound.classList.remove('d-none');
                return;
            }

            // 3. Ambil data dari Firebase
            const dataPath = `monitoring_data/${tanggal}/${waktu}`;
            const dataRef = database.ref(dataPath);

            dataRef.once('value', (snapshot) => {
                const data = snapshot.val();
                let results = [];

                if (data) {
                    // Filter data berdasarkan keyword pencarian
                    for (const pumpName in data) {
                        if (keyword === '' || pumpName.toLowerCase().includes(keyword)) {
                            results.push({
                                name: pumpName,
                                ...data[pumpName]
                            });
                        }
                    }
                }

                // 4. Sembunyikan loading spinner
                loadingIndicator.classList.add('d-none');

                // 5. Tampilkan hasil atau pesan tidak ditemukan
                if (results.length > 0) {
                    displayResultsInTable(results);
                    // Simpan parameter pencarian dan aktifkan tombol peta
                    lastSearchParams = {
                        tanggal: tanggal,
                        waktu: waktu,
                        pompa: keyword
                    };
                    lihatPetaBtn.disabled = false;
                } else {
                    alertNotFound.classList.remove('d-none');
                }
            });
        }

        function displayResultsInTable(results) {
            tableBody.innerHTML = ''; // Kosongkan tabel sebelum diisi

            // Helper function untuk membuat badge status
            function createStatusBadge(status) {
                let badgeClass = 'bg-secondary';
                if (status === 'Aman') badgeClass = 'bg-success';
                else if (status === 'Siaga') badgeClass = 'bg-warning text-dark';
                else if (status === 'Waspada') badgeClass = 'bg-danger';
                return `<span class="badge ${badgeClass} p-2">${status}</span>`;
            }

            // Isi tabel dengan data hasil
            results.forEach(item => {
                const row = `
                <tr>
                    <td>${item.name}</td>
                    <td>${item.weather}</td>
                    <td>${item.water_level}</td>
                    <td>${item.active_pumps}</td>
                    <td>${createStatusBadge(item.flood_status)}</td>
                </tr>
                `;
                tableBody.innerHTML += row;
            });

            // Tampilkan tabel hasil
            tableResult.classList.remove('d-none');
        }

        // Script untuk garis bawah navbar yang dinamis
        document.addEventListener('DOMContentLoaded', function() {
            const navContainer = document.querySelector('.navbar-nav');
            const navLinks = navContainer.querySelectorAll('.nav-link');
            const hoverLine = document.getElementById('hover-line');

            navLinks.forEach(link => {
                link.addEventListener('mouseenter', () => {
                    // Menggunakan offsetLeft dan offsetWidth yang lebih stabil
                    const leftPosition = link.offsetLeft;
                    const linkWidth = link.offsetWidth;

                    hoverLine.style.left = `${leftPosition}px`;
                    hoverLine.style.width = `${linkWidth}px`;
                    hoverLine.style.opacity = '1'; // Munculkan garis
                });
            });

            navContainer.addEventListener('mouseleave', () => {
                hoverLine.style.opacity = '0'; // Sembunyikan garis saat kursor keluar
            });
        });
    </script>
</body>

</html>
