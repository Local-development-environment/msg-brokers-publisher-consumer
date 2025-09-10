<?php

namespace App\Http\Admin\Insert\NaturalStones\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\NaturalStones\Services\Relationships\NaturalStonesStoneGroupRelationshipService;
use Illuminate\Http\JsonResponse;

class NaturalStonesStoneGroupRelationshipController extends Controller
{
    public function __construct(public NaturalStonesStoneGroupRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
