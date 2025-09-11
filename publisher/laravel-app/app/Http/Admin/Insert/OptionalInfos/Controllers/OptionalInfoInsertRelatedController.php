<?php

namespace App\Http\Admin\Insert\OptionalInfos\Controllers;

use App\Http\Admin\Insert\Inserts\Resources\InsertResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\OptionalInfos\Services\Relationships\OptionalInfoInsertRelationshipService;
use Illuminate\Http\JsonResponse;

class OptionalInfoInsertRelatedController extends Controller
{
    public function __construct(public OptionalInfoInsertRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new InsertResource($model))->response();
    }
}
