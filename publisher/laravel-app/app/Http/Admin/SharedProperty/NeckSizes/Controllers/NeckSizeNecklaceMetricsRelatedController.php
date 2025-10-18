<?php
declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\NeckSizes\Controllers;

use App\Http\Admin\NecklaceProperty\NecklaceMetrics\Resources\NecklaceMetricCollection;
use App\Http\Controllers\Controller;
use Domain\Shared\JewelleryProperties\NeckSizes\Services\Relationships\NeckSizeNecklaceMetricsRelationshipService;
use Illuminate\Http\JsonResponse;

final class NeckSizeNecklaceMetricsRelatedController extends Controller
{
    public function __construct(public NeckSizeNecklaceMetricsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new NecklaceMetricCollection($collection))->response();
    }
}
