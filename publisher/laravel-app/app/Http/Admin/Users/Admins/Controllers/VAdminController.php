<?php

declare(strict_types=1);

namespace App\Http\Admin\Users\Admins\Controllers;

use App\Http\Admin\Users\Admins\Resources\VAdminCollection;
use App\Http\Controllers\Controller;
use Domain\Users\VAdmins\Services\VAdminService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final class VAdminController extends Controller
{
    public function __construct(public VAdminService $service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResponse
    {
        $data = $request->all();
        $items = $this->service->index($data);

        return (new VAdminCollection($items))->response();
    }
}