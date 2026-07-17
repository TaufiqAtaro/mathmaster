@extends('layouts.master')
@section('title', 'Ujian Akhir - ' . $modul->judul_modul)

@section('back_url', '/belajar/' . $modul->id)
@section('back_text', 'Kembali ke Ruang Belajar')

@section('content')
    <div class="p-4 md:p-8 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto">
            <div class="bg-indigo-600 text-white rounded-2xl shadow-lg p-8 mb-8 text-center relative overflow-hidden">
                <!-- Elemen Dekorasi -->
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white opacity-10 rounded-full blur-xl"></div>
                
                <h1 class="text-3xl md:text-4xl font-black mb-2 relative z-10">Ujian Akhir Modul</h1>
                <p class="text-indigo-100 text-lg relative z-10">{{ $modul->judul_modul }}</p>
                <div class="mt-6 inline-block bg-white text-indigo-700 px-4 py-2 rounded-lg font-bold text-sm shadow-sm relative z-10">
                    ⚠️ Nilai ujian ini akan masuk ke rekap nilai Admin
                </div>
            </div>

            @if($modul->soals->count() == 0)
                <div class="bg-yellow-50 p-6 rounded-xl border border-yellow-200 text-center">
                    <p class="text-yellow-700 font-bold">Admin belum memasukkan soal Ujian Akhir untuk modul ini.</p>
                    <a href="/belajar/{{ $modul->id }}" class="inline-block mt-4 text-indigo-600 font-bold underline">Kembali ke Modul</a>
                </div>
            @else
                <form action="/modul/{{ $modul->id }}/ujian" method="POST">
                    @csrf
                    <div class="space-y-6">
                        @foreach($modul->soals as $index => $soal)
                            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200 hover:border-indigo-300 transition-colors">
                                <p class="font-bold text-lg mb-4"><span class="text-indigo-600 mr-2">{{ $index + 1 }}.</span> {{ $soal->pertanyaan }}</p>
                                
                                <div class="space-y-3 pl-6">
                                    <label class="flex items-center gap-3 p-3 border rounded-xl hover:bg-indigo-50 cursor-pointer transition">
                                        <input type="radio" name="jawaban[{{ $soal->id }}]" value="a" class="w-5 h-5 text-indigo-600" required>
                                        <span>A. {{ $soal->opsi_a }}</span>
                                    </label>
                                    <label class="flex items-center gap-3 p-3 border rounded-xl hover:bg-indigo-50 cursor-pointer transition">
                                        <input type="radio" name="jawaban[{{ $soal->id }}]" value="b" class="w-5 h-5 text-indigo-600">
                                        <span>B. {{ $soal->opsi_b }}</span>
                                    </label>
                                    <label class="flex items-center gap-3 p-3 border rounded-xl hover:bg-indigo-50 cursor-pointer transition">
                                        <input type="radio" name="jawaban[{{ $soal->id }}]" value="c" class="w-5 h-5 text-indigo-600">
                                        <span>C. {{ $soal->opsi_c }}</span>
                                    </label>
                                    <label class="flex items-center gap-3 p-3 border rounded-xl hover:bg-indigo-50 cursor-pointer transition">
                                        <input type="radio" name="jawaban[{{ $soal->id }}]" value="d" class="w-5 h-5 text-indigo-600">
                                        <span>D. {{ $soal->opsi_d }}</span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-8 text-center bg-white p-6 rounded-2xl shadow-sm border-t-4 border-indigo-500">
                        <p class="text-gray-500 mb-4 font-medium">Yakin dengan jawabanmu? Nilaimu akan terekam secara permanen.</p>
                        <button type="submit" class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white font-black text-lg px-12 py-4 rounded-xl hover:from-indigo-700 hover:to-blue-700 shadow-lg hover:shadow-xl transition transform hover:-translate-y-1">
                            🚀 Kumpulkan Ujian
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection