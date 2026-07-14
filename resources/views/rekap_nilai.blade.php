<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Rekap Nilai Siswa - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8 bg-gray-100 min-h-screen">
    <div class="max-w-5xl mx-auto">
        
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-black text-gray-800">Laporan Nilai Siswa</h1>
            <a href="/kelola-modul" class="bg-gray-600 text-white px-5 py-2 rounded-lg font-bold hover:bg-gray-700 shadow transition">Kembali</a>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-purple-700 text-white text-sm uppercase tracking-wider">
                        <th class="p-4 font-semibold">Nama Siswa</th>
                        <th class="p-4 font-semibold">Modul Kuis</th>
                        <th class="p-4 font-semibold text-center">Skor Akhir</th>
                        <th class="p-4 font-semibold">Waktu Pengerjaan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($data_nilai as $hasil)
                        <tr class="hover:bg-purple-50 transition">
                            <td class="p-4 font-medium text-gray-800">{{ $hasil->user->name }}</td>
                            <td class="p-4 text-gray-600">{{ $hasil->modul->judul_modul }}</td>
                            <td class="p-4 text-center">
                                <span class="font-black text-lg {{ $hasil->skor >= 70 ? 'text-green-600' : 'text-red-600' }}">
                                    {{ $hasil->skor }}
                                </span>
                            </td>
                            <td class="p-4 text-sm text-gray-500">
                                {{ $hasil->updated_at->format('d M Y, H:i') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-8 text-center text-gray-500 font-medium bg-gray-50">
                                Belum ada siswa yang mengerjakan kuis.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</body>
</html>