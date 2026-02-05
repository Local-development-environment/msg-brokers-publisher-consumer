<?php

namespace App\Http\Admin\Insert\NaturalStones\Controllers;

use App\Http\Admin\Insert\Stones\Resources\StoneResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Services\Relationships\NaturalStoneStoneRelationshipService;

class NaturalStoneStoneRelatedController extends Controller
{
    public function __construct(public NaturalStoneStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new StoneResource($model))->response();
    }
}
