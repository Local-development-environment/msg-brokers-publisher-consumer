<?php

namespace App\Http\Admin\Insert\Inserts\Controllers;

use App\Http\Admin\Insert\StoneMetrics\Resources\StoneMetricResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\Inserts\Services\Relationships\InsertStoneMetricRelationshipService;
use Illuminate\Http\JsonResponse;

class InsertStoneMetricRelatedController extends Controller
{
    public function __construct(public InsertStoneMetricRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new StoneMetricResource($model))->response();
    }
}
