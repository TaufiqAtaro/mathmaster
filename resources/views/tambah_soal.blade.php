@extends('layouts.master')
@section('title', 'Tambah Soal Baru')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-black text-gray-900">Tambah Soal Kuis</h1>
        <a href="/kelola-modul" class="text-gray-500 hover:text-purple-600 font-bold transition">Batal & Kembali</a>
    </div>
    
    <form action="/soal" method="POST" class="bg-white p-8 rounded-2xl shadow-sm border border-gray-200 space-y-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-purple-50 p-6 rounded-xl border border-purple-100 mb-6">
            <!-- Tipe Soal -->
            <div>
                <label class="block font-bold text-gray-700 mb-2">Tipe Kuis <span class="text-red-500">*</span></label>
                <select name="tipe_soal" id="tipe_soal" class="w-full border-gray-300 rounded-xl p-3 focus:ring-purple-500" required>
                    <option value="">-- Pilih Tipe Soal --</option>
                    <option value="kuis_materi">Kuis Per Materi (Syarat Lulus)</option>
                    <option value="ujian_modul">Ujian Akhir Modul (Boss Fight)</option>
                </select>
            </div>

            <!-- Pilih Modul -->
            <div>
                <label class="block font-bold text-gray-700 mb-2">Untuk Modul Apa? <span class="text-red-500">*</span></label>
                <select name="modul_id" id="modul_id" class="w-full border-gray-300 rounded-xl p-3 focus:ring-purple-500" required>
                    <option value="">-- Pilih Modul --</option>
                    @foreach($data_modul as $modul)
                        <option value="{{ $modul->id }}">{{ $modul->judul_modul }} (Kelas {{ $modul->tingkat_kelas }})</option>
                    @endforeach
                </select>
            </div>

            <!-- Pilih Materi -->
            <div class="md:col-span-2">
                <label class="block font-bold text-gray-700 mb-2">Untuk Materi Apa?</label>
                <select name="materi_id" class="w-full border-gray-300 rounded-xl p-3 focus:ring-purple-500">
                    <option value="">-- Abaikan jika ini Soal Ujian Akhir --</option>
                    @foreach($data_modul as $modul)
                        <optgroup label="MODUL: {{ strtoupper($modul->judul_modul) }}">
                            @foreach($modul->materis as $materi)
                                <option value="{{ $materi->id }}">Materi: {{ $materi->judul_materi }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                <p class="text-sm text-gray-500 mt-2"><b>Catatan:</b> Wajib diisi jika kamu memilih tipe <b>"Kuis Per Materi"</b>.</p>
            </div>
        </div>

        <!-- Pertanyaan -->
        <div>
            <label class="block font-bold text-gray-700 mb-2">Pertanyaan <span class="text-red-500">*</span></label>
            <textarea name="pertanyaan" rows="3" class="w-full border-gray-300 rounded-xl p-3 focus:ring-purple-500" required></textarea>
        </div>

        <!-- Opsi Jawaban -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-bold text-gray-700 mb-2">Opsi A <span class="text-red-500">*</span></label>
                <input type="text" name="opsi_a" class="w-full border-gray-300 rounded-xl p-3" required>
            </div>
            <div>
                <label class="block font-bold text-gray-700 mb-2">Opsi B <span class="text-red-500">*</span></label>
                <input type="text" name="opsi_b" class="w-full border-gray-300 rounded-xl p-3" required>
            </div>
            <div>
                <label class="block font-bold text-gray-700 mb-2">Opsi C <span class="text-red-500">*</span></label>
                <input type="text" name="opsi_c" class="w-full border-gray-300 rounded-xl p-3" required>
            </div>
            <div>
                <label class="block font-bold text-gray-700 mb-2">Opsi D <span class="text-red-500">*</span></label>
                <input type="text" name="opsi_d" class="w-full border-gray-300 rounded-xl p-3" required>
            </div>
        </div>

        <!-- Kunci Jawaban -->
        <div>
            <label class="block font-bold text-gray-700 mb-2">Kunci Jawaban Benar <span class="text-red-500">*</span></label>
            <select name="jawaban_benar" class="w-full border-gray-300 rounded-xl p-3 focus:ring-purple-500" required>
                <option value="a">Opsi A</option>
                <option value="b">Opsi B</option>
                <option value="c">Opsi C</option>
                <option value="d">Opsi D</option>
            </select>
        </div>

        <!-- Pembahasan -->
        <div>
            <label class="block font-bold text-gray-700 mb-2">Pembahasan (Opsional)</label>
            <textarea name="pembahasan" rows="3" class="w-full border-gray-300 rounded-xl p-3 focus:ring-purple-500" placeholder="Jelaskan alasan kenapa jawaban tersebut benar..."></textarea>
        </div>

        <div class="pt-4 border-t border-gray-100">
            <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-black text-lg py-4 rounded-xl shadow-lg transition transform hover:-translate-y-1">
                💾 Simpan Soal Kuis
            </button>
        </div>
    </form>
</div>
@endsection