<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran'; // <--- Tambahkan baris ini
    protected $fillable = [
        'nama', 'email', 'no_hp', 'alamat', 'nik', 'status', 'user_id',
    ];

        public function user()
    {
        return $this->belongsTo(User::class);
    }

}
