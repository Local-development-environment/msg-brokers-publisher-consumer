<?php

namespace App\Http\Admin\Insert\Inserts\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\Inserts\Services\Relationships\InsertStoneMetricRelationshipService;
use Illuminate\Http\JsonResponse;

class InsertStoneMetricRelationshipController extends Controller
{
    public function __construct(public InsertStoneMetricRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
