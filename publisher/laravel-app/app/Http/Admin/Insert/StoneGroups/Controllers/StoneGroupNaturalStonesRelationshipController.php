<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\StoneGroups\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\StoneGroups\Services\Relationships\StoneGroupNaturalStonesRelationshipService;

final class StoneGroupNaturalStonesRelationshipController extends Controller
{
    public function __construct(public StoneGroupNaturalStonesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return ApiEntityIdentifierResource::collection($collection)->response();
    }
}
