<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Chains\Chain\Controllers;

use App\Http\Admin\SpecProperties\Chains\ChainMetrics\Resources\ChainMetricCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Services\Relationships\ChainChainMetricsRelationshipService;

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
