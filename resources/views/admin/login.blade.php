<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - {{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center p-4">
    <!-- Back to Home Button -->
    <a href="{{ url('/') }}" class="fixed top-6 left-6 text-white hover:text-yellow-300 transition-colors z-10">
        <i class="fas fa-arrow-left mr-2"></i>Back to Home
    </a>

    <!-- Main Container -->
    <div class="w-full max-w-6xl bg-white rounded-3xl shadow-2xl overflow-hidden fade-in">
        <div class="grid md:grid-cols-2 min-h-[600px]">

            <!-- Left Side - Illustration -->
            <div class="bg-gradient-to-br from-orange-400 via-pink-400 to-green-400 p-8 flex items-center justify-center relative overflow-hidden slide-in-left">
                <!-- Background decorative elements -->
                <div class="absolute top-10 left-10 w-20 h-20 bg-white bg-opacity-20 rounded-full floating-elements"></div>
                <div class="absolute bottom-20 right-10 w-32 h-32 bg-white bg-opacity-10 rounded-full floating-elements" style="animation-delay: -2s;"></div>
                <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-white bg-opacity-15 rounded-full pulse-gentle"></div>
                <div class="absolute top-1/4 right-1/4 w-12 h-12 bg-white bg-opacity-10 rounded-full floating-elements" style="animation-delay: -4s;"></div>
                <div class="absolute bottom-1/4 left-1/3 w-8 h-8 bg-white bg-opacity-20 rounded-full pulse-gentle" style="animation-delay: -1s;"></div>

                <!-- Main Illustration Container -->
                <div class="relative z-10 text-center max-w-md">
                    <!-- Browser Window -->
                    <div class="bg-white rounded-2xl p-6 shadow-2xl mb-6 transform hover:scale-105 transition-transform duration-300">
                        <!-- Browser Header -->
                        <div class="flex items-center space-x-2 mb-4 pb-2 border-b border-gray-200">
                            <div class="flex space-x-1">
                                <div class="w-3 h-3 bg-red-400 rounded-full"></div>
                                <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                                <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                            </div>
                            <div class="flex-1 bg-gray-100 rounded px-2 py-1 text-xs text-gray-500">
                                banglamarket.com/admin
                            </div>
                        </div>

                        <!-- E-commerce Interface -->
                        <div class="flex items-center justify-between space-x-4">
                            <!-- Male Character -->
                            <div class="flex flex-col items-center">
                                <!-- Head -->
                                <div class="w-12 h-12 bg-gradient-to-br from-blue-300 to-blue-400 rounded-full mb-2 relative">
                                    <div class="absolute top-2 left-3 w-2 h-2 bg-white rounded-full"></div>
                                    <div class="absolute top-2 right-3 w-2 h-2 bg-white rounded-full"></div>
                                    <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 w-3 h-1 bg-white rounded-full"></div>
                                </div>
                                <!-- Body -->
                                <div class="w-8 h-16 bg-gradient-to-b from-gray-300 to-gray-400 rounded-lg mb-1"></div>
                                <!-- Legs -->
                                <div class="w-10 h-8 bg-gradient-to-b from-blue-600 to-blue-700 rounded-lg"></div>
                            </div>

                            <!-- Shopping Interface -->
                            <div class="flex-1 space-y-2">
                                <!-- Product Cards -->
                                <div class="flex space-x-2">
                                    <div class="w-8 h-6 bg-gradient-to-r from-yellow-400 to-orange-400 rounded flex items-center justify-center">
                                        <i class="fas fa-percentage text-white text-xs"></i>
                                    </div>
                                    <div class="w-8 h-6 bg-gradient-to-r from-purple-400 to-pink-400 rounded flex items-center justify-center">
                                        <i class="fas fa-tag text-white text-xs"></i>
                                    </div>
                                </div>

                                <!-- Shopping Items -->
                                <div class="flex space-x-1 justify-center">
                                    <div class="w-6 h-6 bg-gradient-to-br from-green-400 to-blue-400 rounded flex items-center justify-center">
                                        <i class="fas fa-shopping-bag text-white text-xs"></i>
                                    </div>
                                    <div class="w-6 h-6 bg-gradient-to-br from-pink-400 to-red-400 rounded flex items-center justify-center">
                                        <i class="fas fa-gift text-white text-xs"></i>
                                    </div>
                                </div>

                                <!-- Navigation Icons -->
                                <div class="flex space-x-1 justify-center">
                                    <div class="w-4 h-4 bg-orange-400 rounded-full flex items-center justify-center">
                                        <i class="fas fa-search text-white" style="font-size: 8px;"></i>
                                    </div>
                                    <div class="w-4 h-4 bg-blue-400 rounded-full flex items-center justify-center">
                                        <i class="fas fa-globe text-white" style="font-size: 8px;"></i>
                                    </div>
                                    <div class="w-4 h-4 bg-green-400 rounded-full flex items-center justify-center">
                                        <i class="fas fa-credit-card text-white" style="font-size: 8px;"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Female Character -->
                            <div class="flex flex-col items-center">
                                <!-- Head -->
                                <div class="w-12 h-12 bg-gradient-to-br from-pink-300 to-pink-400 rounded-full mb-2 relative">
                                    <div class="absolute top-2 left-3 w-2 h-2 bg-white rounded-full"></div>
                                    <div class="absolute top-2 right-3 w-2 h-2 bg-white rounded-full"></div>
                                    <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 w-3 h-1 bg-white rounded-full"></div>
                                    <!-- Hair -->
                                    <div class="absolute -top-1 left-1/2 transform -translate-x-1/2 w-10 h-6 bg-gradient-to-b from-amber-600 to-amber-700 rounded-t-full"></div>
                                </div>
                                <!-- Body -->
                                <div class="w-8 h-16 bg-gradient-to-b from-red-400 to-red-500 rounded-lg mb-1"></div>
                                <!-- Legs -->
                                <div class="w-10 h-8 bg-gradient-to-b from-gray-600 to-gray-700 rounded-lg"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Shopping Bags -->
                    <div class="flex justify-center space-x-4">
                        <div class="w-10 h-12 bg-gradient-to-b from-yellow-400 to-orange-400 rounded-t-lg relative shadow-lg">
                            <div class="absolute top-1 left-1/2 transform -translate-x-1/2 w-4 h-1 bg-yellow-600 rounded"></div>
                        </div>
                        <div class="w-10 h-12 bg-gradient-to-b from-green-400 to-emerald-400 rounded-t-lg relative shadow-lg">
                            <div class="absolute top-1 left-1/2 transform -translate-x-1/2 w-4 h-1 bg-green-600 rounded"></div>
                        </div>
                        <div class="w-10 h-12 bg-gradient-to-b from-purple-400 to-indigo-400 rounded-t-lg relative shadow-lg">
                            <div class="absolute top-1 left-1/2 transform -translate-x-1/2 w-4 h-1 bg-purple-600 rounded"></div>
                        </div>
                    </div>

                    <!-- Welcome Text -->
                    <div class="mt-6 text-lg font-semibold text-gray-800">
                        Welcome, Admin! <br>
                        <span class="text-sm text-gray-500">Sign in to manage the system.</span>
                    </div>
                </div>
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

