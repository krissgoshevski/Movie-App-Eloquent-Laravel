<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;





Route::get('/', [MovieController::class, 'index'])->name('movie.homepage'); // Пренасочување кон методот 'index' на вашиот контролер
Route::get('/create', [MovieController::class, 'create'])->name('movie.create');
Route::post('/store', [MovieController::class, 'store'])->name('movie.store');
Route::get('/show/{id}', [MovieController::class, 'show'])->name('movie.show');


