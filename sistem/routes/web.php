<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/adminuser', [App\Http\Controllers\AdminUserController::class, 'index']);
    Route::get('/berita', [App\Http\Controllers\BeritaController::class, 'index']);
    Route::get('/berita-detail/{id}', [App\Http\Controllers\BeritaController::class, 'detail']);
    Route::get('/berita-admin', [App\Http\Controllers\BeritaAdminController::class, 'index']);
    Route::get('/guru', [App\Http\Controllers\GuruController::class, 'index']);
    Route::get('/kelas', [App\Http\Controllers\KelasController::class, 'index']);
    Route::get('/mapel', [App\Http\Controllers\MapelController::class, 'index']);
    Route::get('/jadwal', [App\Http\Controllers\JadwalController::class, 'index']);
    Route::get('/siswa', [App\Http\Controllers\SiswaController::class, 'index']);
    Route::get('/ruang', [App\Http\Controllers\RuangController::class, 'index']);
    Route::get('/nilai', [App\Http\Controllers\NilaiController::class, 'index']);
    Route::get('/nilaisiswa', [App\Http\Controllers\NilaiSiswaController::class, 'index']);
    Route::get('/daftarhadir', [App\Http\Controllers\DaftarHadirController::class, 'index']);

    Route::post('/simpan-data-adminuser', [App\Http\Controllers\AdminUserController::class, 'simpan']);
    Route::get('{id}/edit-adminuser', [App\Http\Controllers\AdminUserController::class, 'edit']);
    Route::post('update-adminuser/{id}', [App\Http\Controllers\AdminUserController::class, 'update']);
    Route::get('{id}/hapus-adminuser', [App\Http\Controllers\AdminUserController::class, 'hapus']);
    Route::get('/download-laporanpengguna', [App\Http\Controllers\AdminUserController::class, 'downloadpdf']);

    Route::post('/simpan-data-berita', [App\Http\Controllers\BeritaAdminController::class, 'simpan']);
    Route::get('{id}/edit-berita', [App\Http\Controllers\BeritaAdminController::class, 'edit']);
    Route::post('update-berita/{id}', [App\Http\Controllers\BeritaAdminController::class, 'update']);
    Route::get('{id}/hapus-berita', [App\Http\Controllers\BeritaAdminController::class, 'hapus']);

    Route::post('/simpan-data-guru', [App\Http\Controllers\GuruController::class, 'simpan']);
    Route::get('{id}/edit-guru', [App\Http\Controllers\GuruController::class, 'edit']);
    Route::post('update-guru/{id}', [App\Http\Controllers\GuruController::class, 'update']);
    Route::get('{id}/hapus-guru', [App\Http\Controllers\GuruController::class, 'hapus']);
    Route::get('/download-laporanguru', [App\Http\Controllers\GuruController::class, 'downloadpdf']);

    Route::post('/simpan-data-siswa', [App\Http\Controllers\SiswaController::class, 'simpan']);
    Route::get('{id}/edit-siswa', [App\Http\Controllers\SiswaController::class, 'edit']);
    Route::post('update-siswa/{id}', [App\Http\Controllers\SiswaController::class, 'update']);
    Route::get('{id}/hapus-siswa', [App\Http\Controllers\SiswaController::class, 'hapus']);
    Route::get('/download-laporansiswa', [App\Http\Controllers\SiswaController::class, 'downloadpdf']);

    Route::post('/simpan-data-ruang', [App\Http\Controllers\RuangController::class, 'simpan']);
    Route::get('{id}/edit-ruang', [App\Http\Controllers\RuangController::class, 'edit']);
    Route::post('/update-ruang/{id}', [App\Http\Controllers\RuangController::class, 'update']);
    Route::get('{id}/hapus-ruang', [App\Http\Controllers\RuangController::class, 'hapus']);
    Route::get('/download-laporanruang', [App\Http\Controllers\RuangController::class, 'downloadpdf']);

    Route::post('/simpan-data-mapel', [App\Http\Controllers\MapelController::class, 'simpan' ]);
    Route::get('{id}/edit-mapel', [App\Http\Controllers\MapelController::class, 'edit']);
    Route::post('update-mapel/{id}', [App\Http\Controllers\MapelController::class, 'update']);
    Route::get('{id}/hapus-mapel', [App\Http\Controllers\MapelController::class, 'hapus']);
    Route::get('/download-laporanmapel', [App\Http\Controllers\MapelController::class, 'downloadpdf']);

    Route::post('/tambah', [App\Http\Controllers\KelasController::class, 'tambah' ]);
    Route::post('/simpan-data-kelas', [App\Http\Controllers\KelasController::class, 'simpan' ]);
    Route::get('{id}/edit-kelas', [App\Http\Controllers\KelasController::class, 'edit']);
    Route::post('update-kelas/{id}', [App\Http\Controllers\KelasController::class, 'update']);
    Route::get('{id}/hapus-kelas', [App\Http\Controllers\KelasController::class, 'hapus']);
    Route::get('/download-laporankelas', [App\Http\Controllers\KelasController::class, 'downloadpdf']);

    Route::post('/tambah', [App\Http\Controllers\JadwalController::class, 'tambah' ]);
    Route::post('/simpan-data-jadwal', [App\Http\Controllers\JadwalController::class, 'simpan' ]);
    Route::get('{id}/edit-jadwal', [App\Http\Controllers\JadwalController::class, 'edit']);
    Route::post('update-jadwal/{id}', [App\Http\Controllers\JadwalController::class, 'update']);
    Route::get('{id}/hapus-jadwal', [App\Http\Controllers\JadwalController::class, 'hapus']);
    Route::get('/download-laporanjadwal', [App\Http\Controllers\JadwalController::class, 'downloadpdf']);

    Route::post('/tambah', [App\Http\Controllers\DaftarHadirController::class, 'tambah' ]);
    Route::post('/simpan-data-daftarhadir', [App\Http\Controllers\DaftarHadirController::class, 'simpan' ]);
    Route::get('{id}/edit-daftarhadir', [App\Http\Controllers\DaftarHadirController::class, 'edit']);
    Route::post('update-daftarhadir/{id}', [App\Http\Controllers\DaftarHadirController::class, 'update']);
    Route::get('{id}/hapus-daftarhadir', [App\Http\Controllers\DaftarHadirController::class, 'hapus']);
    Route::get('/download-laporandaftarhadir', [App\Http\Controllers\DaftarHadirController::class, 'downloadpdf']);

    Route::post('/tambah', [App\Http\Controllers\NilaiController::class, 'tambah' ]);
    Route::post('/simpan-data-nilai', [App\Http\Controllers\NilaiController::class, 'simpan' ]);
    Route::get('{id}/edit-nilai', [App\Http\Controllers\NilaiController::class, 'edit']);
    Route::post('update-nilai/{id}', [App\Http\Controllers\NilaiController::class, 'update']);
    Route::get('{id}/hapus-nilai', [App\Http\Controllers\NilaiController::class, 'hapus']);
    Route::get('/download-laporannilai', [App\Http\Controllers\NilaiController::class, 'downloadpdf']);