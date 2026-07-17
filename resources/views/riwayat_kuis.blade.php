@extends('layouts.master')
@section('title', 'Riwayat Nilaiku')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-black text-gray-900 mb-8">Riwayat Ujian Akhir Modul</h1>

    @if($riwayat->isEmpty())
        <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 text-center">
            <p class="text-gray-500 font-medium">Kamu belum menyelesaikan ujian akhir modul apa pun.</p>
        </div>
    @else
        <div class="space-y-4">
            @foreach($riwayat as $item)
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-200 flex items-center justify-between hover:border-purple-300 transition-colors">
                    <div>
                        <p class="text-sm text-gray-500 mb-1 font-medium">{{ $item->created_at->format('d M Y - H:i') }}</p>
                        <h3 class="font-bold text-xl text-gray-900">{{ $item->modul->judul_modul }}</h3>
                    </div>
                    <div class="text-right">
                        <span class="text-4xl font-black {{ $item->skor_nilai >= 70 ? 'text-green-500' : 'text-red-500' }}">
                            {{ $item->skor_nilai }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection