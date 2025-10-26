<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\InsertMetrics\Controllers;

use App\Http\Admin\Insert\Inserts\Resources\InsertResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\InsertMetrics\Services\Relationships\InsertMetricInsertRelationshipService;
use Illuminate\Http\JsonResponse;

final class InsertMetricInsertRelatedController extends Controller
{
    public function __construct(public InsertMetricInsertRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new InsertResource($model))->response();
    }
}
