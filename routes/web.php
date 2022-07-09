<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pemberi_Kerja\DashboardPemberiKerjaController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Pencari_Kerja\DashboardPencariKerjaController;
use App\Http\Controllers\Admin\JabatanController;
use App\Http\Controllers\Admin\JenisIndustriController;
use App\Http\Controllers\Admin\BidangPekerjaanController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Pemberi_Kerja\DaftarPerusahaanController;
use App\Http\Controllers\Pemberi_Kerja\PelaporanPerusahaanController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Pemberi_Kerja\ProfilPemberiKerjaController;
use App\Http\Controllers\Pemberi_kerja\TenagaKerjaController;
use App\Http\Controllers\Pemberi_kerja\StatusPerusahaanController;
use App\Http\Controllers\Pemberi_kerja\LegalitasPerusahaanController;
use App\Http\Controllers\Pemberi_kerja\MencariPekerjaPerusahaanController;
use App\Http\Controllers\UpdateEmailController;
use App\Http\Controllers\UpdateTeleponController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\Pemberi_kerja\JadwalInterviewPerusahaan;
use App\Http\Controllers\Pemberi_kerja\LowonganKerjaController;
use App\Http\Controllers\Pencari_Kerja\ProfilPencariKerjaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//routes untuk public dipakai 3 role
Auth::routes();
Route::get('/', function () {return view('welcome');})->name('home');
Route::get('/beranda', function() {
        if (Auth::user()->hasRole('admin'))
            {
                return view('admin.dashboard');
            }
        else if (Auth::user()->hasRole('pencari kerja'))
            {
                return view('pencari_kerja.dashboard');
            }
        else if (Auth::user()->hasRole('pemberi kerja'))
            {
                return view('pemberi_kerja.dashboard');
            }
        return route('home');
        })->name('beranda');
Route::get('edit-password', [ChangePasswordController::class, 'index']);
Route::post('edit-password', [ChangePasswordController::class, 'store'])->name('edit.password');
Route::get('edit-email', [UpdateEmailController::class, 'edit']);
Route::put('update-email/{id}', [UpdateEmailController::class, 'update'])->name('update.email');
Route::get('edit-telepon', [UpdateTeleponController::class, 'edit']);
Route::put('update-telepon/{id}', [UpdateTeleponController::class, 'update'])->name('update.telepon');

//routes untuk role pemberi kerja
Route::group(['middleware' => ['role:pemberi kerja']], function () {
    Route::get('export_pdf',[ExportController::class, 'export_laporan'])->name('export_pdf');
    Route::get('load_kabupaten_pemberi_kerja/{id}', [ProfilPemberiKerjaController::class, 'load_kabupaten']);
    Route::get('load_kecamatan_pemberi_kerja/{id}', [ProfilPemberiKerjaController::class, 'load_kecamatan']);
    Route::get('load_kelurahan_pemberi_kerja/{id}', [ProfilPemberiKerjaController::class, 'load_kelurahan']);
    Route::get('load_kabupaten_lowongan/{id}', [LowonganKerjaController::class, 'load_kabupaten_lowongan']);
    Route::get('load_kecamatan_lowongan/{id}', [LowonganKerjaController::class, 'load_kecamatan_lowongan']);
    Route::get('load_kelurahan_lowongan/{id}', [LowonganKerjaController::class, 'load_kelurahan_lowongan']);
    Route::get('/lowongan_kerja', [LowonganKerjaController::class, 'index'])->name('lowongan_kerja.index');
    Route::get('/lowongan_kerja/create', [LowonganKerjaController::class, 'create'])->name('lowongan_kerja.create');
    Route::post('/lowongan_kerja/create/tambah', [LowonganKerjaController::class, 'store'])->name('lowongan_kerja.store');
    Route::get('/lowongan_kerja/{id}/show', [LowonganKerjaController::class, 'show'])->name('lowongan_kerja.show');
    Route::get('/lowongan_kerja/{id}/edit', [LowonganKerjaController::class, 'edit'])->name('lowongan_kerja.edit');
    Route::post('/lowongan_kerja/{id}', [LowonganKerjaController::class, 'update'])->name('lowongan_kerja.update');
    Route::delete('/lowongan_kerja/{id}/delete', [LowonganKerjaController::class, 'destroy'])->name('lowongan_kerja.destroy');
    Route::get('/dashboard_pemberi_kerja', [DashboardPemberiKerjaController::class, 'index'])->name('dashboard_pemberi_kerja');
    Route::post('profil_pemberi_kerja/{id}', [ProfilPemberiKerjaController::class , 'update'])->name('profil_pemberi_kerja.update');
    Route::resource('tenaga_kerja', TenagaKerjaController::class);
    Route::resource('profil_pemberi_kerja', ProfilPemberiKerjaController::class, ['except' => ['update'] ]);
    Route::resource('status_perusahaan', StatusPerusahaanController::class);
    Route::resource('legalitas_perusahaan', LegalitasPerusahaanController::class);
    Route::resource('pelaporan_perusahaan', PelaporanPerusahaanController::class);
    Route::resource('jadwal_interview', JadwalInterviewPerusahaan::class);
    //belum selesai dikerjakan
    Route::resource('daftar_perusahaan', DaftarPerusahaanController::class);
    Route::resource('mencari_pekerja', MencariPekerjaPerusahaanController::class);
});

Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/dashboard_admin', [DashboardAdminController::class, 'index'])->name('dashboard_admin');
    Route::resource('jabatan', JabatanController::class);
    Route::resource('bidang_pekerjaan', BidangPekerjaanController::class);
    Route::resource('jenis_industri', JenisIndustriController::class);
});

