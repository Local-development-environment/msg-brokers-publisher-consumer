<?php

namespace App\Http\Admin\Insert\InsertExteriors\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\InsertExteriors\Services\Relationships\InsertExteriorsStoneRelationshipService;
use Illuminate\Http\JsonResponse;

final class InsertExteriorsStoneRelationshipController extends Controller
{
    public function __construct(public InsertExteriorsStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
