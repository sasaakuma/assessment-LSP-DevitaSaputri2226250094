<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AdminAnnouncementController;
use App\Http\Controllers\StatusPendaftaranController;
use App\Http\Controllers\AdminPendaftaranController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminRoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AdminPaymentController;
use App\Http\Controllers\Auth\CustomAuthenticatedSessionController;
use Illuminate\Support\Facades\Route;


// Landing page
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/pending-users', [AdminUserController::class, 'index'])->name('admin.pending-users');
    Route::post('/admin/users/verify/{id}', [AdminUserController::class, 'verify'])->name('admin.verify');
});

// Admin announcement routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('announcements', AdminAnnouncementController::class);
});

// Pendaftaran routes
Route::get('/pendaftaran', [PendaftaranController::class, 'create'])->name('pendaftaran.create');
Route::post('/pendaftaran', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/status-pendaftaran', [StatusPendaftaranController::class, 'index'])->name('status.pendaftaran');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/pendaftaran', [AdminPendaftaranController::class, 'index'])->name('admin.pendaftaran.index');
    Route::patch('/admin/pendaftaran/{id}', [AdminPendaftaranController::class, 'update'])->name('admin.pendaftaran.update');
});

// Kamar (rooms) - dapat dilihat publik / tamu
Route::get('/kamar', [RoomController::class, 'index'])->name('kamar.index');
Route::get('/kamar/{room}', [RoomController::class, 'show'])->name('kamar.show');

// Admin - kelola kamar (CRUD)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/kamar', [AdminRoomController::class, 'index'])->name('kamar.index');
    Route::get('/kamar/create', [AdminRoomController::class, 'create'])->name('kamar.create');
    Route::post('/kamar', [AdminRoomController::class, 'store'])->name('kamar.store');
    Route::get('/kamar/{kamar}/edit', [AdminRoomController::class, 'edit'])->name('kamar.edit');
    Route::put('/kamar/{kamar}', [AdminRoomController::class, 'update'])->name('kamar.update');
    Route::delete('/kamar/{kamar}', [AdminRoomController::class, 'destroy'])->name('kamar.destroy');
});

// Pemesanan kamar (booking) - tamu
Route::middleware(['auth'])->group(function () {
    Route::get('/pemesanan', [BookingController::class, 'create'])->name('pemesanan.create');
    Route::post('/pemesanan', [BookingController::class, 'store'])->name('pemesanan.store');
    Route::get('/status-pemesanan', [BookingController::class, 'index'])->name('pemesanan.index');

    // Konfirmasi pembayaran
    Route::get('/pemesanan/{booking}/pembayaran', [PaymentController::class, 'create'])->name('pembayaran.create');
    Route::post('/pemesanan/{booking}/pembayaran', [PaymentController::class, 'store'])->name('pembayaran.store');
});

// Admin - verifikasi pemesanan & pembayaran
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/pemesanan', [AdminBookingController::class, 'index'])->name('admin.pemesanan.index');
    Route::patch('/admin/pemesanan/{booking}', [AdminBookingController::class, 'update'])->name('admin.pemesanan.update');

    Route::get('/admin/pembayaran', [AdminPaymentController::class, 'index'])->name('admin.pembayaran.index');
    Route::patch('/admin/pembayaran/{payment}', [AdminPaymentController::class, 'update'])->name('admin.pembayaran.update');
});

// Alert demo routes (untuk menunjukkan komponen toast sukses/gagal)
Route::get('/tes-toast-error', function () {
    return redirect('/dashboard')->with('error', 'Ini adalah toast error dari tes!');
});

Route::get('/tes-toast', function () {
    session()->flash('success', 'Toast berhasil ditampilkan!');
    return redirect('/dashboard');
});

// Custom login
Route::post('/login', [CustomAuthenticatedSessionController::class, 'store'])->name('login');


require __DIR__.'/auth.php';