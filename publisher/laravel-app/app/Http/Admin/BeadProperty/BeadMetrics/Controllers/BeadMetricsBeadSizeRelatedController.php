<?php
declare(strict_types=1);

namespace App\Http\Admin\BeadProperty\BeadMetrics\Controllers;

use App\Http\Admin\SharedProperty\NeckSizes\Resources\NeckSizeResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Beads\BeadMetrics\Services\Relationships\BeadMetricsNeckSizeRelationshipService;
use Illuminate\Http\JsonResponse;

final class BeadMetricsBeadSizeRelatedController extends Controller
{
    public function __construct(public BeadMetricsNeckSizeRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new NeckSizeResource($model))->response();
    }
}
