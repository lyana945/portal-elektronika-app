<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Lab Elektronika - Cyberpunk Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <!-- Google Fonts: Orbitron & Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Orbitron:wght@700;900&display=swap" rel="stylesheet">
    <!-- Font Awesome untuk Ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        .tech-heading { font-family: 'Orbitron', sans-serif; }
        
        /* BACKGROUND: Efek Papan Sirkuit Digital */
        .cyber-bg-fixed {
            background-color: #060913;
            background-image: 
                radial-gradient(circle at 80% 20%, rgba(37, 99, 235, 0.25), transparent 50%),
                radial-gradient(circle at 20% 80%, rgba(6, 182, 212, 0.15), transparent 50%),
                linear-gradient(rgba(30, 41, 59, 0.3) 2px, transparent 2px),
                linear-gradient(90deg, rgba(30, 41, 59, 0.3) 2px, transparent 2px);
            background-size: 100% 100%, 100% 100%, 30px 30px, 30px 30px;
        }
        .neon-border-blue { box-shadow: 0 0 20px rgba(37, 99, 235, 0.4); border: 2px solid #2563eb; }
        .neon-border-cyan { box-shadow: 0 0 20px rgba(6, 182, 212, 0.3); border: 2px solid #06b6d4; }
        .neon-border-amber { box-shadow: 0 0 20px rgba(245, 158, 11, 0.3); border: 2px solid #f59e0b; }
        .neon-glow-green { box-shadow: 0 0 12px rgba(16, 185, 129, 0.5); }
        .wave-bg { position: fixed; top: 40%; left: 0; width: 100%; height: 200px; background: repeating-linear-gradient(45deg, transparent, transparent 10px, rgba(37, 99, 235, 0.03) 10px, rgba(37, 99, 235, 0.03) 20px); z-index: -1; transform: skewY(-4deg); }
        
        /* ANIMASI KILATAN LISTRIK (SHIMMER EFFECTS) */
        @keyframes electricPulse {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
        .animate-electric {
            animation: electricPulse 2s linear infinite;
        }

        /* PERBAIKAN LOGIKA PRINT CSS */
        @media print {
            body {
                background: #ffffff !important;
                color: #000000 !important;
            }
            /* Sembunyikan semua komponen dashboard secara bersih */
            .no-print, nav, main > div:first-child, main > .bg-emerald-950\/90, main > div:nth-of-type(2), footer {
                display: none !important;
            }
            /* Sesuaikan grid peminjaman agar hanya menampilkan struk */
            .print-container-fix {
                display: block !important;
            }
            .print-form-hide {
                display: none !important;
            }
            #receipt-print-area {
                background: #ffffff !important;
                color: #000000 !important;
                border: 2px dashed #000000 !important;
                box-shadow: none !important;
                width: 100% !important;
                max-width: 100% !important;
                padding: 20px !important;
            }
            #receipt-print-area * {
                color: #000000 !important;
            }
            #receipt-print-area h3, #receipt-print-area span.text-white {
                color: #000000 !important;
                font-weight: bold !important;
            }
            #receipt-print-area .bg-slate-950 {
                background: #f3f4f6 !important;
                border: 1px solid #e5e7eb !important;
            }
        }
    </style>
