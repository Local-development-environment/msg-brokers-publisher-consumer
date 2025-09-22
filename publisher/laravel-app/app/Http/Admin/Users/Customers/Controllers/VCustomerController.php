<?php

declare(strict_types=1);

namespace App\Http\Admin\Users\Customers\Controllers;

use App\Http\Admin\Users\Customers\Resources\VCustomerCollection;
use App\Http\Controllers\Controller;
use Domain\Users\VCustomers\Services\VCustomerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class VCustomerController extends Controller
{
    public function __construct(public VCustomerService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new VCustomerCollection($items))->response();
    }
}