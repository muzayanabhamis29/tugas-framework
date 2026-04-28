<?php

use App\Http\Controllers\AnggotaController;

Route::get('/', [AnggotaController::class, 'index']);
Route::post('/anggota/store', [AnggotaController::class, 'store']);
