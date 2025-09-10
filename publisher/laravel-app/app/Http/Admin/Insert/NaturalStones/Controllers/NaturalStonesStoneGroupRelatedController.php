<?php

namespace App\Http\Admin\Insert\NaturalStones\Controllers;

use App\Http\Admin\Insert\StoneGroups\Resources\StoneGroupResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\NaturalStones\Services\Relationships\NaturalStonesStoneGroupRelationshipService;
use Illuminate\Http\JsonResponse;

class NaturalStonesStoneGroupRelatedController extends Controller
{
    public function __construct(public NaturalStonesStoneGroupRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new StoneGroupResource($model))->response();
    }
}
