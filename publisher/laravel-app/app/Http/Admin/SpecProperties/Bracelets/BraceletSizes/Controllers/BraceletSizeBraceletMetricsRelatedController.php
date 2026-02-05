<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Bracelets\BraceletSizes\Controllers;

use App\Http\Admin\SpecProperties\Bracelets\BraceletMetrics\Resources\BraceletMetricCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletSizes\Services\Relationships\BraceletSizeBraceletMetricsRelationshipService;

final class BraceletSizeBraceletMetricsRelatedController extends Controller
{
    public function __construct(public BraceletSizeBraceletMetricsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new BraceletMetricCollection($collection))->response();
    }
}
