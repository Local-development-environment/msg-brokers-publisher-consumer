<?php

declare(strict_types=1);

namespace App\Http\Admin\Users\Employees\Controllers;

use App\Http\Admin\Users\Employees\Resources\VEmployeeCollection;
use App\Http\Controllers\Controller;
use Domain\Users\VEmployees\Services\VEmployeeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class VEmployeeController extends Controller
{
    public function __construct(public VEmployeeService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new VEmployeeCollection($items))->response();
    }
}