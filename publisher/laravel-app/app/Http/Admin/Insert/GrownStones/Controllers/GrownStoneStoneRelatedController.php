<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\GrownStones\Controllers;

use App\Http\Admin\Insert\Stones\Resources\StoneResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\GrownStones\Services\Relationships\GrownStoneStoneRelationshipService;

final class GrownStoneStoneRelatedController extends Controller
{
    public function __construct(public GrownStoneStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new StoneResource($model))->response();
    }
}
