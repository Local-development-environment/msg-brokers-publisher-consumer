<?php

namespace App\Http\Admin\Insert\Stones\Controllers;

use App\Http\Admin\Insert\GrownStones\Resources\GrownStoneResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\Stones\Services\Relationships\StoneGrownStoneRelationshipService;
use Illuminate\Http\JsonResponse;

class StoneGrownStoneRelatedController extends Controller
{
    public function __construct(public StoneGrownStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new GrownStoneResource($model))->response();
    }
}
