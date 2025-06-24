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
</head>

<body class="bg-light p-4">
<div class="container">
    <button class="btn btn-primary mb-4" onclick="window.location.href='/status-peta'">Lihat Peta</button>

    <h2 class="text-primary fw-bold mb-4">🌀 Status Banjir DAS (Realtime)</h2>

    <!-- FILTER SECTION -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <label class="form-label">📅 Tanggal</label>
            <select id="dateSelect" class="form-select"></select>
        </div>
        <div class="col-md-3">
            <label class="form-label">⏰ Waktu (hh:mm)</label>
            <input type="text" id="timeInput" class="form-control" placeholder="Contoh: 13:00">
        </div>
        <div class="col-md-6">
            <label class="form-label">🔍 Cari Nama Pompa</label>
            <input type="text" id="searchStation" class="form-control" placeholder="Contoh: Pompa 1">
        </div>
    </div>

    <!-- TABEL DATA -->
    <div id="monitoringTable"></div>
</div>

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
    const monitoringRef = database.ref('monitoring_data');

    let fullData = {};

    // Listener realtime
    monitoringRef.on('value', (snapshot) => {
        fullData = snapshot.val() || {};
        updateDateOptions();
        renderData();
    });

    // Isi dropdown tanggal
    function updateDateOptions() {
        const dateSelect = document.getElementById('dateSelect');
        dateSelect.innerHTML = '';

        const dates = Object.keys(fullData).sort().reverse();
        dates.forEach(date => {
            const opt = document.createElement('option');
            opt.value = date;
            opt.textContent = date;
            dateSelect.appendChild(opt);
        });
    }

    // Render data berdasarkan filter
    function renderData() {
        const date = document.getElementById('dateSelect').value;
        const time = document.getElementById('timeInput').value.trim();
        const keyword = document.getElementById('searchStation').value.toLowerCase();

        if (!date || !time || !fullData[date] || !fullData[date][time]) {
            document.getElementById('monitoringTable').innerHTML = '<p class="text-muted">Data tidak ditemukan.</p>';
            return;
        }

        const data = fullData[date][time];
        let content = `
            <h5 class="mt-4 text-primary">📅 Tanggal: ${date}</h5>
            <h6 class="text-success">⏰ Waktu: ${time}</h6>
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

        let adaData = false;
        for (let station in data) {
            if (station.toLowerCase().includes(keyword)) {
                const d = data[station];
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
                adaData = true;
            }
        }

        content += adaData ? `</tbody></table></div>` : `<tr><td colspan="5" class="text-center text-muted">Tidak ditemukan.</td></tr></tbody></table></div>`;
        document.getElementById('monitoringTable').innerHTML = content;
    }

    // Event listener input
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('dateSelect').addEventListener('change', renderData);
        document.getElementById('timeInput').addEventListener('input', renderData);
        document.getElementById('searchStation').addEventListener('input', renderData);
    });
</script>
</body>
</html>
