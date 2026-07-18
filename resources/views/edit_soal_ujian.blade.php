<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-black text-2xl text-gray-800 leading-tight">Edit Soal Ujian Akhir</h2>
            <a href="/kelola-ujian/{{ $soal->modul_id }}" class="text-gray-500 hover:text-pink-600 font-bold transition">Batal & Kembali</a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4">
            
            <!-- PERHATIKAN: action-nya ke /ujian/{id} -->
            <form action="/ujian/{{ $soal->id }}" method="POST" class="bg-white p-8 rounded-2xl shadow-sm border-t-4 border-pink-500 space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block font-bold text-gray-700 mb-2">Pertanyaan</label>
                    <textarea name="pertanyaan" rows="3" class="w-full border-gray-300 rounded-xl p-3 focus:ring-pink-500" required>{{ $soal->pertanyaan }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div><label class="block font-bold">Opsi A</label><input type="text" name="opsi_a" value="{{ $soal->opsi_a }}" class="w-full border-gray-300 rounded-xl p-3" required></div>
                    <div><label class="block font-bold">Opsi B</label><input type="text" name="opsi_b" value="{{ $soal->opsi_b }}" class="w-full border-gray-300 rounded-xl p-3" required></div>
                    <div><label class="block font-bold">Opsi C</label><input type="text" name="opsi_c" value="{{ $soal->opsi_c }}" class="w-full border-gray-300 rounded-xl p-3" required></div>
                    <div><label class="block font-bold">Opsi D</label><input type="text" name="opsi_d" value="{{ $soal->opsi_d }}" class="w-full border-gray-300 rounded-xl p-3" required></div>
                </div>

                <div>
                    <label class="block font-bold">Kunci Jawaban</label>
                    <select name="jawaban_benar" class="w-full border-gray-300 rounded-xl p-3 focus:ring-pink-500" required>
                        <option value="A" {{ $soal->jawaban_benar == 'A' ? 'selected' : '' }}>Opsi A</option>
                        <option value="B" {{ $soal->jawaban_benar == 'B' ? 'selected' : '' }}>Opsi B</option>
                        <option value="C" {{ $soal->jawaban_benar == 'C' ? 'selected' : '' }}>Opsi C</option>
                        <option value="D" {{ $soal->jawaban_benar == 'D' ? 'selected' : '' }}>Opsi D</option>
                    </select>
                </div>

                <div>
                    <label class="block font-bold">Pembahasan</label>
                    <textarea name="pembahasan" rows="3" class="w-full border-gray-300 rounded-xl p-3 focus:ring-pink-500">{{ $soal->pembahasan }}</textarea>
                </div>

                <button type="submit" class="w-full bg-pink-600 hover:bg-pink-700 text-white font-black text-lg py-4 rounded-xl shadow-lg transition">
                    💾 Update Soal Ujian
                </button>
            </form>
        </div>
    </div>
</x-app-layout>