<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Alat extends Model
{
    protected $fillable = ['nama_alat', 'kategori_id', 'stok'];

    // Relasi ORM: Alat ini dimiliki oleh sebuah kategori
    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}