<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-black text-2xl text-gray-800 leading-tight">
                Edit Soal Kuis
            </h2>
            <a href="/materi/{{ $soal->materi_id }}/soal" class="text-gray-500 hover:text-blue-600 font-bold transition">Batal & Kembali</a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <form action="/soal/{{ $soal->id }}" method="POST" class="bg-white p-8 rounded-2xl shadow-sm border border-gray-200 space-y-6 border-t-4 border-blue-500">
                @csrf
                @method('PUT')
                
                <!-- Pertanyaan -->
                <div>
                    <label class="block font-bold text-gray-700 mb-2">Pertanyaan <span class="text-red-500">*</span></label>
                    <textarea name="pertanyaan" rows="3" class="w-full border-gray-300 rounded-xl p-3 focus:ring-blue-500" required>{{ old('pertanyaan', $soal->pertanyaan) }}</textarea>
                </div>

                <!-- Opsi Jawaban -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Opsi A <span class="text-red-500">*</span></label>
                        <input type="text" name="opsi_a" value="{{ old('opsi_a', $soal->opsi_a) }}" class="w-full border-gray-300 rounded-xl p-3 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Opsi B <span class="text-red-500">*</span></label>
                        <input type="text" name="opsi_b" value="{{ old('opsi_b', $soal->opsi_b) }}" class="w-full border-gray-300 rounded-xl p-3 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Opsi C <span class="text-red-500">*</span></label>
                        <input type="text" name="opsi_c" value="{{ old('opsi_c', $soal->opsi_c) }}" class="w-full border-gray-300 rounded-xl p-3 focus:ring-blue-500" required>
                    </div>
                    <div>
                        <label class="block font-bold text-gray-700 mb-2">Opsi D <span class="text-red-500">*</span></label>
                        <input type="text" name="opsi_d" value="{{ old('opsi_d', $soal->opsi_d) }}" class="w-full border-gray-300 rounded-xl p-3 focus:ring-blue-500" required>
                    </div>
                </div>

                <!-- Kunci Jawaban -->
                <div>
                    <label class="block font-bold text-gray-700 mb-2">Kunci Jawaban Benar <span class="text-red-500">*</span></label>
                    <select name="jawaban_benar" class="w-full border-gray-300 rounded-xl p-3 focus:ring-blue-500" required>
                        <option value="A" {{ old('jawaban_benar', $soal->jawaban_benar) == 'A' ? 'selected' : '' }}>Opsi A</option>
                        <option value="B" {{ old('jawaban_benar', $soal->jawaban_benar) == 'B' ? 'selected' : '' }}>Opsi B</option>
                        <option value="C" {{ old('jawaban_benar', $soal->jawaban_benar) == 'C' ? 'selected' : '' }}>Opsi C</option>
                        <option value="D" {{ old('jawaban_benar', $soal->jawaban_benar) == 'D' ? 'selected' : '' }}>Opsi D</option>
                    </select>
                </div>

                <!-- Pembahasan -->
                <div>
                    <label class="block font-bold text-gray-700 mb-2">Pembahasan (Opsional)</label>
                    <textarea name="pembahasan" rows="3" class="w-full border-gray-300 rounded-xl p-3 focus:ring-blue-500">{{ old('pembahasan', $soal->pembahasan) }}</textarea>
                </div>

                <div class="pt-4 border-t border-gray-100">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-black text-lg py-4 rounded-xl shadow-lg transition transform hover:-translate-y-1">
                        💾 Update Soal Kuis
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>