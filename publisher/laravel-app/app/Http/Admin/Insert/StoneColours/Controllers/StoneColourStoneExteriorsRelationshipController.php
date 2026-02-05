<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\StoneColours\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\StoneColours\Services\Relationships\StoneColourStoneExteriorsRelationshipService;

final class StoneColourStoneExteriorsRelationshipController extends Controller
{
    public function __construct(public StoneColourStoneExteriorsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return ApiEntityIdentifierResource::collection($collection)->response();
    }
}
