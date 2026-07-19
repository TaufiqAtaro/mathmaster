<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <h2 class="font-black text-2xl text-gray-800 leading-tight flex items-center gap-2">
                <svg class="w-7 h-7 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                {{ __('Kelola Modul') }}
            </h2>
            <a href="/kelola-modul/tambah" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2.5 px-5 rounded-xl shadow-lg transition flex items-center text-sm gap-2">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                Tambah Modul Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('sukses'))
                <div class="mb-6 bg-green-50 text-green-700 px-6 py-4 rounded-2xl font-bold border border-green-200 flex items-center gap-3">
                    <svg class="w-6 h-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    {{ session('sukses') }}
                </div>
            @endif

            <!-- Grid Kartu Modul -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($data_modul as $modul)
                    <div class="bg-white rounded-3xl shadow-sm hover:shadow-lg transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col relative group">
                        
                        <!-- AREA KARTU BISA DIKLIK -->
                        <a href="/kelola-modul/{{ $modul->id }}/materi" class="absolute inset-0 z-10" title="Buka Materi Modul"></a>

                        <!-- Cover Area -->
                        <div class="w-full aspect-[2/1] bg-gray-100 relative overflow-hidden">
                            @if($modul->gambar_modul)
                                <img src="{{ asset('storage/' . $modul->gambar_modul) }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <img src="https://placehold.co/800x400/f3f4f6/a8a29e?text=Sampul+Modul" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Sampul Modul">
                            @endif
                            <div class="absolute top-3 right-3 bg-white/90 backdrop-blur text-purple-700 font-bold px-3 py-1 rounded-lg text-xs shadow-sm z-20">
                                Kelas {{ $modul->tingkat_kelas }}
                            </div>
                        </div>

                        <!-- Info Area -->
                        <div class="p-6 flex-grow">
                            <h3 class="font-black text-xl text-gray-900 mb-2 group-hover:text-purple-600 transition-colors">{{ $modul->judul_modul }}</h3>
                            <p class="text-sm text-gray-500 line-clamp-2">{{ $modul->deskripsi }}</p>
                        </div>

                        <!-- Tombol Aksi Bawah -->
                        <div class="p-4 border-t border-gray-50 flex items-center justify-between bg-gray-50/50">
                            <span class="text-purple-600 font-bold text-sm flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                                Buka Materi 
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                            </span>
                            
                            <!-- Aksi Edit & Hapus Modul (Z-20 AGAR BISA DIKLIK) -->
                            <div class="flex gap-2 relative z-20">
                                <a href="/kelola-modul/{{ $modul->id }}/edit" class="text-gray-400 hover:text-blue-600 hover:bg-blue-50 p-2 rounded-lg transition" title="Edit Modul">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                </a>
                                <form action="/kelola-modul/{{ $modul->id }}" method="POST" onsubmit="return confirm('Yakin hapus modul ini beserta semua isinya?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-400 hover:text-red-600 hover:bg-red-50 p-2 rounded-lg transition" title="Hapus Modul">
                                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center bg-white rounded-3xl border border-dashed border-gray-300">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" /></svg>
                        <p class="font-bold text-gray-500">Belum ada modul. Silakan buat modul pertama!</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>