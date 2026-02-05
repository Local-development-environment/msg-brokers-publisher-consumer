<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\StoneExteriors\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\StoneExteriors\Services\Relationships\StoneExteriorInsertsRelationshipService;

final class StoneExteriorInsertsRelationshipController extends Controller
{
    public function __construct(public StoneExteriorInsertsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return ApiEntityIdentifierResource::collection($collection)->response();
    }
}
