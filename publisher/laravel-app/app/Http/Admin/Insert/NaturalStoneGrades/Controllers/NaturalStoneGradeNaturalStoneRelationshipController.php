<?php

namespace App\Http\Admin\Insert\NaturalStoneGrades\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\GroupGrades\Services\Relationships\GroupGradeNaturalStoneRelationshipService;
use Illuminate\Http\JsonResponse;

class NaturalStoneGradeNaturalStoneRelationshipController extends Controller
{
    public function __construct(public GroupGradeNaturalStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
