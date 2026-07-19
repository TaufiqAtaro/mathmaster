<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div class="flex items-center gap-4">
                <a href="/kelola-modul/{{ $materi->modul_id }}/materi" class="bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 px-4 py-2 rounded-xl font-bold text-sm shadow-sm transition flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                    Kembali
                </a>
                <h2 class="font-black text-2xl text-gray-800 leading-tight">
                    Soal Kuis: <span class="text-blue-600">{{ $materi->judul_materi }}</span>
                </h2>
            </div>
            
            <a href="/soal/tambah?materi_id={{ $materi->id }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2.5 px-5 rounded-xl shadow-lg transition text-sm flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                Tambah Soal Baru
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 space-y-4">
            
            @forelse($soals as $soal)
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col gap-4">
                    
                    <div class="flex justify-between items-start gap-4">
                        <div class="flex gap-4">
                            <span class="font-black text-gray-400 text-xl">Q{{ $loop->iteration }}</span>
                            <p class="font-bold text-gray-900 text-lg">{{ $soal->pertanyaan }}</p>
                        </div>
                        
                        <!-- Aksi Edit & Hapus Soal -->
                        <div class="flex items-center gap-2">
                            <a href="/soal/{{ $soal->id }}/edit" class="text-gray-400 hover:text-yellow-600 hover:bg-yellow-50 p-2 rounded-lg transition" title="Edit Soal">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                            </a>
                            <form action="/soal/{{ $soal->id }}" method="POST" onsubmit="return confirm('Hapus soal ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-gray-400 hover:text-red-500 hover:bg-red-50 p-2 rounded-lg transition" title="Hapus Soal">
                                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Tampilan Opsi Jawaban -->
                    <div class="ml-10 grid grid-cols-1 md:grid-cols-2 gap-2 text-sm">
                        <div class="p-3 rounded-lg flex items-center justify-between {{ $soal->jawaban_benar == 'A' ? 'bg-green-100 text-green-800 font-bold border border-green-200' : 'bg-gray-50 text-gray-600 border border-transparent' }}">
                            <span>A. {{ $soal->opsi_a }}</span>
                            @if($soal->jawaban_benar == 'A') <svg class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" /></svg> @endif
                        </div>
                        <div class="p-3 rounded-lg flex items-center justify-between {{ $soal->jawaban_benar == 'B' ? 'bg-green-100 text-green-800 font-bold border border-green-200' : 'bg-gray-50 text-gray-600 border border-transparent' }}">
                            <span>B. {{ $soal->opsi_b }}</span>
                            @if($soal->jawaban_benar == 'B') <svg class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" /></svg> @endif
                        </div>
                        <div class="p-3 rounded-lg flex items-center justify-between {{ $soal->jawaban_benar == 'C' ? 'bg-green-100 text-green-800 font-bold border border-green-200' : 'bg-gray-50 text-gray-600 border border-transparent' }}">
                            <span>C. {{ $soal->opsi_c }}</span>
                            @if($soal->jawaban_benar == 'C') <svg class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" /></svg> @endif
                        </div>
                        <div class="p-3 rounded-lg flex items-center justify-between {{ $soal->jawaban_benar == 'D' ? 'bg-green-100 text-green-800 font-bold border border-green-200' : 'bg-gray-50 text-gray-600 border border-transparent' }}">
                            <span>D. {{ $soal->opsi_d }}</span>
                            @if($soal->jawaban_benar == 'D') <svg class="w-5 h-5 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" /></svg> @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="py-16 text-center bg-white rounded-3xl border border-dashed border-gray-300">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <p class="font-bold text-gray-500">Belum ada soal untuk materi ini.</p>
                </div>
            @endforelse

        </div>
    </div>
</x-app-layout>