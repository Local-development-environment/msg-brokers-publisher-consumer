<?php

namespace App\Http\Admin\Insert\NaturalStoneGrades\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\NaturalStoneGrades\Services\Relationships\NaturalStoneGradesStoneGradeRelationshipService;
use Illuminate\Http\JsonResponse;

class NaturalStoneGradesStoneGradeRelationshipController extends Controller
{
    public function __construct(public NaturalStoneGradesStoneGradeRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
