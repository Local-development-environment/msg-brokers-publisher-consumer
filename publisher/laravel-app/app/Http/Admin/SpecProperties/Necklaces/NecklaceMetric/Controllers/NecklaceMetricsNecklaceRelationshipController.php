<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Necklaces\NecklaceMetric\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\NecklaceMetrics\Services\Relationships\NecklaceMetricsNecklaceRelationshipService;

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
