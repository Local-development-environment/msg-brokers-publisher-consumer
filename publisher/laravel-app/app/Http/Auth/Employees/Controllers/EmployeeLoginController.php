<?php

declare(strict_types=1);

namespace App\Http\Auth\Employees\Controllers;

use App\Http\Auth\AuthTrait;
use App\Http\Auth\Employees\Requests\EmployeeLoginRequest;
use App\Http\Auth\Shared\Controllers\BaseAuthController;
use Illuminate\Http\JsonResponse;

final class EmployeeLoginController extends BaseAuthController
{
    use AuthTrait;

    /**
     * Get a JWT via given credentials.
     *
     * @param EmployeeLoginRequest $request
     * @return JsonResponse
     */
    public function login(EmployeeLoginRequest $request): JsonResponse
    {
        $credentials = $request->only('employee_email', 'password');

        if (! $token = auth('employee')->attempt($credentials)) {
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }

        $success = $this->respondWithToken((string)$token);

        return $this->sendResponse($success, 'User login successfully.');
    }
}