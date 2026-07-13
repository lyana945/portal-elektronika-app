<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Alat Praktikum</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 font-sans">
    <nav class="bg-gray-800 text-white p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <span class="font-bold text-lg tracking-wide">⚡ Portal Lab Elektronika</span>
            <a href="/" class="bg-gray-600 hover:bg-gray-700 text-xs font-semibold px-3 py-1 rounded transition">← Kembali</a>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8 max-w-lg">
        <div class="bg-white p-6 rounded-lg shadow border border-gray-200">
            <h2 class="text-xl font-bold text-gray-800 mb-2">Pendaftaran Alat Baru</h2>
            <p class="text-xs text-gray-500 mb-6">Silakan isi data inventaris dengan lengkap.</p>

            <form action="/alat/simpan" method="POST">
                @csrf
                <!-- 1. Pilihan Kategori -->
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Kategori Alat</label>
                    <select name="kategori_id" required class="w-full border border-gray-300 p-2 rounded bg-white text-sm focus:outline-none focus:border-blue-500">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategoris as $kat)
                            <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- 2. Nama Alat -->
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Alat Praktikum</label>
                    <input type="text" name="nama_alat" required class="w-full border border-gray-300 p-2 rounded text-sm focus:outline-none focus:border-blue-500" placeholder="Contoh: Oscilloscope Digital">
                </div>

                <!-- 3. Stok -->
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Jumlah Stok Awal</label>
                    <input type="number" name="stok" min="1" required class="w-full border border-gray-300 p-2 rounded text-sm focus:outline-none focus:border-blue-500" placeholder="Contoh: 10">
                </div>

                <!-- Tombol Submit -->
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded text-sm transition shadow">Simpan ke Database</button>
            </form>
        </div>
    </div>
</body>
</html>