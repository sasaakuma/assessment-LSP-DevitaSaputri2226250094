# Hotel Nusantara — Aplikasi Reservasi Kamar Hotel

Aplikasi web untuk mengelola pemesanan kamar hotel secara online. Aplikasi ini mencakup pendaftaran & verifikasi akun, pemesanan kamar, verifikasi pemesanan oleh admin, konfirmasi & verifikasi pembayaran, serta pengelolaan pengumuman.

## Studi Kasus

Aktor dan fitur utama aplikasi:

**Tamu**
- Melakukan pendaftaran akun
- Melihat status pendaftaran akun
- Login ke aplikasi
- Melakukan pemesanan kamar
- Melihat status pemesanan kamar
- Melakukan konfirmasi pembayaran
- Melihat pengumuman

**Admin**
- Login ke aplikasi
- Memverifikasi pendaftaran akun (menerima/menolak)
- Memverifikasi pemesanan kamar (menerima/menolak)
- Memverifikasi pembayaran (menerima/menolak)
- Mengelola pengumuman (menambah, mengubah, menghapus)

## Dokumentasi

##### Landing Page — Kamar & Pengumuman
_Tambahkan tangkapan layar landing page di sini._

##### Formulir Pemesanan Kamar
_Tambahkan tangkapan layar formulir pemesanan kamar di sini._

##### Status Pemesanan & Pembayaran
_Tambahkan tangkapan layar status pemesanan di sini._

##### Admin — Verifikasi Pemesanan & Pembayaran
_Tambahkan tangkapan layar dashboard admin di sini._

## Fitur Utama

#### Fitur Tamu
- Register / Login
- Pemesanan kamar (pilih kamar, tanggal check-in/out, jumlah tamu)
- Melihat status pemesanan kamar (pending / diterima / ditolak)
- Konfirmasi pembayaran (upload bukti transfer)
- Melihat pengumuman terbaru di landing page

#### Fitur Admin
- Verifikasi pendaftaran akun tamu
- Verifikasi pemesanan kamar (menerima/menolak)
- Verifikasi pembayaran (menerima/menolak)
- Kelola pengumuman (CRUD)

## Spesifikasi Teknis

| Komponen | Teknologi |
|---|---|
| Framework Backend | [Laravel](https://laravel.com/) 12 (PHP) |
| Framework CSS | [Tailwind CSS](https://tailwindcss.com/) |
| Database | MySQL |
| Autentikasi | Laravel Breeze (session-based), role `guest` / `user` / `admin` |
| Upload Media | Laravel Storage (disk `public`), gambar kamar & bukti pembayaran |

### Struktur Basis Data (utama)

- `users` — akun tamu & admin, kolom `role` dan `is_verified`
- `kamars` — data master kamar hotel (tipe, harga, kapasitas, gambar)
- `reservasi` — data pemesanan kamar (relasi ke `users` dan `kamars`, kolom `status`)
- `pembayarans` — data konfirmasi pembayaran (relasi ke `reservasi`, kolom `status`)
- `announcements` — data pengumuman

## Prasyarat

Sebelum menjalankan aplikasi ini di perangkat Anda, pastikan Anda sudah memasang perangkat lunak berikut:

- [PHP](https://www.php.net/downloads.php) versi 8.2 atau lebih tinggi
- [Composer](https://getcomposer.org/) untuk mengelola dependencies PHP
- [Node.js](https://nodejs.org/en/) (digunakan oleh Laravel Breeze & Tailwind)
- [MySQL](https://www.mysql.com/) untuk manajemen database
- [XAMPP](https://www.apachefriends.org/download.html) (opsional, untuk MySQL + phpMyAdmin secara lokal)

## Dependensi

Aplikasi ini membutuhkan dependensi berikut:

- [laravel/framework](https://laravel.com/) (versi ^12)
- [Laravel Breeze](https://github.com/laravel/breeze) untuk UI scaffolding (autentikasi & otorisasi)
- [Tailwind CSS](https://tailwindcss.com/) sebagai framework CSS

## Instalasi

Ikuti langkah-langkah berikut untuk menginstal dan menjalankan aplikasi ini:

1. Clone repositori ke komputer lokal:
```bash
git clone https://github.com/<username>/hotel-nusantara-reservasi.git
cd hotel-nusantara-reservasi
```

2. Jalankan perintah Composer Install
```bash
composer install
```

3. Jalankan perintah NPM Install
```bash
npm install
```

4. Salin file .env
```bash
cp .env.example .env
```

5. Generate key aplikasi
```bash
php artisan key:generate
```

6. Jalankan XAMPP/MySQL dan buat database baru bernama `hotel_reservasi` dari _phpMyAdmin_, lalu sesuaikan kredensial database di file `.env`:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hotel_reservasi
DB_USERNAME=root
DB_PASSWORD=
```

7. Lakukan migration dan seeder dengan perintah
```bash
php artisan migrate --seed
```

8. Buat symbolic link untuk penyimpanan file publik (gambar kamar & bukti pembayaran)
```bash
php artisan storage:link
```

9. Jalankan build asset dan server lokal
```bash
npm run dev
```
```bash
php artisan serve
```

10. Buka aplikasi melalui browser di `http://localhost:8000`

### Akun Default (hasil seeder)

| Role | Email | Password |
|---|---|---|
| Admin | admin@example.com | admin123 |
| Tamu (contoh) | test@example.com | password |

## Alur Penggunaan Singkat

1. Tamu mendaftar akun lalu login, menunggu verifikasi akun oleh admin.
2. Setelah diverifikasi, tamu dapat memesan kamar melalui menu **Pesan Kamar**.
3. Admin memverifikasi pemesanan melalui menu **Verifikasi Pemesanan Kamar** (menerima/menolak).
4. Jika pemesanan diterima, tamu melakukan konfirmasi pembayaran (upload bukti transfer) melalui menu **Status Pemesanan**.
5. Admin memverifikasi pembayaran melalui menu **Verifikasi Pembayaran**.
6. Admin dapat mengelola pengumuman yang tampil di landing page melalui menu **Kelola Pengumuman**.

## Version Control

Proyek ini dikelola menggunakan Git dan GitHub sebagai version control system. Semua perubahan kode dikelola melalui commit dan branching di repositori GitHub.

## Kontribusi

Semua kontribusi terhadap proyek ini sangat dihargai! Silakan fork repositori ini, buat branch baru, dan ajukan pull request.

## Masalah & Dukungan

Jika Anda mengalami masalah atau membutuhkan bantuan lebih lanjut, silakan buka [issue](https://github.com/<username>/hotel-nusantara-reservasi/issues) di GitHub.

## Lisensi

Aplikasi ini dilisensikan di bawah [MIT](https://choosealicense.com/licenses/mit/). Anda bebas untuk menggunakan, mengubah, dan mendistribusikannya sesuai dengan ketentuan lisensi tersebut.

### Hak Cipta

© 2026 Hotel Nusantara — Aplikasi Reservasi Kamar Hotel. Semua hak dilindungi undang-undang.
