<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-gray-800 leading-tight flex items-center gap-2">
            <svg class="w-7 h-7 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
            </svg>
            {{ __('Tambah Materi Baru') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border-t-4 border-purple-500">
                <div class="p-8">
                    
                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-lg flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <div>
                                <p class="font-bold mb-1">Periksa kembali data Anda:</p>
                                <ul class="list-disc list-inside text-sm">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <form action="/materi" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        
                        <!-- Input ID Modul Tersembunyi -->
                        <input type="hidden" name="modul_id" value="{{ $modul_id }}">

                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Judul Materi</label>
                            <input type="text" name="judul_materi" value="{{ old('judul_materi') }}" required class="w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-xl shadow-sm" placeholder="Contoh: Aljabar Linear Dasar">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Isi Materi</label>
                            <textarea name="isi_materi" rows="8" class="w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-xl shadow-sm placeholder-gray-400" placeholder="Ketikkan materi pembelajaran di sini...">{{ old('isi_materi') }}</textarea>
                            
                            <!-- Panduan LaTeX -->
                            <div class="mt-3 p-4 bg-blue-50 border border-blue-100 rounded-xl flex items-start gap-3">
                                <svg class="w-5 h-5 text-blue-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                <div class="text-sm text-blue-800">
                                    <p class="font-bold mb-1">Panduan Penulisan Rumus (LaTeX)</p>
                                    <p>Sistem ini mendukung rumus matematika. Gunakan format berikut di dalam teks:</p>
                                    <ul class="list-disc list-inside mt-1 space-y-1">
                                        <li>Rumus dalam baris (menyatu teks): ketik <code>\( x^2 + y^2 = z^2 \)</code></li>
                                        <li>Rumus beda baris (tengah): ketik <code>$$ \frac{1}{2} $$</code></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Bagian Upload Video Fisik -->
                            <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 border-dashed">
                                <label class="block text-gray-700 font-bold mb-2 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>
                                    Upload Video (Opsional)
                                </label>
                                <input type="file" name="link_video" accept="video/mp4,video/webm,video/ogg" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-purple-100 file:text-purple-700 hover:file:bg-purple-200 transition">
                                <p class="text-xs text-gray-500 mt-2">Format: MP4, WebM (Maks 50MB)</p>
                            </div>

                            <!-- Bagian Upload File Dokumen -->
                            <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 border-dashed">
                                <label class="block text-gray-700 font-bold mb-2 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" /></svg>
                                    File Lampiran (Opsional)
                                </label>
                                <input type="file" name="file_lampiran" accept=".pdf,.doc,.docx,.jpg,.png" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-orange-100 file:text-orange-700 hover:file:bg-orange-200 transition">
                                <p class="text-xs text-gray-500 mt-2">Format: PDF, Word, atau Gambar (Maks 5MB)</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 pt-6 border-t border-gray-100 mt-6">
                            <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-3 px-8 rounded-xl shadow-md transition flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" /></svg>
                                Simpan Materi
                            </button>
                            <a href="/kelola-modul/{{ $modul_id }}/materi" class="text-gray-500 hover:text-gray-700 font-bold text-sm">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>