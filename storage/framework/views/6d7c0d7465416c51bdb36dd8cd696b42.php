<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | CeBan</title>
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
            <div class="col-md-5">
                <div class="card p-4">
                    <div class="card-body">
                        <h3 class="text-center mb-4 text-primary fw-bold">Login Akun</h3>

                        <?php if(session('error')): ?>
                            <div class="alert alert-danger">
                                <?php echo e(session('error')); ?>

                            </div>
                        <?php endif; ?>

                        <?php if(session('success')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('success')); ?>

                            </div>
                        <?php endif; ?>

                        <form method="POST" action="<?php echo e(route('login.post')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>

                        <div class="text-center mt-3">
                            <small>Belum punya akun? <a href="<?php echo e(route('register.form')); ?>" class="text-primary text-decoration-none">Daftar di sini</a></small>
                        </div>
                    </div>
                </div>
                <p class="text-center text-white mt-4">&copy; <?php echo e(date('Y')); ?> CeBan. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\Devy Relliani\College_Project\PPPL\cegah-banjir\resources\views/login.blade.php ENDPATH**/ ?>