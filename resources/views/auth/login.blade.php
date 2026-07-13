<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Lab Elektronika - Secure Access</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Orbitron:wght@700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { font-family: 'Inter', sans-serif; }
        .tech-heading { font-family: 'Orbitron', sans-serif; }
        
        /* BACKGROUND: Papan Sirkuit Digital Gelap */
        .cyber-bg {
            background-color: #060913;
            background-image: 
                radial-gradient(circle at 50% 30%, rgba(29, 78, 216, 0.2), transparent 60%),
                linear-gradient(rgba(30, 41, 59, 0.25) 2px, transparent 2px),
                linear-gradient(90deg, rgba(30, 41, 59, 0.25) 2px, transparent 2px);
            background-size: 100% 100%, 24px 24px, 24px 24px;
        }

        .neon-box {
            box-shadow: 0 0 30px rgba(37, 99, 235, 0.25);
            border: 2px solid rgba(59, 130, 246, 0.4);
        }
        
        .neon-input:focus {
            box-shadow: 0 0 10px rgba(6, 182, 212, 0.5);
            border-color: #06b6d4;
        }
    </style>
</head>
<body class="cyber-bg min-h-screen text-slate-100 flex flex-col justify-between antialiased">

    <header class="p-6 text-center md:text-left container mx-auto max-w-md">
        <div class="flex items-center justify-center md:justify-start space-x-2.5">
            <i class="fa-solid fa-microchip text-blue-500 text-lg animate-pulse"></i>
            <span class="tech-heading text-xs tracking-widest text-slate-400 font-bold">LAB_CORE_GATEWAY // v1.0</span>
        </div>
    </header>

    <main class="container mx-auto px-4 flex justify-center items-center">
        <div class="bg-slate-950/90 backdrop-blur-md p-8 rounded-3xl w-full max-w-md neon-box relative overflow-hidden">
            
            <div class="absolute top-0 right-0 w-16 h-16 border-t-2 border-r-2 border-cyan-500/30 rounded-tr-3xl pointer-events-none"></div>
            <div class="absolute bottom-0 left-0 w-16 h-16 border-b-2 border-l-2 border-cyan-500/30 rounded-bl-3xl pointer-events-none"></div>

            <div class="text-center mb-8">
                <div class="bg-blue-600/10 text-blue-400 w-14 h-14 rounded-2xl flex items-center justify-center mx-auto mb-4 border border-blue-500/30 shadow-[0_0_15px_rgba(37,99,235,0.2)]">
                    <i class="fa-solid fa-shield-halved text-2xl"></i>
                </div>
                <h1 class="tech-heading text-xl font-black tracking-wider text-white">PORTAL PRAKTIKUM</h1>
                <p class="text-[11px] font-mono text-slate-500 uppercase tracking-widest mt-1">Authentication Required</p>
            </div>

            @if($errors->any())
                <div class="bg-rose-500/10 border border-rose-500/30 text-rose-400 p-3 rounded-xl mb-5 text-xs font-mono">
                    <i class="fa-solid fa-triangle-exclamation mr-1"></i> {{ $errors->first() }}
                </div>
            @endif

            <form action="/login" method="POST" class="space-y-5">
                @csrf
                <div>
                    <label class="block text-[10px] font-mono font-bold text-cyan-400 uppercase tracking-wider mb-1.5">// Terminal Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500">
                            <i class="fa-solid fa-envelope text-xs"></i>
                        </div>
                        <input type="email" name="email" required placeholder="name@domain.com" class="w-full bg-slate-900 border border-slate-800 p-3 pl-10 rounded-xl text-sm font-semibold text-white focus:outline-none neon-input transition-all duration-200">
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-mono font-bold text-cyan-400 uppercase tracking-wider mb-1.5">// Access Passkey</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-500">
                            <i class="fa-solid fa-lock text-xs"></i>
                        </div>
                        <input type="password" name="password" required placeholder="••••••••" class="w-full bg-slate-900 border border-slate-800 p-3 pl-10 rounded-xl text-sm text-white focus:outline-none neon-input transition-all duration-200">
                    </div>
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-3.5 rounded-xl text-xs uppercase tracking-widest shadow-[0_0_15px_rgba(37,99,235,0.4)] border border-blue-400 transition-all duration-300 hover:scale-[1.02] cursor-pointer">
                    Initialize Session // Enter
                </button>
            </form>

            <div class="mt-8 pt-5 border-t border-slate-900 font-mono text-[10px]">
                <span class="text-amber-500 font-bold block mb-2"><i class="fa-solid fa-flask-vial mr-1"></i> TEST BENCH CREDENTIALS:</span>
                <div class="bg-slate-900/60 border border-slate-800/80 p-3 rounded-xl text-slate-400 space-y-1">
                    <p><span class="text-blue-400 font-bold">PEMILIK:</span> pemilik@mail.com <span class="text-slate-600">|</span> pass: password123</p>
                    <p><span class="text-emerald-400 font-bold">PEMINJAM:</span> peminjam@mail.com <span class="text-slate-600">|</span> pass: password123</p>
                </div>
            </div>

        </div>
    </main>

    <footer class="p-6 text-center text-[10px] text-slate-600 font-mono tracking-wider">
        SECURE GATEWAY CONNECTED // ENCRYPTED PROTOCOL ACTIVE
    </footer>

</body>
</html>