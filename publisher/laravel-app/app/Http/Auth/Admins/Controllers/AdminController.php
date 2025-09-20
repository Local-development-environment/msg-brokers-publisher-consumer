<?php

namespace App\Http\Auth\Admins\Controllers;

use App\Http\Auth\Admins\Requests\AdminLoginRequest;
use App\Http\Auth\Admins\Requests\AdminRegisterRequest;
use App\Http\Auth\Shared\Controllers\BaseAuthController;
use Domain\Auth\Admins\Services\AdminService;
use Illuminate\Http\JsonResponse;

class AdminController extends BaseAuthController
{
    public function __construct(public AdminService $service)
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

    /**
     * Get a JWT via given credentials.
     *
     * @param AdminLoginRequest $request
     * @return JsonResponse
     */
    public function login(AdminLoginRequest $request): JsonResponse
    {
        $credentials = $request->only('work_email', 'password');

        if (! $token = auth('admin')->attempt($credentials)) {
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
        auth('admin')->logout();

        return $this->sendResponse([], 'Successfully logged out.');
    }

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
