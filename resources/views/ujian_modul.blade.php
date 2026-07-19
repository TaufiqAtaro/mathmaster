@extends('layouts.master')
@section('title', 'Ujian Akhir - ' . $modul->judul_modul)

@section('back_url', '/belajar/' . $modul->id)
@section('back_text', 'Kembali ke Ruang Belajar')

@section('content')
    <!-- Inject MathJax -->
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

    <div class="p-4 md:p-8 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto">
            <div class="bg-indigo-600 text-white rounded-3xl shadow-lg p-10 mb-8 text-center relative overflow-hidden flex flex-col items-center">
                <!-- Elemen Dekorasi -->
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-32 h-32 bg-white opacity-10 rounded-full blur-2xl"></div>
                <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-24 h-24 bg-white opacity-10 rounded-full blur-xl"></div>
                
                <svg class="w-12 h-12 text-indigo-300 mb-4 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                
                <h1 class="text-3xl md:text-4xl font-black mb-2 relative z-10">Ujian Akhir Modul</h1>
                <p class="text-indigo-200 text-lg relative z-10 font-medium">{{ $modul->judul_modul }}</p>
                <div class="mt-6 inline-flex items-center gap-2 bg-indigo-700/50 border border-indigo-500 text-indigo-100 px-4 py-2 rounded-xl font-bold text-sm shadow-sm relative z-10 backdrop-blur-sm">
                    <svg class="w-5 h-5 text-yellow-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                    Nilai ujian ini akan masuk ke rekap nilai Admin
                </div>
            </div>

            @if($modul->soals->count() == 0)
                <div class="bg-yellow-50 p-6 rounded-2xl border border-yellow-200 text-center flex flex-col items-center gap-3">
                    <svg class="w-10 h-10 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                    <p class="text-yellow-700 font-bold">Admin belum memasukkan soal Ujian Akhir untuk modul ini.</p>
                    <a href="/belajar/{{ $modul->id }}" class="inline-block mt-2 text-indigo-600 font-bold hover:underline">Kembali ke Modul</a>
                </div>
            @else
                <form action="/modul/{{ $modul->id }}/ujian" method="POST">
                    @csrf
                    <div class="space-y-6">
                        @foreach($modul->soals as $index => $soal)
                            <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-200 hover:border-indigo-300 transition-colors">
                                <p class="font-bold text-lg mb-6 leading-relaxed"><span class="text-indigo-600 mr-2 text-xl">{{ $index + 1 }}.</span> {{ $soal->pertanyaan }}</p>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <label class="relative flex items-start gap-4 p-4 border-2 border-gray-100 rounded-2xl cursor-pointer hover:border-indigo-200 has-[:checked]:border-indigo-600 has-[:checked]:bg-indigo-50 transition-all">
                                        <input type="radio" name="jawaban[{{ $soal->id }}]" value="a" class="peer sr-only" required>
                                        <div class="w-6 h-6 rounded-full border-2 border-gray-300 bg-white peer-checked:border-[7px] peer-checked:border-indigo-600 shrink-0 mt-0.5 transition-all duration-200"></div>
                                        <span class="text-gray-700 peer-checked:text-indigo-900 peer-checked:font-bold leading-relaxed">A. {{ $soal->opsi_a }}</span>
                                    </label>
                                    
                                    <label class="relative flex items-start gap-4 p-4 border-2 border-gray-100 rounded-2xl cursor-pointer hover:border-indigo-200 has-[:checked]:border-indigo-600 has-[:checked]:bg-indigo-50 transition-all">
                                        <input type="radio" name="jawaban[{{ $soal->id }}]" value="b" class="peer sr-only">
                                        <div class="w-6 h-6 rounded-full border-2 border-gray-300 bg-white peer-checked:border-[7px] peer-checked:border-indigo-600 shrink-0 mt-0.5 transition-all duration-200"></div>
                                        <span class="text-gray-700 peer-checked:text-indigo-900 peer-checked:font-bold leading-relaxed">B. {{ $soal->opsi_b }}</span>
                                    </label>

                                    <label class="relative flex items-start gap-4 p-4 border-2 border-gray-100 rounded-2xl cursor-pointer hover:border-indigo-200 has-[:checked]:border-indigo-600 has-[:checked]:bg-indigo-50 transition-all">
                                        <input type="radio" name="jawaban[{{ $soal->id }}]" value="c" class="peer sr-only">
                                        <div class="w-6 h-6 rounded-full border-2 border-gray-300 bg-white peer-checked:border-[7px] peer-checked:border-indigo-600 shrink-0 mt-0.5 transition-all duration-200"></div>
                                        <span class="text-gray-700 peer-checked:text-indigo-900 peer-checked:font-bold leading-relaxed">C. {{ $soal->opsi_c }}</span>
                                    </label>

                                    <label class="relative flex items-start gap-4 p-4 border-2 border-gray-100 rounded-2xl cursor-pointer hover:border-indigo-200 has-[:checked]:border-indigo-600 has-[:checked]:bg-indigo-50 transition-all">
                                        <input type="radio" name="jawaban[{{ $soal->id }}]" value="d" class="peer sr-only">
                                        <div class="w-6 h-6 rounded-full border-2 border-gray-300 bg-white peer-checked:border-[7px] peer-checked:border-indigo-600 shrink-0 mt-0.5 transition-all duration-200"></div>
                                        <span class="text-gray-700 peer-checked:text-indigo-900 peer-checked:font-bold leading-relaxed">D. {{ $soal->opsi_d }}</span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-8 text-center bg-white p-8 rounded-3xl shadow-sm border-t-4 border-indigo-500">
                        <p class="text-gray-500 mb-4 font-medium">Yakin dengan jawabanmu? Nilaimu akan terekam secara permanen.</p>
                        <button type="submit" class="bg-gradient-to-r from-indigo-600 to-blue-600 text-white font-black text-lg px-12 py-4 rounded-2xl hover:from-indigo-700 hover:to-blue-700 shadow-lg hover:shadow-xl transition transform hover:-translate-y-1 flex items-center justify-center gap-3 mx-auto">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" /></svg>
                            Kumpulkan Ujian
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection