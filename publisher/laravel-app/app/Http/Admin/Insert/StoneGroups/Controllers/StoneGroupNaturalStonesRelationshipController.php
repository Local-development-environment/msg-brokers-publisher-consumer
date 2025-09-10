<?php

namespace App\Http\Admin\Insert\StoneGroups\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\StoneGroups\Services\Relationships\StoneGroupNaturalStonesRelationshipService;
use Illuminate\Http\JsonResponse;

class StoneGroupNaturalStonesRelationshipController extends Controller
{
    public function __construct(public StoneGroupNaturalStonesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return ApiEntityIdentifierResource::collection($collection)->response();
    }
}
