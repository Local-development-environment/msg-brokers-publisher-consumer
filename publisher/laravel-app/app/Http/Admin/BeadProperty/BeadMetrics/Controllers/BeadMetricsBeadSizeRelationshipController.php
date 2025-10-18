<?php
declare(strict_types=1);

namespace App\Http\Admin\BeadProperty\BeadMetrics\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\JewelleryProperties\Beads\BeadMetrics\Services\Relationships\BeadMetricsNeckSizeRelationshipService;
use Illuminate\Http\JsonResponse;

final class BeadMetricsBeadSizeRelationshipController extends Controller
{
    public function __construct(public BeadMetricsNeckSizeRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);
        return (new ApiEntityIdentifierResource($model))->response();
    }
}
