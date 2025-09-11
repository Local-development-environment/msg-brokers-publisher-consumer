<?php

namespace App\Http\Admin\Insert\StoneFacets\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\StoneFacets\Services\Relationships\StoneFacetInsertStonesRelationshipService;
use Illuminate\Http\JsonResponse;

class StoneFacetInsertStonesRelationshipController extends Controller
{
    public function __construct(public StoneFacetInsertStonesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return ApiEntityIdentifierResource::collection($collection)->response();
    }
}
