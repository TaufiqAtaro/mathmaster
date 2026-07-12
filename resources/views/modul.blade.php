<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Modul MathMaster</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8 bg-gray-100">
    
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Daftar Modul MathMaster</h1>
            <div class="space-x-2">
                <a href="/modul/tambah" class="bg-green-600 text-white px-4 py-2 rounded font-bold hover:bg-green-700 shadow">+ Tambah Modul</a>
                <a href="/materi/tambah" class="bg-purple-600 text-white px-4 py-2 rounded font-bold hover:bg-purple-700 shadow">+ Tambah Materi</a>
            </div>
        </div>
        
        <div class="grid gap-4">
            @foreach($data_modul as $modul)
                <div class="p-5 bg-white shadow-md rounded-lg border-l-4 border-blue-500 relative">
                    <h2 class="font-bold text-xl text-gray-800">{{ $modul->judul_modul }}</h2>
                    
                    <span class="inline-block mt-2 mb-3 px-3 py-1 bg-blue-100 text-blue-700 text-sm font-semibold rounded-full">
                        Untuk Kelas {{ $modul->tingkat_kelas }}
                    </span>
                    
                    <p class="text-gray-600 mb-4">{{ $modul->deskripsi }}</p>

                    <!-- INI ADALAH BAGIAN RELASINYA -->
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <h3 class="font-bold text-sm text-gray-700 mb-2">Daftar Materi (Bab):</h3>
                        <ul class="list-disc pl-5 text-sm text-gray-600">
                            @forelse($modul->materis as $materi)
                                <li><b>{{ $materi->judul_materi }}</b> - {{ $materi->isi_materi }}</li>
                            @empty
                                <li class="text-gray-400 italic">Belum ada materi di modul ini.</li>
                            @endforelse
                        </ul>
                    </div>

                    <!-- Tombol Aksi -->
                    <a href="/modul/{{ $modul->id }}/edit" class="absolute top-5 right-24 text-yellow-600 hover:text-yellow-800 font-bold text-sm bg-yellow-100 px-3 py-1 rounded-full">Edit</a>
                    
                    <form action="/modul/{{ $modul->id }}" method="POST" class="absolute top-5 right-5">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 font-bold text-sm bg-red-100 px-3 py-1 rounded-full" onclick="return confirm('Yakin ingin menghapus modul ini?')">
                            Hapus
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>