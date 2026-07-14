<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Soal Kuis - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8 bg-gray-100 min-h-screen">
    
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-md border-t-4 border-yellow-500">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Soal Kuis</h1>
        
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-50 text-red-700 rounded border-l-4 border-red-500">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/soal/{{ $soal->id }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Pilih Modul Induk</label>
                <select name="modul_id" class="w-full border p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500 bg-gray-50" required>
                    @foreach($data_modul as $modul)
                        <option value="{{ $modul->id }}" {{ $soal->modul_id == $modul->id ? 'selected' : '' }}>
                            {{ $modul->judul_modul }} (Kelas {{ $modul->tingkat_kelas }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Pertanyaan</label>
                <textarea name="pertanyaan" class="w-full border p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" rows="3" required>{{ $soal->pertanyaan }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6 bg-yellow-50 p-4 rounded-lg border border-yellow-100">
                <div>
                    <label class="block text-gray-700 font-bold mb-1 text-sm">Opsi A</label>
                    <input type="text" name="opsi_a" value="{{ $soal->opsi_a }}" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-bold mb-1 text-sm">Opsi B</label>
                    <input type="text" name="opsi_b" value="{{ $soal->opsi_b }}" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-bold mb-1 text-sm">Opsi C</label>
                    <input type="text" name="opsi_c" value="{{ $soal->opsi_c }}" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                </div>
                <div>
                    <label class="block text-gray-700 font-bold mb-1 text-sm">Opsi D</label>
                    <input type="text" name="opsi_d" value="{{ $soal->opsi_d }}" class="w-full border p-2 rounded focus:outline-none focus:ring-2 focus:ring-yellow-400" required>
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Kunci Jawaban Benar</label>
                <div class="flex gap-4">
                    <label class="flex items-center gap-2 cursor-pointer p-2 border rounded-lg hover:bg-gray-50">
                        <input type="radio" name="jawaban_benar" value="a" class="w-4 h-4 text-yellow-600" {{ $soal->jawaban_benar == 'a' ? 'checked' : '' }} required> A
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer p-2 border rounded-lg hover:bg-gray-50">
                        <input type="radio" name="jawaban_benar" value="b" class="w-4 h-4 text-yellow-600" {{ $soal->jawaban_benar == 'b' ? 'checked' : '' }}> B
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer p-2 border rounded-lg hover:bg-gray-50">
                        <input type="radio" name="jawaban_benar" value="c" class="w-4 h-4 text-yellow-600" {{ $soal->jawaban_benar == 'c' ? 'checked' : '' }}> C
                    </label>
                    <label class="flex items-center gap-2 cursor-pointer p-2 border rounded-lg hover:bg-gray-50">
                        <input type="radio" name="jawaban_benar" value="d" class="w-4 h-4 text-yellow-600" {{ $soal->jawaban_benar == 'd' ? 'checked' : '' }}> D
                    </label>
                </div>
            </div>

            <div class="mb-8">
                <label class="block text-gray-700 font-bold mb-2">Pembahasan (Opsional)</label>
                <textarea name="pembahasan" class="w-full border p-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" rows="2">{{ $soal->pembahasan }}</textarea>
            </div>

            <div class="flex justify-between items-center">
                <a href="/kelola-modul" class="text-gray-500 hover:text-gray-700 font-bold transition">Batal</a>
                <button type="submit" class="bg-yellow-500 text-white font-bold px-8 py-3 rounded-lg hover:bg-yellow-600 shadow-md transition">
                    Update Soal
                </button>
            </div>
        </form>
    </div>

</body>
</html>