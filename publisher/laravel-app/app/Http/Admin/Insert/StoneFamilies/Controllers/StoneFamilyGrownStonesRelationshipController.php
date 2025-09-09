<?php

namespace App\Http\Admin\Insert\StoneFamilies\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\StoneFamilies\Services\Relationships\StoneFamilyGrownStonesRelationshipService;
use Illuminate\Http\JsonResponse;

class StoneFamilyGrownStonesRelationshipController extends Controller
{
    public function __construct(public StoneFamilyGrownStonesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return ApiEntityIdentifierResource::collection($collection)->response();
    }
}
