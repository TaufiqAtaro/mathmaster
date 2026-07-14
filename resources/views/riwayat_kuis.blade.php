<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Belajarku - MathMaster</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-purple-700 text-white p-4 shadow-md sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center max-w-4xl">
            <div class="flex items-center">
                <a href="/" class="text-lg font-bold hover:text-purple-200 mr-3">Beranda</a>
                <span class="font-black tracking-tight border-l border-purple-500 pl-4">MathMaster</span>
            </div>
            <div class="flex items-center">
                <span class="text-purple-200 font-medium mr-4">Halo, {{ auth()->user()->name }}!</span>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-full font-bold text-sm shadow-sm transition">Log Out</button>
                </form>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <main class="container mx-auto px-4 py-8 max-w-4xl flex-grow">
        
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 mb-8 border-t-8 border-purple-500">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-2">Riwayat Belajarku</h1>
            <p class="text-gray-600">Pantau terus perkembangan nilaimu di sini. Jangan menyerah kalau masih ada yang merah!</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($riwayat as $hasil)
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 flex items-center justify-between hover:shadow-md transition">
                    <div>
                        <h3 class="font-bold text-lg text-gray-800 mb-1">{{ $hasil->modul->judul_modul }}</h3>
                        <p class="text-sm text-gray-500">Dikerjakan: {{ $hasil->updated_at->format('d M Y') }}</p>
                    </div>
                    
                    <div class="flex flex-col items-center justify-center bg-gray-50 w-20 h-20 rounded-full border-4 {{ $hasil->skor >= 70 ? 'border-green-400' : 'border-red-400' }}">
                        <span class="text-2xl font-black {{ $hasil->skor >= 70 ? 'text-green-600' : 'text-red-600' }}">
                            {{ $hasil->skor }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-yellow-50 p-8 rounded-xl border border-yellow-200 text-center">
                    <p class="text-yellow-700 font-bold text-lg mb-2">Belum Ada Riwayat Kuis</p>
                    <p class="text-yellow-600">Kamu belum mengerjakan kuis apa pun. Ayo mulai belajar dan kumpulkan nilaimu!</p>
                    <a href="/" class="inline-block mt-4 bg-purple-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-purple-700 transition">Mulai Belajar</a>
                </div>
            @endforelse
        </div>

    </main>

    <footer class="bg-gray-800 text-gray-400 text-center py-6 mt-12">
        <p>© {{ date('Y') }} MathMaster. Dibuat dengan 💜 untuk siswa SMP.</p>
    </footer>

</body>
</html>