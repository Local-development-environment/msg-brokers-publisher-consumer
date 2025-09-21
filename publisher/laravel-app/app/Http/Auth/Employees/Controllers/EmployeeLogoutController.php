<?php

declare(strict_types=1);

namespace App\Http\Auth\Employees\Controllers;

use App\Http\Auth\Shared\Controllers\BaseAuthController;
use Illuminate\Http\JsonResponse;

final class EmployeeLogoutController extends BaseAuthController
{
    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        auth('employee')->logout();

        return $this->sendResponse([], 'Successfully logged out.');
    }
}