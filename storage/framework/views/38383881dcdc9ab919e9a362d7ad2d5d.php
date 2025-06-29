<!DOCTYPE html>
<html>
<head>
    <title>Terima Kasih | CeBan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
            animation: slideUp 0.8s ease-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-body {
            padding: 3rem !important;
            text-align: center;
        }

        .success-icon {
            font-size: 4rem;
            color: #28a745;
            margin-bottom: 1.5rem;
            animation: bounce 1s ease-in-out;
        }

        h2 {
            font-weight: 700;
            color: #2c5530;
            margin-bottom: 1.5rem;
            font-size: 2rem;
        }

        .message {
            font-size: 1.1rem;
            color: #495057;
            line-height: 1.6;
            margin-bottom: 2rem;
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
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(102, 126, 234, 0.4);
            text-decoration: none;
            color: white;
        }

        .info-box {
            background: rgba(40, 167, 69, 0.1);
            border: 2px solid rgba(40, 167, 69, 0.2);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .info-box i {
            color: #28a745;
            margin-right: 0.5rem;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes bounce {
            0%, 20%, 60%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            80% {
                transform: translateY(-5px);
            }
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
    </style>
</head>

<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="success-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>

                    <h2>Laporan Berhasil Dikirim!</h2>

                    <p class="message">
                        Terima kasih telah melaporkan, akan kami kirimkan pemberitahuan lebih lanjut pada nomor handphone anda.
                    </p>

                    <div class="info-box">
                        <p class="mb-2">
                            <i class="fas fa-phone"></i>
                            <strong>Tim evakuasi akan segera menghubungi Anda</strong>
                        </p>
                        <p class="mb-2">
                            <i class="fas fa-clock"></i>
                            <strong>Estimasi waktu respon: 15-30 menit</strong>
                        </p>
                        <p class="mb-0">
                            <i class="fas fa-shield-alt"></i>
                            <strong>Tetap tenang dan pastikan keamanan Anda</strong>
                        </p>
                    </div>

                    <a href="/" class="btn btn-primary">
                        <i class="fas fa-home me-2"></i>Kembali ke Beranda
                    </a>
                </div>
            </div>
            <p class="text-center text-white mt-4">&copy; <?php echo e(date('Y')); ?> CeBan. All rights reserved.</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\Users\Devy Relliani\College_Project\PPPL\cegah-banjir\resources\views/thank-you.blade.php ENDPATH**/ ?>