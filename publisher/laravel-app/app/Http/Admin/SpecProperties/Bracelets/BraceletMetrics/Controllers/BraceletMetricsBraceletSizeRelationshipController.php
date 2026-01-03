<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Bracelets\BraceletMetrics\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\JewelleryProperties\Bracelets\BraceletMetrics\Services\Relationships\BraceletMetricsBraceletSizeRelationshipService;
use Illuminate\Http\JsonResponse;

final class BraceletMetricsBraceletSizeRelationshipController extends Controller
{
    public function __construct(public BraceletMetricsBraceletSizeRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
