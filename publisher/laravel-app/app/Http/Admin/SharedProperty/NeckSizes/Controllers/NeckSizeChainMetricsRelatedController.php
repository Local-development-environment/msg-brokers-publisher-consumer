<?php
declare(strict_types=1);

namespace App\Http\Admin\SharedProperty\NeckSizes\Controllers;

use App\Http\Admin\ChainProperty\ChainMetrics\Resources\ChainMetricCollection;
use App\Http\Controllers\Controller;
use Domain\Shared\JewelleryProperties\NeckSizes\Services\Relationships\NeckSizeChainMetricsRelationshipService;
use Illuminate\Http\JsonResponse;

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
