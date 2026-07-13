<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Soal Kuis - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8 bg-gray-100 min-h-screen">
    
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-md border-t-4 border-blue-500">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Tambah Soal Kuis Pilihan Ganda</h1>
        
        <!-- Alarm Error Validasi -->
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-50 text-red-700 rounded border-l-4 border-red-500">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/soal" method="POST">
            @csrf
            
            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Pilih Modul Induk (Untuk Kuis Ini)</label>
                <select name="modul_id" class="w-full border p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-50" required>
                    <option value="">-- Pilih Modul --</option>
                    @foreach($data_modul as $modul)
                        <option value="{{ $modul->id }}">{{ $modul->judul_modul }} (Kelas {{ $modul->tingkat_kelas }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Pertanyaan</label>
                <textarea name="pertanyaan" class="w-full border p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="3" placeholder="Ketik soal di sini..." required></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6 bg-blue-50 p-4 rounded-lg border border-blue-100">
                <div>
                    <label class="block text-gray-700 font-bold mb-1 text-sm">Opsi A</label>
                    <input type="text" name="opsi_a" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-bold mb-1 text-sm">Opsi B</label>
                    <input type="text" name="opsi_b" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-bold mb-1 text-sm">Opsi C</label>
                    <input type="text" name="opsi_c" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-bold mb-1 text-sm">Opsi D</label>
                    <input type="text" name="opsi_d" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Kunci Jawaban Benar</label>
                <div class="flex gap-4">
                    <label class="flex items-center gap-2 cursor-pointer p-2 border rounded-lg hover:bg-gray-50">
                        <input type="radio" name="jawaban_benar" value="a" class="w-4 h-4 text-blue-600" required> A
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer p-2 border rounded-lg hover:bg-gray-50">
                        <input type="radio" name="jawaban_benar" value="b" class="w-4 h-4 text-blue-600"> B
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer p-2 border rounded-lg hover:bg-gray-50">
                        <input type="radio" name="jawaban_benar" value="c" class="w-4 h-4 text-blue-600"> C
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer p-2 border rounded-lg hover:bg-gray-50">
                        <input type="radio" name="jawaban_benar" value="d" class="w-4 h-4 text-blue-600"> D
                    </label>
                </div>
            </div>

            <div class="mb-8">
                <label class="block text-gray-700 font-bold mb-2">Pembahasan (Opsional)</label>
                <textarea name="pembahasan" class="w-full border p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="2" placeholder="Penjelasan kenapa jawaban tersebut benar..."></textarea>
            </div>

            <div class="flex justify-between items-center">
                <a href="/kelola-modul" class="text-gray-500 hover:text-gray-700 font-bold transition">Batal</a>
                <button type="submit" class="bg-blue-600 text-white font-bold px-8 py-3 rounded-lg hover:bg-blue-700 shadow-md transition">
                    Simpan Soal
                </button>
            </div>
        </form>
    </div>

</body>
</html>