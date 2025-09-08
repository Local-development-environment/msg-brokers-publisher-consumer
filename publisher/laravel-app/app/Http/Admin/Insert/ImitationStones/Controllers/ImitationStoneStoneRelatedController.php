<?php

namespace App\Http\Admin\Insert\ImitationStones\Controllers;

use App\Http\Admin\Insert\ImitationStones\Resources\ImitationStoneResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\ImitationStones\Services\Relationships\ImitationStoneStoneRelationshipService;
use Illuminate\Http\JsonResponse;

class ImitationStoneStoneRelatedController extends Controller
{
    public function __construct(public ImitationStoneStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ImitationStoneResource($model))->response();
    }
}
