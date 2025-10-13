<?php
declare(strict_types=1);

namespace App\Http\Admin\BeadProperty\BeadMetrics\Controllers;

use App\Http\Admin\BeadProperty\BeadSizes\Resources\BeadSizeResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Beads\BeadMetrics\Services\Relationships\BeadMetricsBeadSizeRelationshipService;
use Illuminate\Http\JsonResponse;

final class BeadMetricsBeadSizeRelatedController extends Controller
{
    public function __construct(public BeadMetricsBeadSizeRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new BeadSizeResource($model))->response();
    }
}
