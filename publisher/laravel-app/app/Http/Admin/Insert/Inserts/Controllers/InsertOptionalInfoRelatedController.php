<?php

namespace App\Http\Admin\Insert\Inserts\Controllers;

use App\Http\Admin\Insert\OptionalInfos\Resources\OptionalInfoResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\Inserts\Services\Relationships\InsertOptionalInfoRelationshipService;
use Illuminate\Http\JsonResponse;

class InsertOptionalInfoRelatedController extends Controller
{
    public function __construct(public InsertOptionalInfoRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new OptionalInfoResource($model))->response();
    }
}
