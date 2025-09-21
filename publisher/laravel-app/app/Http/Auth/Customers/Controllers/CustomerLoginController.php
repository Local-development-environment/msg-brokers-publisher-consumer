<?php

declare(strict_types=1);

namespace App\Http\Auth\Customers\Controllers;

use App\Http\Auth\AuthTrait;
use App\Http\Auth\Customers\Requests\CustomerLoginRequest;
use App\Http\Auth\Shared\Controllers\BaseAuthController;
use Illuminate\Http\JsonResponse;

final class CustomerLoginController extends BaseAuthController
{
    use AuthTrait;

    /**
     * Get a JWT via given credentials.
     *
     * @param CustomerLoginRequest $request
     * @return JsonResponse
     */
    public function login(CustomerLoginRequest $request): JsonResponse
    {
        $credentials = $request->only('personal_email', 'password');

        if (! $token = auth('customer')->attempt($credentials)) {
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }

        $success = $this->respondWithToken((string)$token);

        return $this->sendResponse($success, 'User login successfully.');
    }
}