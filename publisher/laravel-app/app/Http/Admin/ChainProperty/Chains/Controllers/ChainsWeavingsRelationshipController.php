<?php
declare(strict_types=1);

namespace App\Http\Admin\ChainProperty\Chains\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\JewelleryProperties\Chains\Chains\Services\Relationships\ChainsWeavingsRelationshipService;
use Illuminate\Http\JsonResponse;

final class ChainsWeavingsRelationshipController extends Controller
{
    public function __construct(public ChainsWeavingsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);
        return ApiEntityIdentifierResource::collection($collection)->response();
    }
}
