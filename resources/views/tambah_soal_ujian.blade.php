<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-black text-2xl text-gray-800 leading-tight flex items-center gap-2">
                <svg class="w-7 h-7 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
                Tambah Soal Ujian Akhir
            </h2>
            <a href="/kelola-ujian/{{ $modul->id }}" class="text-gray-500 hover:text-pink-600 font-bold transition flex items-center gap-1 text-sm">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                Batal & Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-6 p-4 bg-pink-50 text-pink-800 rounded-xl border border-pink-100 font-bold flex items-center gap-3">
                <svg class="w-5 h-5 text-pink-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                Level Boss: {{ $modul->judul_modul }}
            </div>

            <form action="/ujian" method="POST" class="bg-white p-8 rounded-2xl shadow-sm border border-gray-200 space-y-6 border-t-4 border-pink-500">
                @csrf
                <!-- Input hidden modul_id -->
                <input type="hidden" name="modul_id" value="{{ $modul->id }}">

                <div>
                    <label class="block font-bold text-gray-700 mb-2">Pertanyaan <span class="text-red-500">*</span></label>
                    <textarea name="pertanyaan" rows="4" class="w-full border-gray-300 rounded-xl p-3 focus:ring-pink-500 shadow-sm" required>{{ old('pertanyaan') }}</textarea>
                    
                    <!-- Panduan LaTeX -->
                    <div class="mt-3 p-4 bg-blue-50 border border-blue-100 rounded-xl flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-500 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <div class="text-sm text-blue-800">
                            <p class="font-bold mb-1">Panduan Penulisan Rumus (LaTeX)</p>
                            <p>Anda dapat menggunakan rumus matematika pada <strong>Pertanyaan, Opsi Jawaban, maupun Pembahasan</strong>. Gunakan format berikut:</p>
                            <ul class="list-disc list-inside mt-1 space-y-1">
                                <li>Rumus dalam baris (menyatu teks): ketik <code>\( x^2 + y^2 = z^2 \)</code></li>
                                <li>Rumus beda baris (tengah): ketik <code>$$ \frac{1}{2} $$</code></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Opsi A <span class="text-red-500">*</span></label>
                        <input type="text" name="opsi_a" value="{{ old('opsi_a') }}" class="w-full border-gray-300 rounded-xl p-3 focus:ring-pink-500 shadow-sm" required>
                    </div>
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Opsi B <span class="text-red-500">*</span></label>
                        <input type="text" name="opsi_b" value="{{ old('opsi_b') }}" class="w-full border-gray-300 rounded-xl p-3 focus:ring-pink-500 shadow-sm" required>
                    </div>
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Opsi C <span class="text-red-500">*</span></label>
                        <input type="text" name="opsi_c" value="{{ old('opsi_c') }}" class="w-full border-gray-300 rounded-xl p-3 focus:ring-pink-500 shadow-sm" required>
                    </div>
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Opsi D <span class="text-red-500">*</span></label>
                        <input type="text" name="opsi_d" value="{{ old('opsi_d') }}" class="w-full border-gray-300 rounded-xl p-3 focus:ring-pink-500 shadow-sm" required>
                    </div>
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-2">Kunci Jawaban Benar <span class="text-red-500">*</span></label>
                    <select name="jawaban_benar" class="w-full border-gray-300 rounded-xl p-3 focus:ring-pink-500 shadow-sm" required>
                        <option value="" disabled selected>-- Pilih Kunci --</option>
                        <option value="A" {{ old('jawaban_benar') == 'A' ? 'selected' : '' }}>Opsi A</option>
                        <option value="B" {{ old('jawaban_benar') == 'B' ? 'selected' : '' }}>Opsi B</option>
                        <option value="C" {{ old('jawaban_benar') == 'C' ? 'selected' : '' }}>Opsi C</option>
                        <option value="D" {{ old('jawaban_benar') == 'D' ? 'selected' : '' }}>Opsi D</option>
                    </select>
                </div>

                <div>
                    <label class="block font-bold text-gray-700 mb-2">Pembahasan (Opsional)</label>
                    <textarea name="pembahasan" rows="3" class="w-full border-gray-300 rounded-xl p-3 focus:ring-pink-500 shadow-sm" placeholder="Jelaskan alasan kenapa jawaban tersebut benar...">{{ old('pembahasan') }}</textarea>
                </div>

                <div class="pt-6 border-t border-gray-100">
                    <button type="submit" class="w-full bg-pink-600 hover:bg-pink-700 text-white font-black text-lg py-4 rounded-xl shadow-md transition transform hover:-translate-y-0.5 flex justify-center items-center gap-2">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" /></svg>
                        Simpan Soal Ujian
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>