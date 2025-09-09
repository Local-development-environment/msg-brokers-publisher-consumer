<?php

namespace App\Http\Admin\Insert\NaturalStoneGrades\Controllers;

use App\Http\Admin\Insert\NaturalStones\Resources\NaturalStoneResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\NaturalStoneGrades\Services\Relationships\NaturalStoneGradeNaturalStoneRelationshipService;
use Illuminate\Http\JsonResponse;

class NaturalStoneGradeNaturalStoneRelatedController extends Controller
{
    public function __construct(public NaturalStoneGradeNaturalStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new NaturalStoneResource($model))->response();
    }
}
