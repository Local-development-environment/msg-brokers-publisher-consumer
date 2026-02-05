<?php

namespace App\Http\Admin\Insert\StoneFamilies\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\StoneFamilies\Services\Relationships\StoneFamilyNaturalStonesRelationshipService;

class StoneFamilyNaturalStonesRelationshipController extends Controller
{
    public function __construct(public StoneFamilyNaturalStonesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return ApiEntityIdentifierResource::collection($collection)->response();
    }
}
