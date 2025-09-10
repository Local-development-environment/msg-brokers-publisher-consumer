<?php

namespace App\Http\Admin\Insert\NaturalStones\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\NaturalStones\Services\Relationships\NaturalStonesStoneFamilyRelationshipService;
use Illuminate\Http\JsonResponse;

class NaturalStonesStoneFamilyRelationshipController extends Controller
{
    public function __construct(public NaturalStonesStoneFamilyRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
