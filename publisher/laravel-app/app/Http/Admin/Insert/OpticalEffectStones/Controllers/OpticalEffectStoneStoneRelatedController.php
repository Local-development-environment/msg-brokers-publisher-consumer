<?php

namespace App\Http\Admin\Insert\OpticalEffectStones\Controllers;

use App\Http\Admin\Insert\Stones\Resources\StoneResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\OpticalEffectStones\Services\Relationships\OpticalEffectStoneStoneRelationshipService;
use Illuminate\Http\JsonResponse;

class OpticalEffectStoneStoneRelatedController extends Controller
{
    public function __construct(public OpticalEffectStoneStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new StoneResource($model))->response();
    }
}
