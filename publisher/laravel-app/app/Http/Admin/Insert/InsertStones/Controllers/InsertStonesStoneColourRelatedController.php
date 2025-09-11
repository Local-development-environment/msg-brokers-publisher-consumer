<?php

namespace App\Http\Admin\Insert\InsertStones\Controllers;

use App\Http\Admin\Insert\StoneColours\Resources\StoneColourResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\InsertStones\Models\InsertStone;
use Domain\Inserts\InsertStones\Services\Relationships\InsertStonesStoneColourRelationshipService;
use Domain\Inserts\StoneColours\Models\StoneColour;
use Illuminate\Http\JsonResponse;

class InsertStonesStoneColourRelatedController extends Controller
{
    public function __construct(public InsertStonesStoneColourRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new StoneColourResource($model))->response();
    }
}
