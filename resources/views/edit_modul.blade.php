<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-black text-2xl text-gray-800 leading-tight flex items-center gap-2">
                <svg class="w-7 h-7 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Edit Modul
            </h2>
            <a href="/kelola-modul" class="text-gray-500 hover:text-yellow-600 font-bold transition flex items-center gap-1 text-sm">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                Batal & Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="/kelola-modul/{{ $modul_edit->id }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-2xl shadow-sm border border-gray-200 space-y-6 border-t-4 border-yellow-500">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Judul Modul <span class="text-red-500">*</span></label>
                        <input type="text" name="judul_modul" value="{{ $modul_edit->judul_modul }}" class="w-full border-gray-300 rounded-xl p-3 focus:ring-yellow-500 shadow-sm" required>
                    </div>
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Tingkat Kelas <span class="text-red-500">*</span></label>
                        <input type="number" name="tingkat_kelas" value="{{ $modul_edit->tingkat_kelas }}" class="w-full border-gray-300 rounded-xl p-3 focus:ring-yellow-500 shadow-sm" required>
                    </div>
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-2">Deskripsi Singkat <span class="text-red-500">*</span></label>
                    <textarea name="deskripsi" rows="4" class="w-full border-gray-300 rounded-xl p-3 focus:ring-yellow-500 shadow-sm" required>{{ $modul_edit->deskripsi }}</textarea>

                    <!-- Panduan LaTeX -->
                    <div class="mt-3 p-4 bg-blue-50 border border-blue-100 rounded-xl flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <div class="text-sm text-blue-800">
                            <p class="font-bold mb-1">Panduan Penulisan Rumus (LaTeX)</p>
                            <p>Anda dapat menggunakan rumus matematika pada teks deskripsi. Gunakan format berikut:</p>
                            <ul class="list-disc list-inside mt-1 space-y-1">
                                <li>Rumus dalam baris (menyatu teks): ketik <code>\( x^2 + y^2 = z^2 \)</code></li>
                                <li>Rumus beda baris (tengah): ketik <code>$$ \frac{1}{2} $$</code></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 border-dashed">
                    <label class="block text-gray-700 font-bold mb-2 flex items-center gap-2">
                        <svg class="w-5 h-5 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        Ganti Gambar Cover (Opsional)
                    </label>
                    <input type="file" name="gambar_modul" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-yellow-100 file:text-yellow-700 hover:file:bg-yellow-200 transition mt-2">
                    <p class="text-xs text-gray-500 mt-2">Format: JPG, JPEG, PNG. Kosongkan jika tidak ingin mengganti cover.</p>
                </div>

                <div class="pt-6 border-t border-gray-100">
                    <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-black text-lg py-4 rounded-xl shadow-md transition transform hover:-translate-y-0.5 flex justify-center items-center gap-2">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>
                        Update Data Modul
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>