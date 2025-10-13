<?php
declare(strict_types=1);

namespace App\Http\Admin\BeadProperty\BeadSizes\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\JewelleryProperties\Beads\BeadSizes\Services\Relationships\BeadSizesBeadsRelationshipService;
use Illuminate\Http\JsonResponse;

final class BeadSizesBeadsRelationshipController extends Controller
{
    public function __construct(public BeadSizesBeadsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);
        return ApiEntityIdentifierResource::collection($collection)->response();
    }
}
