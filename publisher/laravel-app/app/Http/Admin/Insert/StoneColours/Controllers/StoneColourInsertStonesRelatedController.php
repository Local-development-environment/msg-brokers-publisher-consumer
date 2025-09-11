<?php

namespace App\Http\Admin\Insert\StoneColours\Controllers;

use App\Http\Admin\Insert\InsertStones\Resources\InsertStoneCollection;
use App\Http\Controllers\Controller;
use Domain\Inserts\StoneColours\Services\Relationships\StoneColourInsertStonesRelationshipService;
use Illuminate\Http\JsonResponse;

class StoneColourInsertStonesRelatedController extends Controller
{
    public function __construct(public StoneColourInsertStonesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new InsertStoneCollection($collection))->response();
    }
}
