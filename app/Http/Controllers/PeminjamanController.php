<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    // Menguji form input dan menyimpan data sirkuit peminjaman
    public function store(Request $request)
    {
        $request->validate([
            'nama_peminjam' => 'required|string|max:255',
            'nama_alat' => 'required|string',
            'jumlah_pinjam' => 'required|integer|min:1',
        ]);

        // Membuat ID Transaksi Unik Otomatis (TX-ELK-AngkaAcak)
        $transactionId = 'TX-ELK-' . strtoupper(uniqid());

        // Menyimpan data sirkuit ke database menggunakan ORM Eloquent
        Peminjaman::create([
            'user_id' => Auth::id() ?? 1, // Mengunci ke user yang sedang login
            'nama_peminjam' => $request->nama_peminjam,
            'nama_alat' => $request->nama_alat,
            'jumlah_pinjam' => $request->jumlah_pinjam,
            'transaction_id' => $transactionId,
        ]);

        return redirect()->back()->with('success', 'Data peminjaman alat berhasil dicatat ke database! Struk ID: ' . $transactionId);
    }
}