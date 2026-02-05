<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Bracelets\BraceletMetrics\Controllers;

use App\Http\Admin\SpecProperties\Bracelets\BraceletSizes\Resources\BraceletSizeResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Bracelets\BraceletMetrics\Services\Relationships\BraceletMetricsBraceletSizeRelationshipService;

final class BraceletMetricsBraceletSizeRelatedController extends Controller
{
    public function __construct(public BraceletMetricsBraceletSizeRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new BraceletSizeResource($model))->response();
    }
}
