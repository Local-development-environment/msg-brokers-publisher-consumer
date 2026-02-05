<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Necklaces\Necklace\Controllers;

use App\Http\Admin\SpecProperties\Necklaces\NecklaceMetric\Resources\NecklaceMetricCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Necklaces\Necklaces\Services\Relationships\NecklaceNecklaceMetricsRelationshipService;

final class NecklaceNecklaceMetricsRelatedController extends Controller
{
    public function __construct(public NecklaceNecklaceMetricsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new NecklaceMetricCollection($collection))->response();
    }
}
