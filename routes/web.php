<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PublicController::class,'index'])->name('welcome');

Route::middleware(['auth', 'ensure.company'])->group(function () {
    Route::resource('clients', ClientController::class);
});