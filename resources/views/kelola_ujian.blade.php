<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-gray-800 leading-tight flex items-center gap-2">
            <svg class="w-7 h-7 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 10V3L4 14h7v7l9-11h-7z" />
            </svg>
            Kelola Ujian Akhir (Boss Fight)
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-6 p-5 bg-white rounded-2xl shadow-sm border border-gray-100 flex items-start sm:items-center gap-4">
                <div class="w-12 h-12 bg-pink-50 text-pink-600 rounded-xl flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" /></svg>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900">Pilih Modul untuk Mengatur Ujian</h3>
                    <p class="text-sm text-gray-500">Soal yang ditambahkan di sini akan menjadi syarat kelulusan akhir dari sebuah Modul.</p>
                </div>
            </div>

            <!-- Grid Kartu Modul -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($data_modul as $modul)
                    <div class="bg-white rounded-3xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 overflow-hidden flex flex-col relative group">
                        
                        <!-- LINK RAKSASA -->
                        <a href="/kelola-ujian/{{ $modul->id }}" class="absolute inset-0 z-10" title="Kelola Ujian Boss Akhir"></a>

                        <!-- Cover Area -->
                        <div class="w-full aspect-[2/1] bg-gray-900 relative overflow-hidden pointer-events-none">
                            @if($modul->gambar_modul)
                                <img src="{{ asset('storage/' . $modul->gambar_modul) }}" class="w-full h-full object-cover opacity-60 group-hover:scale-105 transition-transform duration-500">
                            @else
                                <img src="https://placehold.co/800x400/111827/ffffff?text=UJIAN+AKHIR" class="w-full h-full object-cover opacity-60 group-hover:scale-105 transition-transform duration-500" alt="Boss Fight Cover">
                            @endif
                            <div class="absolute inset-0 flex items-center justify-center z-20">
                                <span class="font-black text-white text-xl uppercase tracking-widest drop-shadow-md">FINAL EXAM</span>
                            </div>
                        </div>

                        <!-- Info Area (Relative + Z-20 agar tidak menutupi link) -->
                        <div class="p-6 flex-grow relative z-20">
                            <h3 class="font-black text-xl text-gray-900 mb-2 group-hover:text-pink-600 transition-colors">{{ $modul->judul_modul }}</h3>
                            <span class="inline-block bg-pink-50 text-pink-700 font-bold px-3 py-1 rounded-lg text-xs mb-3 border border-pink-100">
                                Kelas {{ $modul->tingkat_kelas }}
                            </span>
                        </div>

                        <!-- Indikator Aksi (Relative + Z-20 agar tidak menutupi link) -->
                        <div class="p-4 border-t border-gray-50 bg-gray-50/50 flex justify-between items-center relative z-20">
                            <span class="font-bold text-pink-600 text-sm">Kelola Soal Ujian</span>
                            <svg class="w-5 h-5 text-pink-500 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center bg-white rounded-3xl border border-dashed border-gray-300">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" /></svg>
                        <p class="font-bold text-gray-500">Belum ada modul. Buat modul terlebih dahulu.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>