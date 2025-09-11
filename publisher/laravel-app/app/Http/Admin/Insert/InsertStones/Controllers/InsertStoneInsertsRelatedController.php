<?php

namespace App\Http\Admin\Insert\InsertStones\Controllers;

use App\Http\Admin\Insert\Inserts\Resources\InsertCollection;
use App\Http\Controllers\Controller;
use Domain\Inserts\InsertStones\Services\Relationships\InsertStoneInsertsRelationshipService;
use Illuminate\Http\JsonResponse;

class InsertStoneInsertsRelatedController extends Controller
{
    public function __construct(public InsertStoneInsertsRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new InsertCollection($collection))->response();
    }
}
