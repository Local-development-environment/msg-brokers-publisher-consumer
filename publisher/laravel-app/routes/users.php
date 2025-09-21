<?php

declare(strict_types=1);

use App\Http\Auth\Admins\Controllers\AdminLoginController;
use App\Http\Auth\Admins\Controllers\AdminLogoutController;
use App\Http\Auth\Admins\Controllers\AdminProfileController;
use App\Http\Auth\Admins\Controllers\AdminRefreshController;
use App\Http\Auth\Admins\Controllers\AdminRegisterController;
use App\Http\Auth\Customers\Controllers\CustomerController;
use App\Http\Auth\Customers\Controllers\CustomerLoginController;
use App\Http\Auth\Customers\Controllers\CustomerLogoutController;
use App\Http\Auth\Customers\Controllers\CustomerProfileController;
use App\Http\Auth\Customers\Controllers\CustomerRefreshController;
use App\Http\Auth\Customers\Controllers\CustomerRegisterController;
use App\Http\Auth\Employees\Controllers\EmployeeLoginController;
use App\Http\Auth\Employees\Controllers\EmployeeLogoutController;
use App\Http\Auth\Employees\Controllers\EmployeeProfileController;
use App\Http\Auth\Employees\Controllers\EmployeeRefreshController;
use App\Http\Auth\Employees\Controllers\EmployeeRegisterController;
use App\Http\Auth\RegisterPhones\Controllers\RegisterPhoneController;

Route::post('register-phone', [RegisterPhoneController::class, 'registerPhone']);

Route::group([
    'prefix' => 'employees'
], function () {
    /*****************  AUTH EMPLOYEES ROUTES **************/
    Route::post('/register', [EmployeeRegisterController::class, 'register'])->middleware('auth:admin');
    Route::post('/login', [EmployeeLoginController::class, 'login']);
    Route::post('/logout', [EmployeeLogoutController::class, 'logout'])->middleware('auth:employee');
    Route::patch('/refresh', [EmployeeRefreshController::class, 'refresh'])->middleware('auth:employee');
    Route::get('/profile', [EmployeeProfileController::class, 'profile'])->middleware('auth:employee');
//
//    Route::post('/password-forgot', [EmployeeForgotPasswordController::class, 'forgot']);
//    Route::view('/password/email', 'auth.reset_password')->name('password.reset');
//    Route::post('/password-reset', [EmployeeForgotPasswordController::class, 'reset']);
});

Route::group([
    'prefix' => 'admins'
], function () {
    /*****************  AUTH ADMINS ROUTES **************/
    Route::post('/register', [AdminRegisterController::class, 'register'])->middleware('auth:admin');
    Route::post('/login', [AdminLoginController::class, 'login']);
    Route::post('/logout', [AdminLogoutController::class, 'logout'])->middleware('auth:admin');
    Route::patch('/refresh', [AdminRefreshController::class, 'refresh'])->middleware('auth:admin');
    Route::get('/profile', [AdminProfileController::class, 'profile'])->middleware('auth:admin');
//
//    Route::post('/password-forgot', [AdminForgotPasswordController::class, 'forgot']);
//    Route::view('/password/email', 'auth.reset_password')->name('password.reset');
//    Route::post('/password-reset', [AdminForgotPasswordController::class, 'reset']);
});

Route::group([
    'prefix' => 'customers'
], function () {
    /*****************  AUTH EMPLOYEES ROUTES **************/
    Route::post('/register', [CustomerRegisterController::class, 'register']);
    Route::post('/login', [CustomerLoginController::class, 'login']);
    Route::post('/logout', [CustomerLogoutController::class, 'logout'])->middleware('auth:customer');
    Route::patch('/refresh', [CustomerRefreshController::class, 'refresh'])->middleware('auth:customer');
    Route::get('/profile', [CustomerProfileController::class, 'profile'])->middleware('auth:customer');
//
//    Route::post('/password-forgot', [EmployeeForgotPasswordController::class, 'forgot']);
//    Route::view('/password/email', 'auth.reset_password')->name('password.reset');
//    Route::post('/password-reset', [EmployeeForgotPasswordController::class, 'reset']);
});
