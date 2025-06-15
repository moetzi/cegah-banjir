<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Cegah Banjir') }} - Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('css/cegahbanjir.css') }}" rel="stylesheet">
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <nav class="glass-effect fixed w-full z-50 px-6 py-4 bg-white bg-opacity-100 border-b border-gray-200">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <div class="accent-yinmn text-2xl font-bold flex items-center">
                    <i class="fas fa-briefcase mr-2 accent-chetwode"></i>
                    Cegah Banjir
                </div>
                <div class="hidden md:flex space-x-8" id="nav-links">
                    <a href="#home" class="text-[#1b1b18] hover:text-[#f53003] transition-colors">Home</a>
                    <a href="#services" class="text-[#1b1b18] hover:text-[#f53003] transition-colors">Services</a>
                    <a href="#about" class="text-[#1b1b18] hover:text-[#f53003] transition-colors">About</a>
                    <a href="#contact" class="text-[#1b1b18] hover:text-[#f53003] transition-colors">Contact</a>
                </div>
                <button id="menu-toggle" class="md:hidden">☰</button>
            </div>
        </nav>

        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>
        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
            <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
                <div class="text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
                    <h1 class="mb-1 font-medium">Let's get started</h1>
                    <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">Laravel has an incredibly rich ecosystem. <br>We suggest starting with the following.</p>
                    <ul class="flex flex-col mb-4 lg:mb-6">
                        <li class="flex items-center gap-4 py-2 relative before:border-l before:border-[#e3e3e0] dark:before:border-[#3E3E3A] before:top-1/2 before:bottom-0 before:left-[0.4rem] before:absolute">
                            <span class="relative py-1 bg-white dark:bg-[#161615]">
                                <span class="flex items-center justify-center rounded-full bg-[#FDFDFC] dark:bg-[#161615] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] w-3.5 h-3.5 border dark:border-[#3E3E3A] border-[#e3e3e0]">
                                    <span class="rounded-full bg-[#dbdbd7] dark:bg-[#3E3E3A] w-1.5 h-1.5"></span>
                                </span>
                            </span>
                            <span>
                                Read the
                                <a href="https://laravel.com/docs" target="_blank" class="inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-[#f53003] dark:text-[#FF4433] ml-1">
                                    <span>Documentation</span>
                                    <svg
                                        width="10"
                                        height="11"
                                        viewBox="0 0 10 11"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-2.5 h-2.5"
                                    >
                                        <path
                                            d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001"
                                            stroke="currentColor"
                                            stroke-linecap="square"
                                        />
                                    </svg>
                                </a>
                            </span>
                        </li>
                        <li class="flex items-center gap-4 py-2 relative before:border-l before:border-[#e3e3e0] dark:before:border-[#3E3E3A] before:bottom-1/2 before:top-0 before:left-[0.4rem] before:absolute">
                            <span class="relative py-1 bg-white dark:bg-[#161615]">
                                <span class="flex items-center justify-center rounded-full bg-[#FDFDFC] dark:bg-[#161615] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)] w-3.5 h-3.5 border dark:border-[#3E3E3A] border-[#e3e3e0]">
                                    <span class="rounded-full bg-[#dbdbd7] dark:bg-[#3E3E3A] w-1.5 h-1.5"></span>
                                </span>
                            </span>
                            <span>
                                Watch video tutorials at
                                <a href="https://laracasts.com" target="_blank" class="inline-flex items-center space-x-1 font-medium underline underline-offset-4 text-[#f53003] dark:text-[#FF4433] ml-1">
                                    <span>Laracasts</span>
                                    <svg
                                        width="10"
                                        height="11"
                                        viewBox="0 0 10 11"
                                        fill="none"
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-2.5 h-2.5"
                                    >
                                        <path
                                            d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001"
                                            stroke="currentColor"
                                            stroke-linecap="square"
                                        />
                                    </svg>
                                </a>
                            </span>
                        </li>
                    </ul>
                    <ul class="flex gap-3 text-sm leading-normal">
                        <li>
                            <a href="https://cloud.laravel.com" target="_blank" class="inline-block dark:bg-[#eeeeec] dark:border-[#eeeeec] dark:text-[#1C1C1A] dark:hover:bg-white dark:hover:border-white hover:bg-black hover:border-black px-5 py-1.5 bg-[#1b1b18] rounded-sm border border-black text-white text-sm leading-normal">
                                Deploy now
                            </a>
                        </li>
                    </ul>
                </div>
            </main>
        </div>

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif

        <section id="home" class="min-h-screen flex items-center justify-center px-6 pt-20">
            <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div class="accent-black slide-in">
                    <h1 class="text-5xl md:text-6xl font-bold mb-6 leading-tight">
                        Cegah Banjir
                        <span class="accent-blue">Platform</span>
                    </h1>
                    <p class="text-xl mb-8 text-gray-700 leading-relaxed">
                        Solusi aman dan terpercaya untuk pencegahan dan penanganan banjir di lingkungan Anda.
                        Cepat, aman, dan dipercaya oleh banyak pengguna di seluruh Indonesia.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button class="accent-bg-blue ...">...</button>
                        <button class="border-2 ...">...</button>
                    </div>
                </div>
                <!-- Right Illustration -->
                <div class="flex justify-center">
                    <div class="relative floating-animation">
                        <!-- Laptop mockup and floating icons -->
                    </div>
                </div>
            </div>
        </section>

        <section id="services" class="py-20 px-6">
            <div class="max-w-6xl mx-auto">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold accent-black mb-4">Kenapa Memilih Kami?</h2>
                    <p class="text-xl text-gray-700">Dipercaya oleh banyak pengguna di seluruh Indonesia</p>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Feature Cards -->
                    <div class="glass-effect p-6 rounded-lg shadow-md transition-transform transform hover:scale-105">
                        <div class="text-5xl accent-blue mb-6">
                            <i class="fas fa-lock"></i>
                        </div>
                        <h3 class="text-2xl font-bold accent-black mb-4">Aman</h3>
                        <p class="text-gray-700">Keamanan tingkat tinggi dengan enkripsi end-to-end</p>
                    </div>
                    <div class="glass-effect p-6 rounded-lg shadow-md transition-transform transform hover:scale-105">
                        <div class="text-5xl accent-blue mb-6">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <h3 class="text-2xl font-bold accent-black mb-4">Terpercaya</h3>
                        <p class="text-gray-700">Sistem yang telah teruji dan dipercaya oleh ribuan pengguna</p>
                    </div>
                    <div class="glass-effect p-6 rounded-lg shadow-md transition-transform transform hover:scale-105">
                        <div class="text-5xl accent-blue mb-6">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h3 class="text-2xl font-bold accent-black mb-4">Dukungan 24/7</h3>
                        <p class="text-gray-700">Tim dukungan siap membantu Anda kapan saja</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="py-20 px-6">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-4xl font-bold accent-black mb-8">Tentang Platform Kami</h2>
                <p class="text-xl text-gray-700 leading-relaxed mb-8">
                    Kami merevolusi penanganan banjir dengan teknologi terkini ...
                </p>
                <div class="grid md:grid-cols-2 gap-8 mt-12">
                    <div class="glass-effect rounded-xl p-6">
                        <h3 class="text-2xl font-bold accent-black mb-4">Misi Kami</h3>
                        <p class="text-gray-700">Membuat penanganan banjir menjadi mudah ...</p>
                    </div>
                    <div class="glass-effect rounded-xl p-6">
                        <h3 class="text-2xl font-bold accent-black mb-4">Visi Kami</h3>
                        <p class="text-gray-700">Dunia di mana penanganan bencana banjir ...</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="contact" class="py-20 px-6">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold accent-black mb-4">Hubungi Kami</h2>
                    <p class="text-xl text-gray-700">Ada pertanyaan? Kami siap membantu Anda.</p>
                </div>
                <div class="glass-effect rounded-2xl p-8">
                    <div class="grid md:grid-cols-3 gap-8 text-center">
                        <!-- Contact Info Cards -->
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
                            <p class="text-gray-700">+62 812-3456-7890</p>
                        </div>
                        <div>
                            <div class="text-3xl accent-blue mb-4">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <h3 class="text-xl font-bold accent-black mb-2">Alamat</h3>
                            <p class="text-gray-700">Jl. Contoh Alamat No.123, Jakarta</p>
                        </div>
                    </div>
                </div>
                <div class="mt-8">
                    <form>
                        <input type="text" name="name" placeholder="Nama" class="w-full p-3 mb-4 border rounded-md">
                        <input type="email" name="email" placeholder="Email" class="w-full p-3 mb-4 border rounded-md">
                        <textarea name="message" placeholder="Pesan" class="w-full p-3 mb-4 border rounded-md"></textarea>
                        <button type="submit" class="w-full p-3 bg-[#f53003] text-white rounded-md hover:bg-[#d62800] transition-colors">
                            Kirim
                        </button>
                    </form>
                </div>
            </div>
        </section>

        <footer class="py-12 px-6 border-t border-gray-200 bg-[var(--white-smoke)]">
            <div class="max-w-6xl mx-auto text-center accent-black">
                <div class="mb-8">
                    <div class="text-2xl font-bold mb-4">
                        <i class="fas fa-briefcase mr-2 accent-blue"></i>
                        Cegah Banjir
                    </div>
                    <p class="text-gray-700 max-w-2xl mx-auto">
                        Mitra terpercaya Anda untuk solusi dan penanganan banjir ...
                    </p>
                </div>
                <div class="grid md:grid-cols-4 gap-8 mb-8">
                    <!-- Footer Links -->
                </div>
                <div class="border-t border-gray-200 pt-8">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <p>&copy; {{ date('Y') }} Cegah Banjir. All rights reserved.</p>
                        <div class="flex space-x-6 mt-4 md:mt-0">
                            <!-- Social Icons -->
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <script>
            document.getElementById('menu-toggle').onclick = function() {
                document.getElementById('nav-links').classList.toggle('hidden');
            }

            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    const href = this.getAttribute('href');
                    if (href.length > 1 && document.querySelector(href)) {
                        e.preventDefault();
                        document.querySelector(href).scrollIntoView({ behavior: 'smooth' });
                    }
                });
            });
        </script>
    </body>
</html>
