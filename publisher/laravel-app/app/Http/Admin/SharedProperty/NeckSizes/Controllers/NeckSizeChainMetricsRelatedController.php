<?php
declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\NeckSizes\Controllers;

use App\Http\Admin\SpecProperties\Chains\ChainMetrics\Resources\ChainMetricCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Shared\NeckSizes\Services\Relationships\NeckSizeChainMetricsRelationshipService;

final class NeckSizeChainMetricsRelatedController extends Controller
{
    public function __construct(public NeckSizeChainMetricsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new ChainMetricCollection($collection))->response();
    }
}
