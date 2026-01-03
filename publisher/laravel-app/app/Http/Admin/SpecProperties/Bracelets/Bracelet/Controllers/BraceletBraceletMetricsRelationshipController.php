<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Bracelets\Bracelet\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\JewelleryProperties\Bracelets\Bracelets\Services\Relationships\BraceletBraceletMetricsRelationshipService;
use Illuminate\Http\JsonResponse;

final class BraceletBraceletMetricsRelationshipController extends Controller
{
    public function __construct(public BraceletBraceletMetricsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return ApiEntityIdentifierResource::collection($collection)->response();
    }

//    public function store(BraceletBraceletMetricsStoreRelationshipRequest $request, array $data): JsonResponse
//    {
//        $data = $request->all();
//
//        $this->service->store($data);
//
//        return response()->json(null, 204);
//    }
}
