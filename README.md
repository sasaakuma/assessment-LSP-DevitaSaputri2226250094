
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
<img width="1914" height="911" alt="HalamanLogin" src="https://github.com/user-attachments/assets/6646cfbf-303c-4240-87b4-23bd3c00c341" />

Halaman Register
<img width="1920" height="913" alt="HalamanRegister" src="https://github.com/user-attachments/assets/24011db0-f8f9-4150-bcae-a0aa3b7db4f7" />

Halaman Utama
<img width="1920" height="915" alt="HalamanUtama" src="https://github.com/user-attachments/assets/8ad61ba1-3cd7-4b60-aa8d-38da455486aa" />

Halaman  Dashboard User
<img width="1920" height="913" alt="HalamanDashboardUser" src="https://github.com/user-attachments/assets/8ae4eb46-7734-4bff-8642-6c9f945f5e1e" />

Halaman Halaman Dashboard User 2
<img width="1920" height="910" alt="HalamanDashboardUser2" src="https://github.com/user-attachments/assets/3582dca9-36ee-4cb7-85ed-cf70e777e809" />

Halaman Halaman Dashboard User 3
<img width="1914" height="912" alt="HalamanDashboardUser3" src="https://github.com/user-attachments/assets/9b8f1671-8362-4e20-9c1f-8ec50951b76a" />

Halaman Halaman Dashboard User 4
<img width="1920" height="909" alt="HalamanDashboardUser4" src="https://github.com/user-attachments/assets/529c5a4b-2e4b-42a7-b69c-bcb23406ef16" />

Form Pemesanan Kamar
<img width="1920" height="917" alt="FormulirPemesananKamar" src="https://github.com/user-attachments/assets/f19d8d60-3e5c-49ea-9c38-6170fb3a4471" />

Status Pemesanan Setelah Pengisian Form
<img width="1920" height="917" alt="StatusPemesanan" src="https://github.com/user-attachments/assets/28fe6ce8-46f1-4d95-befa-68f78dd7787e" />

Status Pemesanan Kamar 
<img width="1920" height="911" alt="StatusPemesananKamar" src="https://github.com/user-attachments/assets/9f84de7a-e89f-4bbb-b563-a0c10b5a53ee" />

Status Pemesanan Kamar
<img width="1917" height="914" alt="StatusPemesananSetelahPembayaran" src="https://github.com/user-attachments/assets/faa7abaa-fa70-4f4c-ab67-978261954877" />

Verifikasi Pembayaran
<img width="1920" height="918" alt="VerifikasiPembayaran" src="https://github.com/user-attachments/assets/3824e9e1-1de1-4df1-9723-b2f9cd0d076b" />

Konfirmasi Pembayaran User
<img width="1920" height="915" alt="KonfirmasiPembayaranUser" src="https://github.com/user-attachments/assets/5d299e42-5af2-4c4a-85ca-ba9c5785ecfa" />

Dashboard Admin
<img width="1919" height="924" alt="DashboardAdmin" src="https://github.com/user-attachments/assets/0e93c821-64c7-4ebb-b64b-839f62d25a36" />

Verifikasi Akun Admin
<img width="1920" height="919" alt="VerifikasiAkunAdmin" src="https://github.com/user-attachments/assets/761b0375-27f7-49e5-a226-d58252f1704c" />

Verifikasi Pembayaran
<img width="1920" height="918" alt="VerifikasiPembayaran" src="https://github.com/user-attachments/assets/1e836131-d66a-4b03-9d58-d140ba792ee1" />

Kelola Pengumuman 
<img width="1920" height="907" alt="KelolaPengumuman" src="https://github.com/user-attachments/assets/1975aba7-247b-46e2-90bb-3b5030edc79f" />


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




