<?php

namespace App\Http\Admin\Insert\StoneColours\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\StoneColours\Services\Relationships\StoneColourInsertStonesRelationshipService;
use Illuminate\Http\JsonResponse;

class StoneColourInsertStonesRelationshipController extends Controller
{
    public function __construct(public StoneColourInsertStonesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return ApiEntityIdentifierResource::collection($collection)->response();
    }
}
