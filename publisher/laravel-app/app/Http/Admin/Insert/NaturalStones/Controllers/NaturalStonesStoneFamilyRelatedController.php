<?php

namespace App\Http\Admin\Insert\NaturalStones\Controllers;

use App\Http\Admin\Insert\StoneFamilies\Resources\StoneFamilyResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\NaturalStones\Services\Relationships\NaturalStonesStoneFamilyRelationshipService;
use Illuminate\Http\JsonResponse;

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
