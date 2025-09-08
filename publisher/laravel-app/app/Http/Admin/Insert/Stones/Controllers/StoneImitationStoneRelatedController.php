<?php

namespace App\Http\Admin\Insert\Stones\Controllers;

use App\Http\Admin\Insert\ImitationStones\Resources\ImitationStoneResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\Stones\Services\Relationships\StoneImitationStoneRelationshipService;
use Illuminate\Http\JsonResponse;

class StoneImitationStoneRelatedController extends Controller
{
    public function __construct(public StoneImitationStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ImitationStoneResource($model))->response();
    }
}
