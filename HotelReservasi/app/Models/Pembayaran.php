<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayarans';

    protected $fillable = [
        'reservasi_id', 'bukti_pembayaran', 'jumlah_bayar', 'metode_pembayaran', 'status',
    ];

    protected $casts = [
        'jumlah_bayar' => 'decimal:2',
    ];

    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class);
    }
}
