<?php

namespace App\Http\Admin\NecklaceProperty\NecklaceMetrics\Controllers;

use App\Http\Admin\NecklaceProperty\Necklaces\Resources\NecklaceResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Services\Relationships\NecklaceMetricsNecklaceRelationshipService;
use Illuminate\Http\JsonResponse;

class NecklaceMetricsNecklaceRelatedController extends Controller
{
    public function __construct(public NecklaceMetricsNecklaceRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new NecklaceResource($model))->response();
    }
}
