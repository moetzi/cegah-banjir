<!DOCTYPE html>
<html>
<head>
    <title>Status Banjir DAS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Firebase JS SDK -->
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script>

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
    const monitoringRef = database.ref('monitoring_data');

    // Realtime listener
    monitoringRef.on('value', (snapshot) => {
        const data = snapshot.val();
        renderData(data);
    });

    // Render data ke tabel
    function renderData(data) {
    let content = '';

    // Ambil tanggal terbaru
    const sortedDates = Object.keys(data).sort().reverse();
    const latestDate = sortedDates[0];

    // Ambil jam terbaru dalam tanggal itu
    const sortedTimes = Object.keys(data[latestDate]).sort().reverse();
    const latestTime = sortedTimes[0];

    content += `<h5 class="mt-4 text-primary">📅 Tanggal: ${latestDate}</h5>`;
    content += `<h6 class="text-success">⏰ Waktu: ${latestTime}</h6>`;
    content += `
        <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>Nama Pompa</th>
                    <th>Cuaca</th>
                    <th>Tinggi Air (cm)</th>
                    <th>Pompa Aktif</th>
                    <th>Status Banjir</th>
                </tr>
            </thead>
            <tbody>
    `;

    const pumps = data[latestDate][latestTime];
    for (let station in pumps) {
        const d = pumps[station];
        let badge = 'secondary';
        if (d.flood_status === 'Siaga') badge = 'warning';
        else if (d.flood_status === 'Waspada') badge = 'danger';
        else if (d.flood_status === 'Aman') badge = 'success';

        content += `
            <tr>
                <td>${station}</td>
                <td>${d.weather}</td>
                <td>${d.water_level}</td>
                <td>${d.active_pumps}</td>
                <td><span class="badge bg-${badge}">${d.flood_status}</span></td>
            </tr>
        `;
    }

    content += `</tbody></table></div>`;

    document.getElementById('monitoringTable').innerHTML = content;
}

    </script>
</head>

<body class="bg-light p-4">
<div class="container">
  <button class="btn btn-primary mb-4" onclick="window.location.href='/status-peta'">Lihat Peta</button>

    <h2 class="text-primary fw-bold mb-4">🌀 Status Banjir DAS (Realtime)</h2>
    <div id="monitoringTable"></div>
</div>
</body>
</html>
