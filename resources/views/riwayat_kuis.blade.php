@extends('layouts.master')
@section('title', 'Riwayat Nilaiku')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <div class="flex items-center gap-4 mb-8 border-b border-gray-100 pb-4">
        <svg class="w-8 h-8 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" /></svg>
        <h1 class="text-3xl font-black text-gray-900">Riwayat Nilai Belajarku</h1>
    </div>

    @if($riwayat->isEmpty())
        <div class="bg-gray-50 p-12 rounded-3xl border border-gray-200 text-center">
            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <p class="text-gray-500 font-medium">Kamu belum menyelesaikan Kuis atau Ujian Akhir apa pun.</p>
        </div>
    @else
        <div class="space-y-4">
            @foreach($riwayat as $item)
                @php
                    // Logika penentuan apakah ini data Kuis atau Ujian Akhir
                    $isKuis = !empty($item->materi_id);
                    $judul = $isKuis ? ($item->materi->judul_materi ?? 'Kuis Materi') : ($item->modul->judul_modul ?? 'Ujian Modul');
                    $tipeLabel = $isKuis ? 'Kuis' : 'Ujian Akhir';
                    
                    // Pewarnaan dinamis
                    $colorTheme = $isKuis ? 'purple' : 'indigo';
                @endphp

                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col md:flex-row md:items-center justify-between hover:border-{{ $colorTheme }}-300 hover:shadow-md transition-all gap-4 border-l-4 border-l-{{ $colorTheme }}-500">
                    <div class="flex items-center gap-4">
                        
                        <!-- Ikon Berubah Tergantung Tipe -->
                        <div class="w-12 h-12 bg-{{ $colorTheme }}-50 text-{{ $colorTheme }}-600 rounded-xl flex items-center justify-center shrink-0">
                            @if($isKuis)
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                            @else
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                            @endif
                        </div>
                        
                        <div>
                            <div class="flex items-center gap-2 mb-1">
                                <span class="bg-{{ $colorTheme }}-100 text-{{ $colorTheme }}-700 text-xs font-bold px-2 py-0.5 rounded">
                                    {{ $tipeLabel }}
                                </span>
                                <p class="text-sm text-gray-500 font-medium">{{ $item->created_at->format('d M Y - H:i') }}</p>
                            </div>
                            <h3 class="font-bold text-xl text-gray-900">{{ $judul }}</h3>
                        </div>
                    </div>
                    
                    <div class="md:text-right flex md:flex-col items-center md:items-end justify-between md:justify-start border-t md:border-t-0 border-gray-100 pt-4 md:pt-0">
                        <span class="text-sm font-bold text-gray-500 uppercase tracking-wider mb-1 md:block hidden">Skor Akhir</span>
                        <span class="text-4xl font-black {{ $item->skor_nilai >= 70 ? 'text-green-500' : 'text-red-500' }}">
                            {{ $item->skor_nilai }}
                        </span>
                        @if($item->skor_nilai >= 70)
                            <span class="md:hidden bg-green-100 text-green-700 text-xs font-bold px-2 py-1 rounded">LULUS</span>
                        @else
                            <span class="md:hidden bg-red-100 text-red-700 text-xs font-bold px-2 py-1 rounded">MENGULANG</span>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection