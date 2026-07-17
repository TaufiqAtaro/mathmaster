@extends('layouts.master')
@section('title', 'Edit Soal')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-black text-gray-900">Edit Soal Kuis</h1>
        <a href="/kelola-modul" class="text-gray-500 hover:text-blue-600 font-bold transition">Batal & Kembali</a>
    </div>
    
    <form action="/soal/{{ $soal->id }}" method="POST" class="bg-white p-8 rounded-2xl shadow-sm border border-gray-200 space-y-6">
        @csrf
        @method('PUT') <!-- Wajib ada untuk proses update -->
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-blue-50 p-6 rounded-xl border border-blue-100 mb-6">
            <!-- Tipe Soal -->
            <div>
                <label class="block font-bold text-gray-700 mb-2">Tipe Kuis <span class="text-red-500">*</span></label>
                <select name="tipe_soal" class="w-full border-gray-300 rounded-xl p-3 focus:ring-blue-500" required>
                    <option value="kuis_materi" {{ $soal->tipe_soal == 'kuis_materi' ? 'selected' : '' }}>Kuis Per Materi (Syarat Lulus)</option>
                    <option value="ujian_modul" {{ $soal->tipe_soal == 'ujian_modul' ? 'selected' : '' }}>Ujian Akhir Modul (Boss Fight)</option>
                </select>
            </div>

            <!-- Pilih Modul -->
            <div>
                <label class="block font-bold text-gray-700 mb-2">Untuk Modul Apa? <span class="text-red-500">*</span></label>
                <select name="modul_id" class="w-full border-gray-300 rounded-xl p-3 focus:ring-blue-500" required>
                    @foreach($data_modul as $modul)
                        <option value="{{ $modul->id }}" {{ $soal->modul_id == $modul->id ? 'selected' : '' }}>
                            {{ $modul->judul_modul }} (Kelas {{ $modul->tingkat_kelas }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Pilih Materi -->
            <div class="md:col-span-2">
                <label class="block font-bold text-gray-700 mb-2">Untuk Materi Apa?</label>
                <select name="materi_id" class="w-full border-gray-300 rounded-xl p-3 focus:ring-blue-500">
                    <option value="">-- Abaikan jika ini Soal Ujian Akhir --</option>
                    @foreach($data_modul as $modul)
                        <optgroup label="MODUL: {{ strtoupper($modul->judul_modul) }}">
                            @foreach($modul->materis as $materi)
                                <option value="{{ $materi->id }}" {{ $soal->materi_id == $materi->id ? 'selected' : '' }}>
                                    Materi: {{ $materi->judul_materi }}
                                </option>
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
            <textarea name="pertanyaan" rows="3" class="w-full border-gray-300 rounded-xl p-3 focus:ring-blue-500" required>{{ $soal->pertanyaan }}</textarea>
        </div>

        <!-- Opsi Jawaban -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-bold text-gray-700 mb-2">Opsi A <span class="text-red-500">*</span></label>
                <input type="text" name="opsi_a" value="{{ $soal->opsi_a }}" class="w-full border-gray-300 rounded-xl p-3" required>
            </div>
            <div>
                <label class="block font-bold text-gray-700 mb-2">Opsi B <span class="text-red-500">*</span></label>
                <input type="text" name="opsi_b" value="{{ $soal->opsi_b }}" class="w-full border-gray-300 rounded-xl p-3" required>
            </div>
            <div>
                <label class="block font-bold text-gray-700 mb-2">Opsi C <span class="text-red-500">*</span></label>
                <input type="text" name="opsi_c" value="{{ $soal->opsi_c }}" class="w-full border-gray-300 rounded-xl p-3" required>
            </div>
            <div>
                <label class="block font-bold text-gray-700 mb-2">Opsi D <span class="text-red-500">*</span></label>
                <input type="text" name="opsi_d" value="{{ $soal->opsi_d }}" class="w-full border-gray-300 rounded-xl p-3" required>
            </div>
        </div>

        <!-- Kunci Jawaban -->
        <div>
            <label class="block font-bold text-gray-700 mb-2">Kunci Jawaban Benar <span class="text-red-500">*</span></label>
            <select name="jawaban_benar" class="w-full border-gray-300 rounded-xl p-3 focus:ring-blue-500" required>
                <option value="a" {{ $soal->jawaban_benar == 'a' ? 'selected' : '' }}>Opsi A</option>
                <option value="b" {{ $soal->jawaban_benar == 'b' ? 'selected' : '' }}>Opsi B</option>
                <option value="c" {{ $soal->jawaban_benar == 'c' ? 'selected' : '' }}>Opsi C</option>
                <option value="d" {{ $soal->jawaban_benar == 'd' ? 'selected' : '' }}>Opsi D</option>
            </select>
        </div>

        <!-- Pembahasan -->
        <div>
            <label class="block font-bold text-gray-700 mb-2">Pembahasan (Opsional)</label>
            <textarea name="pembahasan" rows="3" class="w-full border-gray-300 rounded-xl p-3 focus:ring-blue-500">{{ $soal->pembahasan }}</textarea>
        </div>

        <div class="pt-4 border-t border-gray-100">
            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-black text-lg py-4 rounded-xl shadow-lg transition transform hover:-translate-y-1">
                💾 Update Soal Kuis
            </button>
        </div>
    </form>
</div>
@endsection