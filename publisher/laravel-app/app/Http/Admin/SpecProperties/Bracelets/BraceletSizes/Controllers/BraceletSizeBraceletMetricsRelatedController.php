<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Bracelets\BraceletSizes\Controllers;

use App\Http\Admin\SpecProperties\Bracelets\BraceletMetrics\Resources\BraceletMetricCollection;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Bracelets\BraceletSizes\Services\Relationships\BraceletSizeBraceletMetricsRelationshipService;
use Illuminate\Http\JsonResponse;

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
