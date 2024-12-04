<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\AuthController;
use App\Exports\RekapExport;
use Maatwebsite\Excel\Facades\Excel;
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
    return view('/login');
});



    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get("siswa", [SiswaController::class, "index"])->name("siswa");
    Route::post("siswa/post", [SiswaController::class, "store"])->name("siswa.add");
    Route::get("siswa/{id}", [SiswaController::class, "edit"])->name("siswa.edit")->middleware("signed");
    Route::post("siswa/update", [SiswaController::class, "update"])->name("siswa.update");


    Route::get("jadwal",[JadwalController::class, "index"])->name("jadwal");
    Route::post("jadwal/post", [JadwalController::class, "store"])->name("jadwal.add");
    Route::get("jadwal/{id}", [JadwalController::class, "edit"])->name("jadwal.edit")->middleware("signed");
    Route::post("jadwal/update", [JadwalController::class, "update"])->name("jadwal.update");
    Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');

    Route::get('/rekap', [RekapController::class, 'jadwalIndex'])->name('jadwal.index');
    Route::get('/rekap/{jadwal_id}/rekap', [RekapController::class, 'rekapByJadwal'])->name('rekap.byJadwal');
    Route::get('/rekap/export', function () {
        return Excel::download(new RekapExport, 'rekap_siswa.xlsx');
    });

    Route::get("/", [HomepageController::class, "index"])->name("homepage");
});

