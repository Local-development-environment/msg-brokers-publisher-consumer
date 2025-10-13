<?php
declare(strict_types=1);

namespace App\Http\Admin\BeadProperty\Beads\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\JewelleryProperties\Beads\Beads\Services\Relationships\BeadsBeadSizesRelationshipService;
use Illuminate\Http\JsonResponse;

final class BeadsBeadSizesRelationshipController extends Controller
{
    public function __construct(public BeadsBeadSizesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);
        return ApiEntityIdentifierResource::collection($collection)->response();
    }
}
