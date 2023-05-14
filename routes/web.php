<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\SettingController;
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

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/logout', function () {
    return redirect('/dashboard');
});

Route::get('/register', function () {
    return redirect('/login');
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

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('settings', [SettingController::class, 'setting'])->name('settings');
    Route::patch('settings', [SettingController::class, 'update_setting'])->name('setting.update');
    Route::get('master-kelas', [MasterController::class, 'master_kelas'])->name('master-kelas');
    Route::get('master-kelas/create', [MasterController::class, 'master_kelas_create'])->name('master-kelas.create');
    Route::post('master-kelas/store', [MasterController::class, 'master_kelas_store'])->name('master-kelas.store');
    Route::delete('master-kelas/delete/{id}', [MasterController::class, 'destroy'])->name('master-kelas.delete');


    Route::get('master-jurusan', [MasterController::class, 'master_jurusan'])->name('master-jurusan');
    Route::get('master-jurusan/{id}', [MasterController::class, 'jurusan_show'])->name('master-jurusan.show');
    Route::get('master-jurusan/create', [MasterController::class, 'master_jurusan_create'])->name('master-jurusan.create');
    Route::post('master-jurusan/store', [MasterController::class, 'master_jurusan_store'])->name('master-jurusan.store');
    Route::delete('master-jurusan/delete/{id}', [MasterController::class, 'jurusan_destroy'])->name('master-jurusan.delete');


    Route::get('master-kk', [MasterController::class, 'master_user'])->name('master-user');
    Route::get('master-kk/create', [MasterController::class, 'master_user_create']);
    Route::post('master-kk/store', [MasterController::class, 'master_user_store'])->name('master-user.store');
    Route::get('master-kk/{id}/edit', [MasterController::class, 'master_user_edit'])->name('master-user.edit');
    Route::put('master-kk/{id}', [MasterController::class, 'master_user_update'])->name('master-user.update');
    Route::delete('master-kk/delete/{id}', [MasterController::class, 'master_user_destroy'])->name('master-user.delete');

    Route::get('master-wk', [MasterController::class, 'master_wk'])->name('master-wk');
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
