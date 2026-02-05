<?php

namespace App\Http\Admin\Insert\StoneFamilies\Controllers;

use App\Http\Admin\Insert\NaturalStones\Resources\NaturalStoneCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\StoneFamilies\Services\Relationships\StoneFamilyNaturalStonesRelationshipService;

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
