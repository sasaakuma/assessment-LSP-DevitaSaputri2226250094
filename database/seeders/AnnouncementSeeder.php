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
                'title' => 'Selamat Datang di Sistem LSP',
                'content' => 'Selamat datang di sistem Lembaga Sertifikasi Profesi. Silakan lengkapi profil Anda dan mulai proses sertifikasi.',
                'is_active' => true,
                'priority' => 1,
                'published_at' => Carbon::now()->subDays(5),
            ],
            [
                'title' => 'Jadwal Ujian Sertifikasi Bulan Ini',
                'content' => 'Ujian sertifikasi akan dilaksanakan pada tanggal 25-30 Juli 2025. Pastikan Anda sudah mempersiapkan diri dengan baik.',
                'is_active' => true,
                'priority' => 2,
                'published_at' => Carbon::now()->subDays(3),
            ],
            [
                'title' => 'Maintenance Sistem',
                'content' => 'Sistem akan mengalami maintenance pada hari Sabtu, 20 Juli 2025 pukul 02:00 - 04:00 WIB. Mohon maaf atas ketidaknyamanannya.',
                'is_active' => true,
                'priority' => 3,
                'published_at' => Carbon::now()->subDays(2),
            ],
            [
                'title' => 'Pengumuman Hasil Ujian',
                'content' => 'Hasil ujian sertifikasi periode Juni 2025 sudah dapat dilihat di menu Hasil Ujian. Selamat kepada peserta yang telah lulus.',
                'is_active' => true,
                'priority' => 4,
                'published_at' => Carbon::now()->subDays(1),
            ],
            [
                'title' => 'Pelatihan Online Tersedia',
                'content' => 'Kami menyediakan pelatihan online untuk membantu persiapan ujian sertifikasi. Daftar sekarang melalui menu Pelatihan.',
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