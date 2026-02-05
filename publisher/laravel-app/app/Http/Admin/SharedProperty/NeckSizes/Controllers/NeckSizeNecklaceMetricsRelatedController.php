<?php
declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\NeckSizes\Controllers;

use App\Http\Admin\SpecProperties\Necklaces\NecklaceMetric\Resources\NecklaceMetricCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Services\Relationships\NeckSizeNecklaceMetricsRelationshipService;

final class NeckSizeNecklaceMetricsRelatedController extends Controller
{
    public function __construct(public NeckSizeNecklaceMetricsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new NecklaceMetricCollection($collection))->response();
    }
}
