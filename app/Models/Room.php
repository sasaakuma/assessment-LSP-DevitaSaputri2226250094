<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kamar',
        'tipe',
        'harga_per_malam',
        'kapasitas',
        'deskripsi',
        'gambar',
        'stok',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * URL gambar kamar. Jika admin belum mengunggah foto, gunakan gambar
     * default berdasarkan tipe kamar.
     */
    public function getGambarUrlAttribute(): string
    {
        if ($this->gambar) {
            return asset('storage/' . $this->gambar);
        }

        $default = strtolower($this->tipe ?? 'standard');
        if (! in_array($default, ['standard', 'deluxe', 'suite', 'executive'])) {
            $default = 'standard';
        }

        return asset('images/rooms/' . $default . '.png');
    }
}
