<?php

use App\Http\Site\Inserts\Controllers\VInsertController;
use App\Http\Site\Jewelleries\Controllers\VJewelleryController;
use Illuminate\Support\Facades\Route;

Route::get('/v-inserts', [VInsertController::class,'index']);
Route::get('/v-jewelleries', [VJewelleryController::class,'index']);