
# Hotel Nusantara — Reservasi Kamar Hotel

Aplikasi web pemesanan kamar hotel berbasis Laravel yang mempermudah proses reservasi antara **Tamu** dan **Admin** hotel mulai dari pendaftaran akun, pemilihan kamar, konfirmasi pembayaran, hingga verifikasi oleh admin semuanya dalam satu sistem yang terintegrasi dengan database MySQL.

Dibangun sebagai proyek Uji Kompetensi LSP untuk mata kuliah Pengembangan Web, dengan studi kasus sistem reservasi kamar hotel yang mencakup dua aktor utama: Tamu (Guest) dan Admin.


## Studi kasus / use case (aktor dan fitur)

Use case dari aplikasi web dengan studi kasus pemesanan kamar hotel.
Aktor dan use case utama pada aplikasi ini adalah sebagai berikut:

Tamu, dengan use case:
- Melakukan pendaftaran akun
- Melihat status pendaftaran akun
- Login ke aplikasi
- Melakukan pemesanan kamar
- Melihat status pemesanan kamar
- Melakukan konfirmasi pembayaran
- Melihat pengumuman

Admin, dengan use case:
- Login ke aplikasi
- Memverifikasi pendaftaran akun (menerima/menolak)
- Memverifikasi pemesanan kamar (menerima/menolak)
- Memverifikasi pembayaran (menerima/menolak)
- Mengelola pengumuman (menambah, mengubah, menghapus)
- Dokumentasi framework
- Integrated Development Environment (IDE)


## Screenshots

Halaman Login
![Halaman Login](public/images/HalamanLogin.PNG)

Halaman Register
![Halaman Register](public/images/HalamanRegister.PNG)

Halaman Utama
![Halaman Utama](public/images/HalamanUtama.PNG)

Halaman Halaman Dashboard User
![Halaman Dashboard User](public/images/HalamanDashboardUser.PNG)

Halaman Halaman Dashboard User 2
![Halaman Dashboard User 2](public/images/HalamanDashboardUser2.PNG)

Halaman Halaman Dashboard User 3
![Halaman Dashboard User 3](public/images/HalamanDashboardUser3.PNG)

Halaman Halaman Dashboard User 4
![Halaman Dashboard User 4](public/images/HalamanDashboardUser4.PNG)

Form Pemesanan Kamar
![Form Pemesanan Kamar](public/images/FormulirPemesananKamar.PNG)

Status Pemesanan 
![Status Pemesanan](public/images/StatusPemesanan.PNG)

Status Pemesanan Kamar
![Status Pemesanan Kamar](public/images/StatusPemesananKamar.PNG)

Status Pemesanan Kamar
![Status Pemesanan Setelah Pembayaran](public/images/StatusPemesananSetelahPembayaran.PNG)

Verifikasi Pembayaran
![Verifikasi Pembayaran](public/images/VerifikasiPembayaran.PNG)

Konfirmasi Pembayaran User
![Konfirmasi Pembayaran User](public/images/KonfirmasiPembayaranUser.PNG)

Dashboard Admin
![Dashboard Admin](public/images/DashboardAdmin.PNG)

Verifikasi Akun Admin
![Verifikasi Akun Admin](public/images/VerifikasiAkunAdmin.PNG)

Verifikasi Pembayaran
![Verifikasi Pemesanan Kamar](public/images/VerifikasiPemesananKamar.PNG)

Kelola Pengumuman 
![Kelola Pengumuman](public/images/KelolaPengumuman.PNG)


## Fitur Utama

### Untuk Tamu (Guest)
- Pendaftaran akun baru
- Melihat status pendaftaran akun (menunggu / diterima / ditolak)
- Login ke aplikasi
- Melakukan pemesanan kamar
- Melihat status pemesanan kamar
- Konfirmasi pembayaran (upload bukti transfer)
- Melihat pengumuman dari admin

### Untuk Admin
- Login ke aplikasi
- Verifikasi pendaftaran akun (terima/tolak)
- Verifikasi pemesanan kamar (terima/tolak)
- Verifikasi pembayaran (terima/tolak)
- Mengelola pengumuman (tambah, ubah, hapus)
## Prasyarat 

Sebelum menjalankan aplikasi ini di perangkat anda, pastikan anda sudah memasang perangkat lunak berikut di sistem Anda:

- [PHP](https://www.php.net/downloads) versi 8.3 atau lebih tinggi
- [Composer](https://getcomposer.org/download/) untuk mengelola dependencies PHP
- [Node.js](https://nodejs.org/) (digunakan oleh Laravel Breeze)
- [MySQL](https://dev.mysql.com/downloads/mysql/) untuk manajemen database
- [XAMPP](https://www.apachefriends.org/download.html)
## Dependencies

Aplikasi ini membutuhkan dependencies berikut:

- [laravel/framework](https://laravel.com/docs) (versi ^12.0)
- [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze) untuk UI Scaffolding
- [Tailwind CSS](https://tailwindcss.com/) sebagai framework CSS

## Run Locally

Clone the project

```bash
   git clone https://github.com/sasaakuma/assessment-LSP-DevitaSaputri2226250094
cd HotelReservasi
```

Jalankan perintah Composer Install
```bash
composer install
```

Install dependencies

```bash
  npm install
```

Jalankan perintah NPM Install

```bash
npm install
```

Salin file .env
```bash
cp. env.example .env
```

Generate key Aplikasi

```bash
  php artisan key:generate
```

Jalankan XAMPP dan hubungkan Database MySQL dari phpmyadmin

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=hotel_reservasi
DB_USERNAME=root
DB_PASSWORD=
```
Lakukan migration dan seeder dengan perintah

```bash
php artisan migrate --seed
```

Run Local Server dan NPM
```bash
npm run dev && php artisan serve
```




## Masalah & Dukungan

Jika Anda mengalami masalah atau membutuhkan bantuan lebih lanjut, buka issue di GitHub atau hubungi saya di devitasaputri_2226250094@mhs.mdp.ac.id

## License

Aplikasi ini dilisensikan di bawah [MIT](https://choosealicense.com/licenses/mit/). Anda bebas untuk menggunakannya, mengubah, dan mendistribusikannya sesuai dengan ketentuan lisensi tersebut.

## Hak Cipta
© 2026 Assessment LSP Devita Saputri. Semua hak dilindungi undang-undang.




