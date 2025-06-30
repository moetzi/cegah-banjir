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

    <style>
        body {
            background-color: #f8f9fa;
        }
        .badge {
            font-size: 0.9rem;
        }
    </style>
</head>

<body class="p-4">
<div class="container">


    <h2 class="text-primary fw-bold mb-4">🌀 Status Banjir DAS (Realtime)</h2>

    <!-- FORM CRUD -->
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">📝 Tambah / Update Data Monitoring</h5>
            <form id="monitorForm" onsubmit="submitForm(event)">
                <div class="row g-2">
                    <div class="col-md-4">
                        <input type="text" id="station" class="form-control" placeholder="Nama Pompa" required>
                    </div>
                    <div class="col-md-2">
                        <input type="text" id="weather" class="form-control" placeholder="Cuaca" required>
                    </div>
                    <div class="col-md-2">
                        <input type="number" id="water_level" class="form-control" placeholder="Tinggi Air (cm)" required>
                    </div>
                    <div class="col-md-2">
                        <input type="number" id="active_pumps" class="form-control" placeholder="Pompa Aktif" required>
                    </div>
                    <div class="col-md-2">
                        <select id="flood_status" class="form-select" required>
                            <option value="">Status Banjir</option>
                            <option value="Aman">Aman</option>
                            <option value="Siaga">Siaga</option>
                            <option value="Waspada">Waspada</option>
                        </select>
                    </div>
                </div>
                <button class="btn btn-success mt-3" type="submit">Simpan / Update</button>
            </form>
        </div>
    </div>

    <!-- DATA MONITORING -->
    <div id="monitoringTable"></div>
</div>

<!-- SCRIPT FIREBASE -->
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

    // Inisialisasi Firebase
    firebase.initializeApp(firebaseConfig);
    const database = firebase.database();
    const monitoringRef = database.ref('monitoring_data');

    // Listener realtime
    monitoringRef.on('value', (snapshot) => {
        const data = snapshot.val();
        renderData(data);
    });

    // Render data ke tabel
    function renderData(data) {
        if (!data) {
            document.getElementById('monitoringTable').innerHTML = '<p class="text-muted">Belum ada data.</p>';
            return;
        }

        let content = '';

        const sortedDates = Object.keys(data).sort().reverse();
        const latestDate = sortedDates[0];
        const sortedTimes = Object.keys(data[latestDate]).sort().reverse();
        const latestTime = sortedTimes[0];

        content += `<h5 class="mt-4 text-primary">📅 Tanggal: ${latestDate}</h5>`;
        content += `<h6 class="text-success">⏰ Waktu: ${latestTime}</h6>`;
        content += `
            <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Nama Pompa</th>
                        <th>Cuaca</th>
                        <th>Tinggi Air (cm)</th>
                        <th>Pompa Aktif</th>
                        <th>Status Banjir</th>
                        <th>Aksi</th>
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
                    <td>
                        <button class="btn btn-sm btn-primary me-1" onclick="editData('${latestDate}', '${latestTime}', '${station}', ${JSON.stringify(d).replace(/"/g, '&quot;')})">Edit</button>
                        <button class="btn btn-sm btn-danger" onclick="deleteData('${latestDate}', '${latestTime}', '${station}')">Hapus</button>
                    </td>
                </tr>
            `;
        }

        content += `</tbody></table></div>`;
        document.getElementById('monitoringTable').innerHTML = content;
    }

    // Submit form (create/update)
    function submitForm(e) {
        e.preventDefault();
        const station = document.getElementById('station').value;
        const weather = document.getElementById('weather').value;
        const water_level = document.getElementById('water_level').value;
        const active_pumps = document.getElementById('active_pumps').value;
        const flood_status = document.getElementById('flood_status').value;

        const now = new Date();
        const date = now.toISOString().slice(0, 10); // yyyy-mm-dd
        const time = now.toTimeString().slice(0, 5); // hh:mm

        database.ref(`monitoring_data/${date}/${time}/${station}`).set({
            weather,
            water_level,
            active_pumps,
            flood_status
        });

        document.getElementById('monitorForm').reset();
    }

    // Edit data isi form
    function editData(date, time, station, data) {
        document.getElementById('station').value = station;
        document.getElementById('weather').value = data.weather;
        document.getElementById('water_level').value = data.water_level;
        document.getElementById('active_pumps').value = data.active_pumps;
        document.getElementById('flood_status').value = data.flood_status;
    }

    // Hapus data
    function deleteData(date, time, station) {
        if (confirm(`Yakin ingin menghapus data ${station}?`)) {
            database.ref(`monitoring_data/${date}/${time}/${station}`).remove();
        }
    }
</script>
</body>
</html>
