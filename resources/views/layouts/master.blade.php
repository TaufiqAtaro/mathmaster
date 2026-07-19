<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MathMaster') - E-Learning</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Nunito', sans-serif; }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

    <!-- NAVBAR (HEADER) -->
    <nav class="bg-white border-b border-gray-200 sticky top-0 z-50 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Kiri: Logo & Menu -->
                <div class="flex items-center gap-8">
                    <a href="/" class="flex-shrink-0 flex items-center gap-2">
                        <div class="w-8 h-8 bg-purple-600 rounded-lg flex items-center justify-center text-white font-black text-xl">M</div>
                        <span class="font-black text-xl text-gray-900 tracking-tight">MathMaster</span>
                    </a>
                    <div class="hidden md:flex space-x-1">
                        <a href="/" class="px-3 py-2 rounded-md text-sm font-bold {{ request()->is('/') ? 'bg-purple-50 text-purple-700' : 'text-gray-600 hover:text-purple-600 hover:bg-gray-50' }}">Beranda</a>
                        <a href="/modul" class="px-3 py-2 rounded-md text-sm font-bold {{ request()->is('modul*') || request()->is('belajar*') ? 'bg-purple-50 text-purple-700' : 'text-gray-600 hover:text-purple-600 hover:bg-gray-50' }}">Ruang Kelas</a>
                        <a href="/ruang-ujian" class="px-3 py-2 rounded-md text-sm font-bold {{ request()->is('ruang-ujian*') ? 'bg-purple-50 text-purple-700' : 'text-gray-600 hover:text-purple-600 hover:bg-gray-50' }}">Ruang Ujian</a>
                        <a href="/riwayat-kuis" class="px-3 py-2 rounded-md text-sm font-bold {{ request()->is('riwayat-kuis*') ? 'bg-purple-50 text-purple-700' : 'text-gray-600 hover:text-purple-600 hover:bg-gray-50' }}">Riwayat Nilai</a>
                        <a href="/tentang-kami" class="px-3 py-2 rounded-md text-sm font-bold {{ request()->is('tentang-kami*') ? 'bg-purple-50 text-purple-700' : 'text-gray-600 hover:text-purple-600 hover:bg-gray-50' }}">Tentang Kami</a>
                    </div>
                </div>

                <!-- Kanan: Profil & Logout -->
                <div class="flex items-center">
                    @auth
                        <div class="flex items-center gap-4">
                            <!-- TAMPILAN NAMA PENGGUNA -->
                            <div class="hidden sm:block text-right">
                                <p class="text-sm font-bold text-gray-900 leading-tight">Halo, {{ auth()->user()->name }}</p>
                                <p class="text-xs text-gray-500 font-medium capitalize">{{ auth()->user()->role }}</p>
                            </div>

                            @if(auth()->user()->role === 'admin')
                                <a href="/dashboard" class="bg-gray-900 text-white px-4 py-2 rounded-lg text-sm font-bold shadow-sm hover:bg-gray-800 transition">Control Panel</a>
                            @endif
                            
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="bg-gray-100 hover:bg-red-50 text-gray-600 p-2 rounded-lg transition" title="Logout">
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

    <!-- Tombol Kembali -->
    @hasSection('back_url')
        <div class="max-w-4xl mx-auto px-4 w-full mt-6 mb-2">
            <a href="@yield('back_url')" class="inline-flex items-center text-gray-500 hover:text-purple-600 font-bold transition-colors">
                <div class="bg-white border border-gray-200 p-1.5 rounded-lg mr-3 shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
                </div>
                @yield('back_text', 'Kembali')
            </a>
        </div>
    @endif

    <!-- KONTEN UTAMA -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- SMART FOOTER: Hanya muncul di luar halaman Ujian/Kuis -->
    @if(!request()->is('materi/*/kuis') && !request()->is('modul/*/ujian'))
        <footer class="bg-white border-t border-gray-200 mt-12 py-12">
            <div class="max-w-6xl mx-auto px-4">
                <div class="flex flex-col md:flex-row justify-between items-center gap-10">
                    
                    <!-- Brand -->
                    <div class="text-center md:text-left">
                        <div class="font-black text-2xl text-purple-600 mb-1">MathMaster.</div>
                        <p class="text-gray-500 text-sm font-medium">© {{ date('Y') }} Belajar Matematika Jadi Menyenangkan.</p>
                    </div>

                    <!-- Kontak Lengkap -->
                    <div class="flex flex-wrap justify-center gap-6 md:gap-10">
                        
                        <!-- IG -->
                        <a href="https://instagram.com/mathmaster_id" target="_blank" class="flex flex-col items-center gap-2 group">
                            <div class="w-10 h-10 rounded-full bg-gray-50 text-gray-400 flex items-center justify-center group-hover:bg-pink-50 group-hover:text-pink-500 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838a6.162 6.162 0 1 0 0 12.324 6.162 6.162 0 0 0 0-12.324zm0 10.162a3.999 3.999 0 1 1 0-7.997 3.999 3.999 0 0 1 0 7.997zm6.406-11.844a1.44 1.44 0 1 0 0 2.88 1.44 1.44 0 0 0 0-2.88z"/></svg>
                            </div>
                            <span class="text-xs font-bold text-gray-600 group-hover:text-pink-600">@mathmaster_id</span>
                        </a>

                        <!-- WA -->
                        <a href="https://wa.me/6281234567890" target="_blank" class="flex flex-col items-center gap-2 group">
                            <div class="w-10 h-10 rounded-full bg-gray-50 text-gray-400 flex items-center justify-center group-hover:bg-green-50 group-hover:text-green-500 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51a12.8 12.8 0 00-.57-.01c-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                            </div>
                            <span class="text-xs font-bold text-gray-600 group-hover:text-green-600">0812-3456-7890</span>
                        </a>

                        <!-- YT -->
                        <a href="https://youtube.com/@mathmasterofficial" target="_blank" class="flex flex-col items-center gap-2 group">
                            <div class="w-10 h-10 rounded-full bg-gray-50 text-gray-400 flex items-center justify-center group-hover:bg-red-50 group-hover:text-red-500 transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.377.505 9.377.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            </div>
                            <span class="text-xs font-bold text-gray-600 group-hover:text-red-600">MathMaster Official</span>
                        </a>

                    </div>
                </div>
            </div>
        </footer>
    @endif
</body>
</html>