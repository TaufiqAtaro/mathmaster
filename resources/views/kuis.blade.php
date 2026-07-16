@extends('layouts.master')

@section('title', 'Kuis - ' . $modul->judul_modul)

@section('content')
    <div class="p-4 md:p-8">
        <div class="max-w-4xl mx-auto">
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-3xl font-black text-gray-900">Kuis: {{ $modul->judul_modul }}</h1>
                <a href="/belajar/{{ $modul->id }}" class="text-purple-600 font-bold hover:underline">Batal & Kembali</a>
            </div>

            @if($modul->soals->count() == 0)
                <div class="bg-yellow-50 p-6 rounded-xl border border-yellow-200 text-center">
                    <p class="text-yellow-700 font-bold">Admin belum memasukkan soal kuis untuk modul ini.</p>
                </div>
            @else
                <form action="/belajar/{{ $modul->id }}/kuis" method="POST">
                    @csrf
                    
                    <div class="space-y-6">
                        @foreach($modul->soals as $index => $soal)
                            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-200">
                                <p class="font-bold text-lg mb-4"><span class="text-purple-500 mr-2">{{ $index + 1 }}.</span> {{ $soal->pertanyaan }}</p>
                                
                                <div class="space-y-3 pl-6">
                                    <label class="flex items-center gap-3 p-3 border rounded-xl hover:bg-gray-50 cursor-pointer transition">
                                        <input type="radio" name="jawaban[{{ $soal->id }}]" value="a" class="w-5 h-5 text-purple-600" required>
                                        <span>A. {{ $soal->opsi_a }}</span>
                                    </label>
                                    <label class="flex items-center gap-3 p-3 border rounded-xl hover:bg-gray-50 cursor-pointer transition">
                                        <input type="radio" name="jawaban[{{ $soal->id }}]" value="b" class="w-5 h-5 text-purple-600">
                                        <span>B. {{ $soal->opsi_b }}</span>
                                    </label>
                                    <label class="flex items-center gap-3 p-3 border rounded-xl hover:bg-gray-50 cursor-pointer transition">
                                        <input type="radio" name="jawaban[{{ $soal->id }}]" value="c" class="w-5 h-5 text-purple-600">
                                        <span>C. {{ $soal->opsi_c }}</span>
                                    </label>
                                    <label class="flex items-center gap-3 p-3 border rounded-xl hover:bg-gray-50 cursor-pointer transition">
                                        <input type="radio" name="jawaban[{{ $soal->id }}]" value="d" class="w-5 h-5 text-purple-600">
                                        <span>D. {{ $soal->opsi_d }}</span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-8 text-center bg-white p-6 rounded-2xl shadow-sm border border-gray-200">
                        <p class="text-gray-500 mb-4">Pastikan semua soal sudah terisi sebelum mengumpulkan.</p>
                        <button type="submit" class="bg-purple-600 text-white font-black text-lg px-12 py-4 rounded-xl hover:bg-purple-700 shadow-lg hover:shadow-xl transition transform hover:-translate-y-1">
                            Kumpulkan & Lihat Nilai
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection