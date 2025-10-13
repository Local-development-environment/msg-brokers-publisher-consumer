<?php
declare(strict_types=1);

namespace App\Http\Admin\BeadProperty\BeadSizes\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\JewelleryProperties\Beads\BeadSizes\Services\Relationships\BeadSizeBeadMetricsRelationshipService;
use Illuminate\Http\JsonResponse;

final class BeadSizeBeadMetricsRelationshipController extends Controller
{
    public function __construct(public BeadSizeBeadMetricsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);
        return ApiEntityIdentifierResource::collection($collection)->response();
    }
}
