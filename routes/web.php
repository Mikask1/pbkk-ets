<?php

use App\Http\Controllers\ProfileController;
use App\Models\Barang;
use App\Models\JenisBarang;
use App\Models\KondisiBarang;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/dashboard', function () {
    $barang = Barang::all();
    return view('dashboard', ['barang' => $barang]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/barang-form', function () {
    $jenis_barang = JenisBarang::all();
    $kondisi_barang = KondisiBarang::all();

    return view('barang-form', ['kondisi_barang' => $kondisi_barang, 'jenis_barang' => $jenis_barang]);
})->middleware(['auth', 'verified'])->name('barang-form');

Route::get('/barang-update', function (Request $request) {
    $barang_id = $request->query('barang_id');
    $barang = Barang::find($barang_id);
    $jenis_barang = JenisBarang::all();
    $kondisi_barang = KondisiBarang::all();

    return view('barang-update', ['barang' => $barang, 'kondisi_barang' => $kondisi_barang, 'jenis_barang' => $jenis_barang]);
})->middleware(['auth', 'verified'])->name('barang-update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
