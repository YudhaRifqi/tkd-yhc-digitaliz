<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\MateriController;
use Illuminate\Support\Facades\Route;


Route::get('/', [DashboardController::class, 'index'])->name('dashboardPage');

Route::get('/kursus', [KursusController::class, 'index'])->name('kursusPage');
Route::get('/kursus/tambah', [KursusController::class, 'create'])->name('kursusPage-tambah');
Route::post('/kursus/tambah', [KursusController::class, 'store'])->name('kursusPage-tambahPost');
Route::get('/kursus/ubah/{id}', [KursusController::class, 'edit'])->name('kursusPage-ubah');
Route::put('/kursus/ubah/{id}', [KursusController::class, 'update'])->name('kursusPage-ubahUpdate');
Route::delete('/kursus/hapus/{id}', [KursusController::class, 'destroy'])->name('kursusPage-hapus');

Route::get('/materi', [MateriController::class, 'index'])->name('materiPage');
Route::get('/materi/tambah', [MateriController::class, 'create'])->name('materiPage-tambah');
Route::post('/materi/tambah', [MateriController::class, 'store'])->name('materiPage-tambahPost');
Route::get('/materi/ubah/{id}', [MateriController::class, 'edit'])->name('materiPage-ubah');
Route::put('/materi/ubah/{id}', [MateriController::class, 'update'])->name('materiPage-ubahUpdate');
Route::delete('/materi/hapus/{id}', [MateriController::class, 'destroy'])->name('materiPage-hapus');
