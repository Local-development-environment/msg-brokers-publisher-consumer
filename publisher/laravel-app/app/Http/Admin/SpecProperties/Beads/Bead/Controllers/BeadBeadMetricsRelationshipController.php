<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Beads\Bead\Controllers;

use App\Http\Admin\SpecProperties\Beads\Bead\Requests\BeadBeadMetricsStoreRelationshipRequest;
use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Services\Relationships\BeadBeadMetricsRelationshipService;

final class BeadBeadMetricsRelationshipController extends Controller
{
    public function __construct(public BeadBeadMetricsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return ApiEntityIdentifierResource::collection($collection)->response();
    }

    public function store(BeadBeadMetricsStoreRelationshipRequest $request, array $data): JsonResponse
    {
        $data = $request->all();

        $this->service->store($data);

        return response()->json(null, 204);
    }
}
