<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-gray-800 leading-tight">
            {{ __('⚔️ Kelola Ujian Akhir (Boss Fight)') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-6 p-5 bg-white rounded-2xl shadow-sm border border-gray-100 flex items-center gap-4">
                <div class="w-12 h-12 bg-pink-100 text-pink-600 rounded-xl flex items-center justify-center text-2xl">💡</div>
                <div>
                    <h3 class="font-bold text-gray-900">Pilih Modul untuk Mengatur Ujian</h3>
                    <p class="text-sm text-gray-500">Soal yang ditambahkan di sini akan menjadi syarat kelulusan akhir dari sebuah Modul.</p>
                </div>
            </div>

            <!-- Grid Kartu Modul -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($data_modul as $modul)
                    <div class="bg-white rounded-3xl shadow-sm hover:shadow-md transition border border-gray-100 overflow-hidden flex flex-col">
                        <!-- Cover Area -->
                        <div class="h-32 w-full bg-gray-900 relative">
                            @if($modul->gambar_modul)
                                <img src="{{ asset('storage/' . $modul->gambar_modul) }}" class="w-full h-full object-cover opacity-60">
                            @endif
                            <div class="absolute inset-0 flex items-center justify-center">
                                <span class="font-black text-white text-xl uppercase tracking-widest drop-shadow-md">BOSS LEVEL</span>
                            </div>
                        </div>

                        <!-- Info Area -->
                        <div class="p-6 flex-grow">
                            <h3 class="font-black text-xl text-gray-900 mb-1">{{ $modul->judul_modul }}</h3>
                            <span class="inline-block bg-pink-50 text-pink-700 font-bold px-3 py-1 rounded-lg text-xs mb-3 border border-pink-100">
                                Kelas {{ $modul->tingkat_kelas }}
                            </span>
                        </div>

                        <!-- Tombol Masuk ke Soal Ujian -->
                        <div class="p-4 border-t border-gray-50 bg-gray-50/50">
                            <a href="/kelola-ujian/{{ $modul->id }}" class="block w-full text-center bg-pink-600 text-white hover:bg-pink-700 py-3 rounded-xl text-sm font-bold transition shadow-md shadow-pink-500/20">
                                Kelola Soal Ujian ⚔️
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-16 text-center bg-white rounded-3xl border border-dashed border-gray-300">
                        <p class="font-bold text-gray-500">Belum ada modul. Buat modul terlebih dahulu.</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>