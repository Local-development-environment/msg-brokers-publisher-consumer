<?php

declare(strict_types=1);

use App\Http\Admin\Jewellery\Jewelleries\Controllers\JewelleryController;

/*************************** JEWELLERIES *************************/
// CRUD
Route::get('/jewelleries', [JewelleryController::class,'index']);