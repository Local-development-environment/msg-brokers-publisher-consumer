<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Necklaces\NecklaceMetric\Controllers;

use App\Http\Admin\SharedProperty\NeckSizes\Resources\NeckSizeResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\NecklaceMetrics\Services\Relationships\NecklaceMetricsNeckSizeRelationshipService;

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
