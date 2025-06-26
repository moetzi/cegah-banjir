<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Banjir DAS</title>

    <!-- Bootstrap & Font Awesome CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <style>
        body {
            background-color: #f0f2f5;
        }
        .card-header .btn {
            float: right;
        }
        .form-label {
            font-weight: 500;
        }
        .table-responsive {
            max-height: 450px; /* Batasi tinggi tabel agar bisa di-scroll jika hasil banyak */
        }
    </style>
</head>
<body>

<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h4 class="mb-0">
                <i class="fas fa-search text-primary"></i>
                Status Banjir DAS (Realtime)
            </h4>
            <a href="/status-peta" class="btn btn-primary">
                <i class="fas fa-map-location-dot"></i> Lihat Peta
            </a>
        </div>
        <div class="card-body p-4">
            <form id="form-pencarian">
                <div class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label for="tanggalInput" class="form-label"><i class="fas fa-calendar-alt"></i> Tanggal</label>
                        <input type="date" class="form-control" id="tanggalInput" required>
                    </div>
                    <div class="col-md-3">
                        <label for="waktuInput" class="form-label"><i class="fas fa-clock"></i> Waktu (hh:mm)</label>
                        <input type="time" class="form-control" id="waktuInput" required>
                    </div>
                    <div class="col-md-4">
                        <label for="searchStation" class="form-label"><i class="fas fa-water-ladder"></i> Nama Pompa</label>
                        <input type="text" class="form-control" id="searchStation" placeholder="Contoh: Pompa Air Dinoyo">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success w-100">
                            <i class="fas fa-search"></i> Cari Data
                        </button>
                    </div>
                </div>
            </form>

            <hr class="my-4">

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
                    <p>Silakan pilih tanggal dan waktu, lalu klik "Cari Data" untuk menampilkan data riwayat.</p>
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

    // Mengisi tanggal & waktu saat ini sebagai nilai default untuk kemudahan pengguna
    const now = new Date();
    document.getElementById('tanggalInput').valueAsDate = now;
    document.getElementById('waktuInput').value = now.toTimeString().substring(0, 5);

    // Elemen UI
    const form = document.getElementById('form-pencarian');
    const loadingIndicator = document.getElementById('loading-indicator');
    const alertNotFound = document.getElementById('alert-tidak-ditemukan');
    const tableResult = document.getElementById('tabel-hasil');
    const tableBody = document.getElementById('tableBody');
    const initialMessage = document.getElementById('pesan-awal');

    // Event listener untuk form submit, bukan lagi pada setiap input
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah reload halaman
        renderData(); // Panggil fungsi render utama
    });

    function renderData() {
        // 1. Tampilkan loading dan sembunyikan yang lain
        loadingIndicator.classList.remove('d-none');
        alertNotFound.classList.add('d-none');
        tableResult.classList.add('d-none');
        initialMessage.classList.add('d-none');

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
                        results.push({ name: pumpName, ...data[pumpName] });
                    }
                }
            }

            // 4. Sembunyikan loading spinner
            loadingIndicator.classList.add('d-none');

            // 5. Tampilkan hasil atau pesan tidak ditemukan
            if (results.length > 0) {
                displayResultsInTable(results);
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
</script>

</body>
</html>
