<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Beads\BeadMetrics\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadMetrics\Services\Relationships\BeadMetricsNeckSizeRelationshipService;

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
