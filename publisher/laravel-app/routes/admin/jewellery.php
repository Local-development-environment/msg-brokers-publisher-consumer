<?php

declare(strict_types=1);

use App\Http\Admin\Jewellery\Jewelleries\Controllers\JewelleryController;
use App\Http\Admin\Users\Admins\Controllers\VAdminController;
use App\Http\Admin\Users\Customers\Controllers\VCustomerController;
use App\Http\Admin\Users\Employees\Controllers\VEmployeeController;
use App\Http\Admin\Users\Users\Controllers\VUserController;

/*************************** JEWELLERIES *************************/
// CRUD
Route::get('/jewelleries', [JewelleryController::class,'index']);

/*************************** USERS *************************/
Route::get('v-users', [VUserController::class, 'index'])->middleware('auth:admin');
Route::get('v-customers', [VCustomerController::class, 'index'])->middleware('auth:admin');
Route::get('v-admins', [VAdminController::class, 'index'])->middleware('auth:admin');
Route::get('v-employees', [VEmployeeController::class, 'index'])->middleware('auth:admin');