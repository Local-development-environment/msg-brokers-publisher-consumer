<?php

namespace App\Http\Admin\Insert\Stones\Controllers;

use App\Http\Admin\Insert\StoneTypeOrigins\Resources\StoneTypeOriginResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\Stones\Services\Relationships\StonesTypeOriginStoneRelationshipService;
use Illuminate\Http\JsonResponse;

class StonesTypeOriginStoneRelatedController extends Controller
{
    public function __construct(public StonesTypeOriginStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new StoneTypeOriginResource($model))->response();
    }
}
