<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImagesController;


Route::post('/image/store', [ImagesController::class, 'store'])->name('images.store');
Route::get('/', [ImagesController::class, 'index'])->name('welcome');
