<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-black text-2xl text-gray-800 leading-tight">Tambah Soal Ujian Akhir</h2>
            <a href="/kelola-ujian/{{ $modul->id }}" class="text-gray-500 hover:text-pink-600 font-bold transition">Batal & Kembali</a>
        </div>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto px-4">
            <div class="mb-6 p-4 bg-pink-50 text-pink-800 rounded-xl border border-pink-100 font-bold">
                Level Boss: {{ $modul->judul_modul }}
            </div>

            <!-- PERHATIKAN: action-nya ke /ujian -->
            <form action="/ujian" method="POST" class="bg-white p-8 rounded-2xl shadow-sm border border-gray-200 space-y-6">
                @csrf
                <!-- Input hidden modul_id -->
                <input type="hidden" name="modul_id" value="{{ $modul->id }}">

                <div>
                    <label class="block font-bold text-gray-700 mb-2">Pertanyaan <span class="text-red-500">*</span></label>
                    <textarea name="pertanyaan" rows="3" class="w-full border-gray-300 rounded-xl p-3 focus:ring-pink-500" required></textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div><label class="block font-bold">Opsi A</label><input type="text" name="opsi_a" class="w-full border-gray-300 rounded-xl p-3 focus:ring-pink-500" required></div>
                    <div><label class="block font-bold">Opsi B</label><input type="text" name="opsi_b" class="w-full border-gray-300 rounded-xl p-3 focus:ring-pink-500" required></div>
                    <div><label class="block font-bold">Opsi C</label><input type="text" name="opsi_c" class="w-full border-gray-300 rounded-xl p-3 focus:ring-pink-500" required></div>
                    <div><label class="block font-bold">Opsi D</label><input type="text" name="opsi_d" class="w-full border-gray-300 rounded-xl p-3 focus:ring-pink-500" required></div>
                </div>

                <div>
                    <label class="block font-bold">Kunci Jawaban</label>
                    <select name="jawaban_benar" class="w-full border-gray-300 rounded-xl p-3 focus:ring-pink-500" required>
                        <option value="A">Opsi A</option>
                        <option value="B">Opsi B</option>
                        <option value="C">Opsi C</option>
                        <option value="D">Opsi D</option>
                    </select>
                </div>

                <div>
                    <label class="block font-bold">Pembahasan</label>
                    <textarea name="pembahasan" rows="3" class="w-full border-gray-300 rounded-xl p-3 focus:ring-pink-500"></textarea>
                </div>

                <button type="submit" class="w-full bg-pink-600 hover:bg-pink-700 text-white font-black text-lg py-4 rounded-xl shadow-lg transition">
                    💾 Simpan Soal Ujian
                </button>
            </form>
        </div>
    </div>
</x-app-layout>