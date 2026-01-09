<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\OpticalEffectStones\Controllers;

use App\Http\Admin\Insert\Stones\Resources\StoneResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\StoneOpticalEffects\Services\Relationships\StoneOpticalEffectStoneRelationshipService;
use Illuminate\Http\JsonResponse;

final class StoneOpticalEffectStoneRelatedController extends Controller
{
    public function __construct(public StoneOpticalEffectStoneRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new StoneResource($model))->response();
    }
}
