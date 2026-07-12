<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MathMaster - Belajar Matematika Mudah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <!-- Navbar Atas -->
    <nav class="bg-purple-700 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl font-black tracking-tight">MathMaster</a>
            <div>
            @if (Route::has('login'))
            @auth
                <!-- Jika yang login adalah Admin -->
                @if(auth()->user()->role === 'admin')
                    <a href="{{ url('/dashboard') }}" class="hover:text-purple-200 font-semibold mr-4">Dashboard Admin</a>
                <!-- Jika yang login adalah Siswa -->
                @else
                    <span class="text-purple-200 font-medium mr-4">Halo, {{ auth()->user()->name }}!</span>
                @endif

                <!-- Tombol Logout (Bisa dipakai Admin & Siswa langsung dari depan) -->
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-full font-bold text-sm shadow-sm transition">Log Out</button>
                </form>
            @else
                <!-- Jika belum login sama sekali -->
                <a href="{{ route('login') }}" class="hover:text-purple-200 font-semibold mr-5">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="bg-white text-purple-700 px-5 py-2 rounded-full font-bold hover:bg-gray-100 shadow-sm transition">Register</a>
                @endif
            @endauth
        @endif
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="container mx-auto text-center py-20 px-4">
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-5">Belajar Matematika Jadi Lebih Menyenangkan!</h1>
        <p class="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">Jelajahi berbagai modul interaktif yang disiapkan khusus untuk membantu siswa SMP memahami konsep-konsep matematika dengan mudah dan menyenangkan.</p>
    </header>

    <!-- Area Daftar Modul -->
    <main class="container mx-auto px-4 pb-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($data_modul as $modul)
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300 overflow-hidden border border-gray-100 flex flex-col">
                    
                    <!-- Label Kelas -->
                    <div class="bg-gradient-to-r from-purple-500 to-blue-500 p-4">
                        <span class="bg-white text-purple-700 text-xs font-extrabold px-3 py-1 rounded-full uppercase tracking-widest shadow-sm">Kelas {{ $modul->tingkat_kelas }}</span>
                    </div>
                    
                    <!-- Konten Kartu -->
                    <div class="p-6 flex-grow">
                        <h2 class="text-2xl font-bold text-gray-800 mb-3">{{ $modul->judul_modul }}</h2>
                        <p class="text-gray-600 mb-5 text-sm leading-relaxed">{{ $modul->deskripsi }}</p>
                        
                        <div class="bg-gray-50 rounded-lg p-4 mb-6">
                            <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-2">Daftar Materi:</h3>
                            <ul class="list-disc pl-5 text-sm text-gray-700 space-y-1">
                                @forelse($modul->materis->take(3) as $materi)
                                    <li>{{ $materi->judul_materi }}</li>
                                @empty
                                    <li class="text-gray-400 italic list-none -ml-5">Materi sedang disusun...</li>
                                @endforelse
                                
                                @if($modul->materis->count() > 3)
                                    <li class="text-purple-600 font-medium italic list-none -ml-5 mt-2">+ {{ $modul->materis->count() - 3 }} materi lainnya</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Tombol Mulai -->
                    <div class="p-6 pt-0 mt-auto">
                        <a href="/belajar/{{ $modul->id }}" class="block text-center w-full bg-purple-100 text-purple-700 font-bold py-3 rounded-xl hover:bg-purple-200 transition-colors">
                            Mulai Belajar 
                        </a>
                    </div>

                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500 text-xl font-medium">Belum ada modul pembelajaran yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
    </main>

</body>
</html>