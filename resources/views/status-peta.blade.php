<!DOCTYPE html>
<html>
<head>
    <title>Status Banjir DAS (Peta)</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Leaflet CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <style>
        #map { height: 80vh; }
    </style>

    <!-- Firebase SDK -->
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>
<body class="bg-light">
<div class="container py-4">
    <h2 class="text-primary fw-bold mb-3">🗺️ Status Banjir DAS - Peta Realtime</h2>
    <div id="map" class="rounded shadow"></div>
</div>

<script>
    // Firebase config
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

    firebase.initializeApp(firebaseConfig);
    const database = firebase.database();
    const monitoringRef = database.ref('monitoring_data');

    // Map init
    const map = L.map('map').setView([-7.2756, 112.6416], 12); // Surabaya pusat

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://openstreetmap.org">OpenStreetMap</a>',
    }).addTo(map);

    let markersLayer = L.layerGroup().addTo(map);


    const pumpCoordinates = {
        "Pompa Air Dinoyo": [-7.2801, 112.7281],
        "Pompa Air Darmo Kali": [-7.2900, 112.7200],
        "Pompa Air Bratang": [-7.3050, 112.7550],
        "Pompa Air Flores": [-7.2500, 112.7500],

    };

    monitoringRef.on('value', (snapshot) => {
        const data = snapshot.val();

        const sortedDates = Object.keys(data).sort().reverse();
        const latestDate = sortedDates[0];
        const sortedTimes = Object.keys(data[latestDate]).sort().reverse();
        const latestTime = sortedTimes[0];

        const pumps = data[latestDate][latestTime];

        // Hapus marker lama
        markersLayer.clearLayers();

        for (let station in pumps) {
            const d = pumps[station];

            // Koordinat dummy, ganti dengan data asli
            const coord = pumpCoordinates[station] || [-7.2756, 112.6416]; // default: Surabaya

            let color = 'gray';
            if (d.flood_status === 'Aman') color = 'green';
            else if (d.flood_status === 'Siaga') color = 'orange';
            else if (d.flood_status === 'Waspada') color = 'red';

            const marker = L.circleMarker(coord, {
                radius: 8,
                color: color,
                fillColor: color,
                fillOpacity: 0.8
            }).bindPopup(`
                <strong>${station}</strong><br>
                Cuaca: ${d.weather}<br>
                Tinggi Air: ${d.water_level} cm<br>
                Pompa Aktif: ${d.active_pumps}<br>
                Status: <span style="color:${color}">${d.flood_status}</span><br>
                Tanggal: ${latestDate}<br>
                Waktu: ${latestTime}
            `);

            marker.addTo(markersLayer);
        }
    });
</script>
</body>
</html>
