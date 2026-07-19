<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-gray-800 leading-tight flex items-center gap-2">
            <svg class="w-7 h-7 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            {{ __('Edit Materi') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border-t-4 border-yellow-500">
                <div class="p-8">
                    
                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-lg flex items-start gap-3">
                            <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <div>
                                <p class="font-bold mb-1">Periksa kembali data Anda:</p>
                                <ul class="list-disc list-inside text-sm mt-1">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    <form action="/materi/{{ $materi->id }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Judul Materi</label>
                            <input type="text" name="judul_materi" value="{{ old('judul_materi', $materi->judul_materi) }}" required class="w-full border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 rounded-xl shadow-sm">
                        </div>

                        <div>
                            <label class="block text-gray-700 font-bold mb-2">Isi Materi</label>
                            <textarea name="isi_materi" rows="8" class="w-full border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 rounded-xl shadow-sm">{{ old('isi_materi', $materi->isi_materi) }}</textarea>
                            
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
                            
                            <!-- Bagian Edit Video Fisik -->
                            <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 border-dashed">
                                <label class="block text-gray-700 font-bold mb-2 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>
                                    Ganti Video Materi (Opsional)
                                </label>
                                
                                @if($materi->link_video)
                                    <div class="mb-4 p-3 bg-blue-50 text-blue-700 rounded-lg inline-block border border-blue-100">
                                        <span class="text-sm">Video tersimpan:</span>
                                        <a href="{{ asset('storage/' . $materi->link_video) }}" target="_blank" class="font-bold underline ml-2">Lihat Video</a>
                                    </div>
                                @endif
                                
                                <input type="file" name="link_video" accept="video/mp4,video/webm,video/ogg" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-yellow-100 file:text-yellow-700 hover:file:bg-yellow-200 transition mt-2">
                                <p class="text-xs text-gray-500 mt-2">Format: MP4, WebM. Biarkan kosong jika tidak ingin mengganti video.</p>
                            </div>

                            <!-- Bagian Edit File Dokumen -->
                            <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 border-dashed">
                                <label class="block text-gray-700 font-bold mb-2 flex items-center gap-2">
                                    <svg class="w-5 h-5 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" /></svg>
                                    Ganti File Lampiran (Opsional)
                                </label>
                                
                                @if($materi->file_lampiran)
                                    <div class="mb-4 p-3 bg-blue-50 text-blue-700 rounded-lg inline-block border border-blue-100">
                                        <span class="text-sm">File tersimpan:</span>
                                        <a href="{{ asset('storage/' . $materi->file_lampiran) }}" target="_blank" class="font-bold underline ml-2">Lihat File</a>
                                    </div>
                                @endif
                                
                                <input type="file" name="file_lampiran" accept=".pdf,.doc,.docx,.jpg,.png" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-yellow-100 file:text-yellow-700 hover:file:bg-yellow-200 transition mt-2">
                                <p class="text-xs text-gray-500 mt-2">Format: PDF, Word, Gambar. Biarkan kosong jika tidak ingin mengganti.</p>
                            </div>

                        </div>

                        <div class="flex items-center gap-4 pt-6 border-t border-gray-100 mt-6">
                            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-8 rounded-xl shadow-md transition flex items-center gap-2">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>
                                Update Materi
                            </button>
                            <a href="/kelola-modul/{{ $materi->modul_id }}/materi" class="text-gray-500 hover:text-gray-700 font-bold text-sm">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>