<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Beads\BeadMetrics\Controllers;

use App\Http\Admin\SpecProperties\Beads\Bead\Resources\BeadResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Beads\BeadMetrics\Services\Relationships\BeadMetricsBeadRelationshipService;
use Illuminate\Http\JsonResponse;

final class BeadMetricsBeadRelatedController extends Controller
{
    public function __construct(public BeadMetricsBeadRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new BeadResource($model))->response();
    }
}
