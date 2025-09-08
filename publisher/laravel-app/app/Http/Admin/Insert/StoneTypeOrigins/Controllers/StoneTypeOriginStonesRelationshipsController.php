<?php

namespace App\Http\Admin\Insert\StoneTypeOrigins\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\TypeOrigins\Services\Relationships\StoneTypeOriginStonesRelationshipService;
use Illuminate\Http\JsonResponse;

class StoneTypeOriginStonesRelationshipsController extends Controller
{
    public function __construct(public StoneTypeOriginStonesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return ApiEntityIdentifierResource::collection($collection)->response();
    }

//    public function update(StoneTypeOriginStonesUpdateRelationsRequest $request, int $id): JsonResponse
//    {
//        $data = $request->all();
//        $this->service->update($data, $id);
//
//        return response()->json(null, 204);
//    }
}
