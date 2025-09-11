<?php

namespace App\Http\Admin\Insert\InsertStones\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\InsertStones\Services\Relationships\InsertStonesStoneFacetRelationshipService;
use Illuminate\Http\JsonResponse;

class InsertStonesStoneFacetRelationshipController extends Controller
{
    public function __construct(public InsertStonesStoneFacetRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
