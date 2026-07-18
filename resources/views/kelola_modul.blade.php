<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <h2 class="font-black text-2xl text-gray-800 leading-tight">
                {{ __('📚 Kelola Modul') }}
            </h2>
            <a href="/kelola-modul/tambah" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2.5 px-5 rounded-xl shadow-lg transition text-sm">
                + Tambah Modul Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('sukses'))
                <div class="mb-6 bg-green-50 text-green-700 px-6 py-4 rounded-2xl font-bold border border-green-200">
                    ✅ {{ session('sukses') }}
                </div>
            @endif

            <!-- Grid Kartu Modul -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($data_modul as $modul)
                    <div class="bg-white rounded-3xl shadow-sm hover:shadow-md transition border border-gray-100 overflow-hidden flex flex-col">
                        <!-- Cover Area -->
                        <div class="h-40 w-full bg-gray-100 relative">
                            @if($modul->gambar_modul)
                                <img src="{{ asset('storage/' . $modul->gambar_modul) }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-purple-100 to-blue-100 flex items-center justify-center text-4xl">📘</div>
                            @endif
                            <div class="absolute top-3 right-3 bg-white/90 backdrop-blur text-purple-700 font-bold px-3 py-1 rounded-lg text-xs shadow-sm">
                                Kelas {{ $modul->tingkat_kelas }}
                            </div>
                        </div>

                        <!-- Info Area -->
                        <div class="p-6 flex-grow">
                            <h3 class="font-black text-xl text-gray-900 mb-2">{{ $modul->judul_modul }}</h3>
                            <p class="text-sm text-gray-500 line-clamp-2">{{ $modul->deskripsi }}</p>
                        </div>

                        <!-- Tombol Aksi Bawah -->
                        <div class="p-4 border-t border-gray-50 flex items-center justify-between bg-gray-50/50">
                            <!-- Tombol Utama: Masuk ke Materi -->
                            <a href="/kelola-modul/{{ $modul->id }}/materi" class="bg-purple-100 text-purple-700 hover:bg-purple-200 px-4 py-2 rounded-xl text-sm font-bold transition">
                                Buka Materi ➡️
                            </a>
                            
                            <!-- Aksi Edit & Hapus Modul -->
                            <div class="flex gap-2">
                                <a href="/kelola-modul/{{ $modul->id }}/edit" class="text-yellow-600 hover:bg-yellow-100 p-2 rounded-lg transition" title="Edit Modul">
                                    ✏️
                                </a>
                                <form action="/kelola-modul/{{ $modul->id }}" method="POST" onsubmit="return confirm('Yakin hapus modul ini beserta semua isinya?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:bg-red-100 p-2 rounded-lg transition" title="Hapus Modul">
                                        🗑️
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center bg-white rounded-3xl border border-dashed border-gray-300">
                        <p class="font-bold text-gray-500">Belum ada modul. Silakan buat modul pertama!</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>