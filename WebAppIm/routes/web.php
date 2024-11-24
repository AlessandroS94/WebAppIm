<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImagesController;


Route::post('/image/store', [ImagesController::class, 'store'])->name('images.store');
Route::get('/', [ImagesController::class, 'index'])->name('welcome');
Route::get('/indexByTitleDecr', [ImagesController::class, 'indexByTitle'])->name('indexByTitleDecr');
Route::get('/indexByUploadedAtDecr', [ImagesController::class, 'indexByUploadedAt'])->name('indexByUploadedAtDecr');
Route::get('/indexByTitleIncr', [ImagesController::class, 'indexByTitleIncr'])->name('indexByTitleIncr');
Route::get('/indexByUploadedAtIncr', [ImagesController::class, 'indexByUploadedAtIncr'])->name('indexByUploadedAtIncr');
Route::post('/indexSearch', [ImagesController::class, 'search'])->name('indexSearch');
