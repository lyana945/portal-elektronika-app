<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peminjaman extends Model
{
    // Mendaftarkan kolom yang boleh diisi oleh form input Laravel
    protected $fillable = [
        'user_id', 
        'nama_peminjam', 
        'nama_alat', 
        'jumlah_pinjam', 
        'transaction_id'
    ];

    // Relasi ORM: Peminjaman ini dicatat dan dimiliki oleh User tertentu
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}