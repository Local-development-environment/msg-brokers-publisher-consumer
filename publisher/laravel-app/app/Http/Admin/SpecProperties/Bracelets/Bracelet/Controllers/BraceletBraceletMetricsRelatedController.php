<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Bracelets\Bracelet\Controllers;

use App\Http\Admin\SpecProperties\Bracelets\BraceletMetrics\Resources\BraceletMetricCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\Bracelets\Services\Relationships\BraceletBraceletMetricsRelationshipService;

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
