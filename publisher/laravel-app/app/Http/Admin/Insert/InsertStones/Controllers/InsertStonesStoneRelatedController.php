<?php

namespace App\Http\Admin\Insert\InsertStones\Controllers;

use App\Http\Admin\Insert\Stones\Resources\StoneResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\InsertStones\Services\Relationships\InsertStonesStoneRelationshipService;
use Illuminate\Http\JsonResponse;

class InsertStonesStoneRelatedController extends Controller
{
    public function __construct(public InsertStonesStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new StoneResource($model))->response();
    }
}
