<?php

namespace App\Http\Admin\Insert\OpticalEffects\Controllers;

use App\Http\Admin\Insert\OpticalEffectStones\Resources\OpticalEffectStoneCollection;
use App\Http\Controllers\Controller;
use Domain\Inserts\OpticalEffects\Services\Relationships\OpticalEffectOpticalEffectStonesRelationshipService;
use Illuminate\Http\JsonResponse;

class OpticalEffectOpticalEffectStonesRelatedController extends Controller
{
    public function __construct(public OpticalEffectOpticalEffectStonesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new OpticalEffectStoneCollection($collection))->response();
    }
}
