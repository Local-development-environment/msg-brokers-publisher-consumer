<?php

declare(strict_types=1);

use App\Http\Auth\Admins\Controllers\AdminAuthController;
use App\Http\Auth\Employees\Controllers\EmployeeAuthController;

Route::group([
    'prefix' => 'employees'
], function () {
    /*****************  AUTH EMPLOYEES ROUTES **************/
    Route::post('/register', [EmployeeAuthController::class, 'register']);
//    Route::post('/login', [EmployeeAuthController::class, 'login']);
//    Route::post('/logout', [EmployeeAuthController::class, 'logout'])->middleware('auth:employee');
//    Route::patch('/refresh', [EmployeeAuthController::class, 'refresh'])->middleware('auth:employee');
//    Route::get('/profile', [EmployeeAuthController::class, 'profile'])->middleware('auth:employee');
//
//    Route::post('/password-forgot', [EmployeeForgotPasswordController::class, 'forgot']);
//    Route::view('/password/email', 'auth.reset_password')->name('password.reset');
//    Route::post('/password-reset', [EmployeeForgotPasswordController::class, 'reset']);
});

Route::group([
    'prefix' => 'admins'
], function () {
    /*****************  AUTH ADMINS ROUTES **************/
    Route::post('/register', [AdminAuthController::class, 'register']);
    Route::post('/login', [AdminAuthController::class, 'login']);
//    Route::post('/logout', [EmployeeAuthController::class, 'logout'])->middleware('auth:employee');
//    Route::patch('/refresh', [EmployeeAuthController::class, 'refresh'])->middleware('auth:employee');
//    Route::get('/profile', [EmployeeAuthController::class, 'profile'])->middleware('auth:employee');
//
//    Route::post('/password-forgot', [EmployeeForgotPasswordController::class, 'forgot']);
//    Route::view('/password/email', 'auth.reset_password')->name('password.reset');
//    Route::post('/password-reset', [EmployeeForgotPasswordController::class, 'reset']);
});