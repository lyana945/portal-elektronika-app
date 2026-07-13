<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Suntik Data Akun User
        User::updateOrCreate(
            ['email' => 'pemilik@mail.com'],
            ['name' => 'Pemilik Lab', 'password' => Hash::make('password123'), 'role' => 'pemilik']
        );

        User::updateOrCreate(
            ['email' => 'peminjam@mail.com'],
            ['name' => 'Lyana Peminjam', 'password' => Hash::make('password123'), 'role' => 'peminjam']
        );

        // 2. Suntik Data Kategori Pilihan (Biar Dropdown Penuh)
        DB::table('kategoris')->updateOrInsert(
            ['id' => 1],
            ['nama_kategori' => 'Mikrokontroler', 'created_at' => now(), 'updated_at' => now()]
        );

        DB::table('kategoris')->updateOrInsert(
            ['id' => 2],
            ['nama_kategori' => 'Alat Ukur Elektronika', 'created_at' => now(), 'updated_at' => now()]
        );

        DB::table('kategoris')->updateOrInsert(
            ['id' => 3],
            ['nama_kategori' => 'Komponen & Rangkaian', 'created_at' => now(), 'updated_at' => now()]
        );

        // 3. Suntik Data Alat Lab Awal (Menyesuaikan Kategori Baru)
        DB::table('alats')->insert([
            [
                'nama_alat' => 'Arduino Uno R3',
                'kategori_id' => 1,
                'stok' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_alat' => 'Oscilloscope Digital',
                'kategori_id' => 2, // Masuk ke Alat Ukur
                'stok' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}