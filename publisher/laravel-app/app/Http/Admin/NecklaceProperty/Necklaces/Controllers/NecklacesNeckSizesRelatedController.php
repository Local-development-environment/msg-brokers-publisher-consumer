<?php

namespace App\Http\Admin\NecklaceProperty\Necklaces\Controllers;

use App\Http\Admin\SharedProperty\NeckSizes\Resources\NeckSizeCollection;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Necklaces\Necklaces\Services\Relationships\NecklacesNeckSizesRelationshipService;
use Illuminate\Http\JsonResponse;

class NecklacesNeckSizesRelatedController extends Controller
{
    public function __construct(public NecklacesNeckSizesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new NeckSizeCollection($collection))->response();
    }
}
