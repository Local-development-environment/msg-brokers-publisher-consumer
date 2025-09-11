<?php

namespace App\Http\Admin\Insert\StoneMetrics\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\StoneMetrics\Services\Relationships\StoneMetricInsertRelationshipService;
use Illuminate\Http\JsonResponse;

class StoneMetricInsertRelationshipController extends Controller
{
    public function __construct(public StoneMetricInsertRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
