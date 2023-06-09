<?php

use App\Http\Controllers\DosenController;
use App\http\Controllers\MahasiswaController;
use App\Http\Controllers\NaskahController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SuratController;
use Illuminate\Support\Facades\Route;
use Spatie\Health\Http\Controllers\HealthCheckResultsController;

// Auth Controller
Route::get('/', [SessionController::class, 'index'])->name('login');
Route::post('/sesi/login', [SessionController::class, 'login'])->name('sesi.login');
Route::get('/logout', [SessionController::class, 'logout'])->middleware(['auth'])->name('logout');
Route::get('/register', [SessionController::class, 'register']);
Route::post('/create', [SessionController::class, 'create']);

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Naskah route
Route::controller(NaskahController::class)
    ->middleware(['auth'])
    ->prefix('naskah')
    ->group(function () {
        Route::get('/', 'naskah')->name('naskah.index');
        Route::get('/suket-mahasisawa-aktif', 'suket_mhs_aktif')->name('naskah.aktif');
        Route::get('/suket-tunjangan', 'suket_tunjangan')->name('naskah.tunjangan');
        Route::get('/surat-izin-kkn', 'surat_izin_kkn')->name('naskah.kkn');
        Route::get('/surat-izin-magang', 'surat_izin_magang')->name('naskah.magang');
        Route::get('/surat-izin-penelitian', 'surat_izin_penelitian')->name('naskah.penelitian');
        Route::get('/surat-izin-observasi-matkul', 'surat_izin_observasi_matkul')->name('naskah.observasimatkul');
        Route::get('/surat_izin_observasi_TA', 'surat_izin_observasi_TA')->name('naskah.observasita');
    });

// Mahasiswa route
Route::controller(MahasiswaController::class)
    ->middleware(['auth'])
    ->prefix('mahasiswa')
    ->group(function () {
        Route::get('/', 'index')->name('mahasiswa.index');
        Route::get('/tambah', 'create')->name('mahasiswa.create');
        Route::post('/tambah', 'store')->name('mahasiswa.store');
        Route::get('/detail/{id}', 'show')->name('mahasiswa.show');
        Route::get('/edit/{id}', 'edit')->name('mahasiswa.edit');
        Route::put('/edit/{id}', 'update')->name('mahasiswa.update');
        Route::delete('/hapus/{id}', 'destroy')->name('mahasiswa.delete');
        Route::get('pdf', 'exportpdf')->name('mahasiswa.pdf');
    });

// Buat surat controller
Route::controller(SuratController::class)
    ->middleware(['auth'])
    ->prefix('buat-surat')
    ->group(function () {
        Route::get('/', 'create')->name('buat-surat.create');
        Route::get('/mahasiswa-aktif', 'mahasiswa_aktif')->name('buat-surat.mhsaktif');
        Route::get('/tunjangan', 'tunjangan')->name('buat-surat.tunjangan');
        Route::get('/kkn', 'kkn')->name('buat-surat.kkn');
        Route::get('/magang', 'magang')->name('buat-surat.magang');
        Route::get('/penelitian', 'penelitian')->name('buat-surat.peneliatian');
        Route::get('/matkul', 'matkul')->name('buat-surat.matkul');
        Route::get('/tugas-akhir', 'tugas_akhir')->name('buat-surat.tugasakhir');
    });

Route::get('surat', [SuratController::class, 'index'])->name('surat.index');

// Riwayat route
Route::controller(RiwayatController::class)->prefix('riwayat')->group(function () {
    Route::get('/', 'index')->name('riwayat.index');
});

// Dosen Route
Route::controller(DosenController::class)
    ->prefix('dosen')
    ->middleware(['auth'])
    ->group(function() {
        Route::get('/', 'index')->name('dosen.index');
        Route::get('/tambah', 'create')->name('dosen.create');
        Route::post('/tambah', 'store')->name('dosen.store');
        Route::get('/detail/{id}', 'show')->name('dosen.detail');
        Route::get('/edit/{id}', 'edit')->name('dosen.edit');
        Route::put('/edit/{id}', 'update')->name('dosen.update');
        Route::delete('/hapus/{id}', 'destroy')->name('dosen.delete');
    });

    // Prodi Route
    Route::controller(ProdiController::class)
    ->prefix('prodi')
    ->middleware(['auth'])
    ->group(function() {
        Route::get('/', 'index')->name('prodi.index');
        Route::get('/tambah', 'create')->name('prodi.create');
        Route::post('/tambah', 'store')->name('prodi.store');
        Route::get('/detail/{id}', 'show')->name('prodi.detail');
        Route::get('/edit/{id}', 'edit')->name('prodi.edit');
        Route::put('/edit/{id}', 'update')->name('prodi.update');
        Route::delete('/hapus/{id}', 'destroy')->name('prodi.delete');
    });

// Health route
Route::get('health', [HealthCheckResultsController::class, '__invoke']);

Route::view('/adminpages', 'adminpages');
Route::view('/content_form', 'contentform');
Route::view('/masukbaru', 'masukbaru');
