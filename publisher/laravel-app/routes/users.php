<?php

declare(strict_types=1);

use App\Http\Admin\Users\Admins\Controllers\VAdminController;
use App\Http\Admin\Users\Customers\Controllers\VCustomerController;
use App\Http\Admin\Users\Employees\Controllers\VEmployeeController;
use App\Http\Admin\Users\Users\Controllers\VUserController;
use App\Http\Auth\Admins\Controllers\AdminLoginController;
use App\Http\Auth\Admins\Controllers\AdminLogoutController;
use App\Http\Auth\Admins\Controllers\AdminProfileController;
use App\Http\Auth\Admins\Controllers\AdminRefreshController;
use App\Http\Auth\Admins\Controllers\AdminRegisterController;
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
use UserDomain\Users\Admins\Enums\AdminNameRoutesEnum;
use UserDomain\Users\Customers\Enums\CustomerNameRoutesEnum;
use UserDomain\Users\Employees\Enums\EmployeeNameRoutesEnum;

Route::post('register-phone', [RegisterPhoneController::class, 'registerPhone']);

Route::group([
    'prefix' => 'employees'
], function () {
    /*****************  AUTH EMPLOYEES ROUTES **************/
    Route::post('/register', [EmployeeRegisterController::class, 'register'])->middleware('auth:admin')
        ->name(EmployeeNameRoutesEnum::EMPLOYEE_REGISTER->value);
    Route::post('/login', [EmployeeLoginController::class, 'login'])
        ->name(EmployeeNameRoutesEnum::EMPLOYEE_LOGIN->value);
    Route::post('/logout', [EmployeeLogoutController::class, 'logout'])->middleware('auth:employee')
        ->name(EmployeeNameRoutesEnum::EMPLOYEE_LOGOUT->value);
    Route::patch('/refresh', [EmployeeRefreshController::class, 'refresh'])->middleware('auth:employee')
        ->name(EmployeeNameRoutesEnum::EMPLOYEE_REFRESH->value);
    Route::get('/profile', [EmployeeProfileController::class, 'profile'])->middleware('auth:employee')
        ->name(EmployeeNameRoutesEnum::EMPLOYEE_PROFILE->value);
//
//    Route::post('/password-forgot', [EmployeeForgotPasswordController::class, 'forgot']);
//    Route::view('/password/email', 'auth.reset_password')->name('password.reset');
//    Route::post('/password-reset', [EmployeeForgotPasswordController::class, 'reset']);
});

Route::group([
    'prefix' => 'admins'
], function () {
    /*****************  AUTH ADMINS ROUTES **************/
    Route::post('/register', [AdminRegisterController::class, 'register'])->middleware('auth:admin')
        ->name(AdminNameRoutesEnum::ADMIN_REGISTER->value);
    Route::post('/login', [AdminLoginController::class, 'login'])->name(AdminNameRoutesEnum::ADMIN_LOGIN->value);
    Route::post('/logout', [AdminLogoutController::class, 'logout'])->middleware('auth:admin')
        ->name(AdminNameRoutesEnum::ADMIN_LOGOUT->value);
    Route::patch('/refresh', [AdminRefreshController::class, 'refresh'])->middleware('auth:admin')
        ->name(AdminNameRoutesEnum::ADMIN_REFRESH->value);
    Route::get('/profile', [AdminProfileController::class, 'profile'])->middleware('auth:admin')
        ->name(AdminNameRoutesEnum::ADMIN_PROFILE->value);
//
//    Route::post('/password-forgot', [AdminForgotPasswordController::class, 'forgot']);
//    Route::view('/password/email', 'auth.reset_password')->name('password.reset');
//    Route::post('/password-reset', [AdminForgotPasswordController::class, 'reset']);
});

Route::group([
    'prefix' => 'customers'
], function () {
    /*****************  AUTH EMPLOYEES ROUTES **************/
    Route::post('/register', [CustomerRegisterController::class, 'register'])
        ->name(CustomerNameRoutesEnum::CUSTOMER_REGISTER);
    Route::post('/login', [CustomerLoginController::class, 'login'])
        ->name(CustomerNameRoutesEnum::CUSTOMER_LOGIN->value);
    Route::post('/logout', [CustomerLogoutController::class, 'logout'])->middleware('auth:customer')
        ->name(CustomerNameRoutesEnum::CUSTOMER_LOGOUT->value);
    Route::patch('/refresh', [CustomerRefreshController::class, 'refresh'])->middleware('auth:customer')
        ->name(CustomerNameRoutesEnum::CUSTOMER_REFRESH->value);
    Route::get('/profile', [CustomerProfileController::class, 'profile'])->middleware('auth:customer')
        ->name(CustomerNameRoutesEnum::CUSTOMER_PROFILE);
//
//    Route::post('/password-forgot', [EmployeeForgotPasswordController::class, 'forgot']);
//    Route::view('/password/email', 'auth.reset_password')->name('password.reset');
//    Route::post('/password-reset', [EmployeeForgotPasswordController::class, 'reset']);
});

/*************************** USERS *************************/
Route::get('v-users', [VUserController::class, 'index'])->middleware('auth:admin');
Route::get('v-customers', [VCustomerController::class, 'index'])->middleware('auth:admin');
Route::get('v-admins', [VAdminController::class, 'index'])->middleware('auth:admin');
Route::get('v-employees', [VEmployeeController::class, 'index'])->middleware('auth:admin');
