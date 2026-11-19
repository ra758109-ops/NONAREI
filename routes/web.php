<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;

// Redirect halaman utama ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// Autentikasi Login & Logout
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Group Route Member Area (Wajib Login)
Route::middleware(['auth'])->prefix('member')->name('member.')->group(function () {

    // Beranda & Katalog Akomodasi
    Route::get('/dashboard', function () { return view('member.dashboard'); })->name('dashboard');
    Route::get('/akomodasi', function () { return view('member.akomodasi'); })->name('akomodasi');
    Route::get('/detail', function () { return view('member.detail'); })->name('detail');
    Route::get('/vouchers', function () { return view('member.vouchers'); })->name('vouchers');

    // Reservasi & Booking
    Route::get('/booking', [BookingController::class, 'index'])->name('booking');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

    // Pembayaran & E-Tiket
    Route::get('/payment', function () { return view('member.payment'); })->name('payment');
    Route::get('/eticket', function () { return view('member.eticket'); })->name('eticket');

    // Ulasan (Reviews)
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

    // Live Chat Resepsionis
    Route::get('/chat', [ChatController::class, 'index'])->name('chat');
    Route::post('/chat', [ChatController::class, 'store'])->name('chat.store');

    // CRUD Profil Akun & Password
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
});
