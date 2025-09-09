<?php

namespace App\Http\Admin\Insert\GrownStones\Controllers;

use App\Http\Admin\Insert\GrownStones\Resources\GrownStoneResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\GrownStones\Services\Relationships\GrownStonesStoneFamilyRelationshipService;
use Illuminate\Http\JsonResponse;

class GrownStonesStoneFamilyRelatedController extends Controller
{
    public function __construct(public GrownStonesStoneFamilyRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new GrownStoneResource($model))->response();
    }
}
