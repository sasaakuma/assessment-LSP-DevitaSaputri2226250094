<<<<<<< HEAD
# Hotel Nirmala — Aplikasi Pemesanan Kamar Hotel

Aplikasi web pemesanan kamar hotel yang dibangun menggunakan **Laravel 12**, **MySQL**, dan **Tailwind CSS (Breeze)**. Aplikasi ini memungkinkan tamu untuk mendaftar akun, memesan kamar, mengonfirmasi pembayaran, dan melihat pengumuman, sementara admin dapat memverifikasi pendaftaran, pemesanan, pembayaran, serta mengelola data kamar dan pengumuman.

Proyek ini merupakan hasil pengembangan dari studi kasus **Task–Action–Result (TAR)** mata kuliah/asesmen pemrograman web, dengan aktor **Tamu** dan **Admin**.

---

## 1. Daftar Isi

- [Fitur Aplikasi](#2-fitur-aplikasi)
- [Aktor & Use Case](#3-aktor--use-case)
- [Teknologi & Dependensi](#4-teknologi--dependensi)
- [Struktur Basis Data](#5-struktur-basis-data)
- [Instalasi & Menjalankan Aplikasi](#6-instalasi--menjalankan-aplikasi)
- [Akun Default](#7-akun-default)
- [Struktur Folder Penting](#8-struktur-folder-penting)
- [Alur Penggunaan Aplikasi](#9-alur-penggunaan-aplikasi)
- [Version Control](#10-version-control)
- [Lisensi](#11-lisensi)

---

## 2. Fitur Aplikasi

**Tamu (role: `user` / `guest`)**
- Registrasi akun (Laravel Breeze) & pendaftaran data diri tamu (nama, email, no. HP, alamat, NIK)
- Melihat status verifikasi pendaftaran akun
- Login/logout
- Melihat daftar kamar beserta gambar, tipe, kapasitas, dan harga
- Melakukan pemesanan kamar (pilih kamar, tanggal check-in/out, jumlah tamu)
- Melihat status pemesanan kamar (menunggu/diterima/ditolak)
- Mengonfirmasi pembayaran (unggah bukti transfer) setelah pemesanan diterima
- Melihat status verifikasi pembayaran
- Melihat pengumuman terbaru dari admin

**Admin (role: `admin`)**
- Login
- Memverifikasi pendaftaran akun tamu (terima/tolak)
- Mengelola data kamar — CRUD (tambah, lihat, ubah, hapus) lengkap dengan unggah foto kamar
- Memverifikasi pemesanan kamar (terima/tolak)
- Memverifikasi pembayaran (terima/tolak)
- Mengelola pengumuman (tambah, ubah, hapus)

**Lainnya**
- Alert/notifikasi (toast) untuk aksi sukses maupun gagal
- Elemen multimedia: foto kamar (dapat diunggah admin) dan video profil hotel pada halaman utama
- Middleware otorisasi berbasis role (`admin` vs `user`) untuk membatasi akses halaman

---

## 3. Aktor & Use Case

| Aktor | Use Case |
|---|---|
| Tamu | Melakukan pendaftaran akun |
| Tamu | Melihat status pendaftaran akun |
| Tamu | Login ke aplikasi |
| Tamu | Melakukan pemesanan kamar |
| Tamu | Melihat status pemesanan kamar |
| Tamu | Melakukan konfirmasi pembayaran |
| Tamu | Melihat pengumuman |
| Admin | Login ke aplikasi |
| Admin | Memverifikasi pendaftaran akun (menerima/menolak) |
| Admin | Memverifikasi pemesanan kamar (menerima/menolak) |
| Admin | Memverifikasi pembayaran (menerima/menolak) |
| Admin | Mengelola pengumuman (menambah, mengubah, menghapus) |

---

## 4. Teknologi & Dependensi

| Kategori | Teknologi |
|---|---|
| Backend framework | [Laravel 12](https://laravel.com/) (PHP ^8.2) |
| Autentikasi | [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze) |
| Database | MySQL |
| CSS framework | [Tailwind CSS](https://tailwindcss.com/) |
| Build tool | [Vite](https://vitejs.dev/) |
| Interaktivitas frontend | Alpine.js (bawaan Breeze) |
| Testing | Pest PHP |

Dependensi PHP utama (`composer.json`):
- `laravel/framework` ^12.0
- `laravel/breeze` ^2.3
- `laravel/tinker` ^2.10

Dependensi JS utama (`package.json`):
- `tailwindcss`
- `vite`
- `laravel-vite-plugin`
- `alpinejs`

---

## 5. Struktur Basis Data

Aplikasi menggunakan MySQL dengan tabel-tabel utama berikut (total lebih dari 3 tabel inti bisnis):

| Tabel | Keterangan |
|---|---|
| `users` | Akun pengguna (tamu & admin), memiliki kolom `role` (`guest`, `user`, `admin`) dan `is_verified` |
| `pendaftaran` | Data pendaftaran akun tamu (nama, email, no_hp, alamat, nik, status verifikasi) |
| `rooms` | Data kamar hotel (nama, tipe, harga/malam, kapasitas, stok, deskripsi, gambar) |
| `bookings` | Data pemesanan kamar oleh tamu (relasi ke `users` & `rooms`, tanggal check-in/out, status) |
| `payments` | Data konfirmasi pembayaran (relasi ke `bookings`, metode, jumlah, bukti pembayaran, status) |
| `announcements` | Data pengumuman yang dikelola admin |

Relasi singkat:
- `users` 1—N `bookings`
- `rooms` 1—N `bookings`
- `bookings` 1—1 `payments`
- `users` 1—1 `pendaftaran`

---

## 6. Instalasi & Menjalankan Aplikasi

### 6.1 Prasyarat

- PHP >= 8.2
- Composer
- Node.js >= 18 & NPM
- MySQL Server (atau MariaDB)
- Git

### 6.2 Langkah Instalasi

```bash
# 1. Clone repository
git clone https://github.com/<username>/<nama-repo>.git
cd <nama-repo>/LSP

# 2. Install dependensi PHP
composer install

# 3. Install dependensi JavaScript
npm install

# 4. Duplikasi file environment
cp .env.example .env

# 5. Generate application key
php artisan key:generate
```

### 6.3 Konfigurasi Database (MySQL)

1. Buat database baru di MySQL, misalnya `hotel_booking`:
   ```sql
   CREATE DATABASE hotel_booking;
   ```
2. Sesuaikan kredensial database pada file `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=hotel_booking
   DB_USERNAME=root
   DB_PASSWORD=
   ```

### 6.4 Migrasi & Seeder

```bash
# Jalankan migrasi tabel
php artisan migrate

# Isi data awal (akun admin default + contoh kamar)
php artisan db:seed
```

### 6.5 Storage Link (wajib untuk menampilkan gambar yang diunggah)

```bash
php artisan storage:link
```

### 6.6 Menjalankan Aplikasi

```bash
# Compile asset (mode development, di terminal terpisah)
npm run dev

# Jalankan server Laravel
php artisan serve
```

Aplikasi dapat diakses melalui `http://127.0.0.1:8000`.

> Alternatif: jalankan `composer run dev` untuk menjalankan server, queue listener, log viewer, dan Vite secara bersamaan (lihat script `dev` pada `composer.json`).

---

## 7. Akun Default

Setelah menjalankan `php artisan db:seed`, tersedia akun berikut:

| Role | Email | Password |
|---|---|---|
| Admin | `admin@example.com` | `admin123` |
| Tamu (contoh) | `test@example.com` | `password` |

> Disarankan untuk mengganti kredensial ini sebelum aplikasi digunakan di lingkungan produksi.

---

## 8. Struktur Folder Penting

```
LSP/
├── app/
│   ├── Http/Controllers/       # Controller (Auth, Pendaftaran, Kamar, Pemesanan, Pembayaran, Admin*, dll)
│   ├── Http/Middleware/        # Middleware otorisasi (AdminMiddleware)
│   └── Models/                 # Model Eloquent (User, Pendaftaran, Room, Booking, Payment, Announcement)
├── database/
│   ├── migrations/             # Skema tabel MySQL
│   └── seeders/                # Data awal (admin, kamar, pengumuman)
├── resources/views/
│   ├── kamar/                  # Halaman daftar & detail kamar (tamu)
│   ├── pemesanan/              # Form & status pemesanan kamar (tamu)
│   ├── pembayaran/             # Form konfirmasi pembayaran (tamu)
│   └── admin/                  # Halaman verifikasi & CRUD untuk admin
├── routes/web.php              # Definisi seluruh route aplikasi
└── public/images/rooms/        # Gambar default kamar
```

---

## 9. Alur Penggunaan Aplikasi

1. **Registrasi & Login** — Tamu mendaftar akun melalui halaman Register (Breeze), lalu login.
2. **Pendaftaran Data Diri** — Tamu melengkapi data diri melalui menu "Pendaftaran Akun"; admin memverifikasi melalui menu "Verifikasi Akun".
3. **Pemesanan Kamar** — Setelah akun diverifikasi, tamu dapat melihat daftar kamar (menu "Pesan Kamar"), memilih kamar, dan mengisi tanggal check-in/out serta jumlah tamu.
4. **Verifikasi Pemesanan** — Admin memverifikasi pemesanan melalui menu "Verifikasi Pemesanan" (terima/tolak).
5. **Konfirmasi Pembayaran** — Jika pemesanan diterima, tamu dapat mengonfirmasi pembayaran dengan mengunggah bukti transfer melalui menu "Status Pemesanan".
6. **Verifikasi Pembayaran** — Admin memverifikasi bukti pembayaran melalui menu "Verifikasi Pembayaran".
7. **Pengumuman** — Admin dapat menambah/mengubah/menghapus pengumuman yang tampil pada halaman utama (landing page) untuk seluruh pengunjung.

---

## 10. Version Control

Proyek ini dikelola menggunakan **Git** dan **GitHub** sebagai version control system, meliputi:
- Riwayat commit per fitur/perubahan
- Branching (opsional: `main` untuk versi stabil, branch fitur untuk pengembangan)
- Dokumentasi melalui `README.md` ini

Alur kontribusi yang disarankan:
```bash
git checkout -b fitur/nama-fitur
git add .
git commit -m "feat: deskripsi singkat perubahan"
git push origin fitur/nama-fitur
# lalu buat Pull Request ke branch main
```

---

## 11. Lisensi

Proyek ini dibangun di atas kerangka kerja [Laravel](https://laravel.com), yang merupakan perangkat lunak open-source berlisensi [MIT](https://opensource.org/licenses/MIT). Kode aplikasi pada proyek ini digunakan untuk keperluan akademik/asesmen.
=======
# assessment-LSP-DevitaSaputri2226250094
>>>>>>> 0e2fe06d62c5eb731c3a0e5fa29656c0c0edf3d9
