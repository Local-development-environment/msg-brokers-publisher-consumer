<?php

namespace App\Http\Auth\Employees\Controllers;

use App\Http\Auth\Employees\Requests\EmployeeRegisterRequest;
use App\Http\Auth\Shared\Controllers\BaseAuthController;
use Domain\Users\Employees\Models\Employee;
use Illuminate\Http\JsonResponse;

class EmployeeAuthController extends BaseAuthController
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
        $input['password'] = bcrypt($input['password']);
        $customer = Employee::create($input);
        $success['customer'] =  $customer;

        return $this->sendResponse($success, 'Customer register successfully.');
    }
}
