<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Modul MathMaster</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8 bg-gray-100">
    
    <div class="max-w-4xl mx-auto">
        <!-- Tombol Navigasi Admin -->
        <div class="flex justify-end gap-3 mb-6 bg-white p-3 rounded-lg shadow-sm border border-gray-200">
            <!-- Tombol POV Peserta -->
            <a href="/" target="_blank" class="bg-blue-100 text-blue-700 hover:bg-blue-200 px-4 py-2 rounded-md font-bold text-sm transition flex items-center">
                Lihat Web
            </a>
            
            <!-- Tombol Dashboard -->
            <a href="/dashboard" class="bg-gray-100 text-gray-700 hover:bg-gray-200 px-4 py-2 rounded-md font-bold text-sm transition flex items-center">
                Dashboard
            </a>

            <!-- Tombol Log Out -->
            <form action="{{ route('logout') }}" method="POST" class="inline m-0">
                @csrf
                <button type="submit" class="bg-red-500 text-white hover:bg-red-600 px-4 py-2 rounded-md font-bold text-sm transition flex items-center">
                     Log Out
                </button>
            </form>
        </div>
    @if(session('success'))
            <div class="mb-4 px-4 py-3 bg-green-100 border-l-4 border-green-500 text-green-700 rounded shadow-sm">
                <span class="font-bold">{{ session('success') }}</span>
            </div>
        @endif
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Daftar Modul MathMaster</h1>
            <div class="space-x-2">
                <a href="/kelola-modul/tambah" class="bg-green-600 text-white px-4 py-2 rounded font-bold hover:bg-green-700 shadow">+ Tambah Modul</a>
                <a href="/materi/tambah" class="bg-purple-600 text-white px-4 py-2 rounded font-bold hover:bg-purple-700 shadow">+ Tambah Materi</a>
            </div>
        </div>

        <!-- Grid Modul Menyerupai Welcome.blade.php -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($data_modul as $modul)
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition overflow-hidden border border-gray-100 flex flex-col relative">
                    
                    <!-- Area Gambar Utuh -->
                    @if($modul->gambar_modul)
                        <img src="{{ asset('storage/' . $modul->gambar_modul) }}" alt="Cover" class="w-full h-40 object-contain bg-gray-50 border-b border-gray-100">
                    @else
                        <div class="w-full h-40 bg-purple-100 flex items-center justify-center border-b border-purple-200">
                        </div>
                    @endif

                    <!-- Area Konten -->
                    <div class="p-5 flex-grow">
                        <div class="flex justify-between items-start mb-2">
                            <h2 class="font-black text-xl text-gray-800">{{ $modul->judul_modul }}</h2>
                            <span class="bg-blue-100 text-blue-700 text-xs font-bold px-2 py-1 rounded-md shrink-0">
                                Kls {{ $modul->tingkat_kelas }}
                            </span>
                        </div>
                        <p class="text-gray-500 text-sm mb-4 line-clamp-2">{{ $modul->deskripsi }}</p>

                        <!-- Tampilan Singkat Materi -->
                        <div class="bg-gray-50 p-3 rounded-lg border border-gray-100">
                            <h3 class="font-bold text-xs text-gray-700 mb-1">Materi di dalam:</h3>
                            <ul class="text-xs text-gray-600 line-clamp-3">
                                @forelse($modul->materis as $materi)
                                    <li>• {{ $materi->judul_materi }}</li>
                                @empty
                                    <li class="italic text-gray-400">Kosong</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>

                    <!-- Area Tombol Aksi di Bawah -->
                    <div class="p-4 bg-gray-50 border-t border-gray-100 flex justify-between">
                        <a href="/kelola-modul/{{ $modul->id }}/edit" class="text-yellow-600 hover:text-yellow-800 font-bold text-sm bg-yellow-100 hover:bg-yellow-200 px-4 py-1.5 rounded transition">
                            Edit
                        </a>
                        
                        <form action="/kelola-modul/{{ $modul->id }}" method="POST" class="m-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 font-bold text-sm bg-red-100 hover:bg-red-200 px-4 py-1.5 rounded transition" onclick="return confirm('Yakin hapus modul ini beserta isinya?')">
                                Hapus
                            </button>
                        </form>
                    </div>

                </div>
            @endforeach
        </div>
    </div>

</body>
</html>