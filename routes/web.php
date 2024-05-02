<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnqueteController;
use App\Http\Controllers\PageController;


Route::get('/', [PageController::class, 'index'])->name('pages.index');
Route::get('/enquete/{id}', [PageController::class, 'show'])->name('pages.show');
Route::post('/enquetevoto/{id}/{idvoto}', [PageController::class, 'update'])->name('pages.update');

Route::prefix('admin')->group(function(){
    Route::get('/', [EnqueteController::class, 'index'])->name('enquete.index');
    Route::get('/novaenquete', [EnqueteController::class, 'create'])->name('enquete.create');
    Route::post('/novaenquete', [EnqueteController::class, 'store'])->name('enquete.store');
    Route::get('/editarenquete/{id}', [EnqueteController::class, 'edit'])->name('enquete.edit');
    Route::post('/editarenquete/{id}', [EnqueteController::class, 'update'])->name('enquete.update');
    Route::delete('/excluirenquete/{id}', [EnqueteController::class, 'destroy'])->name('enquete.destroy');
});

