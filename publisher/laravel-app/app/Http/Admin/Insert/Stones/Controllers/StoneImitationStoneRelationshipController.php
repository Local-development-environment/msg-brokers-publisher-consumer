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

    public function index(int $id): JsonResponse|null
    {
        $model = $this->service->index($id);

        if ($model) {
            return (new ApiEntityIdentifierResource($model))->response();
        } else {
            return response()->json()->setStatusCode(204);
        }
    }
}
