<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Instrumen Praktikum</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Orbitron:wght@700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        .tech-heading { font-family: 'Orbitron', sans-serif; }
        .cyber-bg-fixed {
            background-color: #060913;
            background-image: 
                radial-gradient(circle at 80% 20%, rgba(37, 99, 235, 0.25), transparent 50%),
                linear-gradient(rgba(30, 41, 59, 0.3) 2px, transparent 2px),
                linear-gradient(90deg, rgba(30, 41, 59, 0.3) 2px, transparent 2px);
            background-size: 100% 100%, 30px 30px, 30px 30px;
        }
        .neon-border-blue { box-shadow: 0 0 20px rgba(37, 99, 235, 0.4); border: 2px solid #2563eb; }
    </style>
</head>
<body class="cyber-bg-fixed min-h-screen text-slate-100 antialiased flex flex-col justify-between">

    <nav class="bg-slate-950/95 border-b-2 border-blue-600 p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center max-w-lg">
            <span class="tech-heading font-black text-sm tracking-widest text-white">⚡ SYSTEM RECONFIGURATION</span>
            <a href="/" class="bg-slate-800 hover:bg-slate-700 text-white text-xs font-bold px-3 py-1.5 rounded-lg border border-slate-700 transition">← CANCEL</a>
        </div>
    </nav>

    <div class="container mx-auto px-4 py-8 max-w-lg">
        <div class="bg-slate-950 p-6 rounded-3xl neon-border-blue">
            <span class="bg-amber-500/10 text-amber-400 text-[10px] font-extrabold px-2 py-0.5 rounded border border-amber-500/30 uppercase tracking-widest inline-block mb-3">
                <i class="fa-solid fa-pen-to-square mr-1"></i> Data Overwrite Mode
            </span>
            <h2 class="tech-heading text-lg font-black text-white mb-1">RE-CONFIG INSTRUMEN</h2>
            <p class="text-xs text-slate-500 mb-6 font-mono">ID Target: DATA_CORE_00{{ $alat->id }}</p>

            <form action="/alat/update/{{ $alat->id }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-xs font-mono font-bold text-cyan-400 uppercase mb-1.5">// Kategori Sistem</label>
                    <select name="kategori_id" required class="w-full bg-slate-900 border border-slate-800 p-2.5 rounded-xl text-sm font-semibold text-white focus:outline-none focus:border-blue-500">
                        @foreach($kategoris as $kat)
                            <option value="{{ $kat->id }}" {{ $alat->kategori_id == $kat->id ? 'selected' : '' }}>{{ $kat->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block text-xs font-mono font-bold text-cyan-400 uppercase mb-1.5">// Label Instrumen</label>
                    <input type="text" name="nama_alat" value="{{ $alat->nama_alat }}" required class="w-full bg-slate-900 border border-slate-800 p-2.5 rounded-xl text-sm font-semibold text-white focus:outline-none focus:border-blue-500">
                </div>

                <div class="mb-6">
                    <label class="block text-xs font-mono font-bold text-cyan-400 uppercase mb-1.5">// Alokasi Stok Baru</label>
                    <input type="number" name="stok" value="{{ $alat->stok }}" min="0" required class="w-full bg-slate-900 border border-slate-800 p-2.5 rounded-xl text-sm font-mono font-bold text-white focus:outline-none focus:border-blue-500">
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-3 rounded-xl text-xs uppercase tracking-wider shadow-[0_0_15px_rgba(37,99,235,0.4)] border border-blue-400 transition cursor-pointer">
                    APPLY CHANGES // OVERWRITE
                </button>
            </form>
        </div>
    </div>

    <footer class="text-center py-4 text-[10px] text-slate-700 font-mono">
        SECURE MODIFICATION INTERFACE
    </footer>

</body>
</html>