<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-black text-2xl text-gray-800 leading-tight">
                Tambah Soal Kuis
            </h2>
            <a href="/materi/{{ $materi->id }}/soal" class="text-gray-500 hover:text-purple-600 font-bold transition">Batal & Kembali</a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="mb-6 p-4 bg-purple-50 text-purple-800 rounded-xl border border-purple-100 font-bold">
                Menambahkan soal untuk Materi: {{ $materi->judul_materi }}
            </div>

            <form action="/soal" method="POST" class="bg-white p-8 rounded-2xl shadow-sm border border-gray-200 space-y-6">
                @csrf
                
                <!-- Input rahasia agar soal masuk ke materi yang tepat -->
                <input type="hidden" name="materi_id" value="{{ $materi->id }}">

                <!-- Pertanyaan -->
                <div>
                    <label class="block font-bold text-gray-700 mb-2">Pertanyaan <span class="text-red-500">*</span></label>
                    <textarea name="pertanyaan" rows="3" class="w-full border-gray-300 rounded-xl p-3 focus:ring-purple-500" required>{{ old('pertanyaan') }}</textarea>
                </div>

                <!-- Opsi Jawaban -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Opsi A <span class="text-red-500">*</span></label>
                        <input type="text" name="opsi_a" value="{{ old('opsi_a') }}" class="w-full border-gray-300 rounded-xl p-3 focus:ring-purple-500" required>
                    </div>
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Opsi B <span class="text-red-500">*</span></label>
                        <input type="text" name="opsi_b" value="{{ old('opsi_b') }}" class="w-full border-gray-300 rounded-xl p-3 focus:ring-purple-500" required>
                    </div>
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Opsi C <span class="text-red-500">*</span></label>
                        <input type="text" name="opsi_c" value="{{ old('opsi_c') }}" class="w-full border-gray-300 rounded-xl p-3 focus:ring-purple-500" required>
                    </div>
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Opsi D <span class="text-red-500">*</span></label>
                        <input type="text" name="opsi_d" value="{{ old('opsi_d') }}" class="w-full border-gray-300 rounded-xl p-3 focus:ring-purple-500" required>
                    </div>
                </div>

                <!-- Kunci Jawaban (Value diubah jadi huruf besar agar sesuai dengan validasi) -->
                <div>
                    <label class="block font-bold text-gray-700 mb-2">Kunci Jawaban Benar <span class="text-red-500">*</span></label>
                    <select name="jawaban_benar" class="w-full border-gray-300 rounded-xl p-3 focus:ring-purple-500" required>
                        <option value="" disabled selected>-- Pilih Kunci --</option>
                        <option value="A" {{ old('jawaban_benar') == 'A' ? 'selected' : '' }}>Opsi A</option>
                        <option value="B" {{ old('jawaban_benar') == 'B' ? 'selected' : '' }}>Opsi B</option>
                        <option value="C" {{ old('jawaban_benar') == 'C' ? 'selected' : '' }}>Opsi C</option>
                        <option value="D" {{ old('jawaban_benar') == 'D' ? 'selected' : '' }}>Opsi D</option>
                    </select>
                </div>

                <!-- Pembahasan -->
                <div>
                    <label class="block font-bold text-gray-700 mb-2">Pembahasan (Opsional)</label>
                    <textarea name="pembahasan" rows="3" class="w-full border-gray-300 rounded-xl p-3 focus:ring-purple-500" placeholder="Jelaskan alasan kenapa jawaban tersebut benar...">{{ old('pembahasan') }}</textarea>
                </div>

                <div class="pt-4 border-t border-gray-100">
                    <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-black text-lg py-4 rounded-xl shadow-lg transition transform hover:-translate-y-1">
                        💾 Simpan Soal Kuis
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>