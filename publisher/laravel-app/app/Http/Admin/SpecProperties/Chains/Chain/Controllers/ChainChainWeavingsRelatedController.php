<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Chains\Chain\Controllers;

use App\Http\Admin\SpecProperties\Chains\ChainMetrics\Resources\ChainMetricCollection;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Chains\Chains\Services\Relationships\ChainChainMetricsRelationshipService;
use Illuminate\Http\JsonResponse;

final class ChainChainWeavingsRelatedController extends Controller
{
    public function __construct(public ChainChainMetricsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new ChainMetricCollection($collection))->response();
    }
}
