<?php

namespace App\Http\Admin\Insert\OptionalInfos\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\OptionalInfos\Services\Relationships\OptionalInfoInsertRelationshipService;
use Illuminate\Http\JsonResponse;

class OptionalInfoInsertRelationshipController extends Controller
{
    public function __construct(public OptionalInfoInsertRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
