<?php

namespace App\Http\Auth\Customers\Controllers;

use App\Http\Auth\Customers\Requests\CustomerLoginRequest;
use App\Http\Auth\Customers\Requests\CustomerRegisterRequest;
use App\Http\Auth\Shared\Controllers\BaseAuthController;
use Domain\Users\Customers\Models\Customer;
use Illuminate\Http\JsonResponse;

class CustomerController extends BaseAuthController
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
        $input['password'] = bcrypt($input['password']);
        $customer = Customer::create($input);
        $success['customer'] =  $customer;

        return $this->sendResponse($success, 'Customer register successfully.');
    }

    /**
     * Get a JWT via given credentials.
     *
     * @param CustomerLoginRequest $request
     * @return JsonResponse
     */
    public function login(CustomerLoginRequest $request): JsonResponse
    {
        $credentials = $request->only('personal_email', 'password');

        if (! $token = auth('customer')->attempt($credentials)) {
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }

        $success = $this->respondWithToken((string)$token);

        return $this->sendResponse($success, 'User login successfully.');
    }

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

    /**
     * Refresh a token.
     *
     * @return JsonResponse
     */
    public function refresh(): JsonResponse
    {
        $success = $this->respondWithToken(auth('customer')->refresh());

        return $this->sendResponse($success, 'Refresh token return successfully.');
    }

    /**
     * Get the authenticated User.
     *
     * @return JsonResponse
     */
    public function profile(): JsonResponse
    {
        $success = auth('customer')->user();

        return $this->sendResponse($success, 'Refresh token return successfully.');
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
                'expires_in' => auth('customer')->factory()->getTTL() * 60,
            ]
        );
    }
}
