<?php
declare(strict_types=1);

namespace App\Http\Admin\ChainProperty\Chains\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Shared\Resources\Identifiers\ApiEntityIdentifierResource;
use Domain\JewelleryProperties\Chains\Chains\Services\Relationships\ChainsClaspRelationshipService;
use Illuminate\Http\JsonResponse;

final class ChainsClaspRelationshipController extends Controller
{
    public function __construct(public ChainsClaspRelationshipService $service)
    {
    }

    public function index(int $id): JsonResponse
    {
        $model = $this->service->index($id);
        return (new ApiEntityIdentifierResource($model))->response();
    }
}
