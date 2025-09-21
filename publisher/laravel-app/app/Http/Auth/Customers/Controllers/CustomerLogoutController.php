<?php

declare(strict_types=1);

namespace App\Http\Auth\Customers\Controllers;

use App\Http\Auth\Shared\Controllers\BaseAuthController;
use Illuminate\Http\JsonResponse;

final class CustomerLogoutController extends BaseAuthController
{
    /**
     * Log the user out (Invalidate the token).
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        auth('customer')->logout();

        return $this->sendResponse([], 'Successfully logged out.');
    }
}