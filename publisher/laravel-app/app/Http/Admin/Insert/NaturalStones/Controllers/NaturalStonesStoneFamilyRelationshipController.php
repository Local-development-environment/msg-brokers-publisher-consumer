<?php

namespace App\Http\Admin\Insert\NaturalStones\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\NaturalStones\Services\Relationships\NaturalStonesStoneFamilyRelationshipService;

class NaturalStonesStoneFamilyRelationshipController extends Controller
{
    public function __construct(public NaturalStonesStoneFamilyRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
