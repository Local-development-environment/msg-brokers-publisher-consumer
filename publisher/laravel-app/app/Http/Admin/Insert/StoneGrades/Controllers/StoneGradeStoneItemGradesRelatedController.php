<?php

namespace App\Http\Admin\Insert\StoneGrades\Controllers;

use App\Http\Admin\Insert\NaturalStoneGrades\Resources\StoneItemGradeCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\StoneGrades\Services\Relationships\StoneGradeNaturalStoneGradesRelationshipService;

class StoneGradeStoneItemGradesRelatedController extends Controller
{
    public function __construct(public StoneGradeNaturalStoneGradesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new StoneItemGradeCollection($collection))->response();
    }
}
