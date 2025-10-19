<?php
declare(strict_types=1);

namespace App\Http\Admin\NecklaceProperty\NecklaceMetrics\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\JewelleryProperties\Necklaces\NecklaceMetrics\Services\Relationships\NecklaceMetricsNeckSizeRelationshipService;
use Illuminate\Http\JsonResponse;

final class NecklaceMetricsNeckSizeRelationshipController extends Controller
{
    public function __construct(public NecklaceMetricsNeckSizeRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);
        return (new ApiEntityIdentifierResource($model))->response();
    }
}
