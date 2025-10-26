<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\Inserts\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\Inserts\Services\Relationships\InsertInsertMetricRelationshipService;
use Illuminate\Http\JsonResponse;

final class InsertInsertMetricRelationshipController extends Controller
{
    public function __construct(public InsertInsertMetricRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
