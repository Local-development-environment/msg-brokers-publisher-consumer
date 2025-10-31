<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\InsertExteriors\Controllers;

use App\Http\Admin\Insert\Colours\Resources\ColourResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\InsertExteriors\Services\Relationships\InsertExteriorsStoneColourRelationshipService;
use Illuminate\Http\JsonResponse;

final class InsertExteriorsStoneColourRelatedController extends Controller
{
    public function __construct(public InsertExteriorsStoneColourRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ColourResource($model))->response();
    }
}
