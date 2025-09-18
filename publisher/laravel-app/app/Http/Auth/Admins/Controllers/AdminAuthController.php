<?php

namespace App\Http\Auth\Admins\Controllers;

use App\Http\Auth\Admins\Requests\AdminLoginRequest;
use App\Http\Auth\Shared\Controllers\BaseAuthController;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class AdminAuthController extends BaseAuthController
{
    /**
     * Get a JWT via given credentials.
     *
     * @param AdminLoginRequest $request
     * @return JsonResponse
     */
    public function login(AdminLoginRequest $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');

        if (! $token = auth('admin')->attempt($credentials)) {
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }

        $success = $this->respondWithToken((string)$token);

        return $this->sendResponse($success, 'User login successfully.');
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return JsonResponse
     */
    protected function respondWithToken(string $token): JsonResponse
    {
        return response()->json(
            [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth('admin')->factory()->getTTL() * 60,
            ]
        );
    }
}
