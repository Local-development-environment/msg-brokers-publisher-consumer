<?php

namespace App\Http\Admin\Insert\Stones\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\Stones\Services\Relationships\StoneImitationStoneRelationshipService;
use Illuminate\Http\JsonResponse;

class StoneImitationStoneRelationshipController extends Controller
{
    public function __construct(public StoneImitationStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
