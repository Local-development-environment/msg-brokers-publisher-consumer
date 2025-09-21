<?php

declare(strict_types=1);

namespace App\Http\Auth\Admins\Controllers;

use App\Http\Auth\AuthTrait;
use App\Http\Auth\Shared\Controllers\BaseAuthController;
use Illuminate\Http\JsonResponse;

final class AdminRefreshController extends BaseAuthController
{
    use AuthTrait;

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh(): JsonResponse
    {
        $success = $this->respondWithToken(auth('admin')->refresh());

        return $this->sendResponse($success, 'Refresh token return successfully.');
    }
}