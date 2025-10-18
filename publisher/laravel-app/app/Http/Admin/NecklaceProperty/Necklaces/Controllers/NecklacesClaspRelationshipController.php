<?php

namespace App\Http\Admin\NecklaceProperty\Necklaces\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\JewelleryProperties\Necklaces\Necklaces\Services\Relationships\NecklacesClaspRelationshipService;
use Illuminate\Http\JsonResponse;

class NecklacesClaspRelationshipController extends Controller
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
