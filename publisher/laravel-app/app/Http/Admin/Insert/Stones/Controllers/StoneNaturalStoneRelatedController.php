<?php

namespace App\Http\Admin\Insert\Stones\Controllers;

use App\Http\Admin\Insert\NaturalStones\Resources\NaturalStoneResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\Stones\Services\Relationships\StoneNaturalStoneRelationshipService;
use Illuminate\Http\JsonResponse;

class StoneNaturalStoneRelatedController extends Controller
{
    public function __construct(public StoneNaturalStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        if ($model) {
            return (new NaturalStoneResource($model))->response();
        } else {
            return response()->json()->setStatusCode(204);
        }

    }
}
