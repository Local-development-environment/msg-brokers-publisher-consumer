<?php
declare(strict_types=1);

namespace App\Http\Admin\SpecProperties\Chains\Chain\Controllers;

use App\Http\Admin\SharedProperty\Clasps\Resources\ClaspResource;
use App\Http\Controllers\Controller;
use Domain\JewelleryProperties\Chains\Chains\Services\Relationships\ChainsClaspRelationshipService;
use Illuminate\Http\JsonResponse;

final class ChainsClaspRelatedController extends Controller
{
    public function __construct(public ChainsClaspRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);

        return (new ClaspResource($model))->response();
    }
}
