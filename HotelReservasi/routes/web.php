<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AdminAnnouncementController;
use App\Http\Controllers\StatusReservasiController;
use App\Http\Controllers\AdminReservasiController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\AdminPembayaranController;
use App\Http\Controllers\Auth\CustomAuthenticatedSessionController;
use Illuminate\Support\Facades\Route;


// Landing page
Route::get('/', [LandingController::class, 'index'])->name('landing');

// Dashboard
Route::get('/dashboard', function () {
    $kamars = \App\Models\Kamar::where('is_tersedia', true)->get();
    $announcements = \App\Models\Announcement::public()
        ->orderBy('priority', 'desc')
        ->orderBy('published_at', 'desc')
        ->get();

    return view('dashboard', compact('kamars', 'announcements'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin: verifikasi pendaftaran akun
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/pending-users', [AdminUserController::class, 'index'])->name('admin.pending-users');
    Route::post('/admin/users/verify/{id}', [AdminUserController::class, 'verify'])->name('admin.verify');
    Route::post('/admin/users/reject/{id}', [AdminUserController::class, 'reject'])->name('admin.reject');
    Route::post('/admin/users/reconsider/{id}', [AdminUserController::class, 'reconsider'])->name('admin.reconsider');
});

// Admin: kelola pengumuman (CRUD)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('announcements', AdminAnnouncementController::class);
});

// Tamu: pemesanan kamar (khusus akun yang sudah diverifikasi admin)
Route::middleware(['auth', 'verified.account'])->group(function () {
    Route::get('/reservasi', [ReservasiController::class, 'create'])->name('reservasi.create');
    Route::post('/reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');
    Route::get('/status-reservasi', [StatusReservasiController::class, 'index'])->name('status.reservasi');

    // Tamu: konfirmasi pembayaran
    Route::get('/reservasi/{reservasi}/pembayaran', [PembayaranController::class, 'create'])->name('pembayaran.create');
    Route::post('/reservasi/{reservasi}/pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');
});

// Admin: verifikasi pemesanan kamar & pembayaran
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/reservasi', [AdminReservasiController::class, 'index'])->name('admin.reservasi.index');
    Route::patch('/admin/reservasi/{id}', [AdminReservasiController::class, 'update'])->name('admin.reservasi.update');

    Route::get('/admin/pembayaran', [AdminPembayaranController::class, 'index'])->name('admin.pembayaran.index');
    Route::patch('/admin/pembayaran/{id}', [AdminPembayaranController::class, 'update'])->name('admin.pembayaran.update');
});

// Tes toast error
Route::get('/tes-toast-error', function () {
    return redirect('/dashboard')->with('error', 'Ini adalah toast error dari tes!');
});

// Tes toast success
Route::get('/tes-toast', function () {
    session()->flash('success', 'Toast berhasil ditampilkan!');
    return redirect('/dashboard');
});

// Custom login
Route::post('/login', [CustomAuthenticatedSessionController::class, 'store'])->name('login');


require __DIR__.'/auth.php';

