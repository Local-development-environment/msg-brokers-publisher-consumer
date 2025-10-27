<?php

namespace App\Http\Admin\Insert\Inserts\Controllers;

use App\Http\Admin\Insert\InsertExteriors\Resources\InsertExteriorResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\Inserts\Services\Relationships\InsertsInsertStoneRelationshipService;
use Illuminate\Http\JsonResponse;

class InsertsInsertStoneRelatedController extends Controller
{
    public function __construct(public InsertsInsertStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new InsertExteriorResource($model))->response();
    }
}
