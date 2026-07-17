<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MathMaster') - E-Learning</title>
    
    <!-- Pastikan Tailwind CSS aktif (Vite bawaan Laravel) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Fallback CDN Tailwind (Jaga-jaga kalau Vite-mu belum jalan) -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts: Nunito -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Nunito', sans-serif; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    <!-- NAVBAR (HEADER) -->
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Kiri: Logo & Menu -->
                <div class="flex items-center gap-8">
                    <a href="/" class="flex-shrink-0 flex items-center gap-2">
                        <div class="w-8 h-8 bg-purple-600 rounded-lg flex items-center justify-center text-white font-black text-xl">
                            M
                        </div>
                        <span class="font-black text-xl text-gray-900 tracking-tight">MathMaster</span>
                    </a>

                    <!-- Menu Navigasi Tengah -->
                    <div class="hidden md:flex space-x-1">
                        
                        <!-- Beranda (Selalu Tampil) -->
                        <a href="/" class="px-3 py-2 rounded-md text-sm font-bold {{ request()->is('/') ? 'bg-purple-50 text-purple-700' : 'text-gray-600 hover:text-purple-600 hover:bg-gray-50' }}">Beranda</a>
                        
                        @if(auth()->check() && auth()->user()->role === 'admin')
                            <!-- Navigasi KHUSUS Admin -->
                            <a href="/kelola-modul" class="px-3 py-2 rounded-md text-sm font-bold {{ request()->is('kelola-modul*') ? 'bg-purple-50 text-purple-700' : 'text-gray-600 hover:text-purple-600 hover:bg-gray-50' }}">Kelola Modul</a>
                            <a href="/rekap-nilai" class="px-3 py-2 rounded-md text-sm font-bold {{ request()->is('rekap-nilai*') ? 'bg-purple-50 text-purple-700' : 'text-gray-600 hover:text-purple-600 hover:bg-gray-50' }}">Rekap Nilai</a>
                        @else
                            <!-- Navigasi Siswa (Tampil untuk Siswa DAN Pengunjung yang belum login) -->
                            <a href="/modul" class="px-3 py-2 rounded-md text-sm font-bold {{ request()->is('modul*') || request()->is('belajar*') ? 'bg-purple-50 text-purple-700' : 'text-gray-600 hover:text-purple-600 hover:bg-gray-50' }}">Ruang Kelas</a>
                            
                            <a href="/ruang-ujian" class="px-3 py-2 rounded-md text-sm font-bold {{ request()->is('ruang-ujian*') ? 'bg-purple-50 text-purple-700' : 'text-gray-600 hover:text-purple-600 hover:bg-gray-50' }}">Ruang Ujian</a>
                            
                            <a href="/riwayat-kuis" class="px-3 py-2 rounded-md text-sm font-bold {{ request()->is('riwayat-kuis*') ? 'bg-purple-50 text-purple-700' : 'text-gray-600 hover:text-purple-600 hover:bg-gray-50' }}">Riwayat Nilai</a>
                        @endif

                        <!-- Tentang Kami (Selalu Tampil) -->
                        <a href="/tentang-kami" class="px-3 py-2 rounded-md text-sm font-bold {{ request()->is('tentang-kami*') ? 'bg-purple-50 text-purple-700' : 'text-gray-600 hover:text-purple-600 hover:bg-gray-50' }}">Tentang Kami</a>
                    </div>
                </div>

                <!-- Kanan: Profil & Logout -->
                <div class="flex items-center">
                    @auth
                        <div class="flex items-center gap-4">
                            <div class="text-right hidden sm:block">
                                <p class="text-sm font-bold text-gray-900 leading-tight">{{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-500 font-medium capitalize">{{ auth()->user()->role }}</p>
                            </div>
                            <!-- Tombol Logout Bawaan Breeze/Laravel -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="bg-gray-100 hover:bg-red-50 hover:text-red-600 text-gray-600 p-2 rounded-lg transition-colors" title="Logout">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                </button>
                            </form>
                        </div>
                    @else
                        <div class="flex gap-2">
                            <a href="{{ route('login') }}" class="text-gray-600 font-bold hover:text-purple-600 px-4 py-2">Masuk</a>
                            <a href="{{ route('register') }}" class="bg-purple-600 text-white font-bold px-4 py-2 rounded-lg hover:bg-purple-700 shadow-sm">Daftar</a>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- AREA TOMBOL KEMBALI KONSISTEN -->
    @hasSection('back_url')
        <div class="max-w-4xl mx-auto px-4 w-full mt-6 mb-2">
            <a href="@yield('back_url')" class="inline-flex items-center text-gray-500 hover:text-purple-600 font-bold transition-colors group">
                <div class="bg-white border border-gray-200 group-hover:border-purple-300 group-hover:bg-purple-50 p-1.5 rounded-lg mr-3 transition-colors shadow-sm">
                    <svg class="w-5 h-5 text-gray-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                </div>
                @yield('back_text', 'Kembali')
            </a>
        </div>
    @endif

    <!-- KONTEN UTAMA -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-white border-t border-gray-200 mt-12 py-8">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <div class="w-10 h-10 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400 mx-auto mb-4 font-black">M</div>
            <p class="text-gray-500 font-medium">&copy; {{ date('Y') }} MathMaster. Dibuat dengan 💜 untuk pendidikan Indonesia.</p>
        </div>
    </footer>

</body>
</html>