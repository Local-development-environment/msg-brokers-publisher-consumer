<?php

namespace App\Http\Admin\Insert\NaturalStoneGrades\Controllers;

use App\Http\Admin\Insert\StoneGrades\Resources\StoneGradeResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\NaturalStoneGrades\Services\Relationships\NaturalStoneGradesStoneGradeRelationshipService;
use Illuminate\Http\JsonResponse;

class NaturalStoneGradesStoneGradeRelatedController extends Controller
{
    public function __construct(public NaturalStoneGradesStoneGradeRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new StoneGradeResource($model))->response();
    }
}
