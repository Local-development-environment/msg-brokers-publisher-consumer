<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\InsertMetrics\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\InsertMetrics\Services\Relationships\InsertMetricInsertRelationshipService;
use Illuminate\Http\JsonResponse;

final class InsertMetricInsertRelationshipController extends Controller
{
    public function __construct(public InsertMetricInsertRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
