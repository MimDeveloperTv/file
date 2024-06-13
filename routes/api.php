<?php

use App\Http\Controllers\FolderController;
use Illuminate\Support\Facades\Route;

Route::prefix('folders')->name('folders.')->group(function () {
    Route::get('/', [FolderController::class,'index'])->name('index');
    Route::post('/create', [FolderController::class,'store'])->name('create');
    Route::get('/{id}', [FolderController::class,'show'])->name('show');
});


