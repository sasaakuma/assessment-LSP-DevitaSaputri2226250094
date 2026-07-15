<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run(): void
    {
        $rooms = [
            [
                'nama_kamar' => 'Kamar Standard',
                'tipe' => 'Standard',
                'harga_per_malam' => 350000,
                'kapasitas' => 2,
                'deskripsi' => 'Kamar nyaman dengan fasilitas dasar, cocok untuk perjalanan singkat. Dilengkapi kasur queen, AC, dan kamar mandi dalam.',
                'gambar' => null,
                'stok' => 10,
                'is_active' => true,
            ],
            [
                'nama_kamar' => 'Kamar Deluxe',
                'tipe' => 'Deluxe',
                'harga_per_malam' => 550000,
                'kapasitas' => 2,
                'deskripsi' => 'Kamar lebih luas dengan pemandangan kota, dilengkapi smart TV, minibar, dan kopi/teh gratis.',
                'gambar' => null,
                'stok' => 8,
                'is_active' => true,
            ],
            [
                'nama_kamar' => 'Kamar Suite',
                'tipe' => 'Suite',
                'harga_per_malam' => 950000,
                'kapasitas' => 4,
                'deskripsi' => 'Suite mewah dengan ruang tamu terpisah, cocok untuk keluarga atau tamu bisnis yang membutuhkan ruang kerja.',
                'gambar' => null,
                'stok' => 5,
                'is_active' => true,
            ],
            [
                'nama_kamar' => 'Kamar Executive',
                'tipe' => 'Executive',
                'harga_per_malam' => 1450000,
                'kapasitas' => 4,
                'deskripsi' => 'Kamar kelas atas dengan akses lounge eksekutif, jacuzzi, dan layanan concierge 24 jam.',
                'gambar' => null,
                'stok' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($rooms as $room) {
            Room::updateOrCreate(['nama_kamar' => $room['nama_kamar']], $room);
        }
    }
}
