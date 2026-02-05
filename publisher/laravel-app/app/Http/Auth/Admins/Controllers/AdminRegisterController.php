<?php

declare(strict_types=1);

namespace App\Http\Auth\Admins\Controllers;

use App\Http\Auth\Admins\Requests\AdminRegisterRequest;
use App\Http\Auth\Shared\Controllers\BaseAuthController;
use Illuminate\Http\JsonResponse;
use UserDomain\Users\Admins\Services\AdminRegisterService;

final class AdminRegisterController extends BaseAuthController
{
    public function __construct(public AdminRegisterService $service)
    {
    }

    /**
     * Register a User.
     *
     * @param AdminRegisterRequest $request
     * @return JsonResponse
     */
    public function register(AdminRegisterRequest $request): JsonResponse
    {
        $input = $request->all();

        $this->service->register($input);
//        $input['password'] = bcrypt($input['password']);
//        $customer = Employee::create($input);
//        $success['customer'] =  $customer;
//
//        return $this->sendResponse($success, 'Customer register successfully.');
    }
}
