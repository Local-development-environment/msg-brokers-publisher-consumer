<?php

namespace App\Http\Admin\Insert\NaturalStones\Controllers;

use App\Http\Admin\Insert\StoneFamilies\Resources\StoneFamilyResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Services\Relationships\NaturalStonesStoneFamilyRelationshipService;

class NaturalStonesStoneFamilyRelatedController extends Controller
{
    public function __construct(public NaturalStonesStoneFamilyRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new StoneFamilyResource($model))->response();
    }
}
