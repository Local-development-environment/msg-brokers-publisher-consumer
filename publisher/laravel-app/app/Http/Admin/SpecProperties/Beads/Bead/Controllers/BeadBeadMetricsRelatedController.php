<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Beads\Bead\Controllers;

use App\Http\Admin\BeadProperty\BeadMetrics\Resources\BeadMetricCollection;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Beads\Beads\Services\Relationships\BeadBeadMetricsRelationshipService;
use Illuminate\Http\JsonResponse;

final class BeadBeadMetricsRelatedController extends Controller
{
    public function __construct(public BeadBeadMetricsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new BeadMetricCollection($collection))->response();
    }
}
