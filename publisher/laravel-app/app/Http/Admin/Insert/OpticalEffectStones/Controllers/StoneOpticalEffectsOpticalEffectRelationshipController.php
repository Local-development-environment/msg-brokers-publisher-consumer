<?php
declare(strict_types=1);

namespace App\Http\Admin\Insert\OpticalEffectStones\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\Inserts\StoneOpticalEffects\Services\Relationships\StoneOpticalEffectsOpticalEffectRelationshipService;
use Illuminate\Http\JsonResponse;

final class StoneOpticalEffectsOpticalEffectRelationshipController extends Controller
{
    public function __construct(public StoneOpticalEffectsOpticalEffectRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ApiEntityIdentifierResource($model))->response();
    }
}
