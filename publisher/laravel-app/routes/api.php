<?php

use App\Http\Controllers\VInsertController;
use Illuminate\Support\Facades\Route;

Route::get('/v-inserts', [VInsertController::class,'index']);