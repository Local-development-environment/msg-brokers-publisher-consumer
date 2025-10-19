<?php

namespace App\Http\Admin\NecklaceProperty\NecklaceMetrics\Controllers;

use App\Http\Admin\SharedProperty\NeckSizes\Resources\NeckSizeResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Services\Relationships\NecklaceMetricsNeckSizeRelationshipService;
use Illuminate\Http\JsonResponse;

class NecklaceMetricsNeckSizeRelatedController extends Controller
{
    public function __construct(public NecklaceMetricsNeckSizeRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new NeckSizeResource($model))->response();
    }
}
