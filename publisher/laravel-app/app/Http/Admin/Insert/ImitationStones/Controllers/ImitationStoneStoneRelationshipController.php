<?php

namespace App\Http\Admin\Insert\ImitationStones\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\ImitationStones\Services\Relationships\ImitationStoneStoneRelationshipService;
use Illuminate\Http\JsonResponse;

class ImitationStoneStoneRelationshipController extends Controller
{
    public function __construct(public ImitationStoneStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
