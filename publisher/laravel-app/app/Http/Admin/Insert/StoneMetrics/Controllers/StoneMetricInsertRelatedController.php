<?php

namespace App\Http\Admin\Insert\StoneMetrics\Controllers;

use App\Http\Admin\Insert\Inserts\Resources\InsertResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\StoneMetrics\Services\Relationships\StoneMetricInsertRelationshipService;
use Illuminate\Http\JsonResponse;

class StoneMetricInsertRelatedController extends Controller
{
    public function __construct(public StoneMetricInsertRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new InsertResource($model))->response();
    }
}
