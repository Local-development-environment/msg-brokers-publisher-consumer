<?php

declare(strict_types=1);

namespace App\Http\Auth\Admins\Controllers;

use App\Http\Auth\Admins\Requests\AdminLoginRequest;
use App\Http\Auth\AuthTrait;
use App\Http\Auth\Shared\Controllers\BaseAuthController;
use Illuminate\Http\JsonResponse;

final class AdminLoginController extends BaseAuthController
{
    use AuthTrait;

    /**
     * Get a JWT via given credentials.
     *
     * @param AdminLoginRequest $request
     * @return JsonResponse
     */
    public function login(AdminLoginRequest $request): JsonResponse
    {
        $credentials = $request->only('admin_email', 'password');

        if (! $token = auth('admin')->attempt($credentials)) {
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }

        $success = $this->respondWithToken((string)$token);

        return $this->sendResponse($success, 'User login successfully.');
    }
}