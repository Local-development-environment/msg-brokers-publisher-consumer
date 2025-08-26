<?php

use App\Http\Site\Inserts\Controllers\VInsertController;
use Illuminate\Support\Facades\Route;

Route::get('/v-inserts', [VInsertController::class,'index']);