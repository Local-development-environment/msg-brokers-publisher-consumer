<?php

namespace App\Http\Admin\Insert\StoneExteriours\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\StoneExteriours\Services\Relationships\StoneExteriorsStoneRelationshipService;
use Illuminate\Http\JsonResponse;

final class StoneExteriorsStoneRelationshipController extends Controller
{
    public function __construct(public StoneExteriorsStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
