<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div class="flex items-center gap-4">
                <a href="/kelola-modul" class="bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 px-4 py-2 rounded-xl font-bold text-sm shadow-sm transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                    Kembali
                </a>
                <h2 class="font-black text-2xl text-gray-800 leading-tight">
                    Materi: <span class="text-purple-600">{{ $modul->judul_modul }}</span>
                </h2>
            </div>
            
            <a href="/materi/tambah?modul_id={{ $modul->id }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-5 rounded-xl shadow-lg transition text-sm flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                Tambah Materi Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-4">
            
            @forelse($materis as $materi)
                <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 hover:border-blue-200 hover:shadow-md transition flex items-center justify-between gap-4 relative group">
                    
                    <!-- AREA KARTU BISA DIKLIK -->
                    <a href="/materi/{{ $materi->id }}/soal" class="absolute inset-0 z-10" title="Buka Soal Kuis"></a>

                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-xl flex items-center justify-center font-black text-lg border border-blue-100 group-hover:scale-110 transition-transform">
                            #{{ $loop->iteration }}
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900 text-lg group-hover:text-blue-600 transition-colors">{{ $materi->judul_materi }}</h3>
                            <p class="text-sm text-gray-500 flex items-center gap-1">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>
                                Video & Teks Pembelajaran
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 relative z-20">
                        <span class="text-blue-600 font-bold text-sm hidden sm:flex items-center gap-1 group-hover:translate-x-1 transition-transform mr-2">
                            Buka Soal Kuis 
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                        </span>

                        <!-- Garis Pemisah -->
                        <div class="w-px h-8 bg-gray-200 mx-1"></div>

                        <!-- Aksi Edit & Hapus Materi -->
                        <a href="/materi/{{ $materi->id }}/edit" class="text-gray-400 hover:text-yellow-600 hover:bg-yellow-50 p-2 rounded-lg transition" title="Edit Materi">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                        </a>
                        <form action="/materi/{{ $materi->id }}" method="POST" onsubmit="return confirm('Hapus materi ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-gray-400 hover:text-red-500 hover:bg-red-50 p-2 rounded-lg transition" title="Hapus Materi">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="py-16 text-center bg-white rounded-3xl border border-dashed border-gray-300">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                    <p class="font-bold text-gray-500">Belum ada materi di modul ini.</p>
                </div>
            @endforelse

        </div>
    </div>
</x-app-layout>