@extends('layouts.master')

@section('title', 'Hasil Kuis - ' . $modul->judul_modul)

@section('content')
    <div class="p-4 md:p-8">
        <div class="max-w-4xl mx-auto">
            <!-- Kartu Skor -->
            <div class="bg-white p-8 rounded-3xl shadow-md border-t-8 {{ $nilai > 70 ? 'border-green-500' : 'border-red-500' }} text-center mb-10">
                <h1 class="text-2xl font-bold text-gray-700 mb-2">Skor Kamu</h1>
                <div class="text-7xl font-black {{ $nilai > 70 ? 'text-green-500' : 'text-red-500' }} mb-4">
                    {{ $nilai }}
                </div>
                <p class="text-gray-600 font-medium text-lg">Kamu menjawab <span class="font-bold text-gray-900">{{ $benar }}</span> dari <span class="font-bold text-gray-900">{{ $totalSoal }}</span> soal dengan benar.</p>
                
                <div class="mt-6">
                    <a href="/belajar/{{ $modul->id }}" class="inline-block bg-gray-200 text-gray-700 font-bold px-6 py-2 rounded-lg hover:bg-gray-300 transition">Kembali ke Materi</a>
                </div>
            </div>

            <h2 class="text-2xl font-black text-gray-900 mb-6">Kunci Jawaban & Pembahasan</h2>

            <!-- Looping Pembahasan -->
            <div class="space-y-6">
                @foreach($soals as $index => $soal)
                    @php
                        $jawabanSiswaIni = $jawabanSiswa[$soal->id] ?? null;
                        $isBenar = $jawabanSiswaIni == $soal->jawaban_benar;
                    @endphp

                    <div class="bg-white p-6 rounded-2xl shadow-sm border {{ $isBenar ? 'border-green-200' : 'border-red-200' }}">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 mt-1">
                                @if($isBenar)
                                    <span class="bg-green-100 text-green-700 text-xl w-8 h-8 flex items-center justify-center rounded-full">✅</span>
                                @else
                                    <span class="bg-red-100 text-red-700 text-xl w-8 h-8 flex items-center justify-center rounded-full">❌</span>
                                @endif
                            </div>
                            <div class="w-full">
                                <p class="font-bold text-lg mb-3">{{ $index + 1 }}. {{ $soal->pertanyaan }}</p>
                                
                                <div class="bg-gray-50 p-4 rounded-xl text-sm mb-4">
                                    <p class="mb-1"><span class="font-semibold">Jawaban Kamu:</span> 
                                        <span class="{{ $isBenar ? 'text-green-600 font-bold' : 'text-red-600 font-bold' }}">
                                            Opsi {{ strtoupper($jawabanSiswaIni ?? '-') }}
                                        </span>
                                    </p>
                                    <p><span class="font-semibold">Kunci Jawaban:</span> <span class="text-green-600 font-bold">Opsi {{ strtoupper($soal->jawaban_benar) }}</span></p>
                                </div>

                                @if($soal->pembahasan)
                                    <div class="bg-blue-50 border border-blue-100 p-4 rounded-xl text-sm text-blue-800">
                                        <span class="font-bold block mb-1">💡 Pembahasan:</span>
                                        {{ $soal->pembahasan }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection