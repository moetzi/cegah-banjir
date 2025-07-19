<!DOCTYPE html>
<html lang="id">
<head>
    <title>Status Banjir DAS (Peta Hasil Pencarian)</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap, Leaflet & Font Awesome CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <style>
        body {
            background-color: #f0f2f5;
        }
        .card {
            border: none;
        }
        #map-container {
            position: relative;
        }
        #map {
            height: 75vh;
            border-radius: 0 0 .375rem .375rem;
            background-color: #e9ecef;
        }
        #map-loader {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1001;
            text-align: center;
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
        }
        .leaflet-popup-content-wrapper {
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        .leaflet-popup-content {
            margin: 0;
            width: 250px !important;
        }
        .popup-header {
            padding: 10px 15px;
            border-radius: 8px 8px 0 0;
            color: white;
            font-weight: bold;
        }
        .popup-body {
            padding: 12px 15px;
        }
        .popup-item {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
        }
        .popup-item .fas {
            width: 25px;
            text-align: center;
            margin-right: 8px;
            color: #6c757d;
        }
        .legend {
            padding: 8px 12px;
            font-size: 14px;
            background: rgba(255,255,255,0.9);
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            border-radius: 5px;
        }
        .legend h4 {
            margin: 0 0 8px;
            color: #333;
            font-size: 16px;
            font-weight: bold;
        }
        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            border-radius: 50%;
            border: 1px solid rgba(0,0,0,0.2);
        }
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.7); }
            70% { box-shadow: 0 0 0 15px rgba(220, 53, 69, 0); }
            100% { box-shadow: 0 0 0 0 rgba(220, 53, 69, 0); }
        }
        .marker-icon.pulse-waspada {
            animation: pulse 2s infinite;
        }
        .marker-icon {
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            border: 2px solid white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.3);
            font-size: 14px;
        }
    </style>

    <!-- Firebase SDK -->
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>
<body class="bg-light">

<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h4 class="mb-0">
                <i class="fas fa-map-location-dot text-primary"></i>
                Peta Hasil Pencarian
            </h4>
            <small id="data-timestamp" class="text-muted">Menunggu data...</small>
        </div>
        <div id="map-container">
            <div id="map"></div>
            <div id="map-loader" class="d-none">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mt-2 mb-0 text-muted">Memuat data peta...</p>
            </div>
        </div>
        <div id="empty-state" class="text-center p-5 d-none">
            <i class="fas fa-search fa-3x text-muted mb-3"></i>
            <h4 id="empty-state-title">Tidak Ada Data Untuk Ditampilkan</h4>
            <p id="empty-state-message">Silakan lakukan pencarian di halaman sebelumnya untuk menampilkan data di peta.</p>
            <a href="/status-banjir" class="btn btn-primary mt-2">Kembali ke Halaman Pencarian</a>
        </div>
    </div>
</div>

