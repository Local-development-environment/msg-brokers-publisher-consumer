<?php

namespace App\Http\Admin\Insert\Inserts\Controllers;

use App\Http\Admin\Jewellery\Jewelleries\Resources\JewelleryResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\Inserts\Services\Relationships\InsertsJewelleryRelationshipService;
use Illuminate\Http\JsonResponse;

class InsertsJewelleryRelatedController extends Controller
{
    public function __construct(public InsertsJewelleryRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new JewelleryResource($model))->response();
    }
}
