<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Beads\BeadMetrics\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\JewelleryProperties\Beads\BeadMetrics\Services\Relationships\BeadMetricsBeadRelationshipService;
use Illuminate\Http\JsonResponse;

final class BeadMetricsBeadRelationshipController extends Controller
{
    public function __construct(public BeadMetricsBeadRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);
        return (new ApiEntityIdentifierResource($model))->response();
    }
}
