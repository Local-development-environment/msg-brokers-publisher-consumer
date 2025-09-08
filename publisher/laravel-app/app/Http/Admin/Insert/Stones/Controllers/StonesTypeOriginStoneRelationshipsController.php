<?php

namespace App\Http\Admin\Insert\Stones\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\Stones\Services\Relationships\StonesTypeOriginStoneRelationshipService;
use Illuminate\Http\JsonResponse;

class StonesTypeOriginStoneRelationshipsController extends Controller
{
    public function __construct(public StonesTypeOriginStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
