<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Necklaces\Necklace\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\JewelleryProperties\Necklaces\Necklaces\Services\Relationships\NecklacesNeckSizesRelationshipService;
use Illuminate\Http\JsonResponse;

final class NecklacesNeckSizesRelationshipController extends Controller
{
    public function __construct(public NecklacesNeckSizesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);
        return ApiEntityIdentifierResource::collection($collection)->response();
    }
}
