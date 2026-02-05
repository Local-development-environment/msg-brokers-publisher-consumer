<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\Facets\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\Facets\Services\Relationships\FacetInsertStonesRelationshipService;

final class FacetInsertStonesRelationshipController extends Controller
{
    public function __construct(public FacetInsertStonesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return ApiEntityIdentifierResource::collection($collection)->response();
    }
}
