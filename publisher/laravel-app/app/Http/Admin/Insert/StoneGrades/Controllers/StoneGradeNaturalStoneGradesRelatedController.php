<?php

namespace App\Http\Admin\Insert\StoneGrades\Controllers;

use App\Http\Admin\Insert\NaturalStoneGrades\Resources\NaturalStoneGradeCollection;
use App\Http\Controllers\Controller;
use Domain\Inserts\StoneGrades\Services\Relationships\StoneGradeNaturalStoneGradesRelationshipService;
use Illuminate\Http\JsonResponse;

class StoneGradeNaturalStoneGradesRelatedController extends Controller
{
    public function __construct(public StoneGradeNaturalStoneGradesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new NaturalStoneGradeCollection($collection))->response();
    }
}
