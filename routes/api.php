<?php

use App\Http\Controllers\FileController;
use App\Http\Controllers\FolderController;
use Illuminate\Support\Facades\Route;

Route::prefix('folders')->name('folders.')->group(function () {
    Route::get('/', [FolderController::class, 'index'])->name('index');
    Route::post('/create', [FolderController::class, 'store'])->name('create');
    Route::get('/{id}', [FolderController::class, 'show'])->name('show');
});

Route::prefix('files')->name('files.')->group(function () {
    Route::post('/create', [FileController::class, 'store'])->name('create');
    Route::put('/move/{id}', [FileController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [FileController::class, 'destroy'])->name('delete');
    Route::get('/{id}', [FileController::class, 'show'])->name('show');
    //Route::get('/move/{id}', [FileController::class,'update'])->name('move');

    //Route::get('/delete', [FileController::class,'destroyAll'])->name('deleteAll');
});
