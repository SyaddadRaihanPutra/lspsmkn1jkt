<?php

use App\Http\Controllers\AsesorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\RegisController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UpdateDataAsesor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
Route::redirect('/register', '/register-asesi', 301);
Route::get('/', function () {
    return redirect('/login');
});

Route::get('/logout', function () {
    return redirect('/dashboard');
});


// TEST KONEKSI DATABASE

// Route::get('koneksi', function () {
//     try {
//         DB::connection()->getPdo();
//         echo "Connected successfully to: " . DB::connection()->getDatabaseName();
//     } catch (\Exception $e) {
//         die("Could not connect to the database. Please check your configuration. error:" . $e);
//     }
// });

Route::get('/register-asesi', [RegisController::class, 'index'])->name('register');
Route::post('/register-asesi', [RegisController::class, 'register'])->name('register-post');

Route::get('/register-asesor', [RegisController::class, 'register_asesor'])->name('register-asesor');
Route::post('/register-asesor', [RegisController::class, 'register_asesor_post'])->name('register-asesor-post');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('settings', [SettingController::class, 'setting'])->name('settings');
    Route::patch('settings', [SettingController::class, 'update_setting'])->name('setting.update');

    Route::get('master-jurusan', [MasterController::class, 'master_jurusan'])->name('master-jurusan');
    Route::get('master-jurusan/create', [MasterController::class, 'master_jurusan_create'])->name('master-jurusan.create');
    Route::post('master-jurusan/store', [MasterController::class, 'master_jurusan_store'])->name('master-jurusan.store');
    Route::delete('master-jurusan/delete/{id}', [MasterController::class, 'jurusan_destroy'])->name('master-jurusan.delete');
    Route::get('master-jurusan/{id}/edit', [MasterController::class, 'master_jurusan_edit'])->name('master-jurusan.edit');
    Route::put('master-jurusan/{id}', [MasterController::class, 'master_jurusan_update'])->name('master-jurusan.update');

    Route::get('master-asesor', [MasterController::class, 'master_asesor'])->name('master-asesor');
    Route::get('master-asesor/create', [MasterController::class, 'master_asesor_create']);
    Route::post('master-asesor/store', [MasterController::class, 'master_asesor_store'])->name('master-asesor-store');
    Route::get('master-asesor/{id}/edit', [MasterController::class, 'master_asesor_edit'])->name('master-asesor-edit');
    Route::put('master-asesor/{id}', [MasterController::class, 'master_asesor_update'])->name('master-asesor-update');
    Route::delete('master-asesor/delete/{id}', [MasterController::class, 'master_asesor_destroy'])->name('master-asesor-delete');

    Route::get('master-sekolah', [MasterController::class, 'master_sekolah'])->name('master-sekolah');
    Route::post('master-sekolah/store', [MasterController::class, 'master_sekolah_store'])->name('master-sekolah-store');
    Route::get('master-sekolah/{id}/edit', [MasterController::class, 'master_sekolah_edit'])->name('master-sekolah-edit');
    Route::put('master-sekolah/{id}', [MasterController::class, 'master_sekolah_update'])->name('master-sekolah-update');
    Route::delete('master-sekolah/delete/{id}', [MasterController::class, 'master_sekolah_destroy'])->name('master-sekolah-delete');



    Route::post('/asesor-update', [UpdateDataAsesor::class, 'update'])->name('update-data-asesor');
});

Route::middleware(['auth', 'asesor'])->group(function () {
    Route::get('/detaildiri',[AsesorController::class, 'detaildiri'])->name('detaildiri');
    // Route::view('/asesor', 'asesor.dashboard')->name('asesor');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->get(
    '/dashboard',
    [DashboardController::class, 'index']
)->name('dashboard');

// Route::get('logout', function () {
//     Auth::logout();
//     return redirect('/login');
// });
