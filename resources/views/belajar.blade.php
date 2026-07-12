<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar {{ $modul->judul_modul }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans min-h-screen flex flex-col">

    <!-- Navbar Simple -->
    <nav class="bg-purple-700 text-white p-4 shadow-md sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center max-w-4xl">
            <a href="/" class="text-xl font-bold hover:text-purple-200">Kembali ke Beranda</a>
            <span class="font-black tracking-tight">MathMaster</span>
        </div>
    </nav>

    <main class="container mx-auto px-4 py-8 max-w-4xl flex-grow">
        <!-- Header Modul -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-8 mb-8 text-center border-t-8 border-purple-500">
            <span class="inline-block bg-purple-100 text-purple-700 px-4 py-1 rounded-full text-sm font-bold mb-4 uppercase tracking-widest">Kelas {{ $modul->tingkat_kelas }}</span>
            <h1 class="text-4xl font-extrabold text-gray-900 mb-4">{{ $modul->judul_modul }}</h1>
            <p class="text-lg text-gray-600">{{ $modul->deskripsi }}</p>
        </div>

        <!-- Daftar Materi -->
        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
            Materi Pembelajaran
        </h2>

        <div class="space-y-6">
            @forelse($modul->materis as $index => $materi)
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 hover:shadow-md transition-shadow">
                    <h3 class="text-xl font-bold text-purple-800 mb-3 flex items-start">
                        <span class="text-purple-400 mr-2">#{{ $index + 1 }}</span> {{ $materi->judul_materi }}
                    </h3>
                    <div class="text-gray-700 leading-relaxed whitespace-pre-line">
                        {{ $materi->isi_materi }}
                    </div>
                </div>
            @empty
                <div class="bg-yellow-50 text-yellow-700 p-6 rounded-xl border border-yellow-200 text-center font-medium">
                    Maaf, Admin belum menambahkan materi untuk modul ini.
                </div>
            @endforelse
        </div>
    </main>

    <footer class="bg-gray-800 text-gray-400 text-center py-6 mt-12">
        <p>© {{ date('Y') }} MathMaster. Dibuat dengan 💜 untuk siswa SMP.</p>
    </footer>

</body>
</html>