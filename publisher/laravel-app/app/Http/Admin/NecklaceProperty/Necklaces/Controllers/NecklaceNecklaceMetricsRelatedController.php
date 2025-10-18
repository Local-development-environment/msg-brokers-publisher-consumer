<?php

namespace App\Http\Admin\NecklaceProperty\Necklaces\Controllers;

use App\Http\Admin\NecklaceProperty\NecklaceMetrics\Resources\NecklaceMetricCollection;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Necklaces\Necklaces\Services\Relationships\NecklaceNecklaceMetricsRelationshipService;
use Illuminate\Http\JsonResponse;

class NecklaceNecklaceMetricsRelatedController extends Controller
{
    public function __construct(public NecklaceNecklaceMetricsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new NecklaceMetricCollection($collection))->response();
    }
}
