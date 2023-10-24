<?php

use App\Http\Controllers\BarangForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/submit-barang', [BarangForm::class, 'handleBarangForm'])->middleware(['web', 'auth', 'verified'])->name('barang.submit');
Route::patch('/update-barang', [BarangForm::class, 'handleBarangUpdate'])->middleware(['web', 'auth', 'verified'])->name('barang.update');
Route::delete('/delete-barang', [BarangForm::class, 'handleDeleteBarang'])->middleware(['web', 'auth', 'verified'])->name('barang.delete');