<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    protected $table = 'kamars';

    protected $fillable = [
        'nama_kamar', 'tipe_kamar', 'harga', 'kapasitas', 'deskripsi', 'gambar', 'is_tersedia',
    ];

    protected $casts = [
        'is_tersedia' => 'boolean',
        'harga' => 'decimal:2',
    ];

    public function reservasi()
    {
        return $this->hasMany(Reservasi::class);
    }
}
