<?php

declare(strict_types=1);

namespace App\Http\Auth\Customers\Controllers;

use App\Http\Auth\Customers\Requests\CustomerRegisterRequest;
use App\Http\Auth\Shared\Controllers\BaseAuthController;
use Illuminate\Http\JsonResponse;

final class CustomerRegisterController extends BaseAuthController
{
    /**
     * Register a User.
     *
     * @param CustomerRegisterRequest $request
     * @return JsonResponse
     */
    public function register(CustomerRegisterRequest $request): JsonResponse
    {
        $input = $request->all();
//        $input['password'] = bcrypt($input['password']);
//        $customer = Customer::create($input);
//        $success['customer'] =  $customer;
//
//        return $this->sendResponse($success, 'Customer register successfully.');
    }
}
