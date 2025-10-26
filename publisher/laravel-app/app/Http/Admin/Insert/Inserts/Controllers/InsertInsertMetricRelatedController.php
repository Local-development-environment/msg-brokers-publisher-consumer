<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\Inserts\Controllers;

use App\Http\Admin\Insert\InsertMetrics\Resources\InsertMetricResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\Inserts\Services\Relationships\InsertInsertMetricRelationshipService;
use Illuminate\Http\JsonResponse;

final class InsertInsertMetricRelatedController extends Controller
{
    public function __construct(public InsertInsertMetricRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new InsertMetricResource($model))->response();
    }
}
