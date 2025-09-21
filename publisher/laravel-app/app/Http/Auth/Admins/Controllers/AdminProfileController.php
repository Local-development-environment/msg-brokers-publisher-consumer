<?php

declare(strict_types=1);

namespace App\Http\Auth\Admins\Controllers;

use App\Http\Auth\Shared\Controllers\BaseAuthController;
use Illuminate\Http\JsonResponse;

final class AdminProfileController extends BaseAuthController
{
    /**
     * Get the authenticated User.
     *
     * @return JsonResponse
     */
    public function profile(): JsonResponse
    {
        $success = auth('admin')->user();

        return $this->sendResponse($success, 'Refresh token return successfully.');
    }
}