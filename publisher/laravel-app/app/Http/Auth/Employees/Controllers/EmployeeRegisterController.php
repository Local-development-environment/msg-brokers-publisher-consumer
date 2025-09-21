<?php

declare(strict_types=1);

namespace App\Http\Auth\Employees\Controllers;

use App\Http\Auth\Employees\Requests\EmployeeRegisterRequest;
use App\Http\Auth\Shared\Controllers\BaseAuthController;
use Domain\Users\Employees\Models\Employee;
use Illuminate\Http\JsonResponse;

final class EmployeeRegisterController extends BaseAuthController
{
    /**
     * Register a User.
     *
     * @param EmployeeRegisterRequest $request
     * @return JsonResponse
     */
    public function register(EmployeeRegisterRequest $request): JsonResponse
    {
        $input = $request->all();
//        $input['password'] = bcrypt($input['password']);
//        $employee = Employee::create($input);
//        $success['employee'] =  $employee;
//
//        return $this->sendResponse($success, 'Employee register successfully.');
    }
}