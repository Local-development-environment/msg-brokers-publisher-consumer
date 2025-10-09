<?php

namespace App\Http\Admin\BeadProperty\BeadBases\Controllers;

use App\Http\Admin\BeadProperty\Beads\Resources\BeadCollection;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Beads\BeadBases\Services\Relationships\BeadBaseBeadsRelationshipService;
use Illuminate\Http\JsonResponse;

class BeadBaseBeadsRelatedController extends Controller
{
    public function __construct(public BeadBaseBeadsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new BeadCollection($collection))->response();
    }
}
