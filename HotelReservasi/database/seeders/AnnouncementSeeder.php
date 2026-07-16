<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Announcement;
use Carbon\Carbon;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $announcements = [
            [
                'title' => 'Selamat Datang di Hotel Nusantara',
                'content' => 'Selamat datang di sistem reservasi Hotel Nusantara. Silakan lengkapi profil Anda dan mulai pesan kamar favorit Anda.',
                'is_active' => true,
                'priority' => 1,
                'published_at' => Carbon::now()->subDays(5),
            ],
            [
                'title' => 'Promo Liburan Akhir Tahun',
                'content' => 'Dapatkan diskon 20% untuk pemesanan kamar Suite dan Deluxe selama periode 25-31 Desember 2026.',
                'is_active' => true,
                'priority' => 2,
                'published_at' => Carbon::now()->subDays(3),
            ],
            [
                'title' => 'Jam Check-in dan Check-out',
                'content' => 'Check-in mulai pukul 14:00 dan check-out paling lambat pukul 12:00. Silakan hubungi resepsionis untuk permintaan khusus.',
                'is_active' => true,
                'priority' => 3,
                'published_at' => Carbon::now()->subDays(2),
            ],
            [
                'title' => 'Pemeliharaan Kolam Renang',
                'content' => 'Kolam renang akan ditutup sementara pada hari Sabtu untuk perawatan rutin. Mohon maaf atas ketidaknyamanannya.',
                'is_active' => true,
                'priority' => 4,
                'published_at' => Carbon::now()->subDays(1),
            ],
            [
                'title' => 'Layanan Antar Jemput Bandara',
                'content' => 'Kami kini menyediakan layanan antar jemput bandara. Silakan hubungi resepsionis untuk pemesanan.',
                'is_active' => true,
                'priority' => 5,
                'published_at' => Carbon::now(),
            ],
            [
                'title' => 'Pengumuman Lama (Tidak Aktif)',
                'content' => 'Ini adalah pengumuman lama yang sudah tidak aktif. Pengumuman ini hanya untuk testing.',
                'is_active' => false,
                'priority' => 6,
                'published_at' => Carbon::now()->subDays(10),
            ],
        ];

        foreach ($announcements as $announcement) {
            Announcement::create($announcement);
        }
    }
}
