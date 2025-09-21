<?php

declare(strict_types=1);

namespace App\Http\Auth\Employees\Controllers;

use App\Http\Auth\Shared\Controllers\BaseAuthController;
use Illuminate\Http\JsonResponse;

final class EmployeeProfileController extends BaseAuthController
{
    /**
     * Get the authenticated User.
     *
     * @return JsonResponse
     */
    public function profile(): JsonResponse
    {
        $success = auth('employee')->user();

        return $this->sendResponse($success, 'Refresh token return successfully.');
    }
}