<?php

namespace App\Http\Admin\Insert\Inserts\Controllers;

use App\Http\Admin\Insert\StoneExteriours\Resources\StoneExteriorResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\Inserts\Services\Relationships\InsertsStoneExteriorRelationshipService;

class InsertsInsertStoneRelatedController extends Controller
{
    public function __construct(public InsertsStoneExteriorRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new StoneExteriorResource($model))->response();
    }
}
