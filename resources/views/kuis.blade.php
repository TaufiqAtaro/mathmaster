@extends('layouts.master')

@section('title', 'Kuis - ' . $materi->judul_materi)

@section('back_url', '/belajar/' . $materi->modul_id)
@section('back_text', 'Kembali ke Ruang Belajar')

@section('content')
    <!-- Inject MathJax -->
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

    <div class="p-4 md:p-8">
        <div class="max-w-4xl mx-auto">
            <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-200">
                <h1 class="text-3xl font-black text-gray-900 flex items-center gap-3">
                    <svg class="w-8 h-8 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                    Kuis: {{ $materi->judul_materi }}
                </h1>
            </div>

            @if($materi->soals->count() == 0)
                <div class="bg-yellow-50 p-6 rounded-2xl border border-yellow-200 text-center flex flex-col items-center gap-2">
                    <svg class="w-10 h-10 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                    <p class="text-yellow-700 font-bold">Admin belum memasukkan soal kuis untuk materi ini.</p>
                </div>
            @else
                <form action="/materi/{{ $materi->id }}/kuis" method="POST">
                    @csrf
                    
                    <div class="space-y-6">
                        @foreach($materi->soals as $index => $soal)
                            <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-200">
                                <p class="font-bold text-lg mb-6 leading-relaxed"><span class="text-purple-600 mr-2 text-xl">{{ $index + 1 }}.</span> {{ $soal->pertanyaan }}</p>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <label class="relative flex items-start gap-4 p-4 border-2 border-gray-100 rounded-2xl cursor-pointer hover:border-purple-200 has-[:checked]:border-purple-600 has-[:checked]:bg-purple-50 transition-all">
                                        <input type="radio" name="jawaban[{{ $soal->id }}]" value="a" class="peer sr-only" required>
                                        <div class="w-6 h-6 rounded-full border-2 border-gray-300 bg-white peer-checked:border-[7px] peer-checked:border-purple-600 shrink-0 mt-0.5 transition-all duration-200"></div>
                                        <span class="text-gray-700 peer-checked:text-purple-900 peer-checked:font-bold leading-relaxed">A. {{ $soal->opsi_a }}</span>
                                    </label>
                                    
                                    <label class="relative flex items-start gap-4 p-4 border-2 border-gray-100 rounded-2xl cursor-pointer hover:border-purple-200 has-[:checked]:border-purple-600 has-[:checked]:bg-purple-50 transition-all">
                                        <input type="radio" name="jawaban[{{ $soal->id }}]" value="b" class="peer sr-only">
                                        <div class="w-6 h-6 rounded-full border-2 border-gray-300 bg-white peer-checked:border-[7px] peer-checked:border-purple-600 shrink-0 mt-0.5 transition-all duration-200"></div>
                                        <span class="text-gray-700 peer-checked:text-purple-900 peer-checked:font-bold leading-relaxed">B. {{ $soal->opsi_b }}</span>
                                    </label>

                                    <label class="relative flex items-start gap-4 p-4 border-2 border-gray-100 rounded-2xl cursor-pointer hover:border-purple-200 has-[:checked]:border-purple-600 has-[:checked]:bg-purple-50 transition-all">
                                        <input type="radio" name="jawaban[{{ $soal->id }}]" value="c" class="peer sr-only">
                                        <div class="w-6 h-6 rounded-full border-2 border-gray-300 bg-white peer-checked:border-[7px] peer-checked:border-purple-600 shrink-0 mt-0.5 transition-all duration-200"></div>
                                        <span class="text-gray-700 peer-checked:text-purple-900 peer-checked:font-bold leading-relaxed">C. {{ $soal->opsi_c }}</span>
                                    </label>

                                    <label class="relative flex items-start gap-4 p-4 border-2 border-gray-100 rounded-2xl cursor-pointer hover:border-purple-200 has-[:checked]:border-purple-600 has-[:checked]:bg-purple-50 transition-all">
                                        <input type="radio" name="jawaban[{{ $soal->id }}]" value="d" class="peer sr-only">
                                        <div class="w-6 h-6 rounded-full border-2 border-gray-300 bg-white peer-checked:border-[7px] peer-checked:border-purple-600 shrink-0 mt-0.5 transition-all duration-200"></div>
                                        <span class="text-gray-700 peer-checked:text-purple-900 peer-checked:font-bold leading-relaxed">D. {{ $soal->opsi_d }}</span>
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-8 text-center bg-white p-8 rounded-3xl shadow-sm border border-gray-200 border-t-4 border-t-purple-500">
                        <p class="text-gray-500 mb-4">Pastikan semua soal sudah terisi sebelum mengumpulkan.</p>
                        <button type="submit" class="bg-purple-600 text-white font-black text-lg px-12 py-4 rounded-2xl hover:bg-purple-700 shadow-lg hover:shadow-xl transition transform hover:-translate-y-1 flex justify-center items-center gap-2 mx-auto">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            Kumpulkan & Lihat Nilai
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection