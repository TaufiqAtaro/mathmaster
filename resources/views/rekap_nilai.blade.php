<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-gray-800 leading-tight flex items-center gap-2">
            <!-- Ikon Chart -->
            <svg class="w-7 h-7 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
            </svg>
            {{ __('Rekap Nilai Ujian Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-3xl border border-gray-100">
                <div class="p-6 bg-white border-b border-gray-100">
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 border-b border-gray-100">
                                    <th class="p-5 font-bold text-gray-500 text-xs uppercase">No</th>
                                    <th class="p-5 font-bold text-gray-500 text-xs uppercase">Informasi Siswa</th>
                                    <th class="p-5 font-bold text-gray-500 text-xs uppercase">Modul (Boss Fight)</th>
                                    <th class="p-5 font-bold text-gray-500 text-xs uppercase text-center">Skor Akhir</th>
                                    <th class="p-5 font-bold text-gray-500 text-xs uppercase text-center">Status</th>
                                    <th class="p-5 font-bold text-gray-500 text-xs uppercase text-right">Waktu Selesai</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($data_nilai as $nilai)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="p-5 font-bold text-gray-700">#{{ $loop->iteration }}</td>
                                        <td class="p-5">
                                            <p class="font-bold text-gray-900">{{ $nilai->user->name ?? 'Siswa Dihapus' }}</p>
                                            <p class="text-xs text-gray-500">{{ $nilai->user->email ?? '-' }}</p>
                                        </td>
                                        <td class="p-5 font-bold text-blue-600">
                                            {{ $nilai->modul->judul_modul ?? 'Modul Dihapus' }}
                                        </td>
                                        <td class="p-5 text-center">
                                            <span class="text-xl font-black {{ $nilai->skor_nilai >= 70 ? 'text-green-600' : 'text-red-600' }}">
                                                {{ $nilai->skor_nilai }}
                                            </span>
                                        </td>
                                        <td class="p-5 text-center">
                                            @if($nilai->skor_nilai >= 70)
                                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-bold border border-green-200">LULUS</span>
                                            @else
                                                <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-bold border border-red-200">MENGULANG</span>
                                            @endif
                                        </td>
                                        <td class="p-5 text-sm text-gray-500 text-right">
                                            {{ $nilai->created_at->format('d M Y, H:i') }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="py-16 text-center bg-white border border-dashed border-gray-300 rounded-2xl">
                                            <!-- SVG Empty State -->
                                            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" /></svg>
                                            <p class="font-bold text-gray-500">Belum ada data ujian siswa yang masuk.</p>
                                            <p class="text-sm text-gray-400 mt-1">Data akan otomatis muncul ketika siswa selesai mengerjakan Boss Fight.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>