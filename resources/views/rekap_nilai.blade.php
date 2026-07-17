@extends('layouts.master')
@section('title', 'Rekap Nilai Siswa')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-8">
    <h1 class="text-3xl font-black text-gray-900 mb-8">Rekap Nilai Ujian Siswa</h1>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-gray-50 border-b border-gray-200">
                    <th class="p-4 font-bold text-gray-700">Tanggal</th>
                    <th class="p-4 font-bold text-gray-700">Nama Siswa</th>
                    <th class="p-4 font-bold text-gray-700">Modul Ujian</th>
                    <th class="p-4 font-bold text-gray-700 text-center">Skor Akhir</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data_nilai as $nilai)
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                        <td class="p-4 text-gray-600 font-medium">{{ $nilai->created_at->format('d/m/Y') }}</td>
                        <td class="p-4 font-bold text-purple-700">{{ $nilai->user->name }}</td>
                        <td class="p-4 text-gray-800 font-medium">{{ $nilai->modul->judul_modul }}</td>
                        <td class="p-4 text-center">
                            <span class="font-black text-lg {{ $nilai->skor_nilai >= 70 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $nilai->skor_nilai }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-8 text-center text-gray-500 font-medium">Belum ada data ujian siswa yang masuk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection