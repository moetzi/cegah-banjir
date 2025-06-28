<!DOCTYPE html>
<html>
<head>
    <title>Request Evakuasi | CeBan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #43b7cc 0%, #0d3e8c 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            padding: 50px 0;
        }

        .card {
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border: none;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-body {
            padding: 2.5rem !important;
        }

        h3 {
            font-weight: 700;
            letter-spacing: -0.5px;
            margin-bottom: 2rem !important;
            position: relative;
        }

        h3:after {
            content: '';
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            border-radius: 2px;
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
        }

        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 0.75rem;
            font-size: 0.95rem;
        }

        .form-control, textarea.form-control {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 0.875rem 1rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-control:focus, textarea.form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.25rem rgba(102, 126, 234, 0.15);
            background: #fff;
            transform: translateY(-2px);
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 12px;
            padding: 0.875rem 2rem;
            font-weight: 600;
            font-size: 1rem;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(102, 126, 234, 0.4);
        }

        .mb-3 {
            margin-bottom: 1.5rem !important;
        }

        .text-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .container {
            position: relative;
        }

        .container:before {
            content: '';
            position: absolute;
            top: -50px;
            left: -50px;
            width: 100px;
            height: 100px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            z-index: 1;
        }

        .container:after {
            content: '';
            position: absolute;
            bottom: -50px;
            right: -50px;
            width: 150px;
            height: 150px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            z-index: 1;
        }

        .row {
            position: relative;
            z-index: 2;
        }

        /* Animation for form elements */
        .form-control, .btn-primary {
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Stagger animation delays */
        .mb-3:nth-child(1) { animation-delay: 0.1s; }
        .mb-3:nth-child(2) { animation-delay: 0.2s; }
        .mb-3:nth-child(3) { animation-delay: 0.3s; }
        .mb-3:nth-child(4) { animation-delay: 0.4s; }
        .mb-3:nth-child(5) { animation-delay: 0.5s; }
        .mb-3:nth-child(6) { animation-delay: 0.6s; }
    </style>
</head>

<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <div class="card p-4">
                <div class="card-body">
                    <h3 class="text-center mb-4 text-primary fw-bold">Form Request Evakuasi</h3>

                    {{-- Hapus alert biasa jika pakai modal --}}
                    {{--
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    --}}

                    <form method="POST" action="{{ route('request.evakuasi.submit') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Pelapor</label>
                            <input type="text" name="nama" class="form-control" required>
                            <small class="text-muted">Contoh: Ahmad Budi Santoso</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No. Telepon</label>
                            <input type="text" name="telepon" class="form-control" required>
                            <small class="text-muted">Contoh: 081234567890 atau 021-12345678</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Kejadian</label>
                            <input type="date" name="tanggal" class="form-control" required>
                            <small class="text-muted">Pilih tanggal kejadian banjir</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lokasi</label>
                            <input type="text" name="lokasi" class="form-control" required>
                            <small class="text-muted">Contoh: Jl. Sudirman No. 123, Kelurahan Menteng, Jakarta Pusat</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah Korban Banjir</label>
                            <input type="number" name="jumlah_korban" class="form-control">
                            <small class="text-muted">Masukkan jumlah orang yang terdampak banjir (contoh: 5)</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama yang Dievakuasi</label>
                            <input type="text" name="nama_korban" class="form-control" required>
                            <small class="text-muted">Contoh: Siti Aminah, Budi (2 tahun), Nenek Mariam (65 tahun)</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pilih Lokasi Evakuasi pada Peta</label>
                            <div id="map" style="height: 300px; border-radius: 12px; border: 2px solid #e9ecef; overflow: hidden;"></div>
                            <input type="hidden" name="latitude" id="latitude">
                            <input type="hidden" name="longitude" id="longitude">
                            <small class="text-muted mt-2 d-block">Klik pada peta untuk menentukan lokasi evakuasi yang diinginkan</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat Terpilih</label>
                            <input type="text" name="alamat_evakuasi" id="alamat_evakuasi" class="form-control" readonly placeholder="Alamat akan muncul setelah memilih lokasi pada peta">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <textarea name="keterangan" class="form-control" rows="3" required></textarea>
                            <small class="text-muted">Contoh: Air setinggi 1 meter, listrik sudah mati, akses jalan terputus. Butuh bantuan segera untuk evakuasi lansia dan anak-anak.</small>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Kirim Request</button>
                    </form>

                    <div class="text-center mt-3">
                        <a href="/" class="text-primary text-decoration-none">← Kembali ke Beranda</a>
                    </div>
                </div>
            </div>
            <p class="text-center text-white mt-4">&copy; {{ date('Y') }} CeBan. All rights reserved.</p>
        </div>
    </div>
</div>

<!-- Modal Bootstrap -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-success" id="successModalLabel">Request Diterima</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        Request evakuasi berhasil terkirim. Mohon tunggu sampai tim evakuasi datang ke lokasi Anda.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Oke</button>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS dan script trigger modal -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Google Maps API -->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap&libraries=places"></script>

<script>
let map;
let marker;
let geocoder;

function initMap() {
    // Default location (Jakarta, Indonesia)
    const defaultLocation = { lat: -6.2088, lng: 106.8456 };

    // Initialize map
    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 13,
        center: defaultLocation,
        mapTypeControl: false,
        streetViewControl: false,
        fullscreenControl: false,
    });

    // Initialize geocoder
    geocoder = new google.maps.Geocoder();

    // Initialize marker
    marker = new google.maps.Marker({
        position: defaultLocation,
        map: map,
        draggable: true,
        title: "Lokasi Evakuasi"
    });

    // Get user's current location
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const userLocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                };
                map.setCenter(userLocation);
                marker.setPosition(userLocation);
                updateLocationInfo(userLocation);
            },
            () => {
                // Handle location error - use default location
                updateLocationInfo(defaultLocation);
            }
        );
    } else {
        // Browser doesn't support Geolocation
        updateLocationInfo(defaultLocation);
    }

    // Add click listener to map
    map.addListener("click", (event) => {
        const clickedLocation = {
            lat: event.latLng.lat(),
            lng: event.latLng.lng(),
        };
        marker.setPosition(clickedLocation);
        updateLocationInfo(clickedLocation);
    });

    // Add drag listener to marker
    marker.addListener("dragend", (event) => {
        const draggedLocation = {
            lat: event.latLng.lat(),
            lng: event.latLng.lng(),
        };
        updateLocationInfo(draggedLocation);
    });
}

function updateLocationInfo(location) {
    // Update hidden inputs
    document.getElementById('latitude').value = location.lat;
    document.getElementById('longitude').value = location.lng;

    // Reverse geocoding to get address
    geocoder.geocode({ location: location }, (results, status) => {
        if (status === "OK" && results[0]) {
            document.getElementById('alamat_evakuasi').value = results[0].formatted_address;
        } else {
            document.getElementById('alamat_evakuasi').value = `Lat: ${location.lat.toFixed(6)}, Lng: ${location.lng.toFixed(6)}`;
        }
    });
}

// Handle API load errors
window.gm_authFailure = function() {
    document.getElementById('map').innerHTML =
        '<div style="display: flex; align-items: center; justify-content: center; height: 100%; background: #f8f9fa; color: #6c757d; text-align: center; padding: 20px;">' +
        '<div><i class="fas fa-exclamation-triangle mb-2"></i><br>Google Maps tidak dapat dimuat.<br>Silakan isi alamat secara manual.</div>' +
        '</div>';
};
</script>

@if(session('success'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();

        // Optional: redirect ke beranda setelah 5 detik
        // setTimeout(() => window.location.href = '/', 5000);
    });
</script>
@endif
</body>
</html>
