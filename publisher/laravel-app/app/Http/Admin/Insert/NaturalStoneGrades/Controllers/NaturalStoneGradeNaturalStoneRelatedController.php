<?php

namespace App\Http\Admin\Insert\NaturalStoneGrades\Controllers;

use App\Http\Admin\Insert\NaturalStones\Resources\NaturalStoneResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\GroupGrades\Services\Relationships\GroupGradeNaturalStoneRelationshipService;
use Illuminate\Http\JsonResponse;

class NaturalStoneGradeNaturalStoneRelatedController extends Controller
{
    public function __construct(public GroupGradeNaturalStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new NaturalStoneResource($model))->response();
    }
}
