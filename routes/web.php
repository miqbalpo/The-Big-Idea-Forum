<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewEventController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

// Halaman Utama (Landing Page) - Diakses saat user membuka website pertama kali
Route::get('/', [ViewEventController::class, 'index'])->name('profile.index');

// Halaman Semua Video - Diakses saat user ingin melihat daftar lengkap video
Route::get('/all-videos', [ViewEventController::class, 'allvideos'])->name('allvideos.index');

// Halaman Login - Menampilkan form login
Route::get('/login', [ViewEventController::class, 'login'])->name('login');

// Proses Logout - Diakses saat user menekan tombol logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Proses Login - Menerima input email & password dari form login
Route::post('/loginuser', [AuthController::class, 'login']);

// Group Route Admin - Hanya bisa diakses jika user sudah login (Middleware Auth)
Route::middleware('auth')->group(function () {
    // Prefix 'admin' membuat semua URL di bawah ini diawali dengan /admin
    Route::prefix('admin')->group(function (): void {
        
        // === HALAMAN VIEW ADMIN (Tampilan) ===
        // Dashboard Admin
        Route::get('/', [ViewEventController::class, 'admin'])->name('admin.index');
        // Halaman Manajemen Event
        Route::get('/event', [ViewEventController::class, 'event'])->name('event.index');
        // Halaman Manajemen Moderator
        Route::get('/moderator', [ViewEventController::class, 'moderator'])->name('moderator.index');
        // Halaman Manajemen Galeri
        Route::get('/gallery', [ViewEventController::class, 'gallery'])->name('gallery.index');
        // Halaman Manajemen Video
        Route::get('/videos', [ViewEventController::class, 'video'])->name('videos.index');
        // Halaman Manajemen Akun Admin Lain
        Route::get('/adminmanager', [ViewEventController::class, 'adminmanager'])->name('adminmanager.index');
    
        // === ACTION ROUTES (Proses Data) ===
        // Simpan/Update data moderator
        Route::post('/moderatorstore/{id}', [AdminController::class, 'store'])->name('moderator.store');
        // Update foto-foto galeri
        Route::post('/gallery', [AdminController::class, 'updateGallery'])->name('gallery.update');
        // Simpan/Update data event
        Route::post('/eventupdate/{id}', [AdminController::class, 'saveOrUpdateEvent'])->name('event.update');

        // CRUD Video (Simpan, Hapus, Update)
        Route::post('/videostore', [AdminController::class, 'storeVideos'])->name('video.store');
        Route::post('/videodelete/{id}', [AdminController::class, 'deleteVideo'])->name('video.delete');
        Route::put('/videoupdate/{id}', [AdminController::class, 'updateVideo'])->name('video.update');

        // CRUD Akun Admin (Buat, Hapus, Edit)
        Route::post('/accountstore', [AdminController::class, 'register'])->name('account.store');
        Route::post('/accountdelete/{id}', [AdminController::class, 'deleteAkun'])->name('account.delete');
        Route::put('/update-account/{id}', [AdminController::class, 'editAkun'])->name('account.update');
        
        // Hapus peserta event spesifik
        Route::delete('/event/participant/{id}', [AdminController::class, 'deleteParticipant'])
        ->name('event.participant.delete');
    });
});