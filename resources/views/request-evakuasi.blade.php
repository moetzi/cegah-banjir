<!DOCTYPE html>
<html>
<head>
    <title>Request Evakuasi | CeBan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #3793e0, #56ccf2);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            border-radius: 1rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }
        .form-control:focus {
            border-color: #3793e0;
            box-shadow: 0 0 0 0.25rem rgba(55, 147, 224, 0.25);
        }
        .btn-primary {
            background-color: #3793e0;
            border: none;
        }
        .btn-primary:hover {
            background-color: #2c7cc2;
        }
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
                        </div>
                        <div class="mb-3">
                            <label class="form-label">No. Telepon</label>
                            <input type="text" name="telepon" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lokasi</label>
                            <input type="text" name="lokasi" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Orang yang Dievakuasi</label>
                            <input type="text" name="orang" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Keterangan</label>
                            <textarea name="keterangan" class="form-control" rows="3" required></textarea>
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
