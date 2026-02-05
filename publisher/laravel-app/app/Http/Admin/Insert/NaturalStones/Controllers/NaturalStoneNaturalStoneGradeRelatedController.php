<?php

namespace App\Http\Admin\Insert\NaturalStones\Controllers;

use App\Http\Admin\Insert\NaturalStoneGrades\Resources\NaturalStoneGradeResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Services\Relationships\NaturalStoneNaturalStoneGradeRelationshipService;

class NaturalStoneNaturalStoneGradeRelatedController extends Controller
{
    public function __construct(public NaturalStoneNaturalStoneGradeRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return $model ? (new NaturalStoneGradeResource($model))->response() : response()->json()->setStatusCode(204);
    }
}
