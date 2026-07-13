<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AplikasiController extends Controller
{
    public function showLogin() {
        return view('auth.login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $user = Auth::user();
            if ($user->email === 'pemilik@mail.com') {
                $user->role = 'pemilik';
                $user->save();
            }

            return redirect()->intended('/');
        }

        return back()->withErrors(['email' => 'Email atau password salah!']);
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function index() {
        $alats = Alat::with('kategori')->get();
        return view('index', compact('alats'));
    }

    public function createAlat() {
        $kategoris = Kategori::all();
        return view('create_alat', compact('kategoris'));
    }

    public function storeAlat(Request $request) {
        $request->validate([
            'kategori_id' => 'required',
            'nama_alat' => 'required',
            'stok' => 'required|integer|min:0',
        ]);

        Alat::create($request->all());
        return redirect('/')->with('success', 'Alat praktikum berhasil didaftarkan!');
    }

    // ==========================================
    // FITUR BARU UAS: EDIT, UPDATE & DELETE
    // ==========================================

    // 1. Menampilkan Form Edit
    public function editAlat($id) {
        $alat = Alat::findOrFail($id);
        $kategoris = Kategori::all();
        return view('edit_alat', compact('alat', 'kategoris'));
    }

    // 2. Memproses Perubahan Data di Database
    public function updateAlat(Request $request, $id) {
        $request->validate([
            'kategori_id' => 'required',
            'nama_alat' => 'required',
            'stok' => 'required|integer|min:0',
        ]);

        $alat = Alat::findOrFail($id);
        $alat->update($request->all());
        return redirect('/')->with('success', 'Data instrumen berhasil diperbarui!');
    }

    // 3. Menghapus Data dari Database
    public function destroyAlat($id) {
        $alat = Alat::findOrFail($id);
        $alat->delete();
        return redirect('/')->with('success', 'Instrumen berhasil dihapus dari sistem!');
    }
}