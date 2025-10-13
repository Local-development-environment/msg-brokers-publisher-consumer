<?php
declare(strict_types=1);

namespace App\Http\Admin\BeadProperty\BeadSizes\Controllers;

use App\Http\Admin\BeadProperty\BeadMetrics\Resources\BeadMetricCollection;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Beads\BeadSizes\Services\Relationships\BeadSizeBeadMetricsRelationshipService;
use Illuminate\Http\JsonResponse;

final class BeadSizeBeadMetricsRelatedController extends Controller
{
    public function __construct(public BeadSizeBeadMetricsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new BeadMetricCollection($collection))->response();
    }
}
