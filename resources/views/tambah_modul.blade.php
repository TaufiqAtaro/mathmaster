<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-black text-2xl text-gray-800 leading-tight flex items-center gap-2">
                <svg class="w-7 h-7 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Modul Baru
            </h2>
            <a href="/kelola-modul" class="text-gray-500 hover:text-purple-600 font-bold transition flex items-center gap-1 text-sm">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                Batal & Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="/kelola-modul" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-2xl shadow-sm border border-gray-200 space-y-6 border-t-4 border-purple-500">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Judul Modul <span class="text-red-500">*</span></label>
                        <input type="text" name="judul_modul" class="w-full border-gray-300 rounded-xl p-3 focus:ring-purple-500 shadow-sm" placeholder="Misal: Aljabar Linear" required>
                    </div>
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Tingkat Kelas <span class="text-red-500">*</span></label>
                        <input type="number" name="tingkat_kelas" class="w-full border-gray-300 rounded-xl p-3 focus:ring-purple-500 shadow-sm" placeholder="Misal: 7" required>
                    </div>
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-2">Deskripsi Modul <span class="text-red-500">*</span></label>
                    <textarea name="deskripsi" rows="4" class="w-full border-gray-300 rounded-xl p-3 focus:ring-purple-500 shadow-sm" placeholder="Jelaskan secara singkat isi modul ini..." required></textarea>

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
                        <svg class="w-5 h-5 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        Gambar Cover (Opsional)
                    </label>
                    <input type="file" name="gambar_modul" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-purple-100 file:text-purple-700 hover:file:bg-purple-200 transition">
                    <p class="text-xs text-gray-500 mt-2">Format: JPG, JPEG, PNG (Maksimal 2MB)</p>
                </div>

                <div class="pt-6 border-t border-gray-100">
                    <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-black text-lg py-4 rounded-xl shadow-md transition transform hover:-translate-y-0.5 flex justify-center items-center gap-2">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" /></svg>
                        Simpan Modul
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>