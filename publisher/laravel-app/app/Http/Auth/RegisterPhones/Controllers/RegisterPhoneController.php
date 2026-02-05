<?php
declare(strict_types=1);

namespace App\Http\Auth\RegisterPhones\Controllers;

use App\Http\Auth\RegisterPhones\Requests\RegisterPhoneRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use UserDomain\Users\RegisterPhones\Services\RegisterPhoneService;

class RegisterPhoneController extends Controller
{
    public function __construct(public RegisterPhoneService $service)
    {
    }

    public function registerPhone(RegisterPhoneRequest $request): JsonResponse
    {
        $registerPhone = $this->service->registerPhone($request->all());

        return new JsonResponse($registerPhone);
    }
}
