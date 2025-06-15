<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - {{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center p-4">
    <!-- Back to Home Button -->
    <a href="{{ url('/') }}" class="fixed top-6 left-6 text-black-500 hover:text-black-700 transition-colors z-10">
        <i class="fas fa-arrow-left mr-2"></i>Back to Home
    </a>

    <!-- Main Container -->
    <div class="w-full max-w-6xl bg-white rounded-3xl shadow-2xl overflow-hidden fade-in">
        <div class="grid md:grid-cols-2 min-h-[600px]">

            <!-- Left Side - Illustration -->
            <div class="bg-gradient-to-br from-white via-blue-200 to-blue-500 p-8 flex items-center justify-center relative overflow-hidden slide-in-left">
                <!-- Replace illustration with your image only -->
                <img src="{{ asset('images/high-water.jpg') }}" alt="High Water Sign" class="rounded-xl shadow-lg w-full max-w-md mx-auto">
            </div>

            <!-- Right Side - Login Form -->
            <div class="flex items-center justify-center p-8 slide-in-right">
                <div class="w-full max-w-md">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2 text-center">Admin Login</h2>
                    <p class="text-gray-500 mb-6 text-center">Enter your credentials to access the dashboard.</p>

                    @if(session('error'))
                        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-5">
                        @csrf
                        <div>
                            <label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block text-gray-700 font-medium mb-1">Password</label>
                            <input id="password" type="password" name="password" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
                            @error('password')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex items-center justify-between">
                            <label class="flex items-center">
                                <input type="checkbox" name="remember" class="form-checkbox text-blue-500">
                                <span class="ml-2 text-gray-600 text-sm">Remember me</span>
                            </label>
                            <a href="#" class="text-sm text-blue-500 hover:underline">Forgot Password?</a>
                        </div>
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-blue-500 to-purple-500 text-white font-semibold py-2 rounded-lg shadow-lg hover:from-blue-600 hover:to-purple-600 transition">
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

