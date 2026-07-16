<?php

namespace Database\Seeders;

use App\Models\Kamar;
use Illuminate\Database\Seeder;

class KamarSeeder extends Seeder
{
    /**
     * Run the database.
     */
    public function run(): void
    {
        $kamars = [
            [
                'nama_kamar' => 'Kamar Standard',
                'tipe_kamar' => 'Standard',
                'harga' => 350000,
                'kapasitas' => 2,
                'deskripsi' => 'Kamar nyaman dengan satu tempat tidur queen, cocok untuk perjalanan singkat.',
                'gambar' => 'https://images.unsplash.com/photo-1590490360182-c33d57733427?fm=jpg&q=60&w=3000&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fGhvdGVsJTIwcm9vbXN8ZW58MHx8MHx8fDA%3D',
                'is_tersedia' => true,
            ],
            [
                'nama_kamar' => 'Kamar Deluxe',
                'tipe_kamar' => 'Deluxe',
                'harga' => 550000,
                'kapasitas' => 2,
                'deskripsi' => 'Kamar luas dengan pemandangan kota dan fasilitas tambahan seperti mini bar.',
                'gambar' => 'https://images.unsplash.com/photo-1631049552057-403cdb8f0658?fm=jpg&q=60&w=3000&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGhvdGVsJTIwcm9vbXxlbnwwfHwwfHx8MA%3D%3D',
                'is_tersedia' => true,
            ],
            [
                'nama_kamar' => 'Suite Room',
                'tipe_kamar' => 'Suite',
                'harga' => 950000,
                'kapasitas' => 4,
                'deskripsi' => 'Suite mewah dengan ruang tamu terpisah, ideal untuk keluarga atau tamu VIP.',
                'gambar' => 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?w=800',
                'is_tersedia' => true,
            ],
            [
                'nama_kamar' => 'Executive Room',
                'tipe_kamar' => 'Executive',
                'harga' => 750000,
                'kapasitas' => 3,
                'deskripsi' => 'Kamar eksekutif dengan akses lounge dan sarapan gratis untuk 2 orang.',
                'gambar' => 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?w=800',
                'is_tersedia' => true,
            ],
        ];

        foreach ($kamars as $kamar) {
            Kamar::create($kamar);
        }
    }
}
