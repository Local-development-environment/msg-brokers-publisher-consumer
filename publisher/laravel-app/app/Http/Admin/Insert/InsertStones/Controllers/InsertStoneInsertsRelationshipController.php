<?php

namespace App\Http\Admin\Insert\InsertStones\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\InsertStones\Services\Relationships\InsertStoneInsertsRelationshipService;
use Illuminate\Http\JsonResponse;

class InsertStoneInsertsRelationshipController extends Controller
{
    public function __construct(public InsertStoneInsertsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return ApiEntityIdentifierResource::collection($collection)->response();
    }
}
