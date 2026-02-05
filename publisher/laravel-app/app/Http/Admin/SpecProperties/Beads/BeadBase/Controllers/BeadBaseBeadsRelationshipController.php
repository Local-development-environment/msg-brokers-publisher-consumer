<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Beads\BeadBase\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\BeadBases\Services\Relationships\BeadBaseBeadsRelationshipService;

final class BeadBaseBeadsRelationshipController extends Controller
{
    public function __construct(public BeadBaseBeadsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);
        return ApiEntityIdentifierResource::collection($collection)->response();
    }
}
