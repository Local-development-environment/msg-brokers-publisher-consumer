<?php
declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\NeckSizes\Controllers;

use App\Http\Admin\BeadProperty\BeadMetrics\Resources\BeadMetricCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Services\Relationships\NeckSizeBeadMetricsRelationshipService;

final class NeckSizeBeadMetricsRelatedController extends Controller
{
    public function __construct(public NeckSizeBeadMetricsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new BeadMetricCollection($collection))->response();
    }
}
