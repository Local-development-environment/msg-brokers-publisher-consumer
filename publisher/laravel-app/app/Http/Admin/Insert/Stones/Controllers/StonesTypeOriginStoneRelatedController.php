<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\Stones\Controllers;

use App\Http\Controllers\Controller;
use Domain\Inserts\Stones\Services\Relationships\StonesTypeOriginStoneRelationshipService;
use Illuminate\Http\JsonResponse;
use Resources\TypeOriginResource;

final class StonesTypeOriginStoneRelatedController extends Controller
{
    public function __construct(public StonesTypeOriginStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new TypeOriginResource($model))->response();
    }
}
