<?php

declare(strict_types=1);

namespace App\Http\Auth\Employees\Controllers;

use App\Http\Auth\AuthTrait;
use App\Http\Auth\Shared\Controllers\BaseAuthController;
use Illuminate\Http\JsonResponse;

final class EmployeeRefreshController extends BaseAuthController
{
    use AuthTrait;

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh(): JsonResponse
    {
        $success = $this->respondWithToken(auth('employee')->refresh());

        return $this->sendResponse($success, 'Refresh token return successfully.');
    }
}