<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Cegah Banjir') }} - Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/cegahbanjir.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="gradient-bg min-h-screen">
    <!-- Header -->
    <nav class="w-full z-50 px-6 py-4 bg-white">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="text-2xl font-bold flex items-center text-[#3793e0]">
                CeBan
            </div>
            <div class="hidden md:flex space-x-8">
                <a href="#home" class="text-[#3793e0] hover:text-blue-700 transition-colors">Home</a>
                <a href="#services" class="text-[#3793e0] hover:text-blue-700 transition-colors">Services</a>
                <a href="#about" class="text-[#3793e0] hover:text-blue-700 transition-colors">About</a>
                <a href="#contact" class="text-[#3793e0] hover:text-blue-700 transition-colors">Contact</a>
            </div>
            <a href="/admin/login" class="bg-[#3793e0] text-white px-6 py-2 rounded-full font-semibold hover:bg-blue-700 transition-all flex items-center">
                <i class="fas fa-user-shield mr-2"></i>Admin Login
            </a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section flex items-center justify-center px-6 pt-20">
        <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div class="accent-black slide-in">
                <!-- Homepage Hero Title -->
                <div class="mb-8">
                    <span class="block text-[80px] leading-none font-extrabold text-[#7ebde9]">
                        CeBan
                    </span>
                    <span class="block text-4xl tracking-widest font-bold text-white mb-8 drop-shadow-lg" style="letter-spacing:0.15em;">
                        CEGAH BANJIR
                    </span>
                </div>
                <p class="text-xl mb-8 text-white leading-relaxed drop-shadow-lg">
                    Solusi aman dan terpercaya untuk pencegahan dan penanganan banjir di lingkungan Anda.
                    Cepat, aman, dan dipercaya oleh banyak pengguna di seluruh Indonesia.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <button class="accent-bg-blue text-white px-8 py-4 rounded-full font-semibold text-lg hover:accent-bg-yinmn transition-all transform hover:scale-105">
                        <i class="fas fa-rocket mr-2"></i>Mulai Sekarang
                    </button>
                    <button class="border-2 border-[var(--chetwode-blue)] text-white px-8 py-4 rounded-full font-semibold text-lg hover:bg-[var(--chetwode-blue)] hover:text-white transition-all">
                        <i class="fas fa-play mr-2"></i>Pelajari Lebih Lanjut
                    </button>
                </div>
            </div>

            <!-- Right Illustration -->
            <div class="flex justify-center">
                <div class="relative floating-animation">
                    <!-- Laptop mockup -->
                    <div class="bg-[var(--maya-blue)] rounded-2xl p-2 shadow-2xl transform rotate-12 hover:rotate-6 transition-transform duration-500">
                        <div class="bg-white rounded-xl p-8 aspect-video flex items-center justify-center">
                            <div class="text-center accent-black">
                                <div class="text-4xl mb-4">
                                    <i class="fas fa-water accent-blue"></i>
                                </div>
                                <h3 class="text-2xl font-bold mb-2">CEGAH BANJIR</h3>
                                <p class="text-sm text-gray-500 mb-4">UNTUK SEMUA</p>
                                <button class="accent-bg-blue text-white px-6 py-2 rounded-full text-sm font-semibold">
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Floating elements -->
                    <div class="absolute -top-4 -right-4 accent-bg-maya rounded-full p-3 shadow-lg">
                        <i class="fas fa-shield-alt accent-yinmn"></i>
                    </div>
                    <div class="absolute -bottom-4 -left-4 accent-bg-yinmn rounded-full p-3 shadow-lg">
                        <i class="fas fa-check text-white"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="services" class="py-20 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold accent-black mb-4">Kenapa Memilih Kami?</h2>
                <p class="text-xl text-gray-700">Dipercaya oleh banyak pengguna di seluruh Indonesia</p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="glass-effect rounded-2xl p-8 text-center hover:transform hover:scale-105 transition-all">
                    <div class="text-5xl accent-blue mb-6">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h3 class="text-2xl font-bold accent-black mb-4">Aman</h3>
                    <p class="text-gray-700">Keamanan tingkat tinggi dengan enkripsi end-to-end</p>
                </div>
                <div class="glass-effect rounded-2xl p-8 text-center hover:transform hover:scale-105 transition-all">
                    <div class="text-5xl accent-blue mb-6">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3 class="text-2xl font-bold accent-black mb-4">Cepat</h3>
                    <p class="text-gray-700">Respon dan penanganan banjir secara real-time</p>
                </div>
                <div class="glass-effect rounded-2xl p-8 text-center hover:transform hover:scale-105 transition-all">
                    <div class="text-5xl accent-blue mb-6">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3 class="text-2xl font-bold accent-black mb-4">Dukungan</h3>
                    <p class="text-gray-700">Layanan pelanggan 24/7 untuk kebutuhan Anda</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl font-bold accent-black mb-8">Tentang Platform Kami</h2>
            <p class="text-xl text-gray-700 leading-relaxed mb-8">
                Kami merevolusi penanganan banjir dengan teknologi terkini dan desain yang berfokus pada pengguna.
                Platform kami memastikan setiap laporan dan penanganan banjir berjalan aman, cepat, dan andal, memberikan ketenangan pikiran bagi masyarakat.
            </p>
            <div class="grid md:grid-cols-2 gap-8 mt-12">
                <div class="glass-effect rounded-xl p-6">
                    <h3 class="text-2xl font-bold accent-black mb-4">Misi Kami</h3>
                    <p class="text-gray-700">Membuat penanganan banjir menjadi mudah, aman, dan dapat diakses oleh semua orang, di mana saja.</p>
                </div>
                <div class="glass-effect rounded-xl p-6">
                    <h3 class="text-2xl font-bold accent-black mb-4">Visi Kami</h3>
                    <p class="text-gray-700">Dunia di mana penanganan bencana banjir berjalan mulus, aman, dan dapat diakses secara instan oleh semua orang.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 px-6">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold accent-black mb-4">Hubungi Kami</h2>
                <p class="text-xl text-gray-700">Ada pertanyaan? Kami siap membantu Anda.</p>
            </div>
            <div class="glass-effect rounded-2xl p-8">
                <div class="grid md:grid-cols-3 gap-8 text-center">
                    <div>
                        <div class="text-3xl accent-blue mb-4">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h3 class="text-xl font-bold accent-black mb-2">Email</h3>
                        <p class="text-gray-700">contact@cegahbanjir.com</p>
                    </div>
                    <div>
                        <div class="text-3xl accent-blue mb-4">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h3 class="text-xl font-bold accent-black mb-2">Telepon</h3>
                        <p class="text-gray-700">+62 812 3456 7890</p>
                    </div>
                    <div>
                        <div class="text-3xl accent-blue mb-4">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h3 class="text-xl font-bold accent-black mb-2">Alamat</h3>
                        <p class="text-gray-700">Jakarta, Indonesia</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-12 px-6 border-t border-gray-200 bg-[var(--white-smoke)]">
        <div class="max-w-6xl mx-auto text-center accent-black">
            <div class="mb-8">
                <div class="text-2xl font-bold mb-4">
                    <i class="fas fa-briefcase mr-2 accent-blue"></i>
                    Cegah Banjir
                </div>
                <p class="text-gray-700 max-w-2xl mx-auto">
                    Mitra terpercaya Anda untuk solusi dan penanganan banjir yang aman dan andal.
                    Membuat penanganan bencana menjadi mudah dan dapat diakses oleh semua orang.
                </p>
            </div>
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h4 class="font-bold mb-4">Layanan</h4>
                    <ul class="space-y-2 text-gray-700">
                        <li><a href="#" class="hover:accent-blue transition-colors">Pelaporan Banjir</a></li>
                        <li><a href="#" class="hover:accent-blue transition-colors">Edukasi Pencegahan</a></li>
                        <li><a href="#" class="hover:accent-blue transition-colors">Koordinasi Evakuasi</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Perusahaan</h4>
                    <ul class="space-y-2 text-gray-700">
                        <li><a href="#about" class="hover:accent-blue transition-colors">Tentang Kami</a></li>
                        <li><a href="#" class="hover:accent-blue transition-colors">Karir</a></li>
                        <li><a href="#contact" class="hover:accent-blue transition-colors">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Dukungan</h4>
                    <ul class="space-y-2 text-gray-700">
                        <li><a href="#" class="hover:accent-blue transition-colors">Pusat Bantuan</a></li>
                        <li><a href="#" class="hover:accent-blue transition-colors">Dokumentasi</a></li>
                        <li><a href="#" class="hover:accent-blue transition-colors">API</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Legal</h4>
                    <ul class="space-y-2 text-gray-700">
                        <li><a href="#" class="hover:accent-blue transition-colors">Kebijakan Privasi</a></li>
                        <li><a href="#" class="hover:accent-blue transition-colors">Syarat Layanan</a></li>
                        <li><a href="#" class="hover:accent-blue transition-colors">Keamanan</a></li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-200 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p>&copy; {{ date('Y') }} Cegah Banjir. All rights reserved.</p>
                    <div class="flex space-x-6 mt-4 md:mt-0">
                        <a href="#" class="text-gray-700 hover:accent-blue transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-700 hover:accent-blue transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-700 hover:accent-blue transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-700 hover:accent-blue transition-colors">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>

