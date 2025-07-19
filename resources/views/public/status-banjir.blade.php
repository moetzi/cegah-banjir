<!DOCTYPE html>
<html lang="id">

<head>
    <title>Status Banjir DAS | CeBan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        .nav-link-animate {
            position: relative;
            padding-bottom: 5px;
        }
        .nav-link-animate::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            background-color: #3793e0;
            transition: width 0.3s ease-in-out;
        }
        .nav-link-animate:hover::after,
        .nav-link-animate.active::after {
            width: 100%;
        }

        .spinner {
            border-top-color: #3793e0;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        .table-container {
            max-height: 60vh;
            overflow-y: auto;
        }
        thead th {
            position: sticky;
            top: 0;
            z-index: 10;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-blue-100 to-blue-200">

    <nav class="w-full z-50 px-6 py-4 sticky top-0 bg-white/80 backdrop-blur-lg border-b border-gray-200/50 shadow-sm">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="text-2xl font-bold flex items-center text-[#3793e0]">
                CeBan
            </div>
            <div class="hidden md:flex space-x-8 font-semibold">
                <a href="/" class="nav-link-animate text-[#3793e0] hover:text-blue-700 transition-colors duration-300">Home</a>
                <a href="/status-banjir" class="nav-link-animate active text-[#3793e0] hover:text-blue-700 transition-colors duration-300">Status Banjir</a>
                <a href="/#about" class="nav-link-animate text-[#3793e0] hover:text-blue-700 transition-colors duration-300">About</a>
                <a href="/request-evakuasi" class="nav-link-animate text-[#3793e0] hover:text-blue-700 transition-colors duration-300">Request Evakuasi</a>
            </div>
            <a href="/login" class="bg-[#3793e0] text-white px-6 py-2 rounded-full font-semibold hover:bg-blue-700 transition-all duration-300 items-center hidden md:flex">
                <i class="fas fa-user-shield mr-2"></i>Admin Login
            </a>
        </div>
    </nav>

    <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="bg-white/90 backdrop-blur-sm shadow-2xl rounded-2xl p-6 md:p-8">
            <div class="flex justify-between items-center mb-6 flex-wrap gap-4">
                <div>
                    <h2 class="text-3xl font-bold text-[#3793e0]">Status Terkini Pompa Air</h2>
                    <p class="text-gray-500 mt-1">Data diperbarui secara realtime dari seluruh pompa air.</p>
                </div>
                <button id="lihatPetaBtn" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-blue-600 transition-colors disabled:bg-gray-400 disabled:cursor-not-allowed" disabled>
                    <i class="fas fa-map-location-dot mr-2"></i>Lihat Peta
                </button>
            </div>

            <div class="bg-gray-50 rounded-xl p-4 mb-6 border border-gray-200">
                <form id="form-pencarian" class="grid grid-cols-1 md:grid-cols-10 gap-4 items-end">
                    <div class="md:col-span-3">
                        <label for="tanggalInput" class="block text-sm font-medium text-gray-700 mb-1"><i class="fas fa-calendar-alt mr-1"></i> Tanggal</label>
                        <input type="date" id="tanggalInput" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div class="md:col-span-2">
                        <label for="waktuInput" class="block text-sm font-medium text-gray-700 mb-1"><i class="fas fa-clock mr-1"></i> Waktu (hh:mm)</label>
                        <input type="time" id="waktuInput" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                    </div>
                    <div class="md:col-span-3">
                        <label for="searchStation" class="block text-sm font-medium text-gray-700 mb-1"><i class="fas fa-water-ladder mr-1"></i> Nama Pompa</label>
                        <input type="text" id="searchStation" class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Contoh: Pompa Air Dinoyo">
                    </div>
                    <div class="md:col-span-2">
                        <button type="submit" class="w-full bg-green-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-green-600 transition-colors">
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </div>
                </form>
            </div>

            <div id="area-hasil">
                <div id="loading-indicator" class="text-center py-10 hidden">
                    <div class="spinner w-12 h-12 rounded-full border-4 border-t-4 border-gray-200 mx-auto"></div>
                    <p class="mt-3 text-gray-600">Mencari data...</p>
                </div>
                <div id="alert-tidak-ditemukan" class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded-md hidden" role="alert">
                    <p class="font-bold"><i class="fas fa-exclamation-triangle mr-2"></i>Data tidak ditemukan</p>
                    <p>Silakan periksa kembali filter pencarian Anda.</p>
                </div>

                <div id="tabel-container" class="table-container hidden">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Nama Pompa</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Cuaca</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Tinggi Air (cm)</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Pompa Aktif</th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody" class="bg-white divide-y divide-gray-200">
                            </tbody>
                    </table>
                </div>

                <div id="pesan-awal" class="text-center text-gray-500 py-16">
                    <i class="fas fa-info-circle fa-3x mb-3 text-blue-400"></i>
                    <p>Silakan pilih tanggal dan waktu, lalu klik "Cari" untuk menampilkan data.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.0/firebase-database.js"></script>

    <script>
        const firebaseConfig = {
        apiKey: "API_KEY",
        authDomain: "AUTH_DOMAIN",
        databaseURL: "DB_URL",
        projectId: "PROJECT_ID",
        };
        firebase.initializeApp(firebaseConfig);
        const database = firebase.database();

        // Elemen UI
        const form = document.getElementById('form-pencarian');
        const lihatPetaBtn = document.getElementById('lihatPetaBtn');
        const loadingIndicator = document.getElementById('loading-indicator');
        const alertNotFound = document.getElementById('alert-tidak-ditemukan');
        const tableContainer = document.getElementById('tabel-container');
        const tableBody = document.getElementById('tableBody');
        const initialMessage = document.getElementById('pesan-awal');
        let lastSearchParams = null;

        // Set nilai default tanggal dan waktu
        const now = new Date();
        document.getElementById('tanggalInput').valueAsDate = now;
        document.getElementById('waktuInput').value = now.toTimeString().substring(0, 5);

        form.addEventListener('submit', function(event) {
            event.preventDefault();
            renderData();
        });

        lihatPetaBtn.addEventListener('click', () => {
             if (lastSearchParams) {
                const { tanggal, waktu, pompa } = lastSearchParams;
                const url = `/status-peta?tanggal=${encodeURIComponent(tanggal)}&waktu=${encodeURIComponent(waktu)}&pompa=${encodeURIComponent(pompa)}`;
                window.location.href = url;
             }
        });

        function renderData() {
            loadingIndicator.classList.remove('hidden');
            alertNotFound.classList.add('hidden');
            tableContainer.classList.add('hidden');
            tableBody.innerHTML = '';
            initialMessage.classList.add('hidden');
            lihatPetaBtn.disabled = true;
            lastSearchParams = null;

            const tanggal = document.getElementById('tanggalInput').value;
            const waktu = document.getElementById('waktuInput').value;
            const keyword = document.getElementById('searchStation').value.trim().toLowerCase();

            if (!tanggal || !waktu) {
                loadingIndicator.classList.add('hidden');
                alertNotFound.classList.remove('hidden');
                return;
            }

            const dataPath = `monitoring_data/${tanggal}/${waktu}`;
            database.ref(dataPath).once('value', (snapshot) => {
                const data = snapshot.val();
                let results = [];
                if (data) {
                    for (const pumpName in data) {
                        if (keyword === '' || pumpName.toLowerCase().includes(keyword)) {
                            results.push({ name: pumpName, ...data[pumpName] });
                        }
                    }
                }

                loadingIndicator.classList.add('hidden');

                if (results.length > 0) {
                    tableContainer.classList.remove('hidden');
                    displayResultsInTable(results);
                    lastSearchParams = { tanggal: tanggal, waktu: waktu, pompa: keyword };
                    lihatPetaBtn.disabled = false;
                } else {
                    alertNotFound.classList.remove('hidden');
                }
            });
        }

        function displayResultsInTable(results) {
            function getStatusBadge(status) {
                if (status === 'Aman') return 'bg-green-100 text-green-800';
                if (status === 'Siaga') return 'bg-yellow-100 text-yellow-800';
                if (status === 'Waspada') return 'bg-red-100 text-red-800';
                return 'bg-gray-100 text-gray-800';
            }

            results.forEach(item => {
                const badgeClass = getStatusBadge(item.flood_status);
                const rowHTML = `
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">${item.name}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.weather}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.water_level}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${item.active_pumps}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-center">
                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full ${badgeClass}">
                            ${item.flood_status}
                        </span>
                    </td>
                </tr>`;
                tableBody.innerHTML += rowHTML;
            });
        }
    </script>
</body>
</html>
