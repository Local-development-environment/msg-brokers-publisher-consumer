<?php

namespace App\Http\Admin\Insert\StoneFamilies\Controllers;

use App\Http\Admin\Insert\NaturalStones\Resources\NaturalStoneCollection;
use App\Http\Controllers\Controller;
use Domain\Inserts\StoneFamilies\Services\Relationships\StoneFamilyNaturalStonesRelationshipService;
use Illuminate\Http\JsonResponse;

class StoneFamilyNaturalStonesRelatedController extends Controller
{
    public function __construct(public StoneFamilyNaturalStonesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new NaturalStoneCollection($collection))->response();
    }
}
