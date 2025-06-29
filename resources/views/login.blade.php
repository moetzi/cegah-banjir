<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | CeBan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        /* CSS untuk Staggered Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-start {
            opacity: 0;
        }

        .fade-in-animate {
            animation: fadeIn 0.7s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-100 to-blue-200">

    <div class="min-h-screen flex flex-col items-center justify-center px-4">

        <div class="text-center mb-8 fade-in-start">
            <h1 class="text-5xl font-extrabold text-white">
                <a href="/" class="text-[#3793e0] drop-shadow-lg">CeBan</a>
            </h1>
            <p class="text-black/80 drop-shadow">Selamat datang kembali, Admin</p>
        </div>

        <div class="w-full max-w-md fade-in-start">
            <div class="bg-white/80 backdrop-blur-lg shadow-2xl rounded-2xl p-8 space-y-6">

                <h2 class="text-3xl font-bold text-center text-[#3793e0]">Login Akun</h2>

                @if(session('error'))
                    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-md" role="alert">
                        <p>{{ session('error') }}</p>
                    </div>
                @endif

                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-md" role="alert">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                <form method="POST" action="{{ route('login.post') }}" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input type="email" name="email" id="email" class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 px-4 py-2 sm:text-sm border-gray-300 rounded-md" placeholder="Masukkan email anda" required>
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                             <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input type="password" name="password" id="password" class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 px-4 py-2 sm:text-sm border-gray-300 rounded-md" placeholder="Masukkan password Anda" required>
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-full shadow-sm text-sm font-medium text-white bg-[#3793e0] hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 transform hover:scale-105">
                            Login
                        </button>
                    </div>
                </form>

                {{-- <div class="text-center text-sm">
                    <p class="text-gray-600">
                        Belum punya akun?
                        <a href="{{ route('register.form') }}" class="font-semibold text-[#3793e0] hover:text-blue-600">
                            Daftar di sini
                        </a>
                    </p>
                </div> --}}
            </div>

            <p class="text-center text-black text-sm mt-8 fade-in-start">&copy; {{ date('Y') }} CeBan. All rights reserved.</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const elementsToAnimate = document.querySelectorAll('.fade-in-start');
            elementsToAnimate.forEach((element, index) => {
                setTimeout(() => {
                    element.classList.add('fade-in-animate');
                }, index * 200); // Jeda 200ms antar elemen
            });
        });
    </script>

</body>
</html>
