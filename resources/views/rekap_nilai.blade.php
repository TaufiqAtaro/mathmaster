<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-2xl text-gray-800 leading-tight">
            {{ __('📊 Rekap Nilai Ujian Siswa') }}
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
                                            <div class="text-4xl mb-3">📭</div>
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