<script>
    // Konfigurasi Firebase
    const firebaseConfig = {
        apiKey: "API_KEY",
        authDomain: "AUTH_DOMAIN",
        databaseURL: "DB_URL",
        projectId: "PROJECT_ID",
    };

    // Inisialisasi Firebase
    firebase.initializeApp(firebaseConfig);
    const database = firebase.database();

    // Elemen DOM
    const mapContainer = document.getElementById('map-container');
    const emptyState = document.getElementById('empty-state');
    const mapLoader = document.getElementById('map-loader');
    const dataTimestamp = document.getElementById('data-timestamp');
    const emptyStateTitle = document.getElementById('empty-state-title');
    const emptyStateMessage = document.getElementById('empty-state-message');
    let map;


    const pumpCoordinates = {
        "Pompa Air Dinoyo": [-7.2801, 112.7281],
        "Pompa Air Darmo Kali": [-7.2900, 112.7200],
        "Pompa Air Bratang": [-7.3050, 112.7550],
        "Pompa Air Flores": [-7.2500, 112.7500],
        "Pompa Air Araya Onkologi 4": [-7.265, 112.785],
        "Pompa Air Araya Onkologi 6": [-7.266, 112.788]
    };

    const weatherIcons = {
        'Cerah': 'fa-sun', 'Berawan': 'fa-cloud-sun', 'Hujan Ringan': 'fa-cloud-rain',
        'Hujan Lebat': 'fa-cloud-showers-heavy', 'Gerimis': 'fa-smog', 'Hujan': 'fa-cloud-showers-heavy',
    };

    // Fungsi untuk mendapatkan informasi status (warna, nama)
    function getStatusInfo(status) {
        switch (status) {
            case 'Aman': return { color: '#28a745', name: 'Aman' };
            case 'Siaga': return { color: '#ffc107', name: 'Siaga' };
            case 'Waspada': return { color: '#dc3545', name: 'Waspada' };
            default: return { color: '#6c757d', name: 'Tidak Ada Data' };
        }
    }

    // Event listener saat dokumen selesai dimuat
    document.addEventListener('DOMContentLoaded', () => {
        const params = new URLSearchParams(window.location.search);
        const tanggal = params.get('tanggal');
        const waktu = params.get('waktu');
        const pompa = params.get('pompa');

        if (tanggal && waktu) {
            mapContainer.classList.remove('d-none');
            emptyState.classList.add('d-none');
            initializeMapAndFetchData(tanggal, waktu, pompa);
        } else {
            // Tampilkan pesan jika parameter tidak ada
            mapContainer.classList.add('d-none');
            emptyState.classList.remove('d-none');
        }
    });

    // Fungsi utama untuk inisialisasi peta dan mengambil data
    function initializeMapAndFetchData(tanggal, waktu, pompaFilter) {
        mapLoader.classList.remove('d-none'); // Tampilkan loader

        map = L.map('map').setView([-7.2756, 112.6416], 12);

        // Opsi layer peta
        const osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        const positron = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> &copy; <a href="https://carto.com/attributions">CARTO</a>'
        });

        const baseMaps = {
            "Default": osm,
            "Light": positron
        };

        L.control.layers(baseMaps).addTo(map);

        // Tambahkan legenda ke peta
        const legend = L.control({position: 'bottomright'});
        legend.onAdd = function (map) {
            const div = L.DomUtil.create('div', 'legend');
            const statuses = [
                getStatusInfo('Aman'), getStatusInfo('Siaga'),
                getStatusInfo('Waspada'), getStatusInfo('Tidak Ada Data')
            ];
            div.innerHTML = '<h4>Legenda</h4>';
            statuses.forEach(status => {
                div.innerHTML += `<i style="background: ${status.color}"></i> ${status.name}<br>`;
            });
            return div;
        };
        legend.addTo(map);

        let markersLayer = L.layerGroup().addTo(map);
        let markerBounds = [];

        // Bentuk path data di Firebase
        const dataPath = `monitoring_data/${tanggal}/${waktu}`;
        dataTimestamp.innerText = `Data untuk: ${tanggal} ${waktu}`;

        // Ambil data dari Firebase
        database.ref(dataPath).once('value', (snapshot) => {
            mapLoader.classList.add('d-none'); // Sembunyikan loader setelah data diterima
            const pumps = snapshot.val();
            let markersCount = 0;

            if (!pumps) {
                // Jika tidak ada data sama sekali pada tanggal/waktu tersebut
                dataTimestamp.innerText = `Data tidak ditemukan untuk ${tanggal} ${waktu}.`;
                mapContainer.classList.add('d-none');
                emptyState.classList.remove('d-none');
                emptyStateTitle.innerText = "Data Tidak Ditemukan";
                emptyStateMessage.innerText = `Tidak ada data monitoring untuk tanggal ${tanggal} dan waktu ${waktu}.`;
                return;
            }

            // Loop melalui setiap stasiun pompa dalam data
            for (let station in pumps) {
                // LOGIKA FILTER: Jika ada filter pompa dan nama stasiun tidak cocok, lewati
                if (pompaFilter && pompaFilter.trim() !== '' && !station.toLowerCase().includes(pompaFilter.toLowerCase())) {
                    continue;
                }

                const d = pumps[station];
                const coord = pumpCoordinates[station] || null;

                if (!coord) {
                    console.warn(`Koordinat untuk stasiun pompa "${station}" tidak ditemukan. Marker tidak akan ditampilkan.`);
                    continue; // Lewati jika koordinat tidak ada di list
                }

                const statusInfo = getStatusInfo(d.flood_status);
                const pulseClass = d.flood_status === 'Waspada' ? 'pulse-waspada' : '';

                // Buat ikon kustom
                const customIcon = L.divIcon({
                    html: `<div class="marker-icon ${pulseClass}" style="background-color: ${statusInfo.color};"><i class="fa-solid fa-location-dot"></i></div>`,
                    className: '',
                    iconSize: [28, 28],
                    iconAnchor: [14, 28],
                    popupAnchor: [0, -28]
                });

                const marker = L.marker(coord, { icon: customIcon });

                // Buat konten popup yang detail
                const popupContent = `
                    <div class="popup-header" style="background-color: ${statusInfo.color};">
                        ${station}
                    </div>
                    <div class="popup-body">
                        <div class="popup-item"><i class="fas ${weatherIcons[d.weather] || 'fa-question-circle'}"></i> <strong>Cuaca:</strong>&nbsp; ${d.weather}</div>
                        <div class="popup-item"><i class="fas fa-water"></i> <strong>Tinggi Air:</strong>&nbsp; ${d.water_level} cm</div>
                        <div class="popup-item"><i class="fas fa-gears"></i> <strong>Pompa Aktif:</strong>&nbsp; ${d.active_pumps}</div>
                        <hr class="my-2">
                        <strong>Status: <span style="color:${statusInfo.color}; font-weight:bold;">${statusInfo.name}</span></strong>
                    </div>
                `;
                marker.bindPopup(popupContent);
                marker.bindTooltip(station);

                marker.addTo(markersLayer);
                markerBounds.push(coord); // Tambahkan koordinat untuk auto-zoom
                markersCount++;
            }

            // Setelah loop selesai, periksa apakah ada marker yang ditambahkan
            if (markersCount > 0) {
                // Jika ada, auto-zoom ke area marker
                map.fitBounds(markerBounds, { padding: [50, 50], maxZoom: 16 });
                // Jika hanya ada satu marker, buka popupnya secara otomatis
                if (markersCount === 1) {
                    markersLayer.eachLayer(layer => layer.openPopup());
                }
            } else {
                // Jika tidak ada marker yang cocok dengan filter
                mapContainer.classList.add('d-none');
                emptyState.classList.remove('d-none');
                emptyStateTitle.innerText = "Hasil Tidak Ditemukan";
                emptyStateMessage.innerText = `Stasiun pompa dengan nama '${pompaFilter}' tidak ditemukan pada data waktu yang dipilih, atau lokasinya belum terdaftar.`;
            }

        }, (error) => {
            // Handle jika terjadi error saat mengambil data
            mapLoader.classList.add('d-none');
            dataTimestamp.innerText = "Gagal memuat data. Periksa koneksi Anda.";
            console.error("Firebase Error:", error);
        });
    }
</script>
</body>
</html>
<?php /**PATH C:\Users\Devy Relliani\College_Project\PPPL\cegah-banjir\resources\views/status-peta.blade.php ENDPATH**/ ?>
