<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Chains\Chain\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Chains\Chains\Services\Relationships\ChainChainMetricsRelationshipService;

final class ChainChainMetricsRelationshipController extends Controller
{
    public function __construct(public ChainChainMetricsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return ApiEntityIdentifierResource::collection($collection)->response();
    }
}
