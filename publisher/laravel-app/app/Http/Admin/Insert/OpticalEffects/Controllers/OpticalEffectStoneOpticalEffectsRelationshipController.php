<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\OpticalEffects\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\OpticalEffects\Services\Relationships\OpticalEffectOpticalEffectStonesRelationshipService;
use Illuminate\Http\JsonResponse;

final class OpticalEffectStoneOpticalEffectsRelationshipController extends Controller
{
    public function __construct(public OpticalEffectOpticalEffectStonesRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $collection = $this->service->index($id);

        return ApiEntityIdentifierResource::collection($collection)->response();
    }
}
