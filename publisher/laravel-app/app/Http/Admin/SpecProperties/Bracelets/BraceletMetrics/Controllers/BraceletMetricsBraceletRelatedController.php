<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Bracelets\BraceletMetrics\Controllers;

use App\Http\Admin\SpecProperties\Bracelets\Bracelet\Resources\BraceletResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Bracelets\BraceletMetrics\Services\Relationships\BraceletMetricsBraceletRelationshipService;
use Illuminate\Http\JsonResponse;

final class BraceletMetricsBraceletRelatedController extends Controller
{
    public function __construct(public BraceletMetricsBraceletRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new BraceletResource($model))->response();
    }
}
