<?php

use App\Http\Controllers\CashInController;
use App\Http\Controllers\CashOutController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::controller(CashInController::class)->group(function () {
    Route::get('/cash-in', 'index')->name('cash-in');
    Route::get('/cash-in/add', 'add')->name('cash-in.add');
    Route::get('/cash-in/edit/{id}', 'edit')->name('cash-in.edit');
    Route::get('/cash-in/delete/{id}', 'delete')->name('cash-in.delete');
    Route::get('/cash-in/confirm/{id}', 'confirm')->name('cash-in.confirm');
    Route::post('/cash-in/store', 'store')->name('cash-in.store');
    Route::post('/cash-in/update', 'update')->name('cash-in.update');
    Route::post('/cash-in/destroy', 'destroy')->name('cash-in.destroy');
    Route::post('/cash-in/confirm', 'confirmProcess')->name('cash-in.confirm-process');
});

Route::controller(CashOutController::class)->group(function () {
    Route::get('/cash-out', 'index')->name('cash-out');
    Route::get('/cash-out/add', 'add')->name('cash-out.add');
    Route::get('/cash-out/edit/{id}', 'edit')->name('cash-out.edit');
    Route::get('/cash-out/delete/{id}', 'delete')->name('cash-out.delete');
    Route::get('/cash-out/confirm/{id}', 'confirm')->name('cash-out.confirm');
    Route::post('/cash-out/store', 'store')->name('cash-out.store');
    Route::post('/cash-out/update', 'update')->name('cash-out.update');
    Route::post('/cash-out/destroy', 'destroy')->name('cash-out.destroy');
    Route::post('/cash-out/confirm', 'confirmProcess')->name('cash-out.confirm-process');
});

require __DIR__.'/auth.php';
