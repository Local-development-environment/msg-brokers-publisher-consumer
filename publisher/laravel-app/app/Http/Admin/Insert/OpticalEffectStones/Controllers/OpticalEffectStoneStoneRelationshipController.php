<?php

namespace App\Http\Admin\Insert\OpticalEffectStones\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\OpticalEffectStones\Services\Relationships\OpticalEffectStoneStoneRelationshipService;
use Illuminate\Http\JsonResponse;

class OpticalEffectStoneStoneRelationshipController extends Controller
{
    public function __construct(public OpticalEffectStoneStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
