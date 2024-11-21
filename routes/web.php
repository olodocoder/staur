<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

Route::get('/upload', [FileController::class, 'create']);
Route::post('/upload', [FileController::class, 'store']);
Route::get('/', [FileController::class, 'index']);
Route::delete('/file/{filename}', [FileController::class, 'destroy'])->name('file.delete');
