<?php

namespace App\Http\Admin\BeadProperty\BeadBases\Controllers;

use App\Http\Admin\SharedProperty\Clasps\Resources\ClaspCollection;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Beads\BeadBases\Services\Relationships\BeadBasesClaspsRelationshipService;
use Illuminate\Http\JsonResponse;

class BeadBasesClaspsRelatedController extends Controller
{
    public function __construct(public BeadBasesClaspsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new ClaspCollection($collection))->response();
    }
}
