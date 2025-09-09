<?php

namespace App\Http\Admin\Insert\StoneFamilies\Controllers;

use App\Http\Admin\Insert\GrownStones\Resources\GrownStoneCollection;
use App\Http\Controllers\Controller;
use Domain\Inserts\StoneFamilies\Services\Relationships\StoneFamilyGrownStonesRelationshipService;
use Illuminate\Http\JsonResponse;

class StoneFamilyGrownStonesRelatedController extends Controller
{
    public function __construct(public StoneFamilyGrownStonesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new GrownStoneCollection($collection))->response();
    }
}
