<?php

namespace App\Http\Auth\Employees\Controllers;

use App\Http\Auth\Employees\Requests\EmployeeLoginRequest;
use App\Http\Auth\Employees\Requests\EmployeeRegisterRequest;
use App\Http\Auth\Shared\Controllers\BaseAuthController;
use Domain\Users\Employees\Models\Employee;
use Illuminate\Http\JsonResponse;

class EmployeeAuthController extends BaseAuthController
{
    /**
     * Register a User.
     *
     * @param EmployeeRegisterRequest $request
     * @return JsonResponse
     */
    public function register(EmployeeRegisterRequest $request): JsonResponse
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $employee = Employee::create($input);
        $success['employee'] =  $employee;

        return $this->sendResponse($success, 'Employee register successfully.');
    }

    /**
     * Get a JWT via given credentials.
     *
     * @param EmployeeLoginRequest $request
     * @return JsonResponse
     */
    public function login(EmployeeLoginRequest $request): JsonResponse
    {
        $credentials = $request->only('work_email', 'password');

        if (! $token = auth('employee')->attempt($credentials)) {
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
        auth('employee')->logout();

        return $this->sendResponse([], 'Successfully logged out.');
    }

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
                'expires_in' => auth('employee')->factory()->getTTL() * 60,
            ]
        );
    }
}
