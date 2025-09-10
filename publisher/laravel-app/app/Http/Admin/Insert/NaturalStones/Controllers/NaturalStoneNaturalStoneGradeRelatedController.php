<?php

namespace App\Http\Admin\Insert\NaturalStones\Controllers;

use App\Http\Admin\Insert\NaturalStoneGrades\Resources\NaturalStoneGradeResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\NaturalStones\Services\Relationships\NaturalStoneNaturalStoneGradeRelationshipService;
use Illuminate\Http\JsonResponse;

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
