<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Necklaces\Necklace\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\JewelleryProperties\Necklaces\Necklaces\Services\Relationships\NecklacesClaspRelationshipService;
use Illuminate\Http\JsonResponse;

final class NecklacesClaspRelationshipController extends Controller
{
    public function __construct(public NecklacesClaspRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);
        return (new ApiEntityIdentifierResource($model))->response();
    }
}
