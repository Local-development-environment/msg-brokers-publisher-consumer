<?php

namespace App\Http\Admin\Insert\Inserts\Controllers;

use App\Http\Admin\Insert\InsertStones\Resources\InsertStoneResource;
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

        return (new InsertStoneResource($model))->response();
    }
}
