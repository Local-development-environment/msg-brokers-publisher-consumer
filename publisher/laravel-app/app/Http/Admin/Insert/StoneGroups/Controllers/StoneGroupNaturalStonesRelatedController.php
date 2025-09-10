<?php

namespace App\Http\Admin\Insert\StoneGroups\Controllers;

use App\Http\Admin\Insert\NaturalStones\Resources\NaturalStoneCollection;
use App\Http\Controllers\Controller;
use Domain\Inserts\StoneGroups\Services\Relationships\StoneGroupNaturalStonesRelationshipService;
use Illuminate\Http\JsonResponse;

class StoneGroupNaturalStonesRelatedController extends Controller
{
    public function __construct(public StoneGroupNaturalStonesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new NaturalStoneCollection($collection))->response();
    }
}
