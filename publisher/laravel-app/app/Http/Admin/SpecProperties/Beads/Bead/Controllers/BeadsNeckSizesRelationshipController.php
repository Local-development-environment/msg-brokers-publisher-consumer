<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Beads\Bead\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\JewelleryItems\JewellerySpec\Beads\Beads\Services\Relationships\BeadsNeckSizesRelationshipService;

final class BeadsNeckSizesRelationshipController extends Controller
{
    public function __construct(public BeadsNeckSizesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);
        return ApiEntityIdentifierResource::collection($collection)->response();
    }
}
