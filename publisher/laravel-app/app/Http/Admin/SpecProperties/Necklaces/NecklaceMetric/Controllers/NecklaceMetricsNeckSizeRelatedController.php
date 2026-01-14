<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Necklaces\NecklaceMetric\Controllers;

use App\Http\Admin\SharedProperty\NeckSizes\Resources\NeckSizeResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Services\Relationships\NecklaceMetricsNeckSizeRelationshipService;
use Illuminate\Http\JsonResponse;

final class NecklaceMetricsNeckSizeRelatedController extends Controller
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
