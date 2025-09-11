<?php

namespace App\Http\Admin\Insert\InsertStones\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\InsertStones\Services\Relationships\InsertStonesStoneColourRelationshipService;
use Illuminate\Http\JsonResponse;

class InsertStonesStoneColourRelationshipController extends Controller
{
    public function __construct(public InsertStonesStoneColourRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
