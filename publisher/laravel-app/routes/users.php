<?php

declare(strict_types=1);

use App\Http\Auth\Admins\Controllers\AdminController;
use App\Http\Auth\Customers\Controllers\CustomerController;
use App\Http\Auth\Employees\Controllers\EmployeeController;
use App\Http\Auth\RegisterPhones\Controllers\RegisterPhoneController;
use App\Http\Auth\Users\Controllers\VUserController;

Route::post('register-phone', [RegisterPhoneController::class, 'registerPhone']);

Route::group([
    'prefix' => 'employees'
], function () {
    /*****************  AUTH EMPLOYEES ROUTES **************/
    Route::post('/register', [EmployeeController::class, 'register'])->middleware('auth:admin');
    Route::post('/login', [EmployeeController::class, 'login']);
    Route::post('/logout', [EmployeeController::class, 'logout'])->middleware('auth:employee');
    Route::patch('/refresh', [EmployeeController::class, 'refresh'])->middleware('auth:employee');
    Route::get('/profile', [EmployeeController::class, 'profile'])->middleware('auth:employee');
//
//    Route::post('/password-forgot', [EmployeeForgotPasswordController::class, 'forgot']);
//    Route::view('/password/email', 'auth.reset_password')->name('password.reset');
//    Route::post('/password-reset', [EmployeeForgotPasswordController::class, 'reset']);
});

Route::group([
    'prefix' => 'admins'
], function () {
    /*****************  AUTH ADMINS ROUTES **************/
    Route::post('/register', [AdminController::class, 'register'])->middleware('auth:admin');
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/logout', [AdminController::class, 'logout'])->middleware('auth:admin');
    Route::patch('/refresh', [AdminController::class, 'refresh'])->middleware('auth:admin');
    Route::get('/profile', [AdminController::class, 'profile'])->middleware('auth:admin');
//
//    Route::post('/password-forgot', [AdminForgotPasswordController::class, 'forgot']);
//    Route::view('/password/email', 'auth.reset_password')->name('password.reset');
//    Route::post('/password-reset', [AdminForgotPasswordController::class, 'reset']);
});

Route::group([
    'prefix' => 'customers'
], function () {
    /*****************  AUTH EMPLOYEES ROUTES **************/
    Route::post('/register', [CustomerController::class, 'register']);
    Route::post('/login', [CustomerController::class, 'login']);
    Route::post('/logout', [CustomerController::class, 'logout'])->middleware('auth:customer');
    Route::patch('/refresh', [CustomerController::class, 'refresh'])->middleware('auth:customer');
    Route::get('/profile', [CustomerController::class, 'profile'])->middleware('auth:customer');
//
//    Route::post('/password-forgot', [EmployeeForgotPasswordController::class, 'forgot']);
//    Route::view('/password/email', 'auth.reset_password')->name('password.reset');
//    Route::post('/password-reset', [EmployeeForgotPasswordController::class, 'reset']);
});
