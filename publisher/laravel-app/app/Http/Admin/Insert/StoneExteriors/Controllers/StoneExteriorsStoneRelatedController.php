<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\StoneExteriors\Controllers;

use App\Http\Admin\Insert\Stones\Resources\StoneResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\StoneExteriors\Services\Relationships\StoneExteriorsStoneRelationshipService;
use Illuminate\Http\JsonResponse;

final class StoneExteriorsStoneRelatedController extends Controller
{
    public function __construct(public StoneExteriorsStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new StoneResource($model))->response();
    }
}
