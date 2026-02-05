<?php

namespace App\Http\Admin\Insert\NaturalStones\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Services\Relationships\NaturalStoneNaturalStoneGradeRelationshipService;

class NaturalStoneNaturalStoneGradeRelationshipController extends Controller
{
    public function __construct(public NaturalStoneNaturalStoneGradeRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return $model ?  (new ApiEntityIdentifierResource($model))->response() : response()->json()->setStatusCode(204);
    }
}
