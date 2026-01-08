<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\OpticalEffectStones\Controllers;

use App\Http\Admin\Insert\OpticalEffects\Resources\OpticalEffectResource;
use App\Http\Controllers\Controller;
use Domain\Inserts\OpticalEffectStones\Services\Relationships\OpticalEffectStonesOpticalEffectRelationshipService;
use Illuminate\Http\JsonResponse;

final class StoneOpticalEffectsOpticalEffectRelatedController extends Controller
{
    public function __construct(public OpticalEffectStonesOpticalEffectRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new OpticalEffectResource($model))->response();
    }
}
