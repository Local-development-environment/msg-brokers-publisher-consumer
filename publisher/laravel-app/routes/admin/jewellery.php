<?php

declare(strict_types=1);

use App\Http\Admin\Jewellery\Jewelleries\Controllers\JewelleryController;
use App\Http\Auth\Users\Controllers\VUserController;

/*************************** JEWELLERIES *************************/
// CRUD
Route::get('/jewelleries', [JewelleryController::class,'index']);

/*************************** USERS *************************/
Route::get('v-users', [VUserController::class, 'index'])->middleware('auth:admin');