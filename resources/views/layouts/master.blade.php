<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MathMaster - Jago Matematika')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Animasi kustom (jika diperlukan oleh halaman anak) */
        @stack('styles')
    </style>

</head>
<body class="font-sans antialiased text-gray-800 bg-gray-50 flex flex-col min-h-screen">

    <!-- Unified Navbar (Tampil di Semua Halaman) -->
    <nav class="bg-white/90 backdrop-blur-md sticky top-0 z-50 border-b border-gray-200 shadow-sm transition-all duration-300">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo Kiri -->
                <a href="/" class="flex-shrink-0 flex items-center gap-2 hover:opacity-80 transition">
                    <span class="font-black text-2xl text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-blue-500 tracking-tight">
                        MathMaster
                    </span>
                </a>

                <!-- Navigasi Tengah (Menu Utama) -->
                <div class="hidden md:flex space-x-8">
                    
                    <!-- Menu Beranda -->
                    <a href="/" class="relative group {{ request()->is('/') ? 'text-purple-700 font-bold' : 'text-gray-600 font-semibold hover:text-purple-600' }} transition py-2">
                        Beranda
                        <span class="absolute -bottom-1 left-0 h-0.5 bg-purple-600 transition-all duration-300 {{ request()->is('/') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                    </a>

                    <!-- Menu Ruang Belajar -->
                    <a href="/modul" class="relative group {{ request()->is('modul*') || request()->is('belajar*') ? 'text-purple-700 font-bold' : 'text-gray-600 font-semibold hover:text-purple-600' }} transition py-2">
                        Ruang Belajar
                        <span class="absolute -bottom-1 left-0 h-0.5 bg-purple-600 transition-all duration-300 {{ request()->is('modul*') || request()->is('belajar*') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                    </a>
                    
                    @auth
                        <!-- Menu khusus Siswa -->
                        @if(auth()->user()->role === 'siswa')
                            <a href="/riwayat-kuis" class="relative group {{ request()->is('riwayat-kuis') ? 'text-purple-700 font-bold' : 'text-gray-600 font-semibold hover:text-purple-600' }} transition py-2">
                                Riwayat Ujian
                                <span class="absolute -bottom-1 left-0 h-0.5 bg-purple-600 transition-all duration-300 {{ request()->is('riwayat-kuis') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                            </a>
                        <!-- Menu khusus Admin -->
                        @elseif(auth()->user()->role === 'admin')
                            <a href="/kelola-modul" class="relative group {{ request()->is('kelola-modul*') || request()->is('materi*') || request()->is('soal*') ? 'text-purple-700 font-bold' : 'text-gray-600 font-semibold hover:text-purple-600' }} transition py-2">
                                Kelola Web
                                <span class="absolute -bottom-1 left-0 h-0.5 bg-purple-600 transition-all duration-300 {{ request()->is('kelola-modul*') || request()->is('materi*') || request()->is('soal*') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                            </a>
                            <a href="/rekap-nilai" class="relative group {{ request()->is('rekap-nilai') ? 'text-purple-700 font-bold' : 'text-gray-600 font-semibold hover:text-purple-600' }} transition py-2">
                                Rekap Nilai
                                <span class="absolute -bottom-1 left-0 h-0.5 bg-purple-600 transition-all duration-300 {{ request()->is('rekap-nilai') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                            </a>
                        @endif
                    @endauth
                    
                    <!-- Menu Tentang Kami -->
                    <a href="/tentang-kami" class="relative group {{ request()->is('tentang-kami') ? 'text-purple-700 font-bold' : 'text-gray-600 font-semibold hover:text-purple-600' }} transition py-2">
                        Tentang Kami
                        <span class="absolute -bottom-1 left-0 h-0.5 bg-purple-600 transition-all duration-300 {{ request()->is('tentang-kami') ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
                    </a>
                </div>

                <!-- Navigasi Kanan (Auth / Profil) -->
                <div class="flex items-center space-x-3 sm:space-x-4">
                    @auth
                        <span class="text-gray-800 font-medium mr-2 hidden sm:inline border-r border-gray-300 pr-4">Halo, {{ auth()->user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="bg-red-50 text-red-600 hover:bg-red-100 px-4 py-2 rounded-full font-bold text-sm transition">
                                Log Out
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-bold text-gray-600 hover:text-purple-600 transition">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-5 py-2 rounded-full font-bold text-sm shadow-md hover:shadow-lg transition">
                                Daftar Gratis
                            </a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Konten Utama (Akan diisi oleh halaman lain secara dinamis) -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer Seragam -->
    <footer class="bg-gray-900 text-gray-400 py-8 border-t border-gray-800 mt-auto text-center">
        <p>&copy; {{ date('Y') }} MathMaster. Dibuat oleh Ataro.</p>
    </footer>

</body>
</html>