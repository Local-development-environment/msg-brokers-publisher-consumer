<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\InsertExteriors\Controllers;

use App\Http\Admin\Insert\Stones\Resources\StoneResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\InsertExteriors\Services\Relationships\InsertExteriorsStoneRelationshipService;
use Illuminate\Http\JsonResponse;

final class InsertExteriorsStoneRelatedController extends Controller
{
    public function __construct(public InsertExteriorsStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new StoneResource($model))->response();
    }
}
