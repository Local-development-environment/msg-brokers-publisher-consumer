<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Bracelets\Bracelet\Controllers;

use App\Http\Admin\SpecProperties\Bracelets\BraceletMetrics\Resources\BraceletMetricCollection;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Bracelets\Bracelets\Services\Relationships\BraceletBraceletMetricsRelationshipService;
use Illuminate\Http\JsonResponse;

final class BraceletBraceletMetricsRelatedController extends Controller
{
    public function __construct(public BraceletBraceletMetricsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new BraceletMetricCollection($collection))->response();
    }
}
