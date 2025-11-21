<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\StoneExteriours\Controllers;

use App\Http\Admin\Insert\Colours\Resources\ColourResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\StoneExteriours\Services\Relationships\StoneExteriorsStoneColourRelationshipService;
use Illuminate\Http\JsonResponse;

final class StoneExteriorsStoneColourRelatedController extends Controller
{
    public function __construct(public StoneExteriorsStoneColourRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ColourResource($model))->response();
    }
}
