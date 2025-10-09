<?php

namespace App\Http\Admin\BeadProperty\BeadBases\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\JewelleryProperties\Beads\BeadBases\Services\Relationships\BeadBasesClaspsRelationshipService;
use Illuminate\Http\JsonResponse;

class BeadBasesClaspsRelationshipController extends Controller
{
    public function __construct(public BeadBasesClaspsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);
        return ApiEntityIdentifierResource::collection($collection)->response();
    }

//    public function update(BeadBaseBeadsUpdateRelationshipRequest $request, int $id): JsonResponse
//    {
//        $data = $request->all();
//        $this->service->update($data, $id);
//
//        return response()->json(null, 204);
//    }
}