</head>
<body class="cyber-bg-fixed min-h-screen text-slate-100 antialiased relative">
    <div class="wave-bg"></div>

    <!-- NAVIGASI PREMIUM -->
    <nav class="sticky top-0 z-50 bg-slate-950/95 border-b-2 border-blue-600 backdrop-blur-md shadow-[0_4px_30px_rgba(0,0,0,0.7)]">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="bg-blue-600 p-2.5 rounded-xl text-white shadow-[0_0_15px_#2563eb] animate-pulse">
                    <i class="fa-solid fa-microchip text-xl"></i>
                </div>
                <div>
                    <span class="tech-heading font-black text-xl tracking-wider block text-white">PORTAL ELEKTRONIKA</span>
                    <span class="text-[9px] tracking-widest text-cyan-400 font-bold uppercase block -mt-0.5"><i class="fa-solid fa-network-wired mr-1"></i>LAB SYSTEM CORE v1.0</span>
                </div>
            </div>
            
            <div class="flex items-center space-x-4">
                <div class="flex items-center bg-slate-900 border border-slate-700 px-4 py-2 rounded-xl">
                    <div class="w-2 h-2 rounded-full bg-cyan-400 animate-ping mr-3 shadow-[0_0_8px_#22d3ee]"></div>
                    <span class="text-xs font-mono text-slate-300">
                        USER: <span class="text-white font-bold">{{ Auth::user()->name }}</span> 
                        <span class="text-slate-600 mx-2">|</span> 
                        <span class="text-amber-400 font-bold uppercase tracking-wider text-[11px] bg-amber-500/10 px-2 py-0.5 rounded border border-amber-500/30">{{ Auth::user()->role }}</span>
                    </span>
                </div>
                
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="relative group bg-slate-950/80 hover:bg-rose-950/20 text-rose-500 hover:text-rose-400 border-2 border-rose-600/60 hover:border-rose-500 text-[10px] font-mono font-black px-4 py-2 rounded-xl transition-all duration-300 shadow-[0_0_10px_rgba(225,29,72,0.15)] hover:shadow-[0_0_20px_rgba(225,29,72,0.5)] flex items-center space-x-2.5 tracking-widest cursor-pointer overflow-hidden">
                        <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-rose-500/20 to-transparent -translate-x-full animate-electric"></span>
                        <div class="relative flex items-center justify-center">
                            <span class="absolute w-2 h-2 rounded-full bg-rose-500 animate-ping opacity-75"></span>
                            <i class="fa-solid fa-power-off text-xs text-rose-500 shadow-sm"></i>
                        </div>
                        <div class="text-left font-mono">
                            <span class="block text-[8px] text-rose-600/80 font-bold tracking-tight leading-none group-hover:text-rose-500">SYS_DISCONNECT</span>
                            <span class="block text-[11px] uppercase tracking-wider font-black -mt-0.5">[ DISENGAGE ]</span>
                        </div>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <!-- KONTEN UTAMA -->
    <main class="container mx-auto px-6 py-10 max-w-6xl relative z-10">
        
        <!-- BANNER HERO GLOWING -->
        <div class="bg-slate-950 rounded-3xl p-8 mb-10 text-white relative overflow-hidden neon-border-blue">
            <div class="absolute right-5 bottom-5 opacity-10 text-[120px] pointer-events-none text-blue-500">
                <i class="fa-solid fa-wave-square"></i>
            </div>
            
            <div class="flex flex-col md:flex-row md:justify-between md:items-center relative z-10 gap-6">
                <div>
                    <span class="bg-cyan-500/10 text-cyan-400 text-xs font-extrabold px-3 py-1 rounded-md uppercase tracking-widest inline-block mb-3 border border-cyan-500/30">
                        <i class="fa-solid fa-satellite-dish mr-1"></i> MONITORING TERMINAL ACTIVE
                    </span>
                    <h1 class="tech-heading text-xl md:text-3xl font-black tracking-wide text-white">INVENTARIS MEDIA PEMBELAJARAN</h1>
                    <p class="text-slate-400 text-xs md:text-sm mt-1.5 font-normal max-w-xl">Mengelola komponen sirkuit, mikrokontroler, dan instrumen laboratorium elektronika.</p>
                </div>
                
                <div class="flex items-center shrink-0">
                    @if(Auth::user()->role === 'pemilik')
                        <a href="/alat/tambah" class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-3.5 px-6 rounded-2xl text-xs uppercase tracking-wider shadow-[0_0_15px_rgba(37,99,235,0.5)] transition-all duration-300 border border-blue-400 flex items-center space-x-2 hover:scale-105">
                            <i class="fa-solid fa-circle-plus text-sm"></i>
                            <span>Tambah Instrumen</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-emerald-950/90 border-2 border-emerald-500 text-emerald-400 p-4 rounded-2xl mb-8 text-sm flex items-center space-x-3 shadow-[0_0_20px_rgba(16,185,129,0.3)]">
                <div class="bg-emerald-500 text-slate-950 p-1.5 rounded-lg text-xs font-bold">
                    <i class="fa-solid fa-bolt"></i>
                </div>
                <span class="font-bold tracking-wide">{{ session('success') }}</span>
            </div>
        @endif

        <!-- TABEL INVENTARIS UTAMA -->
        <div class="bg-slate-950 rounded-3xl overflow-hidden border-2 border-slate-800 shadow-[0_15px_40px_rgba(0,0,0,0.8)] mb-10">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-900 border-b-2 border-slate-800 text-cyan-400 text-xs tracking-widest uppercase font-bold font-mono">
                            <th class="py-5 px-6"><i class="fa-solid fa-microchip mr-2 text-slate-500"></i>Nama Alat</th>
                            <th class="py-5 px-6"><i class="fa-solid fa-layer-group mr-2 text-slate-500"></i>Kategori</th>
                            <th class="py-5 px-6"><i class="fa-solid fa-warehouse mr-2 text-slate-500"></i>Stok Gudang</th>
                            <th class="py-5 px-6"><i class="fa-solid fa-signal mr-2 text-slate-500"></i>Status Operasional</th>
                            @if(Auth::user()->role === 'pemilik')
                                <th class="py-5 px-6 text-center"><i class="fa-solid fa-sliders mr-2 text-slate-500"></i>Aksi Core</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-slate-900/60 font-medium">
                        @forelse($alats as $alat)
                            <tr class="hover:bg-slate-900/60 border-b border-slate-900/80 transition-all duration-150">
                                <td class="py-4.5 px-6">
                                    <div class="flex items-center space-x-3">
                                        <div class="bg-slate-900 p-2 rounded-xl text-cyan-400 border border-slate-800/80">
                                            <i class="fa-solid fa-compass-drafting text-xs"></i>
                                        </div>
                                        <span class="font-bold text-white tracking-wide block text-base">{{ $alat->nama_alat }}</span>
                                    </div>
                                </td>
                                <td class="py-4.5 px-6">
                                    <span class="bg-blue-500/10 text-blue-400 border border-blue-500/30 px-3 py-1 rounded-md text-xs font-mono font-bold">
                                        // {{ $alat->kategori->nama_kategori ?? 'Umum' }}
                                    </span>
                                </td>
                                <td class="py-4.5 px-6 text-slate-300 font-mono text-base">
                                    <span class="text-white font-black">{{ $alat->stok }}</span> <span class="text-xs text-slate-500">UNITS</span>
                                </td>
                                <td class="py-4.5 px-6">
                                    @if($alat->stok > 0)
                                        <span class="inline-flex items-center px-3 py-1 rounded-md text-xs font-bold bg-emerald-500/10 text-emerald-400 border border-emerald-500/30 neon-glow-green">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 mr-2 animate-pulse"></span>
                                            READY
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 rounded-md text-xs font-bold bg-rose-500/10 text-rose-400 border border-rose-500/30">
                                            <span class="w-1.5 h-1.5 rounded-full bg-rose-500 mr-2"></span>
                                            EMPTY
                                        </span>
                                    @endif
                                </td>
                                @if(Auth::user()->role === 'pemilik')
                                    <td class="py-4.5 px-6 text-center">
                                        <div class="flex items-center justify-center space-x-3">
                                            <a href="/alat/edit/{{ $alat->id }}" class="group relative bg-slate-950/90 hover:bg-amber-950/30 text-amber-500 hover:text-amber-400 border border-amber-500/40 hover:border-amber-400 px-3 py-1.5 rounded-md font-mono text-[10px] font-bold tracking-wider transition-all duration-200 shadow-[0_0_8px_rgba(245,158,11,0.1)] hover:shadow-[0_0_15px_rgba(245,158,11,0.4)] flex items-center space-x-1.5 cursor-pointer">
                                                <i class="fa-solid fa-sliders text-[11px] group-hover:rotate-90 transition-transform duration-300"></i>
                                                <span class="uppercase font-black text-[9px]">RE_CFG</span>
                                            </a>
                                            <form action="/alat/hapus/{{ $alat->id }}" method="POST" onsubmit="return confirm('[PERINGATAN]: Lanjutkan proses pembersihan data core?')" class="inline">
                                                @csrf
                                                <button type="submit" class="group relative bg-slate-950/90 hover:bg-rose-950/40 text-rose-500 hover:text-rose-400 border border-rose-500/40 hover:border-rose-400 px-3 py-1.5 rounded-md font-mono text-[10px] font-bold tracking-wider transition-all duration-200 shadow-[0_0_8px_rgba(244,63,94,0.1)] hover:shadow-[0_0_15px_rgba(244,63,94,0.4)] flex items-center space-x-1.5 cursor-pointer">
                                                    <i class="fa-solid fa-radiation text-[11px] group-hover:animate-spin"></i>
                                                    <span class="uppercase font-black text-[9px]">PURGE</span>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-16 text-center text-slate-500 font-light font-mono">
                                    <div class="text-4xl mb-3 text-slate-700"><i class="fa-solid fa-triangle-exclamation"></i></div>
                                    [SYSTEM EMPTY]: Tidak ada data instrumen terdaftar.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- FITUR PROSES PEMINJAMAN BARANG & STRUK -->
        @if(Auth::user()->role === 'peminjam')
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 print-container-fix">
                
                <!-- KIRI: FORM PENGISIAN DATA PEMINJAMAN -->
                <div class="md:col-span-1 bg-slate-950 p-6 rounded-3xl neon-border-cyan flex flex-col justify-between print-form-hide">
                    <div>
                        <span class="bg-cyan-500/10 text-cyan-400 text-[10px] font-extrabold px-2 py-0.5 rounded border border-cyan-500/30 uppercase tracking-widest inline-block mb-3">
                            <i class="fa-solid fa-file-invoice mr-1"></i> Transaction Core
                        </span>
                        <h2 class="tech-heading text-lg font-black text-white mb-4">LOG PEMINJAMAN</h2>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-[10px] font-mono font-bold text-cyan-400 uppercase tracking-wider mb-1">// Nama Peminjam</label>
                                <input type="text" id="borrower_name" value="{{ Auth::user()->name }}" class="w-full bg-slate-900 border border-slate-800 p-2.5 rounded-xl text-sm font-semibold text-white focus:outline-none focus:border-cyan-500">
                            </div>
                            <div>
                                <label class="block text-[10px] font-mono font-bold text-cyan-400 uppercase tracking-wider mb-1">// Pilih Instrumen</label>
                                <select id="borrow_item" class="w-full bg-slate-900 border border-slate-800 p-2.5 rounded-xl text-sm font-semibold text-white focus:outline-none focus:border-cyan-500">
                                    <option value="" data-stok="0">-- Pilih Alat Lab --</option>
                                    @foreach($alats as $alat)
                                        @if($alat->stok > 0)
                                            <option value="{{ $alat->nama_alat }}" data-stok="{{ $alat->stok }}">{{ $alat->nama_alat }} (Sisa: {{ $alat->stok }})</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="block text-[10px] font-mono font-bold text-cyan-400 uppercase tracking-wider mb-1">// Kuantitas Pinjam</label>
                                <input type="number" id="borrow_qty" min="1" value="1" class="w-full bg-slate-900 border border-slate-800 p-2.5 rounded-xl text-sm font-mono text-white focus:outline-none focus:border-cyan-500">
                            </div>
                        </div>
                    </div>

                    <button type="button" onclick="generateReceipt()" class="w-full mt-6 bg-cyan-600 hover:bg-cyan-500 text-slate-950 font-black py-3 rounded-xl text-xs uppercase tracking-wider shadow-[0_0_15px_rgba(6,182,212,0.4)] border border-cyan-400 transition cursor-pointer">
                        GENERATE RECEIPT // PROSES
                    </button>
                </div>

                <!-- KANAN: PREVIEW STRUK DIGITAL YANG BISA DICETAK -->
                <div class="md:col-span-2 bg-slate-950 p-6 rounded-3xl neon-border-amber flex flex-col justify-between">
                    <div>
                        <span class="bg-amber-500/10 text-amber-400 text-[10px] font-extrabold px-2 py-0.5 rounded border border-amber-500/30 uppercase tracking-widest inline-block mb-3 print-form-hide">
                            <i class="fa-solid fa-print mr-1"></i> Output Terminal
                        </span>
                        <h2 class="tech-heading text-lg font-black text-white mb-4 print-form-hide">STRUK PEMINJAMAN BARANG</h2>
                        
                        <!-- WADAH STRUK ELEKTRONIKA -->
                        <div id="receipt-print-area" class="bg-slate-900 border border-dashed border-amber-500/50 rounded-2xl p-6 font-mono text-xs text-amber-400 shadow-inner relative overflow-hidden">
                            <div class="text-center border-b border-dashed border-amber-500/30 pb-4 mb-4">
                                <h3 class="font-bold text-sm text-white tracking-widest uppercase mb-1">⚡ LAB ELEKTRONIKA RECEIPT ⚡</h3>
                                <p class="text-[9px] text-slate-500">BATAM UNIVERSITY - TECHNOLOGY ENGINEERING</p>
                                <p class="text-[9px] text-slate-500">DATE: <span id="receipt-date">--/--/----</span></p>
                            </div>

                            <div class="space-y-2">
                                <p class="flex justify-between"><span>TRANSACTION ID:</span> <span class="text-white font-bold" id="receipt-id">TX-LAB-0000</span></p>
                                <p class="flex justify-between"><span>OPERATOR CORE:</span> <span class="text-white font-bold" id="receipt-user">{{ Auth::user()->name }}</span></p>
                                <div class="border-b border-slate-800 my-2"></div>
                                <p class="flex justify-between text-sm py-1 bg-slate-950 px-2 rounded">
                                    <span id="receipt-item-name">INSTRUMEN: -</span>
                                    <span class="text-white font-bold" id="receipt-item-qty">QTY: 0 UNITS</span>
                                </p>
                                <div class="border-b border-slate-800 my-2"></div>
                                <p class="text-[10px] text-slate-500 leading-relaxed italic text-center mt-4">
                                    *Harap bawa struk ini ke laboran untuk verifikasi pengambilan alat lab fisik. Jaga kondisi alat jangan sampai rusak!
                                </p>
                            </div>
                        </div>
                    </div>

                    <button type="button" onclick="window.print()" class="w-full mt-6 bg-amber-500 hover:bg-amber-400 text-slate-950 font-black py-3 rounded-xl text-xs uppercase tracking-wider shadow-[0_0_15px_rgba(245,158,11,0.4)] border border-amber-400 transition cursor-pointer flex items-center justify-center space-x-2 print-form-hide">
                        <i class="fa-solid fa-print text-sm"></i>
                        <span>PRINT / SIMPAN STRUK PDF</span>
                    </button>
                </div>

            </div>
        @endif

        <footer class="mt-16 text-center text-[11px] text-slate-600 font-mono tracking-wider">
            <p>MAIN CORE CONNECTED // SECURE PROTOCOL ACTIVE // &copy; 2026 LAB ELEKTRONIKA CORE</p>
        </footer>
    </main>

    <!-- INTERAKSI JAVASCRIPT UNTUK GENERATE DATA STRUK SECARA LIVE -->
    <script>
        function generateReceipt() {
            var name = document.getElementById('borrower_name').value;
            var itemSelect = document.getElementById('borrow_item');
            var itemName = itemSelect.value;
            var qty = parseInt(document.getElementById('borrow_qty').value);
            
            if(!itemName) {
                alert('[ERROR]: Silakan pilih instrumen praktikum terlebih dahulu!');
                return;
            }

            var selectedOption = itemSelect.options[itemSelect.selectedIndex];
            var maxStok = parseInt(selectedOption.getAttribute('data-stok'));

            if(qty <= 0 || isNaN(qty)) {
                alert('[ERROR]: Jumlah kuantitas pinjam tidak valid!');
                return;
            }

            if(qty > maxStok) {
                alert('[SECURITY WARNING]: Stok gudang tidak mencukupi! Batas maksimal: ' + maxStok + ' unit.');
                return;
            }

            var today = new Date();
            var dateString = today.toLocaleDateString('id-ID') + ' ' + today.toLocaleTimeString('id-ID');
            var randomId = 'TX-ELK-' + Math.floor(1000 + Math.random() * 9000);

            document.getElementById('receipt-date').innerText = dateString;
            document.getElementById('receipt-id').innerText = randomId;
            document.getElementById('receipt-user').innerText = name.toUpperCase();
            document.getElementById('receipt-item-name').innerText = itemName.toUpperCase();
            document.getElementById('receipt-item-qty').innerText = 'QTY: ' + qty + ' UNITS';

            alert('[SUCCESS]: Struk peminjam berhasil di-generate! Silakan cetak dokumen.');
        }
    </script>
</body>
</html>