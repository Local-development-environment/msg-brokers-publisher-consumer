<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\OpticalEffectStones\Controllers;

use App\Http\Admin\Insert\OpticalEffects\Resources\OpticalEffectResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\StoneOpticalEffects\Services\Relationships\StoneOpticalEffectsOpticalEffectRelationshipService;

final class StoneOpticalEffectsOpticalEffectRelatedController extends Controller
{
    public function __construct(public StoneOpticalEffectsOpticalEffectRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new OpticalEffectResource($model))->response();
    }
}
