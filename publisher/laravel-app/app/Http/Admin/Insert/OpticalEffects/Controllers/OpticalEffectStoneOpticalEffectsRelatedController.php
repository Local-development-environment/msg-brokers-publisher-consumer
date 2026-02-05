<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\OpticalEffects\Controllers;

use App\Http\Admin\Insert\OpticalEffectStones\Resources\StoneOpticalEffectCollection;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use JewelleryDomain\Jewelleries\Inserts\OpticalEffects\Services\Relationships\OpticalEffectOpticalEffectStonesRelationshipService;

final class OpticalEffectStoneOpticalEffectsRelatedController extends Controller
{
    public function __construct(public OpticalEffectOpticalEffectStonesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return (new StoneOpticalEffectCollection($collection))->response();
    }
}
