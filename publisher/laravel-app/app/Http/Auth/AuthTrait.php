<?php

declare(strict_types=1);

namespace App\Http\Auth;

use Illuminate\Http\JsonResponse;

trait AuthTrait
{
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