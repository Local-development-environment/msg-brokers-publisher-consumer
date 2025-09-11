<?php

namespace App\Http\Admin\Insert\StoneFacets\Controllers;

use App\Http\Admin\Insert\InsertStones\Resources\InsertStoneCollection;
use App\Http\Controllers\Controller;
use Domain\Inserts\StoneFacets\Services\Relationships\StoneFacetInsertStonesRelationshipService;
use Illuminate\Http\JsonResponse;

class StoneFacetInsertStonesRelatedController extends Controller
{
    public function __construct(public StoneFacetInsertStonesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new InsertStoneCollection($collection))->response();
    }
}
