<?php

namespace App\Http\Admin\Insert\NaturalStones\Controllers;

use App\Http\Admin\Insert\StoneGroups\Resources\StoneGroupResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Services\Relationships\NaturalStonesStoneGroupRelationshipService;

class NaturalStonesStoneGroupRelatedController extends Controller
{
    public function __construct(public NaturalStonesStoneGroupRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new StoneGroupResource($model))->response();
    }
}
