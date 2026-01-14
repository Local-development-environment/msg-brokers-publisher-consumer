<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Necklaces\NecklaceMetric\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Services\Relationships\NecklaceMetricsNecklaceRelationshipService;
use Illuminate\Http\JsonResponse;

final class NecklaceMetricsNecklaceRelationshipController extends Controller
{
    public function __construct(public NecklaceMetricsNecklaceRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);
        return (new ApiEntityIdentifierResource($model))->response();
    }
}
