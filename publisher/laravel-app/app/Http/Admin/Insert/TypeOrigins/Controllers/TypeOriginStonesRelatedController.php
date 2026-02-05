<?php

declare(strict_types=1);

namespace App\Http\Admin\Insert\TypeOrigins\Controllers;

use App\Http\Admin\Insert\Stones\Resources\StoneCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\TypeOrigins\Services\Relationships\StoneTypeOriginStonesRelationshipService;

class TypeOriginStonesRelatedController extends Controller
{
    public function __construct(public StoneTypeOriginStonesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new StoneCollection($collection))->response();
    }
}
