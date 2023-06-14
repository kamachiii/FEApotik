<?php

use App\Http\Controllers\ApotikController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [ApotikController::class, 'dashboard'])->name('dashboard');
Route::get('/apotek', [ApotikController::class, 'index'])->name('index');
Route::get('/create', [ApotikController::class, 'create'])->name('create');
Route::post('/store', [ApotikController::class, 'store'])->name('store');
Route::get('/edit/{id}', [ApotikController::class, 'show'])->name('edit');
Route::post('/update/{id}', [ApotikController::class, 'update'])->name('update');
Route::post('/delete/{id}', [ApotikController::class, 'destroy'])->name('delete');
Route::get('/softDelete', [ApotikController::class, 'softDeletes'])->name('softDeletes');
Route::get('/restore/{id}', [ApotikController::class, 'restore'])->name('restore');
Route::post('/hardDelete/{id}', [ApotikController::class, 'hardDelete'])->name('hardDelete');