//routes untuk role pencari kerja
Route::group(['middleware' => ['role:pencari kerja']], function () {
    Route::get('/dashboard_pencari_kerja', [DashboardPencariKerjaController::class, 'index'])->name('dashboard_pencari_kerja');
    Route::get('load_kabupaten/{id}', [ProfilPencariKerjaController::class, 'load_kabupaten']);
    Route::get('load_kecamatan/{id}', [ProfilPencariKerjaController::class, 'load_kecamatan']);
    Route::get('load_kelurahan/{id}', [ProfilPencariKerjaController::class, 'load_kelurahan']);
    Route::get('profil_pencari_kerja', [ProfilPencariKerjaController::class, 'index'])->name('profil_pencari_kerja.index');
    Route::post('profil_pencari_kerja/store', [ProfilPencariKerjaController::class, 'store'])->name('profil_pencari_kerja.store');
    Route::post('profil_pencari_kerja/{nik}', [ProfilPencariKerjaController::class, 'update'])->name('profil_pencari_kerja.update');
    Route::post('update_photo_profile/update', [ProfilPencariKerjaController::class, 'update_photo_profile'])->name('photo_profile.update');
    Route::post('pengalaman_kerja/store', [ProfilPencariKerjaController::class, 'store_pengalaman_kerja'])->name('pengalaman_kerja.store');
    Route::post('pendidikan/store', [ProfilPencariKerjaController::class, 'store_pendidikan'])->name('pendidikan.store');
    Route::post('sertifikat/store', [ProfilPencariKerjaController::class, 'store_sertifikat'])->name('sertifikat.store');
    Route::post('keahlian/store', [ProfilPencariKerjaController::class, 'store_keahlian'])->name('keahlian.store');
    Route::get('pengalaman_kerja/{id}/show', [ProfilPencariKerjaController::class, 'show_pengalaman_kerja'])->name('pengalaman_kerja.show');
    Route::get('pendidikan/{id}/show', [ProfilPencariKerjaController::class, 'show_pendidikan'])->name('pendidikan.show');
    Route::get('sertifikat/{id}/show', [ProfilPencariKerjaController::class, 'show_sertifikat'])->name('sertifikat.show');
    Route::get('keahlian/show', [ProfilPencariKerjaController::class, 'show_keahlian'])->name('keahlian.show');
    Route::post('pengalaman_kerja/{id}/update', [ProfilPencariKerjaController::class, 'update_pengalaman_kerja'])->name('pengalaman_kerja.update');
    Route::post('pendidikan/{id}/update', [ProfilPencariKerjaController::class, 'update_pendidikan'])->name('pendidikan.update');
    Route::post('sertifikat/{id}/update', [ProfilPencariKerjaController::class, 'update_sertifikat'])->name('sertifikat.update');
    Route::post('keahlian/update', [ProfilPencariKerjaController::class, 'update_keahlian'])->name('keahlian.update');
    Route::delete('pengalaman_kerja/{id}/delete', [ProfilPencariKerjaController::class, 'destroy_pengalaman_kerja'])->name('pengalaman_kerja.destroy');
    Route::delete('pendidikan/{id}/delete', [ProfilPencariKerjaController::class, 'destroy_pendidikan'])->name('pendidikan.destroy');
    Route::delete('sertifikat/{id}/delete', [ProfilPencariKerjaController::class, 'destroy_sertifikat'])->name('sertifikat.destroy');
});


