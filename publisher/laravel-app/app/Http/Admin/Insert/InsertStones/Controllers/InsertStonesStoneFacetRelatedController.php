<?php

namespace App\Http\Admin\Insert\InsertStones\Controllers;

use App\Http\Admin\Insert\StoneFacets\Resources\StoneFacetResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\InsertStones\Services\Relationships\InsertStonesStoneFacetRelationshipService;
use Illuminate\Http\JsonResponse;

class InsertStonesStoneFacetRelatedController extends Controller
{
    public function __construct(public InsertStonesStoneFacetRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new StoneFacetResource($model))->response();
    }
}
