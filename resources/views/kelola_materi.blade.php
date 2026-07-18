<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div class="flex items-center gap-4">
                <a href="/kelola-modul" class="bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 px-4 py-2 rounded-xl font-bold text-sm shadow-sm transition">
                    ⬅️ Kembali ke Modul
                </a>
                <h2 class="font-black text-2xl text-gray-800 leading-tight">
                    Materi: <span class="text-purple-600">{{ $modul->judul_modul }}</span>
                </h2>
            </div>
            
            <a href="/materi/tambah?modul_id={{ $modul->id }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-5 rounded-xl shadow-lg transition text-sm">
                + Tambah Materi Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-4">
            
            @forelse($materis as $materi)
                <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 hover:border-blue-200 transition flex items-center justify-between gap-4">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center font-black text-lg border border-blue-100">
                            #{{ $loop->iteration }}
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 text-lg">{{ $materi->judul_materi }}</h3>
                            <p class="text-sm text-gray-500">Video & Teks Pembelajaran</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <!-- Tombol Utama: Masuk ke Soal -->
                        <a href="/materi/{{ $materi->id }}/soal" class="bg-blue-100 text-blue-700 hover:bg-blue-200 px-4 py-2.5 rounded-xl text-sm font-bold transition">
                            Buka Soal Kuis ➡️
                        </a>

                        <!-- Garis Pemisah -->
                        <div class="w-px h-8 bg-gray-200 mx-1"></div>

                        <!-- Aksi Edit & Hapus Materi -->
                        <a href="/materi/{{ $materi->id }}/edit" class="text-yellow-600 hover:bg-yellow-100 p-2 rounded-lg transition" title="Edit Materi">
                            ✏️
                        </a>
                        <form action="/materi/{{ $materi->id }}" method="POST" onsubmit="return confirm('Hapus materi ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:bg-red-100 p-2 rounded-lg transition" title="Hapus Materi">
                                🗑️
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="py-16 text-center bg-white rounded-3xl border border-dashed border-gray-300">
                    <p class="font-bold text-gray-500">Belum ada materi di modul ini.</p>
                </div>
            @endforelse

        </div>
    </div>
</x-app-layout>