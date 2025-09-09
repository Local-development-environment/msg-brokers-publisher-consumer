<?php

namespace App\Http\Admin\Insert\StoneGrades\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\StoneGrades\Services\Relationships\StoneGradeNaturalStoneGradesRelationshipService;
use Illuminate\Http\JsonResponse;

class StoneGradeNaturalStoneGradesRelationshipController extends Controller
{
    public function __construct(public StoneGradeNaturalStoneGradesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return ApiEntityIdentifierResource::collection($collection)->response();
    }
}
