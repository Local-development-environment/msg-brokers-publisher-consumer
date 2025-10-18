<?php

namespace App\Http\Admin\NecklaceProperty\Necklaces\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\JewelleryProperties\Necklaces\Necklaces\Services\Relationships\NecklaceNecklaceMetricsRelationshipService;
use Illuminate\Http\JsonResponse;

class NecklaceNecklaceMetricsRelationshipController extends Controller
{
    public function __construct(public NecklaceNecklaceMetricsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);
        return ApiEntityIdentifierResource::collection($collection)->response();
    }
}
