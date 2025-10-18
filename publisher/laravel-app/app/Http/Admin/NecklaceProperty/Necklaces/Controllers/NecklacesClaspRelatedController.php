<?php

namespace App\Http\Admin\NecklaceProperty\Necklaces\Controllers;

use App\Http\Admin\SharedProperty\Clasps\Resources\ClaspResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Necklaces\Necklaces\Services\Relationships\NecklacesClaspRelationshipService;
use Illuminate\Http\JsonResponse;

class NecklacesClaspRelatedController extends Controller
{
    public function __construct(public NecklacesClaspRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ClaspResource($model))->response();
    }
}
