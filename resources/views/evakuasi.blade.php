<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>CeBan | Request Evakuasi</title>
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  <script>
  function showSuccessModal() {
    document.getElementById("successModal").style.display = "flex";
  }

  function closeModal() {
    document.getElementById("successModal").style.display = "none";
  }

  // Cek jika halaman kembali dari redirect dengan pesan sukses
  document.addEventListener("DOMContentLoaded", function () {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('status') === 'success') {
      showSuccessModal();
    }
  });
</script>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #B9E1FF;
    }

    .navbar {
      display: flex;
      justify-content: center;
      background: transparent;
      margin-top: 30px;
    }

    .navbar-inner {
      background: linear-gradient(to right, #B9D9FF, #F2F6FF);
      border-radius: 50px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      padding: 15px 50px;
      display: flex;
      gap: 50px;
    }

    .navbar-inner a {
      text-decoration: none;
      font-weight: bold;
      color: #0F1B40;
      font-size: 18px;
    }

    .main-container {
      display: flex;
      padding: 30px 60px;
      gap: 30px;
    }

    .left-side {
      width: 30%;
      text-align: center;
    }

    .left-side h1 {
      font-size: 38px;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .left-side .tagline-box {
      background-color: #002C7E;
      color: white;
      margin: 0 auto 30px;
      padding: 10px 20px;
      width: fit-content;
      border-radius: 12px;
      font-size: 16px;
      font-weight: 500;
    }

    .tips {
      background: linear-gradient(to bottom, #002C7E, #4DA3FF);
      color: white;
      padding: 20px;
      border-radius: 20px;
      text-align: center;
      font-size: 16px;
    }

    .tips h3 {
      margin-top: 0;
      font-size: 18px;
    }

    .right-side {
      width: 70%;
    }

    #map {
      height: 280px;
      width: 100%;
      border-radius: 20px;
      margin-bottom: 20px;
    }

    .card {
      background: #fff;
      padding: 25px;
      border-radius: 20px;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.05);
    }

    .card h3 {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 5px;
    }

    .card p {
      font-size: 14px;
      margin-bottom: 20px;
      color: #333;
    }

    label {
      font-weight: bold;
      display: block;
      margin-top: 15px;
      margin-bottom: 5px;
    }

    input, textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ddd;
      border-radius: 12px;
      font-size: 14px;
      margin-bottom: 10px;
    }

    .btn {
      background: #FF2E2E;
      color: white;
      padding: 12px 30px;
      border: none;
      border-radius: 12px;
      font-size: 16px;
      margin-top: 10px;
      cursor: pointer;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <div class="navbar">
    <div class="navbar-inner">
      <a href="#">Home</a>
      <a href="#">Status Banjir</a>
      <a href="#">Request Evakuasi</a>
    </div>
  </div>

  <!-- Main Content -->
  <div class="main-container">
    <!-- Left Side -->
    <div class="left-side">
      <h1>CeBan</h1>
      <div class="tagline-box">CEGAH BANJIR</div>

      <div class="tips">
        <h3>Tips Darurat Banjir</h3>
        <ol style="text-align: left; display: inline-block;">
          <li>Matikan listrik rumah anda.</li>
          <li>Siapkan tas darurat berisi dokumen dan obat.</li>
          <li>Cari lokasi aman yang lebih tinggi.</li>
        </ol>
      </div>
    </div>

    <!-- Right Side -->
    <div class="right-side">
      <div id="map"></div>

      <div class="card">
        <h3>Detail Informasi</h3>
        <p>Mohon isi formulir dengan benar. Pastikan nomor telepon aktif!</p>
        <form method="POST" action="{{ route('evakuasi.store') }}">
          @csrf
          <label>Nama</label>
          <input type="text" name="nama" required>

          <label>Nomor Telepon</label>
          <input type="text" name="telepon" required>

          <label>Jumlah Orang</label>
          <input type="number" name="jumlah_orang" required>

          <label>Keterangan</label>
          <textarea name="keterangan" rows="3"></textarea>

          <button type="submit" class="btn">Request</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Map Script -->
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script>
    var map = L.map('map').setView([-7.2575, 112.7521], 11);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
      maxZoom: 18
    }).addTo(map);

    L.marker([-7.2575, 112.7521]).addTo(map)
      .bindPopup('Surabaya')
      .openPopup();
  </script>

  <!-- Modal Berhasil -->
<div id="successModal" style="display:none; position: fixed; top: 0; left: 0;
  width: 100vw; height: 100vh; background-color: rgba(0,0,0,0.6);
  display: flex; justify-content: center; align-items: center; z-index: 9999;">
  <div style="background: white; border-radius: 20px; padding: 40px; width: 400px; text-align: center;">
    <div style="margin-bottom: 20px;">
      <img src="success-icon.png" alt="Success" style="width: 80px;">
    </div>
    <h3 style="margin-bottom: 10px; color: #0F1B40;">Request Evakuasi Berhasil Dikirim</h3>
    <p style="color: #666; font-size: 14px;">
      Bantuan segera menuju ke lokasi Anda. Mohon untuk standby dengan HP Anda, petugas akan segera menghubungi Anda!
    </p>
    <button onclick="closeModal()" style="margin-top: 20px; padding: 10px 20px; background-color: #0F1B40; color: white; border: none; border-radius: 10px; cursor: pointer;">
      Oke
    </button>
  </div>
</div>
@if(session('evakuasi_success'))
<script>
  window.addEventListener("DOMContentLoaded", () => showSuccessModal());
</script>
@endif
</body>
</html>
