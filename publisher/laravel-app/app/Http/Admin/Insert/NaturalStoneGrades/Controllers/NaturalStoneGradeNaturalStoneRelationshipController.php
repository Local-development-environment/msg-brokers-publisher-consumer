<?php

namespace App\Http\Admin\Insert\NaturalStoneGrades\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\NaturalStoneGrades\Services\Relationships\NaturalStoneGradeNaturalStoneRelationshipService;
use Illuminate\Http\JsonResponse;

class NaturalStoneGradeNaturalStoneRelationshipController extends Controller
{
    public function __construct(public NaturalStoneGradeNaturalStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
