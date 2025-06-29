<!DOCTYPE html>
<html lang="id">
<head>
    <title>Status Banjir DAS (Peta Hasil Pencarian)</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
        #map {
            height: 80vh;
            background-color: #e9ecef;
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
        .spinner {
            border-top-color: #3793e0;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
    </style>

    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 to-blue-200">

    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-2xl rounded-2xl overflow-hidden">
            <div class="px-6 py-4 flex justify-between items-center border-b border-gray-200">
                <a href="/status-banjir" class="bg-gray-100 text-gray-800 font-semibold py-2 px-4 rounded-lg shadow-sm hover:bg-gray-200 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
                <h4 class="text-xl font-bold text-[#3793e0] mb-0 hidden md:block">
                    <i class="fas fa-map-location-dot"></i>
                    Peta Hasil Pencarian
                </h4>
                <small id="data-timestamp" class="text-gray-500 text-right">Menunggu data...</small>
            </div>
            <div id="map-container" class="relative">
                <div id="map"></div>
                <div id="map-loader" class="absolute inset-0 bg-white/70 flex-col items-center justify-center hidden">
                    <div class="spinner w-12 h-12 rounded-full border-4 border-t-4 border-gray-200"></div>
                    <p class="mt-3 text-gray-600">Memuat data peta...</p>
                </div>
            </div>
            <div id="empty-state" class="text-center p-16 hidden">
                <i class="fas fa-search fa-4x text-gray-400 mb-4"></i>
                <h4 id="empty-state-title" class="text-2xl font-bold text-gray-700">Tidak Ada Data Untuk Ditampilkan</h4>
                <p id="empty-state-message" class="text-gray-500 mt-2">Silakan lakukan pencarian di halaman sebelumnya untuk menampilkan data di peta.</p>
                <a href="/status-banjir" class="mt-4 inline-block bg-[#3793e0] text-white font-semibold py-2 px-5 rounded-lg shadow-md hover:bg-blue-700 transition-colors">
                    Kembali ke Halaman Pencarian
                </a>
            </div>
        </div>
    </div>

<script>
    // Konfigurasi Firebase
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

    // Elemen DOM
    const mapContainer = document.getElementById('map-container');
    const emptyState = document.getElementById('empty-state');
    const mapLoader = document.getElementById('map-loader');
    const dataTimestamp = document.getElementById('data-timestamp');
    const emptyStateTitle = document.getElementById('empty-state-title');
    const emptyStateMessage = document.getElementById('empty-state-message');
    let map;

    // --- UPDATED COORDINATES START HERE ---
    const pumpCoordinates = {
        "Pompa Air Dinoyo": [-7.288215, 112.739812],
        "Pompa Air Darmo Kali": [-7.291369, 112.738363],
        "Pompa Air Bratang": [-7.304245, 112.752358],
        "Pompa Air Flores": [-7.269098, 112.748364],
        "Pompa Air Keputran": [-7.279854, 112.741235],
        "Pompa Air Simolawang": [-7.228833, 112.748292],
        "Pompa Air Pesapen": [-7.230489, 112.723789],
        "Pompa Air Kutisari": [-7.331899, 112.742918],
        "Pompa Air Mulyorejo": [-7.267811, 112.778892],
        "Pompa Air Gunung Sari I": [-7.311756, 112.723467],
        "Pompa Air Kali Kepiting": [-7.267332, 112.766721],
        "Pompa Air Dharma Husada": [-7.266236, 112.761563],
        "Pompa Air Kalidami Screw": [-7.276853, 112.774912],
        "Pompa Air Gunung Sari II": [-7.314942, 112.719688],
        "Pompa Air Kali Rungkut": [-7.317056, 112.769931],
        "Pompa Air Wonorejo I": [-7.310511, 112.809833],
        "Pompa Air Dupak Bandarejo": [-7.230755, 112.718698],
        "Pompa Air Semolowaru I": [-7.299529, 112.775871],
        "Pompa Air Kenari": [-7.272183, 112.736919],
        "Pompa Air Grahadi": [-7.264789, 112.741695],
        "Pompa Air Jagir Kalimir": [-7.296836, 112.749667],
        "Pompa Air Semolowaru II": [-7.301542, 112.775314],
        "Pompa Air Asem Jaya": [-7.259250, 112.717010],
        "Pompa Air Karimun Jawa": [-7.266735, 112.746685],
        "Pompa Air Kalisari": [-7.268713, 112.791244],
        "Pompa Air Kalijudan": [-7.259649, 112.784267],
        "Pompa Air Boezem Kalidami I": [-7.277855, 112.775497],
        "Pompa Air Kalibokor": [-7.288258, 112.757134],
        "Pompa Air Balong/Margomulyo": [-7.242250, 112.697412],
        "Pompa Air Gadukan": [-7.215438, 112.720188],
        "Pompa Air Kebon Agung": [-7.348425, 112.720811],
        "Pompa Air Pandugo": [-7.309489, 112.792519],
        "Pompa Air Boezem Wonorejo": [-7.311956, 112.809187],
        "Pompa Air Kedung Asem": [-7.315539, 112.781832],
        "Pompa Air Jemur Andayani": [-7.319520, 112.744132],
        "Pompa Air Jeblokan": [-7.238466, 112.784793],
        "Pompa Air Boezem Kalidami II": [-7.277150, 112.775800],
        "Pompa Air Mulyosari": [-7.273155, 112.790547],
        "Pompa Air Tambak Wedi": [-7.203611, 112.756389],
        "Pompa Air Boezem Moro Krembangan": [-7.215889, 112.728056],
        "Pompa Air Kenjeran 1": [-7.239632, 112.791544],
        "Pompa Air Medokan Semampir": [-7.291778, 112.788056],
        "Pompa Air Jemursari Prapen": [-7.324311, 112.748722],
        "Pompa Air Medokan Ayu/UPN": [-7.332857, 112.800537],
        "Pompa Air Boezem Kedurus": [-7.311749, 112.695321],
        "Pompa Air Wonorejo II": [-7.314811, 112.808795],
        "Pompa Air Bratang Lapangan": [-7.300588, 112.755495],
        "Pompa Air Greges": [-7.233066, 112.684122],
        "Pompa Air Balong": [-7.242250, 112.697412],
        "Pompa Air Boezem Morokrembangan II": [-7.214450, 112.727533],
        "Pompa Air Kenjeran Ken Park": [-7.246411, 112.802158],
        "Pompa Air Kenjeran II": [-7.239632, 112.791544],
        "Pompa Air Medokan Ayu Hilir": [-7.323861, 112.812222],
        "Pompa Air Jambangan": [-7.321853, 112.723797],
        "Pompa Air Ikan Mungsing": [-7.225577, 112.725832],
        "Pompa Air BP2IP": [-7.318214, 112.712613],
        "Pompa Air Kandangan": [-7.255955, 112.673238],
        "Pompa Air Petekan": [-7.211832, 112.737156],
        "Pompa Air Sumberrejo": [-7.276412, 112.677519],
        "Pompa Air Korem": [-7.294154, 112.721473],
        "Pompa Air Araya Onkologi": [-7.280145, 112.783688],
        "Pompa Air Wiyung": [-7.315998, 112.705135],
        "Pompa Air Underpass Satelit": [-7.283187, 112.699776],
        "Pompa Air SWK Karah": [-7.312150, 112.720850],
        "Pompa Air Sawunggaling": [-7.288078, 112.729792],
        "Pompa Air Kebonsari": [-7.329868, 112.721245],
        "Pompa Air Pahlawan": [-7.240576, 112.738122],
        "Pompa Air Siola": [-7.254897, 112.738221],
        "Pompa Air Nias": [-7.275817, 112.753389],
        "Pompa Air Tambak Asri": [-7.234674, 112.715364],
        "Pompa Air Jawar Gendong": [-7.320492, 112.673824],
        "Pompa Air Margomulyo": [-7.242250, 112.697412],
        "Pompa Air Undaan": [-7.251458, 112.748383],
        "Pompa Air Gersikan": [-7.284411, 112.755872],
        "Pompa Air Merr": [-7.300508, 112.788517],
        "Pompa Air Bulak": [-7.240366, 112.784742],
        "Pompa Air Kebraon": [-7.332354, 112.689658],
        "Pompa Air Boezem Aquatic": [-7.287431, 112.683526],
        "Pompa Air Bukit Barisan": [-7.306056, 112.712222]
    };
    // --- UPDATED COORDINATES END HERE ---

    const weatherIcons = {
        'Cerah': 'fa-sun', 'Berawan': 'fa-cloud-sun', 'Hujan Ringan': 'fa-cloud-rain',
        'Hujan Lebat': 'fa-cloud-showers-heavy', 'Gerimis': 'fa-smog', 'Hujan': 'fa-cloud-showers-heavy',
    };

    function getStatusInfo(status) {
        switch (status) {
            case 'Aman': return { color: '#28a745', name: 'Aman' };
            case 'Siaga': return { color: '#ffc107', name: 'Siaga' };
            case 'Waspada': return { color: '#dc3545', name: 'Waspada' };
            default: return { color: '#6c757d', name: 'Tidak Ada Data' };
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        const params = new URLSearchParams(window.location.search);
        const tanggal = params.get('tanggal');
        const waktu = params.get('waktu');
        const pompa = params.get('pompa');

        if (tanggal && waktu) {
            mapContainer.classList.remove('hidden');
            emptyState.classList.add('hidden');
            initializeMapAndFetchData(tanggal, waktu, pompa);
        } else {
            mapContainer.classList.add('hidden');
            emptyState.classList.remove('hidden');
        }
    });

    function initializeMapAndFetchData(tanggal, waktu, pompaFilter) {
        mapLoader.classList.remove('hidden');
        mapLoader.classList.add('flex');

        map = L.map('map').setView([-7.2756, 112.6416], 12);

        const osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        const positron = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> &copy; <a href="https://carto.com/attributions">CARTO</a>'
        });

        const baseMaps = { "Default": osm, "Light": positron };
        L.control.layers(baseMaps).addTo(map);

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

        const dataPath = `monitoring_data/${tanggal}/${waktu}`;
        dataTimestamp.innerText = `Data untuk: ${tanggal} ${waktu}`;

        database.ref(dataPath).once('value', (snapshot) => {
            mapLoader.classList.add('hidden');
            mapLoader.classList.remove('flex');
            const pumps = snapshot.val();
            let markersCount = 0;

            if (!pumps) {
                dataTimestamp.innerText = `Data tidak ditemukan untuk ${tanggal} ${waktu}.`;
                mapContainer.classList.add('hidden');
                emptyState.classList.remove('hidden');
                emptyStateTitle.innerText = "Data Tidak Ditemukan";
                emptyStateMessage.innerText = `Tidak ada data monitoring untuk tanggal ${tanggal} dan waktu ${waktu}.`;
                return;
            }

            for (let station in pumps) {
                if (pompaFilter && pompaFilter.trim() !== '' && !station.toLowerCase().includes(pompaFilter.toLowerCase())) {
                    continue;
                }

                const d = pumps[station];
                const coord = pumpCoordinates[station] || null;

                if (!coord) {
                    console.warn(`Koordinat untuk stasiun pompa "${station}" tidak ditemukan.`);
                    continue;
                }

                const statusInfo = getStatusInfo(d.flood_status);
                const pulseClass = d.flood_status === 'Waspada' ? 'pulse-waspada' : '';

                const customIcon = L.divIcon({
                    html: `<div class="marker-icon ${pulseClass}" style="background-color: ${statusInfo.color};"><i class="fa-solid fa-location-dot"></i></div>`,
                    className: '',
                    iconSize: [28, 28],
                    iconAnchor: [14, 28],
                    popupAnchor: [0, -28]
                });

                const marker = L.marker(coord, { icon: customIcon });

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
                    </div>`;
                marker.bindPopup(popupContent);
                marker.bindTooltip(station);

                marker.addTo(markersLayer);
                markerBounds.push(coord);
                markersCount++;
            }

            if (markersCount > 0) {
                map.fitBounds(markerBounds, { padding: [50, 50], maxZoom: 16 });
                if (markersCount === 1) {
                    markersLayer.eachLayer(layer => layer.openPopup());
                }
            } else {
                mapContainer.classList.add('hidden');
                emptyState.classList.remove('hidden');
                emptyStateTitle.innerText = "Hasil Tidak Ditemukan";
                emptyStateMessage.innerText = `Stasiun pompa dengan nama '${pompaFilter}' tidak ditemukan pada data waktu yang dipilih, atau lokasinya belum terdaftar.`;
            }

        }, (error) => {
            mapLoader.classList.add('hidden');
            mapLoader.classList.remove('flex');
            dataTimestamp.innerText = "Gagal memuat data. Periksa koneksi Anda.";
            console.error("Firebase Error:", error);
        });
    }
</script>
</body>
</html>
