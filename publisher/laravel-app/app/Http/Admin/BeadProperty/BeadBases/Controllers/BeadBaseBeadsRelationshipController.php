<?php
declare(strict_types=1);

namespace App\Http\Admin\BeadProperty\BeadBases\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\JewelleryProperties\Beads\BeadBases\Services\Relationships\BeadBaseBeadsRelationshipService;
use Illuminate\Http\JsonResponse;

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
